<?php defined('BASEPATH') or exit('No direct script access allowed');
class Setting extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("m_setting");
		$this->load->library('upload');

		// check session data
		if (!$this->session->userdata('user_id') or $this->session->userdata('user_group') != 1) {
			// ALERT
			$alertStatus  = 'failed';
			$alertMessage = 'Anda tidak memiliki Hak Akses atau Session anda sudah habis';
			getAlert($alertStatus, $alertMessage);
			redirect('admin/dashboard');
		}
	}

	public function index()
	{
		// DATA
		$data['setting'] = getSetting();
		$data['title']   = 'Setting';

		// TEMPLATE
		$view         = "_backend/setting";
		$viewCategory = "all";
		renderTemplate($data, $view, $viewCategory);
	}

	public function update()
	{
		csrfValidate();
		if ($_FILES['userfile']['name'] == '') {
			// POST
			$data['setting_id']              = $this->input->post('setting_id');
			$data['setting_appname']         = $this->input->post('setting_appname');
			$data['setting_short_appname']   = $this->input->post('setting_short_appname');
			$data['setting_origin_app']      = $this->input->post('setting_origin_app');
			$data['setting_owner_name']      = $this->input->post('setting_owner_name');
			$data['setting_phone']           = $this->input->post('setting_phone');
			$data['setting_email']           = $this->input->post('setting_email');
			$data['setting_address']         = $this->input->post('setting_address');
			$data['setting_color']           = $this->input->post('setting_color');
			$data['setting_layout']          = $this->input->post('setting_layout');
			$data['setting_apikey_map']      = $this->input->post('setting_apikey_map');
			$data['setting_apikey_firebase'] = $this->input->post('setting_apikey_firebase');

			// new-for kominfo
			$data['setting_fax']              = $this->input->post('setting_fax');
			$data['setting_runing_text']              = $this->input->post('setting_runing_text');
			$data['setting_about']              = $this->input->post('setting_about');
			$data['setting_instagram']              = $this->input->post('setting_instagram');
			$data['setting_facebook']              = $this->input->post('setting_facebook');
			$data['setting_twitter']           = $this->input->post('setting_twitter');
			$data['setting_youtube']           = $this->input->post('setting_youtube');
			$data['setting_coordinate']              = $this->input->post('setting_coordinate');


			$this->m_setting->update_setting($data);

			// ALERT
			$alertStatus  = 'success';
			$alertMessage = 'Berhasil Update Data Informasi Sistem';
			getAlert($alertStatus, $alertMessage);

			// LOG
			$logMessage = "Update Informasi Sistem ";
			createLog($logMessage);
		} else {

			$filename                = $this->input->post('setting_id') . date('YmdHis');
			$config['upload_path']   = './assets/core-images/';
			$config['allowed_types'] = "gif|jpg|jpeg|png";
			$config['overwrite']     = "true";
			$config['max_size']      = "20000000";
			$config['max_width']     = "10000";
			$config['max_height']    = "10000";
			$config['file_name']     = 'base-logo' . $filename;
			$this->upload->initialize($config);

			if (!$this->upload->do_upload()) {
				echo $this->upload->display_errors();
			} else {

				// POST
				unlink("./assets/core-images/" . $this->input->post('setting_logo'));
				$dat                     = $this->upload->data();

				$data['setting_id']              = $this->input->post('setting_id');
				$data['setting_appname']         = $this->input->post('setting_appname');
				$data['setting_short_appname']   = $this->input->post('setting_short_appname');
				$data['setting_origin_app']      = $this->input->post('setting_origin_app');
				$data['setting_owner_name']      = $this->input->post('setting_owner_name');
				$data['setting_phone']           = $this->input->post('setting_phone');
				$data['setting_email']           = $this->input->post('setting_email');
				$data['setting_address']         = $this->input->post('setting_address');
				$data['setting_logo']            = $dat['file_name'];
				$data['setting_color']           = $this->input->post('setting_color');
				$data['setting_layout']          = $this->input->post('setting_layout');
				$data['setting_apikey_map']      = $this->input->post('setting_apikey_map');
				$data['setting_apikey_firebase'] = $this->input->post('setting_apikey_firebase');

				// new-for kominfo
				$data['setting_fax']              = $this->input->post('setting_fax');
				$data['setting_runing_text']              = $this->input->post('setting_runing_text');
				$data['setting_about']              = $this->input->post('setting_about');
				$data['setting_instagram']              = $this->input->post('setting_instagram');
				$data['setting_facebook']              = $this->input->post('setting_facebook');
				$data['setting_twitter']           = $this->input->post('setting_twitter');
			$data['setting_youtube']           = $this->input->post('setting_youtube');
				$data['setting_coordinate']              = $this->input->post('setting_coordinate');

				$this->m_setting->update_setting($data);

				// ALERT
				$alertStatus  = 'success';
				$alertMessage = 'Berhasil Update Data Informasi Sistem & Logo';
				getAlert($alertStatus, $alertMessage);

				// LOG
				$logMessage = "Update Informasi Sistem";
				createLog($logMessage);
			}
		}

		redirect('admin/setting');
	}


	public function setRows()
	{
		rowpage($this->input->post('row'));
	}
}
