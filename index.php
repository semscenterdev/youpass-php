<?php
	session_start();
	require_once('C:\wamp\www\getter\youpass\get\yt-getter.php');
	$getter = new YouTube;
	$result = $getter->get($_GET['url']); //use $result when we want to get the iframe code
	$download = $getter->download($_GET['url']);
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
		YouTube URL:<input name="url" value="<?php echo($_GET['url']); ?>"></input>
	</form>
	<?php
		echo($result);
	?><br/>
	<a href="<?php echo($download); ?>">Download video</a>
</body>
</html>