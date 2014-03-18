<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once __DIR__.'/../libraries/Mobile_Detect.php';

class Home extends CI_Controller {

	public function __construct()
   	{
        parent::__construct();

	}

	public function index()
	{
		$detect = new Mobile_Detect;
		
		if ($detect->isMobile()) 
		{
			redirect("blog/");
		}else
		{
			redirect("https://www.facebook.com/pages/Clear-Hair-PR/272720309524227");
		}
	}
	
	public function products()
	{
		$this->load->view('home_view');
	}
}

/* End of file */