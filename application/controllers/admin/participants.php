<?php

class Participants extends CI_Controller {

	var $tbl = "";
	var $url = "admin/participants";
	var $field = "Nombre";
	var $limit = 20;
	var $section = "Participants";
	var $item = "Participant";
	var $view = "admin/page_view";
	
	public function __construct()
   	{
        parent::__construct();

		$this->load->library('table');
		$this->load->library('pagination');
		$this->load->library('nav');
		$this->load->helper('db');

    //$this->load->model('Link_model','link',TRUE);
		
		$this->tbl = $this->db->dbprefix('participants'); // <---- TABLE
		
		if (!$this->session->userdata('fullname')) redirect("admin/");
	}
	
	function _table($offset) {
		$query = $this->db->query("SELECT Nombre, Apellido, Email, Telefono, coleccion, estilo,
		
		CONCAT('<center><form action=\"".site_url($this->url)."/delete\" method=\"POST\" class=\"delete_form\">
										<input type=\"submit\" class=\"delete_btn icon-trash\" value=\"\">
										<input type=\"hidden\" name=\"delete_id\" value=\"',$this->tbl.id,'\">
									</form></center>')
								   
								   FROM $this->tbl ORDER BY id DESC LIMIT $offset,$this->limit");
		
		if ($query->num_rows())
		{
			
			$tmpl = array ( 
				'table_open'  => '<table class="table table-striped table-bordered table-condensed">'
			 );
	    	$this->table->set_template($tmpl);
	    	$this->table->set_heading(array('First Name','Last Name', 'Email', 'Phone', 'Collection', 'Style', 'Delete'));	    	
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
		$config['num_links'] = 5;

		$config['full_tag_open'] = '<div class="pagination"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';		
		$config['prev_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';	
		
		$this->pagination->initialize($config); 

    	return $d;					
	}
	
	function _form($r)
	{
		$d  = form_open($this->url.'/save');
		$d .= form_input("Name", "fullname",$r->fullname);
		$d .= form_input("Username", "username",$r->username);
		$d .= form_password("Password", "password",$r->password);
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
        $d['toolbar'] = anchor($this->url."/export","<i class='icon-list-alt'></i> Export","class='btn'");; //anchor($this->url."/add","Add $this->item","class='btn'");
		$d['content'] = "{$data['table']}
			{$this->pagination->create_links()}";
        $d['title'] = $this->section;
        $d['error'] = '';
       // $d['logourl']= $this->link->firstlink();
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
        //$d['logourl']= $this->link->firstlink();
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
        //$d['logourl']= $this->link->firstlink();
		$this->load->view($this->view,$d);
	}
	
	function save() {
	
		$arr = fields_data(array("id","fullname","username","password"),$this->input->post(NULL, TRUE));
		
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
	
	function export()
	{
		$this->load->dbutil();
		$this->db->select("id, Nombre, Apellido, Email, Telefono, coleccion, estilo")->from("participants");
		$q = $this->db->get();
        
		$data = $this->dbutil->csv_from_result($q);
		$data = utf8_decode($data);
		
		$this->load->helper('download');
		force_download('Quiz_Participants_'.date('d-m-Y').'.csv', $data);
	}
		
}


/* End of file */