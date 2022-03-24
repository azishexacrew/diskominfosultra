<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class tracking extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_tracking');
        $this->load->model('m_service');
        if (!$this->session->userdata('user_id') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('admin/dashboard');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_tracking');

        // PAGINATION
        $baseUrl    = base_url() . "admin/tracking/index/";
        $totalRows  = count((array) $this->m_tracking->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']  = getSetting();
        $data['title']    = 'Tracking Izin';
        $data['tracking'] = $this->m_tracking->read($perPage, $page,'');
        $data['service']  = $this->m_service->read('', '','');
		
        
        // TEMPLATE
		$view         = "_backend/tracking";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_tracking', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_tracking');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "admin/tracking/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_tracking->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']  = getSetting();
        $data['title']    = 'Tracking Izin';
        $data['tracking'] = $this->m_tracking->read($perPage, $page, $data['search']);
        $data['service']  = $this->m_service->read('', '','');
        
        // TEMPLATE
		$view         = "_backend/tracking";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['tracking_id']     = '';
        $data['tracking_nup']    = $this->input->post('tracking_nup');
        $data['tracking_name']   = $this->input->post('tracking_name');
        $data['tracking_status'] = 0;
        $data['service_id']      = $this->input->post('service_id');
        $data['createtime']      = date('Y-m-d H:i:s');
        $this->m_tracking->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data tracking ".$data['tracking_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data tracking ".$data['tracking_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/tracking');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['tracking_id']     = $this->input->post('tracking_id');
        $data['tracking_nup']    = $this->input->post('tracking_nup');
        $data['tracking_name']   = $this->input->post('tracking_name');
        $data['service_id']      = $this->input->post('service_id');
        $this->m_tracking->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data tracking dengan ID = ".$data['tracking_id']." - ".$data['tracking_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data tracking : ".$data['tracking_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/tracking');
    }


    public function update_selesai() {
        csrfValidate();
        // POST
        $data['tracking_id']     = $this->input->post('tracking_id');
        $data['tracking_status'] = 1;
        $this->m_tracking->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data tracking dengan ID = ".$data['tracking_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data tracking : ".$data['tracking_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/tracking');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_tracking->delete($this->input->post('tracking_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data tracking dengan ID = ".$this->input->post('tracking_id')." - ".$this->input->post('tracking_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data tracking : ".$this->input->post('tracking_name');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/tracking');
    }
    
}
