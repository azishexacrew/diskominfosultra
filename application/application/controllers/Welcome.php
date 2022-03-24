<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// DATA
		$data['setting'] = getSetting();
		redirect('home');

		// TEMPLATE
		// $view         = "welcome_message";
		// $viewCategory = "single";
		// renderTemplate($data, $view, $viewCategory);
	}
}