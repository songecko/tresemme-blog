<?php
	function vspace($height) {
		return "<div style='height: {$height}px'></div>";
	}
	
	function script_tag($url,$local=TRUE) {
		if ($local) $url = site_url($url);
		return '<script type="text/javascript" src="'.$url.'"></script>'."\n";
	}
?>