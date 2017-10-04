<?php include('server.php')?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>take a dare</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style"
	content="black-translucent">
<link rel="apple-touch-icon" href="../img/appiconTAD.png">
<!-- <link rel="apple-touch-startup-image" href="../img/splashScreen.png"> -->
<link href="../css/register.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
</head>
<body>

<?php
for($i = 0; $i < 100; $i ++) {
	$query = "SELECT * FROM random_adjectives order by RAND() LIMIT 1";
	$result = mysqli_query ( $conn, $query );
	if (mysqli_num_rows ( $result ) > 0) {
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			$username = $row ["adjective"];
		}
	}
	$username .= " ";
	$query = "SELECT * FROM random_animals order by RAND() LIMIT 1";
	$result = mysqli_query ( $conn, $query );
	if (mysqli_num_rows ( $result ) > 0) {
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			$username .= $row ["animal"];
		}
	}
	echo $username . "<br>";
}
?>
</body>
</html>

