<?php
	session_start();
	require_once('C:\wamp\www\getter\youpass\get\yt-getter.php');
	$getter = new YouPass;
	if(!isset($_GET['url'])){
		$getUrl = null;
	}else{
		$getUrl = $_GET['url'];
	}
	$result = $getter->get($getUrl, 'autoplay=1,controls=0'); //use $result when we want to get the iframe code
	$videoId = $getter->strip_id($getUrl);
	if($result == 'Invalid YouTube URL.'){
		$url = '';
	}else{
		$url = $result;
	}
?>
<html>
<head>
</head>
<body>
	<form>
		YouTube URL:<input name="url" value="<?php echo($getUrl); ?>"></input>
	</form>
	<?php
		echo($result);
	?><br/>
	Video id: <?php echo($videoId) ?>
</body>
</html>