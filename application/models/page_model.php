<?php
	class Page_model extends CI_Model {
	
	    function __construct()
	    {
	        parent::__construct();
	    }
	    
	    function content($url)
		{
			$this->db->select("*")->from("pages")->where("url",$url);
			$q = $this->db->get();
			$r = $q->row();
			
			if ($r)
			{
				$data = $r->page_content;
				$data = str_replace("textarea2","textarea",$data);
			}
			else
			{
				$data = "Content '$url' Not Found.";
			}
			
			return $data;
		}
	}
?>