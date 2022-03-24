<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Regulation_category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_regulation_category');
        $this->load->library('upload');
        if (!($this->session->userdata('user_id'))) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('auth');
        }
    }


    public function index()
    {
        $this->session->unset_userdata('sess_search_regulation_category');

        // PAGINATION
        $baseUrl    = base_url() . "admin/regulation_category/index/";
        $totalRows  = count((array) $this->m_regulation_category->read('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;



        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Kategori Produk Hukum';
        $data['regulation_category']   = $this->m_regulation_category->read($perPage, $page, '');


        // TEMPLATE
        $view         = "_backend/regulation/regulation_category";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_regulation_category', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_regulation_category');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/regulation_category/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_regulation_category->read('', '', $data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Kategori Produk Hukum';
        $data['regulation_category']   = $this->m_regulation_category->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "_backend/news/regulation_category";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        $filename_1              = "iconregulationcategory-" . date('YmdHis');
        $config['upload_path']   = "./upload/regulation_category/icon/";
        $config['allowed_types'] = "jpg|png|jpeg|ico";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('regulation_category_icon')) {
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
        } else {
            $dat  = $this->upload->data();

            // POST
            $data['regulation_category_id']         = '';
            $data['regulation_category_name']      = $this->input->post('regulation_category_name');
            $data['regulation_category_icon']      = $dat['file_name'];;
            $data['createtime']      = date('Y-m-d H:i:s');
            $this->m_regulation_category->create($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " menambah data Kategori Regulasi ";
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah Kategori Regulasi ";
            getAlert($alertStatus, $alertMessage);
        }

        redirect('admin/regulation_category');
    }

    public function update()
    {
        csrfValidate();

        if ($_FILES['regulation_category_icon']['name'] != "") {
            $path = './upload/regulation_category/icon/';

            $filename_1              = "iconregulationcategory-" . date('YmdHis');
            $config['upload_path']   = $path;
            $config['allowed_types'] = "png|jpeg|jpg|ico";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('regulation_category_icon')) {
                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();
                unlink($path . $this->input->post('regulation_category_icon_old'));
                // POST
                $data['regulation_category_id']   = $this->input->post('regulation_category_id');
                $data['regulation_category_name']   = $this->input->post('regulation_category_name');
                $data['regulation_category_icon'] = $dat['file_name'];
                $data['createtime']   = date('Y-m-d H:i:s');
                $this->m_regulation_category->update($data);

                // LOG
                $message    = $this->session->userdata('user_name') . " mengubah data Kategori Regulasi dengan ID = " . $data['regulation_category_id'];
                createLog($message);

                // ALERT
                $alertStatus  = "success";
                $alertMessage = "Berhasil mengubah data regulation_category " . $data['regulation_category_id'];
                getAlert($alertStatus, $alertMessage);
            }
        } else {
            // POST
            $data['regulation_category_id']   = $this->input->post('regulation_category_id');
            $data['regulation_category_name']   = $this->input->post('regulation_category_name');
            $data['createtime']   = date('Y-m-d H:i:s');
            $this->m_regulation_category->update($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " mengubah data Kategori Regulasi dengan ID = " . $data['regulation_category_id'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil mengubah data Kategori Regulasi dengan ID = " . $data['regulation_category_id'];
            getAlert($alertStatus, $alertMessage);
        }



        redirect('admin/regulation_category');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_regulation_category->delete($this->input->post('regulation_category_id'));
        unlink('./upload/regulation_category/icon/' . $this->input->post('regulation_category_icon_old'));
        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data regulation_category dengan ID = " . $this->input->post('regulation_category_id') . " - " . $this->input->post('regulation_category_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data regulation_category : " . $this->input->post('regulation_category_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/regulation_category');
    }
}
