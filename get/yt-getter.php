<?php
	class YouPass{
		function get($url, $params){
			if(strpos($url, 'youtube.com') == false){
				return 'Invalid YouTube URL.';
			}else{
				$a = str_replace("watch?v=","v/",$url);
				$b = '<iframe width="640" height="360" frameborder="0" src="' . $a . '&' . $params . '"></iframe>';
				$c = str_replace(",","&",$b);
				return $c;
			}
		}
		
		function get_dl($url){
			$videocode = substr($url, strpos($url, "v=") + 1);
			$final = 'http://www.youtube.com/download_video?v' . $videocode;
			return $final;
		}
		
		function strip_id($url){
			if(strpos($url, 'youtube.com') == false){
				return 'Invalid YouTube URL.';
			}else{
				$videocode = substr($url, strpos($url, "v=") + 2);
				return $videocode;
			}
		}
	}
?>