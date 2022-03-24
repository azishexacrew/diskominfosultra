<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_service');
        $this->load->model('m_sector');
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
        $this->session->unset_userdata('sess_search_service');

        // PAGINATION
        $baseUrl    = base_url() . "admin/service/index/";
        $totalRows  = count((array) $this->m_service->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Jenis Izin';
        $data['service'] = $this->m_service->read($perPage, $page,'');
        $data['sector']  = $this->m_sector->read('', '','');
		
        
        // TEMPLATE
		$view         = "_backend/service/service";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_service', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_service');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "admin/service/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_service->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Jenis Izin';
        $data['service'] = $this->m_service->read($perPage, $page, $data['search']);
        $data['sector']  = $this->m_sector->read('', '','');
        
        // TEMPLATE
		$view         = "_backend/service/service";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();

        $path = './upload/service/';

        $filename_1              = "form-".$this->input->post('service_code').'-'.date('YmdHis');
        $config['upload_path']   = $path;
        $config['allowed_types'] = "doc|docx|xls|xlsx|pdf";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('service_form_file')) {
            echo $this->upload->display_errors();
        } else {
            $dat  = $this->upload->data();
            $form = $dat['file_name'];
        }


        $filename_2              = "sop-".$this->input->post('service_code').'-'.date('YmdHis');
        $config['upload_path']   = $path;
        $config['allowed_types'] = "doc|docx|xls|xlsx|pdf|jpg|png";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_2;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('service_sop_file')) {
            echo $this->upload->display_errors();
        } else {
            $dat2  = $this->upload->data();
            $sop   = $dat2['file_name'];
        }



        // POST
        $data['service_id']        = '';
        $data['service_name']      = $this->input->post('service_name');
        $data['service_code']      = $this->input->post('service_code');
        $data['service_form_file'] = $form;
        $data['service_sop_file']  = $sop;
        $data['sector_id']         = $this->input->post('sector_id');
        $data['createtime']        = date('Y-m-d H:i:s');
        
        
        
        $this->m_service->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data layanan izin/surat ".$data['service_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data layanan izin/surat ".$data['service_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/service');
    }
    

    public function update() {
        csrfValidate();

        $path = './upload/service/';

        if($_FILES['service_form_file']['name'] != ''){

            // REMOVE OLD FILE
            unlink($path.$this->input->post('service_form_file_old'));

            $filename_1              = "form-".$this->input->post('service_code').'-'.date('YmdHis');
            $config['upload_path']   = $path;
            $config['allowed_types'] = "doc|docx|xls|xlsx|pdf";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('service_form_file')) {
                echo $this->upload->display_errors();
            } else {
                $dat                  = $this->upload->data();
                $data['service_form_file'] = $dat['file_name'];
            }
        }

        if($_FILES['service_sop_file']['name'] != ''){
            // REMOVE OLD FILE
            unlink($path.$this->input->post('service_sop_file_old'));

            $filename_2              = "sop-".$this->input->post('service_code').'-'.date('YmdHis');
            $config['upload_path']   = $path;
            $config['allowed_types'] = "doc|docx|xls|xlsx|pdf|jpg|png";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_2;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('service_sop_file')) {
                echo $this->upload->display_errors();
            } else {
                $dat2                       = $this->upload->data();
                $data['service_sop_file']   = $dat2['file_name'];
            }
        }


        // POST
        $data['service_id']        = $this->input->post('service_id');
        $data['service_name']      = $this->input->post('service_name');
        $data['service_code']      = $this->input->post('service_code');
        $data['sector_id']         = $this->input->post('sector_id');
        $this->m_service->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah layanan izin/surat dengan ID = ".$data['service_id']." - ".$data['service_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah layanan izin/surat : ".$data['service_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/service');
    }
    

    public function delete() {
        csrfValidate();

        // REMOVE OLD FILE
        $path = './upload/service/';
        unlink($path.$this->input->post('service_form_file_old'));
        unlink($path.$this->input->post('service_sop_file_old'));

        // POST
        $this->m_service->delete($this->input->post('service_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus layanan izin/surat dengan ID = ".$this->input->post('service_id')." - ".$this->input->post('service_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus layanan izin/surat : ".$this->input->post('service_name');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/service');
    }
    
}