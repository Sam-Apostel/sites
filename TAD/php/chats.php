<link href="css/chats.css?v1" rel="stylesheet">
<script>
function openNewChatDialog(){
	document.getElementById('newChat').style.display = "block";
}
function closeModal(){
	document.getElementById('newChat').style.display = "none";
}
</script>
<options><optionF 
 id="activity" onclick="optionClicked(this);" class="selected">activity</optionF><optionF 
 id="dares" onclick="optionClicked(this);">dares</optionF><optionF 
 id="proofs" onclick="optionClicked(this);">proofs</optionF><optionF 
 id="new" onclick="openNewChatDialog();">new</optionF></options>
<?php
	$query = "SELECT * FROM conversations WHERE userID0 = '".$ID."' OR  userID1= '".$ID."' OR userID2 = '".$ID."' OR userID3 = '".$ID."' OR userID4 = '".$ID."' OR userID5 = '".$ID."' OR userID6 = '".$ID."' OR userID7 = '".$ID."'" ;
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
			?>
			<chathead id="chat<?php echo $row["ID"]; ?>"> 
			<?php 
				$j = 0;
				for ($i = 0; $i < count($row); $i++) {
					if($row["userID".$i] != $ID){
						$userQuery = "SELECT * FROM users WHERE ID = '" . $row["userID".$i] . "'" ;
						$userResult = mysqli_query($conn, $userQuery);
						if(mysqli_num_rows($userResult) > 0){
							$userResultID = $userResult;
							$userResultName = $userResult;
							
							while($userID = mysqli_fetch_assoc($userResultID)) {
								?>
								<img src="img/profpics/<?php echo $userID['ID']; ?>.png" class="<?php echo $j++; ?>">
							<?php 
							}
							
								
						
						}
					}
				} 
			?>
			<name>unnamed group</name>
			<button onclick="alert('ID = <?php echo $row["ID"]; ?>');"></button>
			</chathead>
			<?php
		}	
	}	
	?>
<div id="newChat" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close" onclick="closeModal();">&times;</span>
      <h2>New chat</h2>
    </div>
    <div class="modal-body">
    <?php
		$query = "SELECT username, ID FROM users WHERE ID in (SELECT followingID FROM following WHERE followerID = '" . $ID . "')" ;
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				$followerusername = $row["username"];
				$followerid = $row["ID"];
				?><img class="followerpic" src="img/profpics/<?php echo $followerid; ?>.png">
				<?php echo $followerusername; ?>
				<br>
				<?php
			}
		}
	?>
    </div>
    <div class="modal-footer" onclick="">
      <h3>create chat</h3>
    </div>
  </div>
</div>
<!-- 

button to cycle between sorting modes 
	1. get all open chat's from db in order of last activity 
	2. get all open dares from db in order of shortest time left
	3. get all open proofs from db in order of last shortest time left 

display them:
	get ID from other player
		display img and name
	get dares from short to long time
		display first 2 + their time
  -->