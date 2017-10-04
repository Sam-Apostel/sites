<?php
	$servername = 	'127.9.78.130';
	$username = 	'admindCil6Tb';
	$password = 	'sZXjqjThXFE5';
	$dbname = 		'TAD';
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	session_start();
	$ID = $_SESSION['userId'];
	$action = $_GET['action'];
	if($action == "follow"){
		$followthis = intval($_GET['id']);
		$query = "INSERT INTO following (followerID, followingID) VALUES ($ID, $followthis)" ;
		if (mysqli_query($conn, $query)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	}else if($action == "unfollow"){
		$unfollowthis = intval($_GET['id']);
		$query = "DELETE FROM following WHERE followerID =". $ID . " AND followingID = " . $unfollowthis ;
	if (mysqli_query($conn, $query)) {
			echo "Record Deleted successfully";
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}
	}
?>