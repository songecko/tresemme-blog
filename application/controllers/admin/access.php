<?php

class Access extends CI_Controller {

	public function __construct()
   	{
        parent::__construct();

   	}
	
	function index()
	{
		$data['message'] = NULL;
		
		if ($this->session->userdata('fullname')) 
		{
			redirect("admin/dashboard");
		} 
		else
		{
			$this->load->view('admin/login_view',$data);
		}
	}

	function retry() 
	{
		$data['message'] = "<div class='alert alert-error fade in'><i class='icon-exclamation-sign'></i> <a class='close' data-dismiss='alert'>×</a>Invalid username or password.</div>";
		$this->load->view('admin/login_view',$data);
	}	
	
	function login() {
		$user = $this->input->post('username',TRUE);
		$pass = $this->input->post('password',TRUE);
		if ($user && $pass) {
			$query = $this->db->get_where("users",array('username'=>$user, 'password'=>$pass),1);
			if($query->num_rows()==1) 
			{
				$r = $query->row();
				$this->session->set_userdata('fullname', $r->fullname);
				redirect("admin/");
			} else {
				$this->session->unset_userdata('fullname');
				redirect("admin/access/retry/");
			}
		} else {
			redirect("admin/access/retry/");
		}	
	}
	
	function logout() {
		$this->session->unset_userdata('fullname');
		redirect("admin/");
	}
		
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */