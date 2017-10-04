<link href="css/profile.css?v1" rel="stylesheet">
<script>
 function openNewEditDialog(){
	
 }
 function follow(clicked){
	 var action = ((clicked.hasAttribute("active")) ? "follow" : "unfollow");
     if (window.XMLHttpRequest) {
    	    // code for IE7+, Firefox, Chrome, Opera, Safari
    	    xmlhttp=new XMLHttpRequest();
    	 } else {  // code for IE6, IE5
    	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    	 }
    	  xmlhttp.onreadystatechange=function() {
    	    if (this.readyState==4 && this.status==200) {
        	  //  alert(this.responseText);
    	    }
    	  }
    	  xmlhttp.open("GET","php/DB.php?action=" + action + "&id=" + clicked.className,true);
    	  xmlhttp.send();
    	
 }
</script>
<options><optionF 
 id="me" onclick="optionClicked(this);" class="selected">me</optionF><optionF 
 id="myFollowers" onclick="optionClicked(this);" >followers</optionF><optionF 
 id="myFollowing" onclick="optionClicked(this);">following</optionF><optionF
 id="edit" onclick="openNewEditDialog();">edit</optionF></options>
<?php
	$query = "SELECT username, balance FROM users WHERE ID = '" . $ID . "'" ;
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			$username = $row["username"];
			$balance = $row["balance"];
		}	
	}
	?>
<div class="content me">
<img id="profpic" src="img/profpics/<?php echo $ID; ?>.png">
<p>
<?php echo $username ?><br>
balance: <?php echo $balance ?> 
</p>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"   enctype="multipart/form-data">
      <input type="file" name="profpic">
      <input type="submit" name="uploadProfPic" value="upload" />
    </form>
</div>
<div class="content myFollowers hidden">
<?php
	$query = "SELECT username, ID FROM users WHERE ID in (SELECT followerID FROM following WHERE followingID = '" . $ID . "')" ;
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			$followerusername = $row["username"];
			$followerid = $row["ID"];
			?><user><img class="followerpic" src="img/profpics/<?php echo $followerid ?>.png">
			<name><?php echo $followerusername;?></name>
			<favorite-star onclick="follow(this)" class="<?php
				echo $followerid . '"';
				$query = "SELECT followingID FROM following WHERE followerID = '" . $ID . "' AND followingID = '" . $followerid . "'" ;
				$following = mysqli_query($conn, $query);	
				if(mysqli_num_rows($following) > 0){
					echo "active";
				}
				?>>
			</favorite-star></user>
			<?php
		}
	}
?>
</div>
<div class="content myFollowing hidden">
<?php
	$query = "SELECT username, ID FROM users WHERE ID in (SELECT followingID FROM following WHERE followerID = '" . $ID . "')" ;
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			$followerusername = $row["username"];
			$followerid = $row["ID"];
			?><user><img class="followerpic" src="img/profpics/<?php echo $followerid ?>.png">
			<name><?php echo $followerusername;?></name>
			<favorite-star onclick="follow(this)" class="<?php echo $followerid; ?>" active>
			</favorite-star></user>
			<?php
		}
	}
?>
</div>
<a href="index.php?logout='1'" id="logout">log out</a>