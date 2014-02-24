<?php

class Categories extends CI_Controller {

	var $tbl = "";
	var $url = "admin/categories";
	var $field = "category";
	var $limit = 20;
	var $section = "Categories";
	var $item = "Category";
	var $view = "admin/page_view";
	
	public function __construct()
   	{
        parent::__construct();

		$this->load->library('table');
		$this->load->library('pagination');
		$this->load->library('nav');
		$this->load->helper('db');
		
		$this->tbl = $this->db->dbprefix('categories'); // <---- TABLE
		
		if (!$this->session->userdata('fullname')) redirect("admin/");
	}
	
	function _table($offset) {
		$query = $this->db->query("SELECT CONCAT(stub,' &nbsp; ','<a href=\"".site_url($this->url)."/edit/',$this->tbl.id,'\">',$this->field,'</a>'),  CONCAT('<center><input type=\"text\" class=\"span1 csort\" rel=\"',$this->tbl.id,'\" value=\"',$this->tbl.position,'\"></center>'),
								   
								   CONCAT('<center><form action=\"".site_url($this->url)."/delete\" method=\"POST\" class=\"delete_form\">
										<input type=\"submit\" class=\"delete_btn icon-remove\" value=\"\">
										<input type=\"hidden\" name=\"delete_id\" value=\"',$this->tbl.id,'\">
									</form></center>')
									
								   FROM $this->tbl ORDER BY tree, position LIMIT $offset,$this->limit");
		
		if ($query->num_rows())
		{
			
			$tmpl = array ( 
				'table_open'  => '<table class="table table-striped table-bordered table-condensed">'
			 );
	    	$this->table->set_template($tmpl);
	    	$this->table->set_heading(array('Category', 'Position', 'Delete'));	    	
	    	$d['table'] = $this->table->generate($query);	
	    
	    }
	    else
	    {
	    	$d['table'] = "No data.";
	    }	

		// Pagination	
		
		$query = $this->db->query("SELECT $this->field FROM $this->tbl");						
	
		$config['base_url'] = site_url($this->url.'/page/');
		$config['total_rows'] = $query->num_rows();
		$config['per_page'] = $this->limit;
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config); 

    	return $d;					
	}
	
	function _form($r)
	{
		
		$this->db->select("id,CONCAT(stub,category) as cat",FALSE)->from("categories")->order_by("tree AND category"); //->where("FIELD",VALUE);
		$q = $this->db->get();
		$data = $q->result();
	
		$d  = form_open($this->url.'/save');
		$d .= form_input("Category", "category",$r->category);
		$d .= form_dropdown_db("Parent","cat",$data,"parent_id",$r->parent_id,NULL,"None");
		$d .= form_hidden("id",$r->id);
		$d .= "<div class='form-actions'>";
		$d .= form_submit("Save","btn btn-primary");
		$d .= "</div>";
		return $d;
	}
	
	function index()
	{
		$this->page();

	}
	
	function page()
	{

		$this->uri->segment(3)=="page" ? $offset = $this->uri->segment(4,0) : $offset = 0;

		$d['nav'] = $this->nav->admin_nav($this->section);
		$data = $this->_table($offset);
        $d['toolbar'] = anchor($this->url."/add","Add $this->item","class='btn'");
		$d['content'] = "{$data['table']}
			{$this->pagination->create_links()}";
        $d['title'] = $this->section;
        $d['error'] = '';
		$this->load->view($this->view,$d);
	}
	
	function add() {
		$d['nav'] = $this->nav->admin_nav($this->section);
        $d['title'] = anchor($this->url,$this->section) . ' &raquo; Add ' . $this->item;
        $d['toolbar'] =  anchor($this->url,"Cancel","class='btn'"); 
                
        $fields = $this->db->list_fields($this->tbl);
		foreach ($fields as $field)
		   $r->$field = NULL;
        
		$d['content'] = $this->_form($r);
        $d['error'] = '';
		$this->load->view($this->view,$d);
	}
	
	function edit() {
		$d['nav'] = $this->nav->admin_nav($this->section);
        $d['title'] = anchor($this->url,$this->section) . ' &raquo; Edit ' . $this->item;
        $d['toolbar'] = anchor($this->url,"Cancel","class='btn'"); 
        $q = $this->db->get_where($this->tbl,array('id'=>$this->uri->segment(4)));
        $r = $q->row();
		$d['content'] = $this->_form($r);
        $d['error'] = '';
		$this->load->view($this->view,$d);
	}
	
	private function _tree($pid)
	{
		$this->db->select("*")->from("categories")->where("id",$pid);
		$q = $this->db->get();
		$r = $q->row();
		
		if ($r)
		{
			return $this->_tree($r->parent_id)."$r->category ";
		}
		else
		{
			return "";
		}	
	} 
	
	private function _stub($pid)
	{
		$this->db->select("*")->from("categories")->where("id",$pid);
		$q = $this->db->get();
		$r = $q->row();
		
		if ($r)
		{
			return $this->_stub($r->parent_id)."&nbsp; ";
		}
		else
		{
			return "";
		}	
	} 
	
	function save() {
	
		$arr = fields_data(array("id","category","parent_id"),$this->input->post(NULL, TRUE));
		
		$arr['tree'] = $this->_tree($arr['parent_id']).$arr['category'];
		$arr['stub'] = $this->_stub($arr['parent_id']);
		
		if ($this->input->post('id')>0) 
		{
			$this->db->where("id",$this->input->post('id'));
			$this->db->update($this->tbl,$arr);
		}
		else 
		{
			$this->db->insert($this->tbl,$arr);
		}
		redirect($this->url);
	}
	
	function delete() {
		$this->db->delete($this->tbl,array("id"=>$this->input->post('delete_id')));
		redirect($this->url);
	}
	
	function sort()
	{
		$arr = fields_data(array("id","position"),$this->input->post(NULL));
		$id = $arr['id'];
		$this->db->update($this->tbl,$arr,"id = '$id'");
	}
		
}


/* End of file */