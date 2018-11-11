<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->method = $this->router->fetch_method();
		$this->class = $this->router->fetch_class();

		// this configuration first
		// configuration navbar template 
		//$this->template->set_navbar('navbar-one');

		if($this->session->userdata('username')){
			redirect(site_url('home'));
		}
		
	}

	public function index($status="")
	{
		$data['status'] = str_replace("%20", " ", $status);
		$this->template->render($this->class, $data);
	}
}
