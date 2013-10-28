<?php
	class YouTube{
		public  $dir ="C:\wamp\www\getter\downloads";
		private $info = array();
		private $content; 
		private $urL; 
		private $file_name;
		function get($url){
			if(strpos($url, 'youtube.com') == false){
				return 'Invalid YouTube URL.';
			}else{
				$a = str_replace("watch?v=","v/",$url);
				$b = '<iframe width="640" height="360" frameborder="0" src="' . $a . '?autoplay=1"></iframe>';
				return $b;
			}
		}
		
		function get_dl($url){
			$videocode = substr($url, strpos($url, "v=") + 1);
			$final = 'http://www.youtube.com/download_video?v' . $videocode;
			return $final;
		}
		
		function strip_id($url){
			$videocode = substr($url, strpos($url, "v=") + 1);
			return $videocode;
		}
	}
?>