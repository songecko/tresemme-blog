<?php
	function mini_time($dt) {
		
		$sdt= strtotime(date("Y-m-d H:i:s"). "+0 hours");
		$today = date("Y-m-d",$sdt);
		$today_h  = date("H",$sdt);
		$today_m  = date("i",$sdt);
		$sdt = strtotime($dt . "+0 hours");
		
		$date = date("Y-m-d",$sdt);
		$date_h =  date("H",$sdt);
		$date_m =  date("i",$sdt);
		
		if ($date==$today) {
			$d = date("g:i a",$sdt);
			
			if($today_h==$date_h) {
				$dif = $today_m-$date_m;
				$d = "$dif min ago";
			} elseif($today_h==$date_h+1) {
				$dif = $today_m-$date_m+60;
				if ($dif>59) {
					$d = "1 hour ago";
				} else {
					$d = "$dif min ago";
				}
			} else {
				$dif = $today_h-$date_h;
				$d = "$dif hours ago";
			}
			
		} else {
			$d = date("M d", $sdt);
			$months = array("Jan","Apr","Aug","Dec");
			$meses = array("Ene","Abr","Ago","Dic");
			//$d = str_replace($months,$meses,$d);
			$d = "on $d";
		}
		return $d;
	}
?>