<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Publication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_publication');
        $this->load->model('m_publication_category');
        $this->load->library('upload');
        if (!$this->session->userdata('user_id') or $this->session->userdata('user_group') != 1) {
            // ALERT
            $alertStatus  = 'failed';
            $alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
            getAlert($alertStatus, $alertMessage);
            redirect('admin/dashboard');
        }
    }


    public function index()
    {
        $this->session->unset_userdata('sess_search_publication');

        // PAGINATION
        $baseUrl    = base_url() . "admin/publication/index/";
        $totalRows  = count((array) $this->m_publication->read('', '', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;



        //DATA
        $data['setting']    = getSetting();
        $data['title']      = 'Produk Hukum';
        $data['publication'] = $this->m_publication->read($perPage, $page, '', '');
        $data['tbl_publication_category']   = $this->m_publication_category->read('', '', '');


        // TEMPLATE
        $view         = "_backend/publication/publication";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_publication', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_publication');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/publication/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_publication->read('', '', $data['search']), '');
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting']    = getSetting();
        $data['title']      = 'Produk Hukum';
        $data['publication'] = $this->m_publication->read($perPage, $page, $data['search'], '');

        // TEMPLATE
        $view         = "_backend/publication/publication";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        $path = './upload/publication/';

        $filename_1              = "publication-" . date('YmdHis');
        $config['upload_path']   = $path;
        $config['allowed_types'] = "doc|docx|pdf|xls|xlsx";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('publication_file')) {
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
        } else {
            $dat  = $this->upload->data();

            // POST
            $data['publication_id']              = '';
            $data['publication_name']            = $this->input->post('publication_name');
            $data['publication_text']            = $this->input->post('publication_text');
            $data['publication_year']            = $this->input->post('publication_year');
            $data['publication_category_id']     = $this->input->post('publication_category_id');
            $data['publication_file']            = $dat['file_name'];
            $data['createtime']                 = date('Y-m-d H:i:s');
            $this->m_publication->create($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " menambah data Produk Hukum dengan nama = " . $data['publication_file'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data Produk Hukum dengan nama = " . $data['publication_file'];
            getAlert($alertStatus, $alertMessage);
        }


        redirect('admin/publication');
    }


    public function update()
    {
        csrfValidate();

        if ($_FILES['publication_file']['name'] != "") {
            $path = './upload/publication/';

            $filename_1              = "publication-" . date('YmdHis');
            $config['upload_path']   = $path;
            $config['allowed_types'] = "doc|docx|pdf|xls|xlsx";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('publication_file')) {
                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();
                unlink($path . $this->input->post('publication_file_old'));
                // POST
                $data['publication_id']   = $this->input->post('publication_id');
                $data['publication_name'] = $this->input->post('publication_name');
                $data['publication_text'] = $this->input->post('publication_text');
                $data['publication_year'] = $this->input->post('publication_year');
                $data['publication_category_id'] = $this->input->post('publication_category_id');
                $data['publication_file'] = $dat['file_name'];
                $this->m_publication->update($data);

                // LOG
                $message    = $this->session->userdata('user_name') . " menambah data Produk Hukum dengan ID = " . $data['publication_id'];
                createLog($message);

                // ALERT
                $alertStatus  = "success";
                $alertMessage = "Berhasil menambah data Produk Hukum " . $data['publication_id'];
                getAlert($alertStatus, $alertMessage);
            }
        } else {
            // POST
            $data['publication_id']              = $this->input->post('publication_id');
            $data['publication_name']            = $this->input->post('publication_name');
            $data['publication_text']            = $this->input->post('publication_text');
            $data['publication_year']            = $this->input->post('publication_year');
            $data['publication_category_id']     = $this->input->post('publication_category_id');
            $this->m_publication->update($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " mengubah data Produk Hukum dengan ID = " . $data['publication_id'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil mengubah data Produk Hukum dengan ID = " . $data['publication_id'];
            getAlert($alertStatus, $alertMessage);
        }


        redirect('admin/publication');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_publication->delete($this->input->post('publication_id'));
        unlink('./upload/publication/' . $this->input->post('publication_file'));
        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data Produk Hukum dengan ID = " . $this->input->post('publication_id') . " - " . $this->input->post('publication_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data Produk Hukum : " . $this->input->post('publication_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/publication');
    }
}