<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ki extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_content');
		$this->load->model('m_field');
		$this->load->model('m_news_category');
	}
	
	public function pengumuman()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['content'] = $this->m_content->get('visi');
		$data['content_2'] = $this->m_content->get('sejarah');
		$data['news_category'] = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/ki/pengumuman";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

    public function unduh_berkas_pendaftaran()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['content'] = $this->m_content->get('visi');
		$data['content_2'] = $this->m_content->get('sejarah');
		$data['news_category'] = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/ki/unduh_berkas_pendaftaran";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

}
