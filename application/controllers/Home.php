<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')){
			redirect(site_url('login'));
		}
	}

	public function index()
	{
		echo "this home bro <a href='".site_url('home/logout')."'>Logout...</a>";
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('login'));
	}
}