<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

Class Template {

	function __construct()
	{
		$this->ini =&get_instance();
		$this->ini->load->database();
	}

	public function set_navbar($view="", $data=array())
	{
		$this->navbar = $this->ini->load->view("navbar/".$view, $data, true);
		return $this;
	}

	public function render($view="", $data=array())
	{
		$this->layout = "template/index.php";
		$data['title'] = $this->ini->router->fetch_class() . " | " . $this->ini->router->fetch_method();
		$data['content'] = $this->ini->load->view($view.'/index.php', $data, true);

		if(isset($this->navbar)){
			$data['navbar'] = $this->navbar;
		}
		
		$this->ini->load->view($this->layout, $data);
	}

	public function css($data=array())
	{
		// you can write any css you want to load
		foreach ($data as $key) {
			echo '<link rel="stylesheet" type="text/css" href="'.site_url('public/css/'.$key).'.css">';
		}

	}

	public function js($data=array())
	{
		// you can write any css you want to load
		foreach ($data as $key) {
			echo '<script type="text/javascript" src="'.site_url('public/js/'.$key).'.js"></script>';
		}
	}

}