<?php
if(!isset($_SESSION["userid"])){
	include("/pages/login.php");
}else{
	include("/pages/home.php");
}
?>
