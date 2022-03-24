<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_content');
		$this->load->model('m_slider');
		$this->load->model('m_news');
		$this->load->model('m_news_category');
		$this->load->model('m_album');
		$this->load->model('m_gallery');
		$this->load->model('m_regulation_category');
		$this->load->model('m_publication_category');
		$this->load->model('m_link_terkait');
		$this->load->model('m_faq');
	}

	public function index()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['slider']  = $this->m_slider->read('', '', '');
		$data['link_terkait']  = $this->m_link_terkait->read('', '', '');
		$data['faq']  = $this->m_faq->read('', '', '');
		$data['news']    = $this->m_news->read(3, 0, '', '');
		$data['news_sidebar']    = $this->m_news->read(5, 3, '', '');
		$data['news_category']    = $this->m_news_category->read('', '', '', '');
		$data['content'] = $this->m_content->get('sambutan');
		$data['regulation_category'] = $this->m_regulation_category->read('', '', '');
		$data['publication_category'] = $this->m_publication_category->read('', '', '');
		$data['gallery_image'] = $this->m_gallery->read(4, '', '', 'image');
		$data['gallery_video'] = $this->m_gallery->read(3, '', '', 'video');
		$data['gallery_youtube'] = $this->m_gallery->read(3, '', '', 'youtube');

		// TEMPLATE
		$view         = "_frontend/home";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}
}
