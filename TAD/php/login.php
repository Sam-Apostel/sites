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
<link href="../css/login.css?v1" rel="stylesheet">
<link href="../css/style.css?v1" rel="stylesheet">
</head>
<body>
	<div class="login container">
		<h1 class="title">Take a dare</h1>
		
		<h1 class="welcome">Welcome back,</h1>
		<h2 class="signin">Sign in to perform some quality dares.</h2>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input type="text" placeholder="Email" name="mail" value="<?php echo $mail;?>">
			<hr class="<?php if($mailErr != ""){echo 'red';}else if($globalErr == ""){echo 'green';} ?>">
			<?php if($mailErr != ""){?><error><?php echo $mailErr; ?></error><?php } ?>
			<input type="password" placeholder="Password" name="pass" value="<?php echo $pass;?>">
			<hr class="<?php if($passErr != ""){echo 'red';}else if($globalErr == ""){echo 'green';} ?>">
			<?php if($passErr != ""){?><error><?php echo $passErr; ?></error><?php } ?>
			<input type="submit" value="Login" name="login">
		</form>
		<p id="register">
			Don't have an account? <a onclick="location.href='signup.php'">Sign up</a>
		</p>
	</div>


<div itemscope itemtype='http://schema.org/Person' class='fiverr-seller-widget' >
     <a itemprop='url' href=https://www.fiverr.com/samapostel rel="nofollow" target="_blank" style='display: inline-block;'>
d:        <div class='fiverr-seller-content' id='fiverr-seller-widget-content-a18fc94f-8216-4b9a-918a-d4c88e683054' itemprop='contentURL' style='display: none;'>
        </div>
        
        
        <div id='fiverr-widget-seller-data' style='display: none;'>
            <div itemprop='name' >samapostel</div>
            <div itemscope itemtype='http://schema.org/Organization'><span itemprop='name'>Fiverr</span></div>
            <div itemprop='jobtitle'>Seller</div>
            <div itemprop='description'>19y/o web designer w/a passion for vector graphics & animations. Currently @university of Antwerp majoring in computer science. Ps.: The canncelled order on my reviews are due to exams and me not knowing of a vacation mode. Doubt if I can do what your task needs me to do? Just send me a message.</div>
        </div>
    </a>
</div>

f:<script id='fiverr-seller-widget-script-a18fc94f-8216-4b9a-918a-d4c88e683054' src='https://widgets.fiverr.com/api/v1/seller/samapostel?widget_id=a18fc94f-8216-4b9a-918a-d4c88e683054' data-config='{"category_name":"Graphic & Web - Design"}' async='true' defer='true'></script>
	<script>
	
		function e(){
			try{
				var n="Graphic & Web - Design";
				var i="<i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i>";
				var v="<div class='crop'><img src='../img/Fiver' class='fiverr-profile-img'></img>             <div class='overlay'></div></div>             <img src='https://d2nb1f6l8b7ky0.cloudfront.net/fiverr_icon.png' class='fiverr-icon'> </img>             <div class='fiverr-seller-text'> Seller </div>             <div class='fiverr-seller-category'> "+n+" </div>             <div class='fiverr-rating-stars' id='fiverr-rating-stars-"+profileId+"' style='display: none'> "+i+" </div>             <div class='check-gigs-btn'>Check out my Gigs</div>";
				d.innerHTML=v,r();
				var u=d.parentNode;
				if("undefined"!=typeof u){
					var g=u.href;
					"undefined"!=typeof g&&(u.href=g.split("?")[0])
				}
			}catch(m){
				console.log("Fiverr Badge Error: "+m.message)
			}
		}
		function r(){
			var e=document.getElementsByTagName("head")[0],t=Math.floor(1e3*Math.random())+1;
			n(e,"https://d2nb1f6l8b7ky0.cloudfront.net/css/seller_widget.css?v="+t.toString(),function(){d.style.display="inline-block"}),n(e,"//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css",function(){var e=document.getElementById("fiverr-rating-stars-"+profileId);e.style.display="block"})
		}
		function n(e,t,r){
			var n=/Firefox/.test(navigator.userAgent);
			if(n){
				var i=document.createElement("style");
				i.textContent='@import "'+t+'"';
				var a=setInterval(function(){try{i.sheet.cssRules,r(),clearInterval(a)}catch(e){}},10);
				e.appendChild(i)
			}else{
				var s=document.createElement("link");
				s.setAttribute("rel","stylesheet"),s.setAttribute("type","text/css"),s.setAttribute("href",t),s.onload=function(){r()},s.addEventListener&&s.addEventListener("load",function(){r()},!1),s.onreadystatechange=function(){var e=s.readyState;("loaded"===e||"complete"===e)&&(s.onreadystatechange=null,r())};
				var o=document.styleSheets.length,l=setInterval(function(){document.styleSheets.length>o&&(r(),clearInterval(l))},10);
				e.appendChild(s)
			}
		}
		var a=true;
		var s=3;
		var o=true;
		var l=1;
		var profileId="a18fc94f-8216-4b9a-918a-d4c88e683054";
		var d=null;
		var f=null;
		document.addEventListener("DOMContentLoaded",function(){a||e()}),e()

	</script>
</body>
</html>