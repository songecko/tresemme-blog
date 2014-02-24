<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct()
   	{
        parent::__construct();

        $this->load->model('Page_model','page',TRUE);

	}
	
	
	public function index()
	{
		$d['content'] = $this->page->content($this->uri->segment(2));

		if ($this->uri->segment(3)=="content")
		{
			echo $d['content'];		
		}
		else
		{
			$this->load->view("page_view",$d);			
		}
	}
	
}

/* End of file */