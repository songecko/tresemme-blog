<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Nav {

	var $current_page = NULL;

	  function nav_option($url,$caption,$submenu=NULL) {
    	$active='';
    	$menu ='';
    	if ($caption==$this->current_page) $active="active";
    	if ($submenu) { $menu="class='dropdown-toggle' data-toggle='dropdown'"; $active .= " dropdown"; };
		$d = "<li class='$active'>".anchor($url,$caption,"$menu")."$submenu</li>";
		return $d;
	}

	function admin_nav($page) {
		$this->current_page = $page;

		$d  = $this->nav_option("admin/dashboard","Dashboard");
		$d .= $this->nav_option("admin/pages","Pages");
		$d .= $this->nav_option("admin/posts","Posts");
		$d .= $this->nav_option("admin/participants","Participants");
		$d .= $this->nav_option("","Store <b class='caret'></b>","<ul class='dropdown-menu'><li>".anchor("admin/categories","Categories")."</li><li>".anchor("admin/products","Products")."</li></ul>");
		$d .= $this->nav_option("admin/backup","Backup");
		$d .= $this->nav_option("admin/users","Users");
		return $d;
	}
	
}

?>