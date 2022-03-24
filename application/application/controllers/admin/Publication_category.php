<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Publication_category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_publication_category');
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
        $this->session->unset_userdata('sess_search_publication_category');

        // PAGINATION
        $baseUrl    = base_url() . "admin/publication_category/index/";
        $totalRows  = count((array) $this->m_publication_category->read('', '', ''));
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
        $data['publication_category']   = $this->m_publication_category->read($perPage, $page, '');


        // TEMPLATE
        $view         = "_backend/publication/publication_category";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_publication_category', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_publication_category');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/publication_category/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_publication_category->read('', '', $data['search']));
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
        $data['publication_category']   = $this->m_publication_category->read($perPage, $page, $data['search']);

        // TEMPLATE
        $view         = "_backend/news/publication_category";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();
        // POST
        $data['publication_category_id']   = '';
        $data['publication_category_name'] = $this->input->post('publication_category_name');
        $data['createtime']         = date('Y-m-d H:i:s');
        $this->m_publication_category->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data kategori produk_hukum " . $data['publication_category_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data kategori produk_hukum " . $data['publication_category_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/publication_category');
    }


    public function update()
    {
        csrfValidate();
        // POST
        $data['publication_category_id']   = $this->input->post('publication_category_id');
        $data['publication_category_name'] = $this->input->post('publication_category_name');
        $this->m_publication_category->update($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah data kategori produk_hukum dengan ID = " . $data['publication_category_id'] . " - " . $data['publication_category_name'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data kategori produk_hukum : " . $data['publication_category_name'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/publication_category');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_publication_category->delete($this->input->post('publication_category_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data kategori produk_hukum dengan ID = " . $this->input->post('publication_category_id') . " - " . $this->input->post('publication_category_name');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data kategori produk_hukum : " . $this->input->post('publication_category_name');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/publication_category');
    }
}