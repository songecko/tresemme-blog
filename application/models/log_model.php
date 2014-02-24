<?php
	class Log_model extends CI_Model {
	
	    function __construct()
	    {
	        parent::__construct();
	    }
	    
	    function save($author,$type)
		{
			$arr['event_author'] = $author;
			$arr['event_type'] = $type;
			$arr['event_dt'] = date("Y-m-d H:i:s");
			$this->db->insert("log",$arr);
		}
	}
?>