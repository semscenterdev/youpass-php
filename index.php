<?php
	session_start();
	error_reporting(0);
	require_once('C:\wamp\www\getter\youpass\get\yt-getter.php');
	$getter = new YouPass;
	if(!isset($_GET['url'])){
		$getUrl = null;
	}else{
		$getUrl = $_GET['url'];
	}
	$params = null;
	if($_GET['autoplay'] == 'on'){
		$params = $params . ',autoplay=1';
		$checked_autoplay = 'checked';
	}
	if($_GET['controls'] == 'on'){
		$params = $params . ',controls=0';
		$checked_controls = 'checked';
	}
	$result = $getter->get($getUrl, $params); //use $result when we want to get the iframe code
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
		YouTube URL:<input name="url" value="<?php echo($getUrl); ?>"></input><br/>
		autoplay: <input name="autoplay" type="checkbox" <?php echo($checked_autoplay) ?>></input><br/>
		no controls: <input name="controls" type="checkbox" <?php echo($checked_controls) ?>></input><br/>
		<button>play video</button>
	</form>
	<?php
		echo($result);
	?><br/>
	Video id: <?php echo($videoId) ?>
</body>
</html>