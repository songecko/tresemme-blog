<?php 

	function fields_data($fields,$post)
	{
		
		$arr = array();
		
		foreach($fields as $field)
		{
			if (isset($post[$field]))
			{
				$data = $post[$field];
			}
			else
			{
				$data = "";
			}
			
			if (strstr($field,"_date") || strstr($field,"_dt"))
			{
				if (strlen($data)>=8)
				{
					list($mm,$dd,$yy) = explode("-",$data);
				
					$arr[$field] = "$yy-$mm-$dd"; //date("Y-m-d",strtotime($data));
				}
				else
				{
					$arr[$field] = "0000-00-00";
				}	
			}
			else
			{
				$arr[$field] = $data;
			}	
		}
		
		return $arr;

	}

?>