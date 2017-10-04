<head>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<style>
@font-face{ 
	font-family: 'existence';
	src: url('../fonts/existence/Existence-Light.eot');
	src: url('../fonts/existence/Existence-Light.eot?iefix') format('eot'),
	     url('../fonts/existence/Existence-Light.woff') format('woff'),
	     url('../fonts/existence/Existence-Light.ttf') format('truetype'),
	     url('../fonts/existence/Existence-Light.svg#webfont') format('svg');
    font-weight: normal;
    font-style: normal;
}
html, body{
	margin:0;
	padding:0;
	font-family: existence;
	background-color:#929AAA;
}
div.container{
	background-color:#FFF;
	box-sizing:border-box;
	margin:auto;
	margin-top:100px;
	position:relative;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	
}
div.container.hireMe{
	width:200px;
	height:270px;
	overflow:hidden;
}
.hireMe img{
	height: 250px;
	width: 100px;
	margin-left: -10px;
	position: absolute;
	filter: contrast(70%) brightness(1.4) ;
	left: 5px;
}
.hireMe .floor{
	width: 232px;
    height: 100px;
    background-color: rgb(16, 178, 4);
    position: absolute;
    bottom: -34px;
    left: 9px;
    z-index: 0;
    transform: rotate(-30deg);
}
.hireMe .content{
	right:0;
	position: absolute;
	width:100%;
	text-align:right;
	top: 0;
	margin-top: 5px;
	z-index:1;
}

.content h1{
	margin:0px;
	margin-right:5px;
	margin-left:50px;
	line-height: 30px;
	color:#00b22d;
	margin-top:49px;
}
.content p{
	margin:0px;
	margin-right:5px;
	margin-left: 70px;
	margin-top:70px;
	font-size: 90%;
	color: #5d626c;
}
.hireMe button{
	margin:5px;
	font-size:15px;
	border-radius:20px;
	right:0;
	top:0;
	height:40px;
	width:120px;
	transition: .2s;
	transition-delay:.05s;
	background-color:rgba(0,0,0,0);
	border: 2px solid #00b22d;
	color: #00b22d;
	box-sizing:border-box;
	position:absolute;
	z-index:4;
}
.hireMe button:hover{
	
	background-color:#00b22d;
	color:#FFFFFF;
}

.hireMe.clicked button{
	width:40px;
	background-color:rgba(0,0,0,0);
	border: 2px solid #FFFFFF;
	color: #FFFFFF;
	box-sizing:border-box;
	transition-delay:.1s;
}
.hireMe.clicked button:hover{
	background-color:#FFFFFF;
	color:#00b22d;
	transition-delay:.1s;
}
.hireMe button:active{
	border:none;
	box-shadow: inset 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.hireMe .itemEdit{
	position:absolute;
	width:100%;
	height:3px;
	content:"";
	left:0;
	bottom:0;
	background-color:#00b22d;
	transition:.4s;
	z-index:3;
	overflow:hidden;
	text-align:left;
	color:white;
	box-sizing:border-box;
}
.hireMe .itemEdit p{
	margin-top:85px;
	width:110px;
	margin-bottom:5px;
	font-size:14px;
}
.hireMe .itemEdit #rating{
	color:#FFF;
}
.hireMe .itemEdit  img{
	width:20px;
	height:20px;
	margin-right:5px;
}
.hireMe .itemEdit  img:hover{
	box-shadow: inset 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.hireMe.clicked .itemEdit{
	height:100%;
}
</style>
<script>
function hireMe(button){
	var div = document.getElementsByClassName('hireMe container ')[0];
	if (div.className != 'hireMe container clicked'){
		div.className = 'hireMe container clicked';
		setTimeout(function(){ button.innerHTML = 'X';}, 200);
	}else{
		div.className = 'hireMe container';
		setTimeout(function(){ button.innerHTML = 'hire me!';}, 100);
	}
}
var e=3,t=!0,r=1
function getRating(span){
	var n="";
	if(5>r){
		for(i=0;e>i;i++){
			n+="<i class='fa fa-star'></i>";
		}
		for(t&&(n+="<i class='fa fa-star-half-o'></i>"),i=0;r>i;i++){
			n+="<i class='fa fa-star-o'></i>";
		}
	}
	span.innerHTML = n;
}
</script>
</head>

<body onload="getRating(document.getElementById('rating'));">

<div class="hireMe container">
		<button onclick="hireMe(this)">hire me!</button>
		<div class="content">	
			<img src="meLeaning.svg">
			<h1>Apostel Sam</h1>
			<p>Graphic- & Webdesign</p>
		</div>
		<div class="floor"></div>
		<div class="itemEdit">
			<p>hire me through</p>
			<a href="https://www.fiverr.com/samapostel"><img src="fiverWhite.png"><span id="rating"></span></a>	
		</div>
</div>

</body>