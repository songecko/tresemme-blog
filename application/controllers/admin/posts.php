<?php

class Posts extends CI_Controller {

	var $tbl = "";
	var $url = "admin/posts";
	var $field = "post_title";
	var $limit = 20;
	var $section = "Posts";
	var $item = "Post";
	var $view = "admin/page_view";

	public function __construct()
	{
		parent::__construct();

		$this->load->library('table');
		$this->load->library('pagination');
		$this->load->library('nav');
		$this->load->helper('db');

		$this->tbl = $this->db->dbprefix('posts'); // <---- TABLE

		if (!$this->session->userdata('fullname'))
			redirect("admin/");
	}

	function _table($offset)
	{
		$query = $this->db->query("SELECT CONCAT('<a href=\"" . site_url($this->url) . "/edit/',$this->tbl.id,'\">',$this->field,'</a>'), DATE_FORMAT(post_dt,'%m-%d-%Y'), if(category_id='1','Moda',if(category_id='2','Belleza','Fin de Semana')),
								   
								   CONCAT('<center><form action=\"" . site_url($this->url) . "/delete\" method=\"POST\" class=\"delete_form\">
										<input type=\"submit\" class=\"delete_btn icon-trash\" value=\"\">
										<input type=\"hidden\" name=\"delete_id\" value=\"',$this->tbl.id,'\">
									</form></center>')
									
								   FROM $this->tbl ORDER BY post_dt DESC  LIMIT $offset,$this->limit");

		if ($query->num_rows()) {

			$tmpl = array(
					'table_open' => '<table class="table table-striped table-bordered table-condensed">'
			);
			$this->table->set_template($tmpl);
			$this->table->set_heading(array('Post', 'Date', 'Category', 'Delete'));
			$d['table'] = $this->table->generate($query);
		} else {
			$d['table'] = "No data.";
		}

		// Pagination	

		$query = $this->db->query("SELECT $this->field FROM $this->tbl");

		$config['base_url'] = site_url($this->url . '/page/');
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

		$categories = array("Moda" => 1, "Belleza" => 2, "Fin de semana" => 3);

		$d = form_open($this->url . '/save');
		$d .= form_input("Title", "post_title", $r->post_title, "span8");
		$d .= form_dropdown("Category", "category_id", $categories, $r->category_id);
		$d .= form_input("Date", "post_dt", date("m-d-Y", strtotime($r->post_dt)));
		$d .= form_htmlarea("Content", "post_content", $r->post_content, "/socialpromos3");
		$d .= form_hidden("id", $r->id);
		$d .= "<div class='form-actions'>";
		$d .= form_submit("Save", "btn btn-primary");
		$d .= "</div>";
		return $d;
	}

	function index()
	{
		$this->page();
	}

	function page()
	{

		$this->uri->segment(3) == "page" ? $offset = $this->uri->segment(4, 0) : $offset = 0;

		$d['nav'] = $this->nav->admin_nav($this->section);
		$data = $this->_table($offset);
		$d['toolbar'] = anchor($this->url . "/add", "Add $this->item", "class='btn'");
		$d['content'] = "{$data['table']}
			{$this->pagination->create_links()}";
		$d['title'] = $this->section;
		$d['error'] = '';
		$this->load->view($this->view, $d);
	}

	function add()
	{
		$d['nav'] = $this->nav->admin_nav($this->section);
		$d['title'] = anchor($this->url, $this->section) . ' &raquo; Add ' . $this->item;
		$d['toolbar'] = anchor($this->url, "Cancel", "class='btn'");

		$fields = $this->db->list_fields($this->tbl);
		foreach ($fields as $field)
			$r->$field = NULL;

		$r->post_dt = date("Y-m-d H:i:s");

		$d['content'] = $this->_form($r);
		$d['error'] = '';
		$this->load->view($this->view, $d);
	}

	function edit()
	{
		$d['nav'] = $this->nav->admin_nav($this->section);
		$d['title'] = anchor($this->url, $this->section) . ' &raquo; Edit ' . $this->item;
		$d['toolbar'] = anchor($this->url, "Cancel", "class='btn'");
		$q = $this->db->get_where($this->tbl, array('id' => $this->uri->segment(4)));
		$r = $q->row();
		$d['content'] = $this->_form($r);
		$d['error'] = '';
		$this->load->view($this->view, $d);
	}

	function save()
	{

		$arr = fields_data(array("id", "post_title", "post_content", "category_id", "post_dt"), $this->input->post(NULL));

		if ($this->input->post('id') > 0) {
			$this->db->where("id", $this->input->post('id'));
			$this->db->update($this->tbl, $arr);
		} else {
			$this->db->insert($this->tbl, $arr);
		}
		redirect($this->url);
	}

	function delete()
	{
		$this->db->delete($this->tbl, array("id" => $this->input->post('delete_id')));
		redirect($this->url);
	}

}

/* End of file */