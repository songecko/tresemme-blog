<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz extends CI_Controller {

	public function __construct()
   	{
        parent::__construct();

        $this->load->helper("db");
        $this->load->helper("fb");
        $this->load->model('Page_model','page',TRUE);
        $this->load->helper("img");
        $this->load->helper("mobile");

	}

	public function index()
	{
	
		if (isset($_REQUEST['signed_request']))
		{
		
			$data = parse_signed_request($_REQUEST['signed_request'],'9684326efe9897a71cc025c6a6a12180');
			
			$liked = $data['page']['liked'];
	
		$d['reglas'] = $this->page->content('reglas_quiz');
			
			if ($liked)
			{
				$this->load->view("quiz/liked_view",$d); // register_view
			}
			else
			{
				$this->load->view("quiz/like_view",$d);
			}
			
		}
		
		else
		
		{
			
			//echo "I don't know what are you looking for.";
			header("location:https://www.facebook.com/pages/Clear-Hair-PR/272720309524227");
			
		}

	}
	
	public function registro()
	{
		$d['reglas'] = $this->page->content('reglas_quiz');
		$this->load->view("quiz/register_view",$d);
	}

	public function participa()
	{
		if ($this->input->post()) 
		{ 
			$id = $this->_save();
			$this->session->set_userdata("participant_id",$id);
		}	


		$d['resultado1'] = $this->page->content("resultado1");
		$d['resultado2'] = $this->page->content("resultado2");
		$d['resultado3'] = $this->page->content("resultado3");
		$d['resultado4'] = $this->page->content("resultado4");
		$d['resultado5'] = $this->page->content("resultado5");
		
		$p1 = '<div class="quizprod">'.$this->page->content("quiz_producto1").'</div>';
		$p2 = '<div class="quizprod">'.$this->page->content("quiz_producto2").'</div>';
		$p3 = '<div class="quizprod">'.$this->page->content("quiz_producto3").'</div>';
		$p4 = '<div class="quizprod">'.$this->page->content("quiz_producto4").'</div>';
		$p5 = '<div class="quizprod">'.$this->page->content("quiz_producto5").'</div>';

		$d['colecciones'] = '<div class="coleccion hide coleccion1">'.$p1.$this->page->content("coleccion1").'</div>';
		$d['colecciones'].= '<div class="coleccion hide coleccion2">'.$p2.$this->page->content("coleccion2").'</div>';
		$d['colecciones'].= '<div class="coleccion hide coleccion3">'.$p3.$this->page->content("coleccion3").'</div>';
		$d['colecciones'].= '<div class="coleccion hide coleccion4">'.$p4.$this->page->content("coleccion4").'</div>';
		$d['colecciones'].= '<div class="coleccion hide coleccion5">'.$p5.$this->page->content("coleccion5").'</div>';


		$d['reglas'] = $this->page->content('reglas_quiz');

		$this->load->view("quiz/participa_view",$d);
	}
	
	private function _save()
	{
		$arr = fields_data(array("id","Nombre","Apellido","Telefono","Email"),$this->input->post(NULL, TRUE));
		
		$this->db->insert("participants",$arr);

		return $this->db->insert_id();
	}
	
	public function fbsave()
	{
		$arr = fields_data(array("id","Nombre","Apellido","Telefono","Email"),$this->input->post(NULL, TRUE));
		
		$this->db->insert("participants",$arr);

		$id =  $this->db->insert_id();
		
		$this->session->set_userdata("participant_id",$id);
	}
	
	public function premios()
	{
		if ($this->input->post()) 
		{ 
			$id = $this->_save();
			$this->session->set_userdata("participant_id",$id);
		}	
		$d['reglas'] = $this->page->content('reglas_quiz');
		$this->load->view("quiz/premios_view",$d);
	}
	
	private function _coleccion($n)
	{
		switch ($n)
		{
			case 1:
				$s = "Total Care";
				break;
			case 2:
				$s = "Frizz Control";
				break;
			case 3:
				$s = "Mosturizing Dry Scalp";
				break;
			case 4:
				$s = "Damage & Control Repair";
				break;
			case 5:
				$s = "Complete Care";
				break;
		}
		
		return $s;
	}
	
	private function _estilo($n)
	{
		switch ($n)
		{
			case 1:
				$s = "Diva Glam";
				break;
			case 2:
				$s = "Belleza Bohemia";
				break;
			case 3:
				$s = "Chica Clásica";
				break;
			case 4:
				$s = "Belleza Despampanante";
				break;
			case 5:
				$s = "Encantadora Independiente";
				break;
		}
		
		return $s;
	}
	
	
	public function save()
	{
		$pid = $this->session->userdata("participant_id");
		
		$score = $this->input->post("score");
		$score2 = $this->input->post("score2");
		
		$arr['coleccion'] = $this->_coleccion($this->input->post("coleccion")) . " ($score)";
		$arr['estilo'] = $this->_estilo($this->input->post("estilo")) . " ($score2)";
		
		$this->db->update("participants",$arr,"id = '$pid'");
	}
	
	public function gracias()
	{
		$d['reglas'] = $this->page->content('reglas_quiz');
		$this->load->view("quiz/gracias_view",$d);
	}
	
	public function reglas()
	{
		$d['reglas'] = $this->page->content('reglas_quiz');
		$this->load->view("quiz/reglas_view",$d);
	}
	
	
}

/* End of file */