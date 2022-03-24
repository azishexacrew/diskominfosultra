<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_content');
		$this->load->model('m_field');
		$this->load->model('m_news_category');
	}

	public function sejarah()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['content'] = $this->m_content->get('sejarah');
		$data['news_category'] = $this->m_content->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/profil/sejarah";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	public function visi_misi()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['content'] = $this->m_content->get('visi');
		$data['content_2'] = $this->m_content->get('sejarah');
		$data['news_category'] = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/profil/visi";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	public function sambutan()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['content'] = $this->m_content->get('sambutan');
		$data['news_category'] = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/profil/sambutan";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}

	public function tugas_pokok_fungsi()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['content'] = $this->m_content->get('tupoksi');
		$data['field'] = $this->m_field->read('', '', '');
		$data['news_category'] = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/profil/tupoksi";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}


	public function maklumat_pelayanan()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['content'] = $this->m_content->get('maklumat');
		$data['news_category'] = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/profil/maklumat";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}


	public function struktur_organisasi()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['content'] = $this->m_content->get('struktur');
		$data['field'] = $this->m_field->read('', '', '');
		$data['field_createtime'] = $this->m_field->get_last_update('createtime');
		$data['news_category'] = $this->m_news_category->read('', '', '');

		// TEMPLATE
		$view         = "_frontend/profil/struktur";
		$viewCategory = "all";
		renderTemplateFront($data, $view, $viewCategory);
	}
}
