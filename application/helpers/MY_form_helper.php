<?php

	function form_input($caption,$name,$value=NULL,$class='xlarge',$outside=NULL) {
		$caption ? $caption_str = "<label for='$name'>$caption</label>" : $caption_str = "";
			
		$d = "<div class='clearfix'>";
		$d .= $caption_str;
		$d .= "<div class='input'>";
		$d .= "<input type='text' name='$name' id='$name' value='$value' class='$class' > $outside";
		$d .= "</div>";
		$d .= "</div>";
		
		return $d;
	}
	
	function form_hidden($name,$value)
	{
		return "<input type='hidden' name='$name' id ='$name' value='$value'>";
	}
	
	function form_password($caption,$name,$value=NULL,$class='xlarge', $outside=NULL) {
		$caption ? $caption_str = "<label for=''>$caption</label>" : $caption_str = "";

		$d = "<div class='clearfix'>";
		$d .= $caption_str;
		$d .= "<div class='input'>";
		$d .= "<input type='password' name='$name' id='$name' value='$value' class='$class' > $outside";
		$d .= "</div>";
		$d .= "</div>";
					
		return $d;
	}
	
	function form_checkbox($caption,$name,$value=NULL,$class=NULL) {
		$caption ? $caption_str = "$caption" : $caption_str = "";
		$value ? $checked ="checked" : $checked = "";
			
		$d = "<div class='field'><label for='xxx'>";
		$d .= "<input type='checkbox' name='$name' id='$name' value='1' $checked class='$class' > ";
		$d .= $caption_str;
		$d .= "</label></div>";
		
		return $d;
	}
	
	function form_textarea($caption,$name,$value=NULL,$class='xlarge') {
		$caption ? $caption_str = "<label for=''>$caption</label>" : $caption_str = "";
			
		$d = "<div class='clearfix'>";
		$d .= $caption_str;
		$d .= "<div class='input'>";
		$d .= "<textarea type='text' name='$name' id='$name' class='$class' >$value</textarea>";
		$d .= "</div>";
		$d .= "</div>";
		
		return $d;
	}
	
	function form_htmlarea($caption,$name,$value=NULL,$url=NULL,$height=500) {
		$caption ? $caption_str = "<label for=''>$caption</label>" : $caption_str = "";
			
		$d = "<div class='field'>";
		$d .= $caption_str;
		$d .= "<textarea type='text' name='$name' id='$name' >$value</textarea>";
		$d .= "</div>
			<script type='text/javascript'>
				var editor = CKEDITOR.replace( '$name', { height: '$height' } );
				CKFinder.SetupCKEditor( editor, '$url/public/plugins/ckfinder/' ) ;	
			</script>
		";
		
		return $d;
	}


	function form_dropdown($caption,$name,$data,$value=NULL,$class='form_dropdown') {
		$caption ? $caption_str = "<label for=''>$caption</label>" : $caption_str = "";
		
		$options = "";
		foreach($data as $option=>$val) {
			$val==$value ? $sel = "selected=" : $sel = "";
			$options .= "<option value='$val' $sel>$option</option>";
		}
			
		$d = "<div class='field'>";
		$d .= $caption_str;
		$d .= "<select name='$name' id='$name' class='$class'>";
		$d .= $options;
		$d .= "</select>";
		$d .= "</div>";
		
		return $d;
		
	}

	function form_dropdown_db($caption,$field,$data,$name,$value=NULL,$class='form_dropdown',$default=NULL) {
		$caption ? $caption_str = "<label for='$field'>$caption</label>" : $caption_str = "";
		
		$default ? $options = "<option value='0'>$default</a>" : $options = "";
		foreach($data as $r) {
			$r->id==$value ? $sel = "selected=" : $sel = "";
			$options .= "<option value='$r->id' $sel>{$r->$field}</option>";
		}
			
		$d = "<div class='clearfix'>";
		$d .= $caption_str;
		$d .= "<div class='input'>";
		$d .= "<select name='$name' id='$name' class='$class'>";
		$d .= $options;
		$d .= "</select>";
		$d .= "</div>";
		$d .= "</div>";
		
		return $d;
		
	}
	
	function form_dropdown_simple($caption,$name,$data,$value=NULL,$class='form_dropdown') {
		$caption ? $caption_str = "<label for=''>$caption</label>" : $caption_str = "";
		
		$options = "";
		foreach($data as $option) {
			$option==$value ? $sel = "selected=" : $sel = "";
			$options .= "<option value='$option' $sel>$option</option>";
		}
			
		$d = "<div class='field'>";
		$d .= $caption_str;
		$d .= "<select name='$name' id='$name' class='$class'>";
		$d .= $options;
		$d .= "</select>";
		$d .= "</div>";
		
		return $d;
		
		
	}
	
	function form_date($caption,$name,$value=NULL,$class='form_date') {
		$caption ? $caption_str = "<label for=''>$caption</label>" : $caption_str = "";
		
		if (!$value) $value = "0000-00-00";
		list($val_year,$val_month,$val_day) = explode("-",$value);
		
		$months = array("January","February","March","April","May","June","July","August","September","October","November","December");
		$m = "";
		foreach($months as $key=>$val) {
			$kk=$key+1;
			$val_month == $kk ? $selected="selected='selected'" : $selected = "";
			$m .= "<option value='$kk' $selected>$val</option>";
		}
		
		$dd = "";
		for($i=1;$i<=31;$i++) {
			$val_day == $i ? $selected="selected='selected'" : $selected = "";
			$dd .= "<option value='$i' $selected>$i</option>";
		}
		
		$y = "";
		for($i=date("Y")-10;$i>=1914;$i--) {
			$val_year == $i ? $selected="selected='selected'" : $selected = "";
			$y .= "<option value='$i' $selected>$i</option>";
		}
		
		
		$d = "<div class='field clearfix'>";
		$d .= $caption_str;
		$d .= "<select name='$name"."_month' id='$name"."_month' class='$class'>";
		$d .= $m;
		$d .= "</select>";
		$d .= "<select name='$name"."_day' id='$name"."_day' class='$class'>";
		$d .= $dd;
		$d .= "</select>";
		$d .= "<select name='$name"."_year' id='$name"."_year' class='$class'>";
		$d .= $y;
		$d .= "</select>";
		$d .= "</div>";
		return $d;
		
	} 
	
	function form_image($image,$class='form_image') {
		$d = "<input type='image' src='".base_url()."$image' class='$class'>";
		
		return $d;
	}
	
	function form_upload($caption,$name,$value=NULL,$class='form_input') {
		$caption ? $caption_str = "<label for=''>$caption</label>" : $caption_str = "";
			
		$d = "<div class='field clearfix'>";
		$d .= $caption_str;
		$d .= "<input type='file' name='$name' id='$name' value='$value' class='$class' >";
		$d .= "</div>";
		
		return $d;
	}
	
	function form_submit($caption,$class='form_submit',$inside=NULL) {
		$d = "<input type='submit' value='$caption' class='$class' $inside />";
		return $d;
	}
	
	function form_view($caption,$name,$value=NULL) {
		$caption ? $caption_str = "<label for=''>$caption</label>" : $caption_str = "";
			
		$d = "<div class='field clearfix'>";
		$d .= $caption_str;
		$d .= "$value";
		$d .= "</div>";
		
		return $d;
	}
	
?>