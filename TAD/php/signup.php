<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>take a dare</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="apple-touch-icon" href="../img/appiconTAD.png">
<link rel="apple-touch-startup-image" href="../img/splashScreen.png">
<link href="../css/register.css?v1" rel="stylesheet">
<link href="../css/style.css?v1" rel="stylesheet">
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<script>
    function captchaSubmit(data) {
        document.getElementsByName("register")[0].submit();
    }
</script>
</head>
<body>
	<div class="register container">
		<h1 class="title">Take a dare</h1>
		
		<h1 class="welcome">Welcome</h1>
		<h2 class="signin">Sign up to perform some quality dares.</h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="register">
			<input type="hidden" name="registerU" value="1" />
			<input type="text" placeholder="Email" name="mail" value="<?php echo $mail;?>">
			<hr class="<?php if($mailErr != ""){echo 'red';}else if($globalErr == ""){echo 'green';} ?>">
			<?php if($mailErr != ""){?><error><?php echo $mailErr; ?></error><?php } ?>
			<input type="password" placeholder="Password" name="pass" value="<?php echo $pass;?>">
			<hr class="<?php if($passErr != ""){echo 'red';}else if($globalErr == ""){echo 'green';} ?>">
			<?php if($passErr != ""){?><error><?php echo $passErr; ?></error><?php } ?>
			<input type="password" placeholder="Repeat password" name="pass1" value="<?php echo $pass1;?>">
			<hr class="last <?php if($pass1Err != ""){echo 'red';}else if($globalErr == ""){echo 'green';} ?>">
			<?php if($pass1Err != ""){?><error><?php echo $pass1Err; ?></error><?php } ?>
			<button class="g-recaptcha" data-sitekey="6LckzSwUAAAAAMAVeVzXdGNArbJifYHtx4lI2B88" data-callback="captchaSubmit" >Register</button>
		</form>
		<p id="login">
			Alraidy have an account? <a onclick="location.href='login.php'">Log in</a>
		</p>
	</div>
</body>
</html>

