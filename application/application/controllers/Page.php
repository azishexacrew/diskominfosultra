<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_regulation');
		$this->load->model('m_regulation_category');
		$this->load->model('m_publication');
		$this->load->model('m_publication_category');
		$this->load->model('m_service');
		$this->load->model('m_terms');
		$this->load->model('m_news');
		$this->load->model('m_news_category');
		$this->load->model('m_album');
		$this->load->model('m_gallery');
		$this->load->model('m_tracking');
		$this->load->model('m_message');
		$this->load->model('m_slider');
		$this->load->model("m_setting");
	}
	public function tracking()
	{
		// DATA
		$data['setting']             = getSetting();
		$data['tracking']            = "";
		$data['news_category']    = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/page/contact_tracking";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}


	public function tracking_search()
	{
		// DATA
		$data['setting']             = getSetting();
		$data['tracking']            = $this->m_message->getByCode($this->input->post('key'));
		$data['news_category']    = $this->m_news_category->read('', '', '');
		// TEMPLATE
		$view         = "_frontend/page/contact_tracking";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	// REGULASI
	public function produk_hukum()
	{

		$this->session->unset_userdata('sess_search_produk_hukum');

		$data['regulation_category_id']    = $this->uri->segment(3);
		if ($data['regulation_category_id'] == 0) {
			$data['regulation_category_id'] = '';
		}

		// PAGINATION
		$baseUrl    = base_url() . "page/produk_hukum/" . $this->uri->segment(3);
		$totalRows  = count((array) $this->m_regulation->read('', '', '', $data['regulation_category_id']));
		$perPage    = 10;
		$uriSegment = 4;
		$paging     = generatePaginationBlog($baseUrl, $totalRows, $perPage, $uriSegment);
		$page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

		$data['numbers']    = $paging['numbers'];
		$data['links']      = $paging['links'];
		$data['total_data'] = $totalRows;

		// DATA
		$data['setting']    = getSetting();
		$data['regulation'] = $this->m_regulation->read($perPage, $page, '', $data['regulation_category_id']);
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/page/regulation";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}


	public function produk_hukum_search()
	{
		$regulation_category_id = $this->uri->segment(3);

		if ($this->input->post('key') || $this->input->post('key_category_id') || $this->input->post('key_year')) {

			$data['search'] = $this->input->post('key');
			$data['search_category_id'] = $this->input->post('key_category_id');
			$data['search_year'] = $this->input->post('key_year');

			$data['search_category'] = $this->m_regulation_category->get($this->input->post('key_category_id'));

			$this->session->set_userdata('sess_search_produk_hukum', $data);
		} else {
			$data['search'] = $this->session->userdata('sess_search_produk_hukum');
		}

		// PAGINATION
		$baseUrl    = base_url() . "page/produk_hukum_search/" . $data['search'] . "/";
		$totalRows  = count((array)$this->m_regulation->read('', '', $data, $regulation_category_id));
		$perPage    = 10;
		$uriSegment = 4;
		$paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
		$page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

		$data['numbers']    = $paging['numbers'];
		$data['links']      = $paging['links'];
		$data['total_data'] = $totalRows;

		//DATA
		$data['setting']    = getSetting();
		$data['regulation'] = $this->m_regulation->read($perPage, $page, $data, $regulation_category_id);
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/page/regulation";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	// berita
	public function berita()
	{
		$this->session->unset_userdata('sess_search_berita');

		// get catergory id
		$data['news_category_id']    = $this->uri->segment(3);
		if ($data['news_category_id'] == 0) {
			$data['news_category_id'] = '';
		}

		// PAGINATION
		$baseUrl    = base_url() . "page/berita/" . $this->uri->segment(3);
		$totalRows  = count((array) $this->m_news->read('', '', '', $data['news_category_id']));
		$perPage    = 4;
		$uriSegment = 4;
		$paging     = generatePaginationBlog($baseUrl, $totalRows, $perPage, $uriSegment);
		$page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

		$data['numbers']    = $paging['numbers'];
		$data['links']      = $paging['links'];
		$data['total_data'] = $totalRows;

		// DATA
		$data['setting'] = getSetting();
		$data['news']    = $this->m_news->read($perPage, $page, '', $data['news_category_id']);
		$data['news_category'] = $this->m_news_category->read('', '', '');
		$data['recent']  = $this->m_news->populer(5);
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/page/news";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	public function berita_search()
	{

		if ($this->input->post('key')) {
			$data['search'] = $this->input->post('key');
			$this->session->set_userdata('sess_search_berita', $data['search']);
		} else {
			$data['search'] = $this->session->userdata('sess_search_berita');
		}

		// PAGINATION
		$baseUrl    = base_url() . "page/beritas_search/" . $data['search'] . "/";
		$totalRows  = count((array)$this->m_news->read('', '', $data['search'], ''));
		$perPage    = 10;
		$uriSegment = 4;
		$paging     = generatePaginationBlog($baseUrl, $totalRows, $perPage, $uriSegment);
		$page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

		$data['numbers']    = $paging['numbers'];
		$data['links']      = $paging['links'];
		$data['total_data'] = $totalRows;

		//DATA
		$data['setting'] = getSetting();
		$data['news']    = $this->m_news->read($perPage, $page, $data['search'], '');
		$data['news_category']    = $this->m_news_category->read('', '', '', '');
		$data['recent']  = $this->m_news->read(3, 0, '', '');
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');


		// TEMPLATE
		$view         = "_frontend/page/news";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}



	public function berita_detail()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['news']    = $this->m_news->get($this->uri->segment(3));
		$data['news_category'] = $this->m_news_category->read('', '', '');
		$data['recent']  = $this->m_news->read(3, 0, '', '');
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');

		// COUNT VIEW
		$news['news_id']         = $data['news'][0]->news_id;
		$news['news_count_view'] = ($data['news'][0]->news_count_view + 1);
		$this->m_news->update($news);


		// TEMPLATE
		$view         = "_frontend/page/news_detail";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}


	// publication
	public function publication()
	{

		$this->session->unset_userdata('sess_search_publication');

		$data['publication_category_id']    = $this->uri->segment(3);
		if ($data['publication_category_id'] == 0) {
			$data['publication_category_id'] = '';
		}

		// PAGINATION
		$baseUrl    = base_url() . "page/publication/" . $this->uri->segment(3);
		$totalRows  = count((array) $this->m_publication->read('', '', '', $data['publication_category_id']));
		$perPage    = 10;
		$uriSegment = 4;
		$paging     = generatePaginationBlog($baseUrl, $totalRows, $perPage, $uriSegment);
		$page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

		$data['numbers']    = $paging['numbers'];
		$data['links']      = $paging['links'];
		$data['total_data'] = $totalRows;

		// DATA
		$data['setting']    = getSetting();
		$data['publication'] = $this->m_publication->read($perPage, $page, '', $data['publication_category_id']);
		$data['publication_category'] = $this->m_publication_category->read('', '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/page/publication";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}


	public function publication_search()
	{

		if ($this->input->post('key')) {
			$data['search'] = $this->input->post('key');
			$this->session->set_userdata('sess_search_publication', $data['search']);
		} else {
			$data['search'] = $this->session->userdata('sess_search_publication');
		}
		// PAGINATION
		$baseUrl    = base_url() . "page/publication_search/" . $data['search'] . "/";
		$totalRows  = count((array)$this->m_publication->read('', '', $data['search'], ''));
		$perPage    = 10;
		$uriSegment = 4;
		$paging     = generatePagination($baseUrl, $totalRows, $perPage, $uriSegment);
		$page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

		$data['numbers']    = $paging['numbers'];
		$data['links']      = $paging['links'];
		$data['total_data'] = $totalRows;

		//DATA
		$data['setting']    = getSetting();
		$data['publication'] = $this->m_publication->read($perPage, $page, $data['search'], '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/page/publication";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	// album
	public function album()
	{
		$this->session->unset_userdata('sess_search_album');

		$gallery_type    = $this->uri->segment(3);
		$album_id    = $this->uri->segment(4);

		if ($album_id == 0) {
			$album_id = '';
		}

		// PAGINATION
		$baseUrl    = base_url() . "page/album/" . $gallery_type . "/" . $this->uri->segment(4);
		$totalRows  = count((array) $this->m_gallery->read_frontend('', '', $album_id, $gallery_type, ''));
		$perPage    = 6;
		$uriSegment = 5;
		$paging     = generatePaginationBlog($baseUrl, $totalRows, $perPage, $uriSegment);
		$page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

		$data['numbers']    = $paging['numbers'];
		$data['links']      = $paging['links'];
		$data['total_data'] = $totalRows;

		// DATA
		$data['setting'] = getSetting();
		$data['album'] = $this->m_gallery->read_frontend('', '', '', $gallery_type, true);
		$data['gallery'] = $this->m_gallery->read_frontend($perPage, $page, $album_id, $gallery_type, '');
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/page/album";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	public function album_search()
	{

		if ($this->input->post('key')) {
			$data['search'] = $this->input->post('key');
			$this->session->set_userdata('album', $data['search']);
		} else {
			$data['search'] = $this->session->userdata('album');
		}

		// PAGINATION
		$baseUrl    = base_url() . "page/albums_search/" . $data['search'] . "/";
		$totalRows  = count((array)$this->m_album->read('', '', $data['search']), '');
		$perPage    = 3;
		$uriSegment = 3;
		$paging     = generatePaginationBlog($baseUrl, $totalRows, $perPage, $uriSegment);
		$page       = ($this->uri->segment($uriSegment)) ? $this->uri->segment($uriSegment) : 0;

		$data['numbers']    = $paging['numbers'];
		$data['links']      = $paging['links'];
		$data['total_data'] = $totalRows;

		//DATA
		$data['setting'] = getSetting();
		$data['album']    = $this->m_album->read($perPage, $page, $data['search'], '');
		$data['album_category'] = $this->m_album_category->read('', '', '', '');
		$data['recent']  = $this->m_album->read(3, 0, '', '');
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');


		// TEMPLATE
		$view         = "_frontend/page/album";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	public function album_detail()
	{
		$galleryType = $this->uri->segment(3);
		$albumId = $this->uri->segment(4);

		// DATA
		$data['setting'] = getSetting();
		$data['album']    = $this->m_album->get($albumId);
		$data['gallery']    = $this->m_gallery->read_frontend('', '', $albumId, $galleryType, false);
		$data['recent']  = $this->m_album->read(3, 0, '', '');
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '');
		$data['slider']  = $this->m_slider->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/page/album_detail";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	// KONTAK/PESAN
	public function contact_us()
	{
		// DATA
		$data['setting']    = getSetting();
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '');
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');
		$data['setting'] = getSetting();

		// TEMPLATE
		$view         = "_frontend/page/pengaduan";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	public function create_contact_us()
	{
		csrfValidate();
		// POST
		$data['message_id']      = '';
		$data['message_name']    = $this->input->post('message_name');
		$data['message_email']   = $this->input->post('message_email');
		$data['message_phone']   = $this->input->post('message_phone');
		$data['message_subject'] = $this->input->post('message_subject');
		$data['message_text']    = $this->input->post('message_text');
		$data['message_reply']   = "";
		$data['message_code']    = "M-" . date('YmdHis');
		$data['message_status']  = 0;
		$data['message_date']    = date('Y-m-d');
		$data['createtime']      = date('Y-m-d H:i:s');
		$this->m_message->create($data);

		// ALERT
		$alertStatus  = "success";
		$alertMessage = "Pesan Anda berhasil di terima oleh kami. Pesan akan kami proses. Untuk mengetahui progress dari pesan anda silahkan melakukan tracking dengan code berikut : <b style='color:red;'>" . $data['message_code'] . "</b>, pastikan anda menyimpan kode tersebut untuk mengecek progress pesan anda. Atas perhatiannya kami ucapkan Terima Kasih";
		getAlert($alertStatus, $alertMessage);

		redirect('page/contact_us');
	}


	// LINK TERKAIT
	public function link_terkait()
	{
		// DATA
		$data['setting']    = getSetting();
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/page/link_terkait";
		$viewCategory = "single";
		renderTemplateFront($data, $view, $viewCategory);
	}
}
