<?php
defined('BASEPATH') or exit('No direct script access allowed');
class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_news');
        $this->load->model('m_news_category');
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
        $this->session->unset_userdata('sess_search_news');

        // PAGINATION
        $baseUrl    = base_url() . "admin/news/index/";
        $totalRows  = count((array) $this->m_news->read('', '', '', ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 4;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;



        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Berita';
        $data['news']    = $this->m_news->read($perPage, $page, '', '');


        // TEMPLATE
        $view         = "_backend/news/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function search()
    {
        if ($this->input->post('key')) {
            $data['search'] = $this->input->post('key');
            $this->session->set_userdata('sess_search_news', $data['search']);
        } else {
            $data['search'] = $this->session->userdata('sess_search_news');
        }

        // PAGINATION
        $baseUrl    = base_url() . "admin/news/search/" . $data['search'] . "/";
        $totalRows  = count((array)$this->m_news->read('', '', $data['search'], ''));
        $perPage    = $this->session->userdata('sess_rowpage');
        $uriSegment = 5;
        $paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
        $page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

        $data['numbers']    = $paging['numbers'];
        $data['links']      = $paging['links'];
        $data['total_data'] = $totalRows;

        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Berita';
        $data['news']    = $this->m_news->read($perPage, $page, $data['search'], '');

        // TEMPLATE
        $view         = "_backend/news/data";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create_page()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Berita';
        $data['news_category']   = $this->m_news_category->read('', '', '');

        // TEMPLATE
        $view         = "_backend/news/_create";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function update_page()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Berita';
        $data['news']    = $this->m_news->get($this->uri->segment(4));
        $data['news_category']   = $this->m_news_category->read('', '', '');

        // TEMPLATE
        $view         = "_backend/news/_update";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function detail_page()
    {
        //DATA
        $data['setting'] = getSetting();
        $data['title']   = 'Berita';
        $data['news']    = $this->m_news->get($this->uri->segment(4), '');
        $data['news_category']   = $this->m_news_category->read('', '', '');

        // TEMPLATE
        $view         = "_backend/news/_detail";
        $viewCategory = "all";
        renderTemplate($data, $view, $viewCategory);
    }


    public function create()
    {
        csrfValidate();

        $filename_1              = "thumbnailnews-" . date('YmdHis');
        $config['upload_path']   = "./upload/news/";
        $config['allowed_types'] = "jpg|png|jpeg";
        $config['overwrite']     = "true";
        $config['max_size']      = "0";
        $config['max_width']     = "10000";
        $config['max_height']    = "10000";
        $config['file_name']     = '' . $filename_1;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('news_cover')) {

            // ALERT
            $alertStatus  = "failed";
            $alertMessage = $this->upload->display_errors();
            getAlert($alertStatus, $alertMessage);
        } else {
            $dat  = $this->upload->data();

            // getIdReference
            $getID = $this->getID();
            
            // POST
            $data['news_id']          = '';
            $data['news_title']       = $this->input->post('news_title');
            $data['news_cover']       = $dat['file_name'];;
            $data['news_text']        = $this->input->post('news_text');
            $data['news_date']        = date('Y-m-d');
            $data['news_count_view']  = 0;
            $data['news_category_id'] = $this->input->post('news_category_id');
            $data['user_id']          = $this->session->userdata('user_id');
            $data['idReference']      = $getID['idreference'];
            $data['createtime']       = date('Y-m-d H:i:s');
            $this->m_news->create($data);

            // POST TO NEWS API
            $this->postToAPI($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " menambah data berita ";
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil menambah data berita ";
            getAlert($alertStatus, $alertMessage);
        }

        redirect('admin/news');
    }


    public function update()
    {
        csrfValidate();

        if ($_FILES['news_cover']['name'] != "") {
            $filename_1              = "thumbnailnews-" . date('YmdHis');
            $config['upload_path']   = "./upload/news/";
            $config['allowed_types'] = "jpg|png|jpeg";
            $config['overwrite']     = "true";
            $config['max_size']      = "0";
            $config['max_width']     = "10000";
            $config['max_height']    = "10000";
            $config['file_name']     = '' . $filename_1;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('news_cover')) {

                // ALERT
                $alertStatus  = "failed";
                $alertMessage = $this->upload->display_errors();
                getAlert($alertStatus, $alertMessage);
            } else {
                $dat  = $this->upload->data();

                unlink('./upload/news/' . $this->input->post('news_cover_old'));


                $data['news_id']          = $this->input->post('news_id');
                $data['news_title']       = $this->input->post('news_title');
                $data['news_cover']       = $dat['file_name'];
                $data['news_text']        = $this->input->post('news_text');
                $data['news_category_id'] = $this->input->post('news_category_id');
                $data['idReference']      = $this->input->post('idReference');
                $this->m_news->update($data);

                // Update to API
                $this->updateToAPI($data);

                // LOG
                $message    = $this->session->userdata('user_name') . " mengubah data berita dengan ID = " . $data['news_id'];
                createLog($message);

                // ALERT
                $alertStatus  = "success";
                $alertMessage = "Berhasil mengubah data berita ID : " . $data['news_id'];
                getAlert($alertStatus, $alertMessage);
            }
        } else {
            // POST
            $data['news_id']          = $this->input->post('news_id');
            $data['news_title']       = $this->input->post('news_title');
            $data['news_text']        = $this->input->post('news_text');
            $data['news_category_id'] = $this->input->post('news_category_id');
            $data['idReference']      = $this->input->post('idReference');
            $this->m_news->update($data);

            // Update to API
            $this->updateToAPI($data);

            // LOG
            $message    = $this->session->userdata('user_name') . " mengubah data berita dengan ID = " . $data['news_id'];
            createLog($message);

            // ALERT
            $alertStatus  = "success";
            $alertMessage = "Berhasil mengubah data berita ID : " . $data['news_id'];
            getAlert($alertStatus, $alertMessage);
        }



        redirect('admin/news');
    }


    public function delete()
    {
        csrfValidate();
        // POST
        $this->m_news->delete($this->input->post('news_id'));

        // Delete To API
        $this->removeToAPI($this->input->post('idReference'));

        // LOG
        $message    = $this->session->userdata('user_name') . " menghapus data berita dengan ID = " . $this->input->post('news_id');
        createLog($message);

        // ALERT
        $alertStatus  = "failed";
        $alertMessage = "Menghapus data berita ID : " . $this->input->post('news_id');
        getAlert($alertStatus, $alertMessage);

        redirect('admin/news');
    }


    // API CONNECTION
    
    public function postToAPI($data){

        $img = file_get_contents("./upload/news/".$data['news_cover']);

        // START CONNECT TO API
        $url    = "https://www.sultraprov.go.id/web-panel/pages/api.php?function=post_news";
        $header = array(
                        'client-id: diskominfo',
                        'client-token: 96355148-683c-4be0-93c6-07f70e799315',
                    );
        $data_api   = array(
                            'file'        => base64_encode($img),
                            'fileName'    => $data['news_cover'],
                            'title'       => $data['news_title'],
                            'description' => substr($data['news_title'],0,100),
                            'text'        => $data['news_text'],
                            'idReference' => $data['idReference'],
                        );


        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_api);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		curl_close($ch);

        // END CONNECT TO API

    }

    public function updateToAPI($data){

        
        // $img = ($data['news_cover'] != '') ? base64_encode(file_get_contents("./upload/news/".$data['news_cover'])) : '';

        $img = (isset($data['news_cover'])) ? base64_encode(file_get_contents("./upload/news/".$data['news_cover'])) : '';
        $imgName = (isset($data['news_cover'])) ? $data['news_cover'] : '';


        // START CONNECT TO API
        $url    = "https://www.sultraprov.go.id/web-panel/pages/api.php?function=update_news";
        $header = array(
                        'client-id: diskominfo',
                        'client-token: 96355148-683c-4be0-93c6-07f70e799315',
                    );
        $data_api   = array(
                            'file'        => $img,
                            'fileName'    => $imgName,
                            'title'       => $data['news_title'],
                            'description' => substr($data['news_title'],0,100),
                            'text'        => $data['news_text'],
                            'idReference' => $data['idReference'],
                        );


        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_api);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		curl_close($ch);

        // END CONNECT TO API

    }

    public function removeToAPI($id){

        // START CONNECT TO API
        $url    = "https://www.sultraprov.go.id/web-panel/pages/api.php?function=delete_news";
        $header = array(
                        'client-id: diskominfo',
                        'client-token: 96355148-683c-4be0-93c6-07f70e799315',
                    );
        $data_api   = array(
                            'idReference' => $id,
                        );


        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_api);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		curl_close($ch);

        // END CONNECT TO API

    }


    public function getID(){
        $url    = "https://www.sultraprov.go.id/web-panel/pages/api.php?function=get_idreference";
        $header = array(
                            'client-id: diskominfo',
                            'client-token: 96355148-683c-4be0-93c6-07f70e799315',
                        );


        $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$result = curl_exec($ch);
		curl_close($ch);

        return json_decode($result,true);
    }
}
