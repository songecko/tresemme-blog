<?php

class Dashboard extends CI_Controller {

	var $tbl = "";
	var $url = "admin/dashboard";
	var $section = "Dashboard";
	var $view = "admin/page_view";
	
	public function __construct()
   	{
        parent::__construct();

		$this->load->library('nav');
		$this->load->helper('db');
		$this->load->dbutil();
		$this->load->helper('download');
		$this->load->helper('time');
		
		$this->tbl = $this->db->dbprefix('users'); // <---- TABLE
		
		if (!$this->session->userdata('fullname')) redirect("admin/");
	}
	
	private function _num($table)
	{
		 return '<p><span class="badge">' . $this->db->count_all($table) . '</span> ' . anchor('admin/' . $table,$table) . '</p>';
	}
	
	
	function index()
	{
		
        $data['pages'] = $this->db->count_all("pages");
        $data['posts'] = $this->db->count_all("posts");
        $data['users'] = $this->db->count_all("users");
        $data['categories'] = $this->db->count_all("categories");
        $data['products'] = $this->db->count_all("products");
        $data['participants'] = $this->db->count_all("participants");

        $this->db->select("*")->from("log")->where("event_type","backup")->order_by("event_dt","desc")->limit(1);
        $q = $this->db->get();
        $r = $q->row();
        
        if ($r) {
        	$data['author'] = $r->event_author;
        	$data['dt'] = $r->event_dt;
        }
		$d['content'] = $this->load->view("admin/dashboard_view",$data,TRUE);

		$d['nav'] = $this->nav->admin_nav($this->section);
        $d['toolbar'] = "";
        $d['title'] = $this->section;
        $d['error'] = '';
        
		$this->load->view($this->view,$d);
	}

		
}


/* End of file */