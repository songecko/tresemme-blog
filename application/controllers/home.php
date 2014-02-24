<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
   	{
        parent::__construct();

	}

	public function index()
	{
		redirect("https://www.facebook.com/pages/Clear-Hair-PR/272720309524227");
	}
	
	public function products()
	{
		$this->load->view('home_view');
	}
}

/* End of file */