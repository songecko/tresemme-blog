<?php 

	function save_image($id,$folder,$field="userfile")
	{
	
		if (isset($_FILES[$field]['name']))
		{
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'] . '/' . $folder;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '16384';
			$config['overwrite'] = TRUE;
	
			$name = strtolower($_FILES[$field]['name']);
			$ext = pathinfo($name, PATHINFO_EXTENSION);
			if ($ext=="jpeg") $ext = "jpg";
			$targetFile = $id.'.jpg';
			
			$config['file_name'] = $targetFile;
			
			$CI =& get_instance();
	
			$CI->load->library('upload', $config); 
			$CI->upload->overwrite = TRUE;
	
	
			$CI->upload->initialize($config);
	
			if ( ! $CI->upload->do_upload($field))
			{
				return false;
			}
			else
			{
	
				$data = array('upload_data' => $CI->upload->data());
	
				$config['image_library'] = 'gd2';
				
				$config['source_image']	= $data['upload_data']['full_path'];
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']	= 128;
				$config['height']	= 128;
				
				$CI->load->library('image_lib', $config); 
				
				
				$CI->image_lib->resize();
	
				$CI->image_lib->clear();
							
				return true;
			}
		} else {
			return false;
		}	
	}
	
	function get_image($html)
	{
		$image = "";
		$doc=new DOMDocument();
		@$doc->loadHTML($html."&nbsp;");
		$xml=simplexml_import_dom($doc); // just to make xpath more simple
		$images=$xml->xpath('//img');
		foreach ($images as $img) {
		
			$src = $img['src'];
			return $src;			
		}
	}
	
	function get_tag($html,$tag)
	{
		$image = "";
		$doc=new DOMDocument();
		@$doc->loadHTML($html."&nbsp;");
		$xml=simplexml_import_dom($doc); // just to make xpath more simple
		$tags=$xml->xpath('//'.$tag);
		foreach ($tags as $t) {
			return $t;			
		}
	}
	
?>