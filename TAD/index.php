<?php 
$lifetime = 30 * 24 * 60 * 60;
session_start();
setcookie(session_name(),session_id(),time()+$lifetime);

 	if (!isset($_SESSION['userId'])) {
 		setcookie(session_name(),session_id(),time()-3600);
  		header('location: php/login.php');
  		exit();
	}else if($_SESSION['userId'] > 4){
		setcookie(session_name(),session_id(),time()-3600);
		$_SESSION['userId'] = NULL;
		unset($_SESSION['userId']);
		header('location: php/tnx.php');
		exit();
	}else{
		$ID = $_SESSION['userId'];
	}
	if (isset($_GET['logout'])) {
		setcookie(session_name(),session_id(),time()-3600);
		$_SESSION['userId'] = NULL;
		unset($_SESSION['userId']);
		header('location: php/login.php');
	}
	$servername = 	'127.9.78.130';
	$username = 	'admindCil6Tb';
	$password = 	'sZXjqjThXFE5';
	$dbname = 		'TAD';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (isset ( $_POST ['uploadProfPic'] )) {
		$allowedExts = array("jpg","jpeg","png");
		$extension   = end(explode(".", $_FILES["profpic"]["name"]));
		if (($_FILES["profpic"]["size"] < 20000) && in_array($extension, $allowedExts)) {
			if ($_FILES["profpic"]["error"] > 0) {
				echo "Return Code: " . $_FILES["profpic"]["error"] . "<br />";
			} else {
				echo "Upload: " . $_FILES["profpic"]["name"] . "<br />";
				echo "Type: " . $_FILES["profpic"]["type"] . "<br />";
				echo "Size: " . ($_FILES["profpic"]["size"] / 1024) . " Kb<br />";
				echo "Temp file: " . $_FILES["profpic"]["tmp_name"] . "<br />";
				if (file_exists("upload/" . $_FILES["profpic"]["name"])) {
					echo $_FILES["profpic"]["name"] . " already exists. ";
				} else {
					move_uploaded_file($_FILES["profpic"]["tmp_name"], "http://sam.apostel.be/TAD/upload/profpics/" . $_FILES["profpic"]["name"]);
					echo "Stored in: " . "sam.apostel.be/TAD/upload/profpics/" . $_FILES["profpic"]["name"];
				}
			}
		} else {
			echo "Invalid file";
		}
				
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="apple-touch-icon" href="img/appiconTAD.png">
<link rel="apple-touch-startup-image" href="img/splashScreen.png">
<meta charset="UTF-8">
<title>take a dare</title>
<link href="css/style.css?v1" rel="stylesheet">
<link href="css/main.css?v1" rel="stylesheet">
<script>
    var hash = "";
    
	function navClicked(clicked){
		if(!clicked.classList.contains("selected")){
			window.location.hash = clicked.className;
		}
	}
	
	function hashChanged(){
		hash = window.location.hash.substr(1);
		var navItems = document.getElementsByTagName("navItem");
		for(var i = 0; i < 4;i++){
			navItems[i].classList.remove("selected");
		}
		var content = document.getElementsByTagName("contentItem");
		for(var i = 0; i < 4;i++){
			content[i].className = "hidden";
		}
		if (document.getElementById(hash)){
			document.getElementById(hash).className = "";
			document.getElementsByClassName(hash)[0].classList.add("selected");
		}else{
			document.getElementById("chats").className = "";
			document.getElementsByClassName("chats")[0].classList.add("selected");
			window.location.hash = "chats";
		}
	}
	function optionClicked(clicked){
		var menuOptions = clicked.parentNode.childNodes;
		for(var i = 0; i < menuOptions.length; i++){
			menuOptions[i].classList.remove("selected");
		}
		clicked.classList.add("selected");
		
		var options = clicked.parentNode.parentNode.getElementsByClassName("content");
		for(var i = 0; i < options.length; i++){
			if(options[i].classList.contains(clicked.id)){
				options[i].className = "content " + clicked.id;
			}else{
				options[i].classList.add("hidden");
			}
			
		}
	}
</script>
<script src="favorite-star-master/webcomponents.js"></script>
<link rel="import" href="favorite-star-master/favorite-star.html">
</head>
<body onhashchange="hashChanged();" onload="hashChanged();">
	<div class="container main">
		<nav>
			<navItem class="chats selected" onclick="navClicked(this);"><?php echo file_get_contents('img/navIconChat.svg'); ?></navItem>
			<navItem class="explore" onclick="navClicked(this);"><?php echo file_get_contents('img/navIconExplore.svg'); ?></navItem>
			<navItem class="leaderboard" onclick="navClicked(this);"><?php echo file_get_contents('img/navIconLeaderboard.svg'); ?></navItem>
			<navItem class="profile" onclick="navClicked(this);"><?php echo file_get_contents('img/navIconProfile.svg'); ?></navItem>
		</nav>
		<content>
			<contentItem id="chats" class=""><?php include('php/chats.php') ?></contentItem>
			<contentItem id="explore" class="hidden"><?php include('php/explore.php') ?></contentItem>
			<contentItem id="leaderboard" class="hidden"><?php include('php/leaderboard.php') ?></contentItem>
			<contentItem id="profile" class="hidden"><?php include('php/profile.php') ?></contentItem>
		</content>
	</div>
</body>
</html>