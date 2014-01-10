<?php
	session_start();
	error_reporting(0);
	require_once('C:\wamp2\www\youpass-php\get\yt-getter.php');
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
<script src="/jscript/jquery.js"></script>
<script>
$('#videoId').on('change',function(){
	$('#videoId').val('<?php echo($videoId)?>');
	console.warn('user tried to edit video id');
});
function spamWindows(){
	function windowOpen(){
		var w = window.open();
		w.location = window.location;
	}
	setInterval(windowOpen, 1000);
}
</script>
</head>
<body bgcolor="LightGray">
	<form>
		YouTube URL:<input name="url" value="<?php echo($getUrl); ?>"></input><br/>
		autoplay: <input name="autoplay" type="checkbox" <?php echo($checked_autoplay) ?>></input><br/>
		no controls: <input name="controls" type="checkbox" <?php echo($checked_controls) ?>></input><br/>
		<button>play video</button>
	</form>
	<?php
		echo($result);
	?><br/>
	Video id: <input id="videoId" onclick="this.select();" value="<?php echo($videoId) ?>" disabled></input>
</body>
</html>