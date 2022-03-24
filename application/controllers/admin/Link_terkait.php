<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Link_terkait extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_link_terkait');
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
        $this->session->unset_userdata('sess_search_link_terkait');

        // PAGINATION
        $baseUrl    = base_url() . "admin/link_terkait/index/";
        $totalRows  = count((array) $this->m_link_terkait->read('', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;



        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Link Terkait';
        $data['link_terkait']  = $this->m_link_terkait->read($perPage, $page, '');


        // TEMPLATE
        $view         = "_backend/link_terkait";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_link_terkait', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_link_terkait');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/link_terkait/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_link_terkait->read('', '', $data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Link Terkait';
        $data['link_terkait']  = $this->m_link_terkait->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "_backend/link_terkait";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        $path = './upload/link_terkait/';

        $filename_1              = "linkterkait-" . date('YmdHis');
        $config['upload_path']   = $path;
        $config['allowed_types'] = "png|jpeg|jpg";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('link_terkait_logo')) {
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
        } else {
            $dat  = $this->upload->data();

            // POST
            $data['link_terkait_id']    = '';
            $data['link_terkait_name'] = $this->input->post('link_terkait_name');
            $data['link_terkait_url'] = $this->input->post('link_terkait_url');
            $data['link_terkait_logo'] = $dat['file_name'];
            $data['createtime']   = date('Y-m-d H:i:s');
            $this->m_link_terkait->create($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " menambah data link_terkait dengan name = " . $data['link_terkait_name'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data link_terkait dengan name = " . $data['link_terkait_name'];
            getAlert($alertStatus, $alertMessage);
        }


        redirect('admin/link_terkait');
    }


    public function update()
    {
        csrfValidate();

        if ($_FILES['link_terkait_logo']['name'] != "") {
            $path = './upload/link_terkait/';

            $filename_1              = "linkterkait-" . date('YmdHis');
            $config['upload_path']   = $path;
            $config['allowed_types'] = "png|jpeg|jpg";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('link_terkait_logo')) {
                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();
                unlink($path . $this->input->post('link_terkait_logo_old'));
                // POST
                $data['link_terkait_id']   = $this->input->post('link_terkait_id');
                $data['link_terkait_name'] = $this->input->post('link_terkait_name');
                $data['link_terkait_url'] = $this->input->post('link_terkait_url');
                $data['link_terkait_logo'] = $dat['file_name'];
                $data['createtime']   = date('Y-m-d H:i:s');
                $this->m_link_terkait->update($data);

                // LOG
                $message    = $this->session->userdata('user_name') . " mengubah data link_terkait dengan ID = " . $data['link_terkait_id'];
                createLog($message);

                // ALERT
                $alertStatus  = "success";
                $alertMessage = "Berhasil mengubah data link_terkait " . $data['link_terkait_id'];
                getAlert($alertStatus, $alertMessage);
            }
        } else {
            // POST
            $data['link_terkait_id']   = $this->input->post('link_terkait_id');
            $data['link_terkait_name'] = $this->input->post('link_terkait_name');
            $data['link_terkait_url'] = $this->input->post('link_terkait_url');
            $data['createtime']   = date('Y-m-d H:i:s');
            $this->m_link_terkait->update($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " mengubah data link_terkait dengan ID = " . $data['link_terkait_id'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil mengubah data link_terkait dengan ID = " . $data['link_terkait_id'];
            getAlert($alertStatus, $alertMessage);
        }



        redirect('admin/link_terkait');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_link_terkait->delete($this->input->post('link_terkait_id'));
        unlink('./upload/link_terkait/' . $this->input->post('link_terkait_logo'));
        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data link_terkait dengan ID = " . $this->input->post('link_terkait_id') . " - " . $this->input->post('link_terkait_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data link_terkait : " . $this->input->post('link_terkait_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/link_terkait');
    }
}
