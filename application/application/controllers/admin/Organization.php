<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Organization extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_organization');
        $this->load->library('upload');
        if (!$this->session->userdata('user_id') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('admin/dashboard');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_organization');

        // PAGINATION
        $baseUrl    = base_url() . "admin/organization/index/";
        $totalRows  = count((array) $this->m_organization->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']            = getSetting();
        $data['title']              = 'Struktur Organisasi';
        $data['organization']       = $this->m_organization->read($perPage, $page,'');
        $data['organization_level'] = $this->m_organization->read('', '', '');
		
        
        // TEMPLATE
		$view         = "_backend/organization";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_organization', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_organization');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "admin/organization/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_organization->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']            = getSetting();
        $data['title']              = 'Struktur Organisasi';
        $data['organization']       = $this->m_organization->read($perPage, $page, $data['search']);
        $data['organization_level'] = $this->m_organization->read('', '', '');
        
        // TEMPLATE
		$view         = "_backend/organization";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();

        $path = './upload/organization/';

        $filename_1              = "organization-".date('YmdHis');
        $config['upload_path']   = $path;
        $config['allowed_types'] = "png|jpeg|jpg";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('organization_image')) { 
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
        } else {
            $dat  = $this->upload->data();

            // POST
            $data['organization_id']       = '';
            $data['organization_name']     = $this->input->post('organization_name');
            $data['organization_nip']      = $this->input->post('organization_nip');
            $data['organization_position'] = $this->input->post('organization_position');
            $data['organization_image']    = $dat['file_name'];
            $data['organization_up']       = $this->input->post('organization_up');
            $data['createtime']            = date('Y-m-d H:i:s');
            $this->m_organization->create($data);

            // LOG
            $message    = $this->session->userdata('user_name')." menambah data Struktur Organisasi dengan nama = ".$data['organization_name'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data Struktur Organisasi dengan nama = ".$data['organization_name'];
            getAlert($alertStatus, $alertMessage);
        }
        

        redirect('admin/organization');
    }
    

    public function update() {
        csrfValidate();

        if($_FILES['organization_image']['name'] !=""){
            $path = './upload/organization/';

            $filename_1              = "organization-".date('YmdHis');
            $config['upload_path']   = $path;
            $config['allowed_types'] = "png|jpeg|jpg";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('organization_image')) { 
                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();
                unlink($path.$this->input->post('organization_image_old'));
                // POST
                $data['organization_id']       = $this->input->post('organization_id');
                $data['organization_name']     = $this->input->post('organization_name');
                $data['organization_nip']      = $this->input->post('organization_nip');
                $data['organization_position'] = $this->input->post('organization_position');
                $data['organization_image']    = $dat['file_name'];
                $this->m_organization->update($data);

                // LOG
                $message    = $this->session->userdata('user_name')." menambah data Struktur Organisasi dengan ID = ".$data['organization_id'];
                createLog($message);

                // ALERT
                $alertStatus  = "success";
                $alertMessage = "Berhasil menambah data Struktur Organisasi ".$data['organization_id'];
                getAlert($alertStatus, $alertMessage);
            }
        }else{
            // POST
            $data['organization_id']       = $this->input->post('organization_id');
            $data['organization_name']     = $this->input->post('organization_name');
            $data['organization_nip']      = $this->input->post('organization_nip');
            $data['organization_position'] = $this->input->post('organization_position');
            $data['organization_up']       = $this->input->post('organization_up');
            $this->m_organization->update($data);

            // LOG
            $message    = $this->session->userdata('user_name')." mengubah data Struktur Organisasi dengan ID = ".$data['organization_id'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil mengubah data Struktur Organisasi dengan ID = ".$data['organization_id'];
            getAlert($alertStatus, $alertMessage);
        }


        redirect('admin/organization');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_organization->delete($this->input->post('organization_id'));
        unlink('./upload/organization/'.$this->input->post('organization_image'));
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data Struktur Organisasi dengan ID = ".$this->input->post('organization_id')." - ".$this->input->post('organization_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data Struktur Organisasi : ".$this->input->post('organization_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/organization');
    }
    
}