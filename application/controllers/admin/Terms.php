<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Terms extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_terms');
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
        $this->session->unset_userdata('sess_search_terms');

        // PAGINATION
        $baseUrl    = base_url() . "admin/terms/index/".$this->uri->segment(4);
        $totalRows  = count((array) $this->m_terms->read('','','', $this->uri->segment(4)));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting']      = getSetting();
        $data['title']        = 'Syarat Izin';
        $data['terms']        = $this->m_terms->read($perPage, $page,'', $this->uri->segment(4));
        $data['service_name'] = $this->m_service->get($this->uri->segment(4));
		
        
        // TEMPLATE
		$view         = "_backend/service/terms";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_terms', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_terms');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "admin/terms/search/".$this->uri->segment(4)."/".$data['search']."/";
        $totalRows  = count((array)$this->m_terms->read('','',$data['search'], $this->uri->segment(4)));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 6;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting']      = getSetting();
        $data['title']        = 'Syart Izin';
        $data['terms']        = $this->m_terms->read($perPage, $page, $data['search'], $this->uri->segment(4));
        $data['service_name'] = $this->m_service->get($this->uri->segment(4));
        
        // TEMPLATE
		$view         = "_backend/service/terms";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['terms_id']   = '';
        $data['terms_text'] = $this->input->post('terms_text');
        $data['service_id'] = $this->input->post('service_id');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_terms->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah Syarat Izin ".$data['terms_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah Syarat Izin ".$data['terms_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/terms/index/'.$this->input->post('service_id'));
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['terms_id']   = $this->input->post('terms_id');
        $data['terms_text'] = $this->input->post('terms_text');
        $data['service_id'] = $this->input->post('service_id');
        $this->m_terms->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah Syarat Izin dengan ID = ".$data['terms_id']." - ".$data['terms_text'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah Syarat Izin : ".$data['terms_text'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/terms/index/'.$this->input->post('service_id'));
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_terms->delete($this->input->post('terms_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus Syarat Izin dengan ID = ".$this->input->post('terms_id')." - ".$this->input->post('terms_text');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus Syarat Izin : ".$this->input->post('terms_text');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/terms/index/'.$this->input->post('service_id'));
    }
    
}