<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Album extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_album');
        $this->load->model('m_gallery');
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
        $this->session->unset_userdata('sess_search_album');

        // PAGINATION
        $baseUrl    = base_url() . "admin/album/index/";
        $totalRows  = count((array) $this->m_album->read('', '', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;



        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Album';
        $data['album']    = $this->m_album->read($perPage, $page, '', '');
        $data['gallery']    = $this->m_gallery->read('', '', '', '');


        // TEMPLATE
        $view         = "_backend/album/album";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_album', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_album');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/album/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_album->read('', '', $data['search'], ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Album';
        $data['album']    = $this->m_album->read($perPage, $page, $data['search'], '');

        // TEMPLATE
        $view         = "_backend/album/album";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create_page()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Album';

        // TEMPLATE
        $view         = "_backend/album/_create";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function update_page()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Album';
        $data['album']    = $this->m_album->get($this->uri->segment(4));
        // $data['gallery']    = $this->m_gallery->read('', '', $this->uri->segment(4));

        // TEMPLATE
        $view         = "_backend/album/_update";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function detail_page()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Album';
        $data['album']    = $this->m_album->get($this->uri->segment(4));

        // TEMPLATE
        $view         = "_backend/album/_detail";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();
        // POST
        $data['album_id']         = '';
        $data['album_name']      = $this->input->post('album_name');
        $data['album_description']       = $this->input->post('album_description');
        $data['album_date']       = date('Y-m-d');
        $data['createtime']      = date('Y-m-d H:i:s');
        $data['user_id']         = $this->session->userdata('user_id');
        $this->m_album->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data album ";
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data album ";
        getAlert($alertStatus, $alertMessage);

        redirect('admin/album');
    }


    public function update()
    {
        csrfValidate();
        // POST
        $data['album_id']         = $this->input->post('album_id');
        $data['album_name']      = $this->input->post('album_name');
        $data['album_description']       = $this->input->post('album_description');
        $this->m_album->update($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " mengubah data album dengan ID = " . $data['album_id'];
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil mengubah data album ID : " . $data['album_id'];
        getAlert($alertStatus, $alertMessage);

        redirect('admin/album/');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $gallery = $this->m_gallery->read('', '', $this->input->post('album_id'), '');
        if ($gallery != NULL) {
            foreach ($gallery as $row) {
                if ($row->gallery_type == 'video')
                    unlink('./upload/album/video/' . $row->gallery_dir);
                elseif ($row->gallery_type == 'image')
                    unlink('./upload/album/' . $row->gallery_dir);
            }
        }
        $this->m_gallery->delete_where('album_id', $this->input->post('album_id'));
        $this->m_album->delete($this->input->post('album_id'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data album dengan ID = " . $this->input->post('album_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data album ID : " . $this->input->post('album_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/album');
    }


    // ================================================================================
    public function add_image_page()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Kelola Album';
        $data['album']    = $this->m_album->get($this->uri->segment(4));
        $data['gallery']    = $this->m_gallery->read('', '', $this->uri->segment(4), '');

        // TEMPLATE
        $view         = "_backend/album/_add_image";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }

    // ================================================================================
    public function delete_image()
    {
        $path = './upload/album/';
        // csrfValidate();
        // POST
        $this->m_gallery->delete($this->uri->segment(5));
        unlink($path . $this->uri->segment(6));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus Gambar";
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus Gambar dengan ID : " . $this->uri->segment(5);
        getAlert($alertStatus, $alertMessage);

        redirect('admin/album/add_image_page/' . $this->uri->segment(4));
    }

    // ================================================================================
    public function delete_video()
    {
        $path = './upload/album/video/';
        // csrfValidate();
        // POST
        $this->m_gallery->delete($this->uri->segment(5));
        unlink($path . $this->uri->segment(6));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus Video ";
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus Video dengan ID : " . $this->uri->segment(5);
        getAlert($alertStatus, $alertMessage);

        redirect('admin/album/add_image_page/' . $this->uri->segment(4));
    }
    // ================================================================================
    public function delete_link()
    {
        // csrfValidate();
        // POST
        $this->m_gallery->delete($this->uri->segment(5));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus link ";
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus link dengan ID : " . $this->uri->segment(5);
        getAlert($alertStatus, $alertMessage);

        redirect('admin/album/add_image_page/' . $this->uri->segment(4));
    }
    public function add_image()
    {
        csrfValidate();

        $filename_1              = "thumbnailalbum-" . date('YmdHis');
        $config['upload_path']   = "./upload/album/";
        $config['allowed_types'] = "jpg|png|jpeg";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gallery_dir')) {
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
            // redirect('admin/album/add_image_page/' . $data['album_id']);
        } else {
            $dat  = $this->upload->data();

            // POST
            $data['gallery_id']         = '';
            $data['gallery_name']         = '';
            $data['gallery_type']         = 'image';
            $data['gallery_dir']      = $dat['file_name'];
            $data['album_id']         = $this->input->post('album_id');

            $this->m_gallery->create($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " menambah Gambar album ";
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data album ";
            getAlert($alertStatus, $alertMessage);
        }

        redirect('admin/album/add_image_page/' . $data['album_id']);
    }

    public function add_video()
    {
        csrfValidate();
        $filename_1              = "videoalbum-" . date('YmdHis');
        $config['upload_path']   = "./upload/album/video";
        $config['allowed_types'] = "mkv|mp4";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gallery_dir')) {
            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
            redirect('admin/album/add_image_page/' . $this->input->post('album_id'));
        } else {
            $dat  = $this->upload->data();
            // POST
            $data['gallery_id']       = '';
            $data['gallery_name']     = $this->input->post('gallery_name');
            $data['gallery_type']     = 'video';
            $data['gallery_dir']      = $dat['file_name'];
            $data['album_id']         = $this->input->post('album_id');

            $this->m_gallery->create($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " menambah Gambar album ";
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data album ";
            getAlert($alertStatus, $alertMessage);
        }
        // var_dump($data);
        redirect('admin/album/add_image_page/' . $data['album_id']);
    }


    public function add_link()
    {
        csrfValidate();
        // POST
        $data['gallery_id']       = '';
        $data['gallery_name']     = $this->input->post('gallery_name');
        $data['gallery_dir']      = $this->input->post('gallery_dir');
        $data['gallery_type']     = 'link';
        $data['album_id']         = $this->input->post('album_id');
        $this->m_gallery->create($data);

        // LOG
        $message    = $this->session->userdata('user_name') . " menambah data album ";
        createLog($message);

        // ALERT
        $alertStatus  = "success";
        $alertMessage = "Berhasil menambah data album ";
        getAlert($alertStatus, $alertMessage);

        redirect('admin/album/add_image_page/' . $data['album_id']);
    }
}
