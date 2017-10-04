<?php
session_start ();

require "pass/password.php";

// define form variables and errors
$mail = $pass = $pass1 = "";
$mailErr = $passErr = $pass1Err = $globalErr = "";

// db connection declaration
$servername = '127.9.78.130';
$username = 'admindCil6Tb';
$password = 'sZXjqjThXFE5';
$dbname = 'TAD';
$conn = mysqli_connect ( $servername, $username, $password, $dbname ) or die ( mysql_error () );

if (isset ( $_SESSION ['userId'] )) {
	header ( 'location: ../index.php' );
} else if (isset ( $_POST ['registerU'] )) {
	// reCaptcha info
	$secret = '6LckzSwUAAAAAJhvIO6vIGGAni47ygLkRe6wfGU_';
	$remoteip = $_SERVER ['REMOTE_ADDR'];
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	// Form info
	$first = $_POST ["first"];
	$last = $_POST ["last"];
	$response = $_POST ["g-recaptcha-response"];
	// Curl Request
	$curl = curl_init ();
	curl_setopt ( $curl, CURLOPT_URL, $url );
	curl_setopt ( $curl, CURLOPT_POST, true );
	curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $curl, CURLOPT_POSTFIELDS, array (
			'secret' => $secret,
			'response' => $response,
			'remoteip' => $remoteip 
	) );
	$curlData = curl_exec ( $curl );
	curl_close ( $curl );
	// Parse data
	$recaptcha = json_decode ( $curlData, true );
	if ($recaptcha ["success"]) {
		if (empty ( $_POST ["mail"] )) {
			$mailErr = "mail is required";
		} else {
			$mail = test_input ( $_POST ["mail"] );
			if (! filter_var ( $mail, FILTER_VALIDATE_EMAIL )) {
				$mailErr = "Invalid email format";
			} else {
				$querry = "SELECT email FROM users WHERE email = '" . $mail . "'";
				$result = mysqli_query ( $conn, $querry );
				if (mysqli_num_rows ( $result ) > 0) {
					$mailErr = "this mail adress is alraidy registerd.";
				}
			}
		}
		if (empty ( $_POST ["pass"] )) {
			$passErr = "pass is required";
		} else {
			$pass = test_input ( $_POST ["pass"] );
		}
		if ($_POST ["pass1"] != $pass) {
			$pass1Err = "passwords do not match";
		} else {
			$pass1 = test_input ( $_POST ["pass1"] );
		}
		
		if ($mailErr == "" && $passErr == "" && $pass1Err == "") {
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
			$query = "INSERT INTO users (username, email, password) VALUES ('" . $username . "', '" . $mail . "', '" . password_hash ( $pass, PASSWORD_DEFAULT ) . "')";
			if (mysqli_query ( $conn, $query )) {
				header ( 'location: login.php' );
				;
			}
		}
	}
} else if (isset ( $_POST ['login'] )) {
	if (empty ( $_POST ["mail"] )) {
		$mailErr = "mail is required";
	} else {
		$mail = test_input ( $_POST ["mail"] );
		if (! filter_var ( $mail, FILTER_VALIDATE_EMAIL )) {
			$mailErr = "Invalid email format";
		}
	}
	if (empty ( $_POST ["pass"] )) {
		$passErr = "pass is required";
	} else {
		$pass = test_input ( $_POST ["pass"] );
	}
	if ($mailErr == "" && $passErr == "") {
		$query = "SELECT ID, password FROM users WHERE email = '" . $mail . "'";
		$result = mysqli_query ( $conn, $query );
		if (mysqli_num_rows ( $result ) > 0) {
			while ( $row = mysqli_fetch_assoc ( $result ) ) {
				if (password_verify ( $pass, $row ["password"] )) {
					$_SESSION ['userId'] = $row ["ID"];
					header ( 'location: ../' );
				} else {
					$passErr = "password incorrect. <a onclick=\"location.href='forgotPassword.php'\">forgot password</a>?";
				}
			}
		} else {
			$mailErr = "user not found. <a onclick=\"location.href='signup.php'\">Sign up</a>?";
		}
	}
} else {
	$globalErr = "form not submitted yet";
}
function test_input($data) {
	$data = trim ( $data );
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data );
	return $data;
}

?>