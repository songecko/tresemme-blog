<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
   	{
        parent::__construct();
        $this->load->library('email');
        $this->load->model('Page_model','page',TRUE);

	}
	
		private function _save_image($id)
	{
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '16384';

		$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
		$ext = strtolower($ext);
		if ($ext=="jpeg") $ext = "jpg";
		$targetFile = $id.'.jpg';
		
		$config['file_name'] = $targetFile;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			return false;
		}
		else
		{

			$data = array('upload_data' => $this->upload->data());
			
			$config['image_library'] = 'gd2';
			
			$config['source_image']	= $data['upload_data']['full_path'];
			//$config['new_image'] = $config['upload_path'].$id."_mini.".$ext;
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 640;
			$config['height']	= 480;
			
			$this->load->library('image_lib', $config); 
			
			$this->image_lib->resize();
			
			return true;
		}
	}

	public function index()
	{
		
		//$uid = uniqid();

		//$this->_save_image($uid);

		$message = "";
		
		foreach($this->input->post() as $k=>$v)
		{
			if ($k!="send_to" && $k!="subject" && $k!="return_url")
				$message .= "<p>$k: <b>$v</b></p>";
		}
		
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		
		$this->email->initialize($config);
		
		$this->email->from($this->input->post("email",TRUE), $this->input->post("nombre",TRUE));
		$this->email->to($this->input->post("send_to",TRUE)); 
		$this->email->subject($this->input->post('subject',TRUE));
		$this->email->message($message);
		
		//$file = $_SERVER['DOCUMENT_ROOT']."/colgatepr/public/uploads/{$uid}_thumb.jpg";
		
		//$this->email->attach($file);
		
		$this->email->send();

		
		//$d['content'] = $this->page->content($this->input->post("return_url",TRUE));
		
		//$this->load->view("page_view",$d);
		redirect("page/".$this->input->post("return_url",TRUE));
		
	}
}

/* End of file */