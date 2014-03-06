<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Women extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Page_model', 'page', TRUE);
		$this->load->helper("img");
		$this->load->helper("mobile");
	}

	public function index()
	{

		if (isset($_GET['post_id'])) {
			//redirect("https://www.facebook.com/pages/Clear-Hair-PR/272720309524227");
			if (is_mobile()) {
				redirect("women/m");
			} else {
				redirect("https://www.facebook.com/pages/Clear-Hair-PR/272720309524227?id=272720309524227&sk=app_330269997085296");
			}
		} else {
			if (isset($_REQUEST['signed_request'])) {
				$this->db->select("*")->from("products")->where("category_id", "1")->order_by("position", "asc");
				$q = $this->db->get();

				$d['intro'] = $this->page->content("women_intro");
				$d['twitter'] = urlencode(str_replace("\t", "", html_entity_decode(strip_tags($this->page->content("twitter")), ENT_QUOTES, 'UTF-8')));
				$d['compartelo'] = str_replace("{twitter}", $d['twitter'], $this->page->content("compartelo"));
				$d['products'] = $q->result();
				$this->load->view('women_view', $d);
			} else {
				if (is_mobile()) {
					redirect("women/m");
				} else {
					redirect("https://www.facebook.com/pages/Clear-Hair-PR/272720309524227?id=272720309524227&sk=app_330269997085296");
				}
			}
		}
	}

	public function m()
	{

		if (isset($_GET['post_id'])) {
			redirect("https://www.facebook.com/pages/Clear-Hair-PR/272720309524227");
		} else {

			$d['intro'] = $this->page->content("women_intro_mobile");
			$d['twitter'] = urlencode(str_replace("\t", "", html_entity_decode(strip_tags($this->page->content("twitter")), ENT_QUOTES, 'UTF-8')));
			$d['compartelo'] = str_replace("{twitter}", $d['twitter'], $this->page->content("compartelo"));
			$this->load->view('women_m_view', $d);
		}
	}

	public function products()
	{
		$id = $this->uri->segment(3);

		switch ($id) {
			case "1":
				$d['prev'] = "/women/m";
				$d['next'] = "/women/products/4";
				$start = 0;
				break;
			case "4":
				$d['prev'] = "/women/products/4";
				$d['next'] = "/women/products/7";

				$start = 3;
				break;
			case "7":
				$d['prev'] = "/women/products/4";
				$d['next'] = "/women/m";
				$start = 6;
				break;
		}

		$this->db->select("*")->from("products")->where(array("category_id" => "1"))->order_by("position", "asc")->limit(3, $start);
		$q = $this->db->get();

		$d['intro'] = $this->page->content("women_intro_mobile");
		$d['twitter'] = urlencode(str_replace("\t", "", html_entity_decode(strip_tags($this->page->content("twitter")), ENT_QUOTES, 'UTF-8')));
		$d['compartelo'] = str_replace("{twitter}", $d['twitter'], $this->page->content("compartelo"));

		$d['products'] = $q->result();
		$d['id'] = $id;
		$this->load->view('women_mp_view', $d);
	}

	public function product()
	{
		$id = $this->uri->segment(3);

		$this->db->select("*")->from("products")->where("id", $id);
		$q = $this->db->get();
		$r = $q->row();

		$d['r'] = $r;
		$d['ret'] = $this->uri->segment(4);
		$d['twitter'] = urlencode(str_replace("\t", "", html_entity_decode(strip_tags($this->page->content("twitter")), ENT_QUOTES, 'UTF-8')));
		$this->load->view('women_mpr_view', $d);
	}

	// /apps/clear/public/uploads/images/women_splash_mobile.jpg
}

/* End of file */