<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sector extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_sector');
        if (!$this->session->userdata('user_id') OR $this->session->userdata('user_group')!=1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('admin/dashboard');
		}
    }
    

    public function index() {
        $this->session->unset_userdata('sess_search_sector');

        // PAGINATION
        $baseUrl    = base_url() . "admin/sector/index/";
        $totalRows  = count((array) $this->m_sector->read('','',''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        

        
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Sektor Izin';
        $data['sector']  = $this->m_sector->read($perPage, $page,'');
		
        
        // TEMPLATE
		$view         = "_backend/service/sector";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function search() {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_sector', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_sector');
        }
        
        // PAGINATION
        $baseUrl    = base_url() . "admin/sector/search/".$data['search']."/";
        $totalRows  = count((array)$this->m_sector->read('','',$data['search']));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;
        
        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows ;
        
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Sektor Izin';
        $data['sector']  = $this->m_sector->read($perPage, $page, $data['search']);
        
        // TEMPLATE
		$view         = "_backend/service/sector";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
    }
    

    public function create() {
        csrfValidate();
        // POST
        $data['sector_id']   = '';
        $data['sector_name'] = $this->input->post('sector_name');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_sector->create($data);

        // LOG
        $message    = $this->session->userdata('user_name')." menambah data sektor izin ".$data['sector_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data sektor izin ".$data['sector_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/sector');
    }
    

    public function update() {
        csrfValidate();
        // POST
        $data['sector_id']   = $this->input->post('sector_id');
        $data['sector_name'] = $this->input->post('sector_name');
        $this->m_sector->update($data);

        // LOG
        $message    = $this->session->userdata('user_name')." mengubah data sektor izin dengan ID = ".$data['sector_id']." - ".$data['sector_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data sektor izin : ".$data['sector_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/sector');
    }
    

    public function delete() {
        csrfValidate();
        // POST
        $this->m_sector->delete($this->input->post('sector_id'));
        
        // LOG
        $message    = $this->session->userdata('user_name')." menghapus data sektor izin dengan ID = ".$this->input->post('sector_id')." - ".$this->input->post('sector_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data sektor izin : ".$this->input->post('sector_name');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/sector');
    }
    
}