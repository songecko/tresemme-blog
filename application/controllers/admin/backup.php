<?php

class Backup extends CI_Controller {

	var $tbl = "";
	var $url = "admin/backup";
	var $section = "Backup";
	var $view = "admin/page_view";
	
	public function __construct()
   	{
        parent::__construct();

		$this->load->library('nav');
		$this->load->helper('db');
		$this->load->dbutil();
		$this->load->helper('download');
        $this->load->model('Log_model','log',TRUE);
		
		$this->tbl = $this->db->dbprefix('users'); // <---- TABLE
		
		if (!$this->session->userdata('fullname')) redirect("admin/");
	}
	
	
	function index()
	{
		
		$d['nav'] = $this->nav->admin_nav($this->section);
        $d['toolbar'] = "";
		$d['content'] = "<p>Keep your data safe. Click the button below to download a backup of your data.</p><div class='actions'><a href='".site_url("admin/backup/save")."' class='btn btn-primary'>Download backup</a></div>";
        $d['title'] = $this->section;
        $d['error'] = '';
        
		$this->load->view($this->view,$d);
	}

	public function save()
	{
	
		$pre = $this->db->dbprefix;	
	
		$this->log->save($this->session->userdata('fullname'),"backup");
	
		$prefs = array("format"=>"zip","tables"=>array("{$pre}pages","{$pre}posts","{$pre}users"));
		$backup =& $this->dbutil->backup($prefs);
		force_download($pre.'_backup-'.date("m-d-Y").'.zip', $backup);		
	}
		
}


/* End of file */