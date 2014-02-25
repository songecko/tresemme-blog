<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
   	{
        parent::__construct();

        $this->load->model('Page_model','page',TRUE);

        $this->load->helper("img");

	}

	public function index()
	{
		$d['twitter'] = urlencode(str_replace("\t","",html_entity_decode(strip_tags($this->page->content("twitter_general_blog")),ENT_QUOTES,'UTF-8')));
		$this->load->view('blog/blog_home_view',$d);
	}
	
	private function _content($cat,$id)
	{
		if ($id)
		{
			$this->db->select("*")->from("posts")->where("id",$id)->order_by("id","desc")->limit(1);
		}
		else
		{
			$this->db->select("*")->from("posts")->where(array("category_id"=>$cat,"post_dt <="=>date("Y-m-d")))->order_by("id","desc")->limit(1);
		}
		$q = $this->db->get();
		$r = $q->row();
		
		return $r;		
	}
	
	private function _archivo($cat)
	{
		$this->db->select("*")->from("posts")->where(array("category_id"=>$cat,"post_dt <="=>date("Y-m-d")))->order_by('post_dt',"desc");
		$q = $this->db->get();

		return $q->result();		
	}

	public function moda()
	{
	
		$id=$this->uri->segment(3,0);

		$d['moda_class'] = "moda_on";
		$d['belleza_class'] = "belleza_off";
		$d['findesemana_class'] = "findesemana_off";
		$d['content'] = $this->_content(1,$id);
		$d['archivo'] = $this->_archivo(1);
		$d['header'] = "Obtén el look";
		$d['link'] = "moda";

		$d['twitter'] = urlencode(str_replace("\t","",html_entity_decode(strip_tags('Conoce las últimas tendencias en Clear Style Trends #Moda #ClearHairCare'),ENT_QUOTES,'UTF-8')));
	
		if ($this->uri->segment(4)=="link")
		{
			$this->load->view('blog/blog_link_view',$d);
		}
		else
		{
			$this->load->view('blog/blog_view',$d);
		}

	}

	public function belleza()
	{

		$id=$this->uri->segment(3,0);

		$d['moda_class'] = "moda_off";
		$d['belleza_class'] = "belleza_on";
		$d['findesemana_class'] = "findesemana_off";
		$d['content'] = $this->_content(2,$id);
		$d['archivo'] = $this->_archivo(2);
		$d['header'] = "Miércoles de Belleza";
		$d['link'] = "belleza";

		$d['twitter'] = urlencode(str_replace("\t","",html_entity_decode(strip_tags('Conoce las últimas tendencias en Clear Style Trends #Belleza #ClearHairCare'),ENT_QUOTES,'UTF-8')));

		if ($this->uri->segment(4)=="link")
		{
			$this->load->view('blog/blog_link_view',$d);
		}
		else
		{
			$this->load->view('blog/blog_view',$d);
		}
	}
	
	public function findesemana()
	{
	
		$id=$this->uri->segment(3,0);

		$d['moda_class'] = "moda_off";
		$d['belleza_class'] = "belleza_off";
		$d['findesemana_class'] = "findesemana_on";
		$d['header'] = "Fin de Semana";
		$d['link'] = "findesemana";

		$d['content'] = $this->_content(3,$id);
		$d['archivo'] = $this->_archivo(3);

		$d['twitter'] = urlencode(str_replace("\t","",html_entity_decode(strip_tags('Conoce las últimas tendencias en Clear Style Trends #Weekend #ClearHairCare'),ENT_QUOTES,'UTF-8')));

		if ($this->uri->segment(4)=="link")
		{
			$this->load->view('blog/blog_link_view',$d);
		}
		else
		{
			$this->load->view('blog/blog_view',$d);
		}
	}
}

/* End of file */