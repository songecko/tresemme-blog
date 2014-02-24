<?php

class Products extends CI_Controller {

	var $tbl = "";
	var $url = "admin/products";
	var $field = "product";
	var $limit = 20;
	var $section = "Products";
	var $item = "Product";
	var $view = "admin/page_view";

	public function __construct()
	{
		parent::__construct();

		$this->load->library('table');
		$this->load->library('pagination');
		$this->load->library('nav');
		$this->load->helper('db');
		$this->load->helper('img');

		$this->tbl = $this->db->dbprefix('products'); // <---- TABLE
		$this->tbl2 = $this->db->dbprefix('categories'); // <---- TABLE

		if (!$this->session->userdata('fullname'))
			redirect("admin/");
	}

	function _table($offset, $f = NULL)
	{

		$search = "";
		if ($f)
			$search = "WHERE product LIKE '%$f%' OR reference LIKE '%$f%' ";

		$query = $this->db->query("SELECT CONCAT('<div align=\"right\">',$this->tbl.id,'</div>'), CONCAT('<a href=\"" . site_url($this->url) . "/edit/',$this->tbl.id,'\">',$this->field,'</a>'), category, 
		
		CONCAT('<center><input type=\"text\" class=\"span1 sort\" rel=\"',$this->tbl.id,'\" value=\"',$this->tbl.position,'\"></center>'),
								   
								   CONCAT('<center><form action=\"" . site_url($this->url) . "/delete\" method=\"POST\" class=\"delete_form\">
										<input type=\"submit\" class=\"delete_btn icon-remove\" value=\"\">
										<input type=\"hidden\" name=\"delete_id\" value=\"',$this->tbl.id,'\">
									</form></center>')
									
								   FROM $this->tbl LEFT JOIN $this->tbl2 ON category_id = $this->tbl2.id
								   $search
								   ORDER BY category, $this->tbl.position, $this->field LIMIT $offset,$this->limit");

		if ($query->num_rows()) {

			$tmpl = array(
					'table_open' => '<table class="table table-striped table-bordered table-condensed">'
			);
			$this->table->set_template($tmpl);
			$this->table->set_heading(array('ID', 'Product', 'Category', 'Position', 'Delete'));
			$d['table'] = $this->table->generate($query);
		} else {
			$d['table'] = "No data.";
		}

		// Pagination	

		$query = $this->db->query("SELECT $this->field FROM $this->tbl $search");

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

		$this->db->select("id,CONCAT(stub,category) as cat", FALSE)->from("categories")->order_by("tree");
		$q = $this->db->get();
		$categories = $q->result();

		$d = form_open_multipart($this->url . '/save');
		$d .= form_input("Product", "product", $r->product);
		$d .= form_dropdown_db("Category", "cat", $categories, "category_id", $r->category_id);
//		$d .= form_input("Brand", "brand",$r->brand);
//		$d .= form_input("Reference", "reference",$r->reference);
//		$d .= form_input("Price", "price",$r->price);
		$d .= form_checkbox("Featured", "featured", $r->featured);
//		$d .= form_input("Related products IDs (comma separated)", "related",$r->related);
//		$d .= form_upload("Picture", "userfile");
		$d .= form_input("Position", "position", $r->position);
		$d .= form_htmlarea("Summary", "summary", $r->summary, "/socialpromos3", 200);
		$d .= form_htmlarea("Description", "description", $r->description, "/socialpromos3", 500);
		$d .= form_htmlarea("Facebook", "facebook", $r->facebook, "/socialpromos3", 200);
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

		$f = $this->input->post("f", TRUE);

		$d['nav'] = $this->nav->admin_nav($this->section);
		$data = $this->_table($offset, $f);
		$d['toolbar'] = '<form class="form-search" action="' . site_url($this->url) . '" method="post">
				  <div class="input-append">
				    <input type="text" class="span2 search-query" name="f" id="f" value="' . $f . '">
				    <button type="submit" class="btn">Search</button>
				  </div>
			</form> ' . anchor($this->url . "/add", "Add $this->item", "class='btn btn-info'");
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

		$arr = fields_data(array("id", "product", "summary", "description", "category_id", "price", "brand", "reference", "related", "featured", "position", "facebook"), $this->input->post(NULL));

		if ($this->input->post('id') > 0) {
			$this->db->where("id", $this->input->post('id'));
			$this->db->update($this->tbl, $arr);
			$id = $this->input->post('id');
		} else {
			$this->db->insert($this->tbl, $arr);
			$id = $this->db->insert_id();
		}

		//save_image($id,'/public/img/products/');

		redirect($this->url);
	}

	function delete()
	{
		$this->db->delete($this->tbl, array("id" => $this->input->post('delete_id')));
		redirect($this->url);
	}

	function sort()
	{
		$arr = fields_data(array("id", "position"), $this->input->post(NULL));
		$id = $arr['id'];
		$this->db->update($this->tbl, $arr, "id = '$id'");
	}

}

/* End of file */