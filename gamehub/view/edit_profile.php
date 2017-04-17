<?php
	//start session management
	session_start();
	//provide the value of the $title variable for this page
	$title = "Profile Edit";
	require('../model/database.php');
	require('header.php');
	$result = get_member($_SESSION['user']);

?>
<h1> Edit Profile </h1>
<div class="wrapper">
	<form action="../controller/edit_profile_process.php" method="post" class="edit-profile-container">
		<div class="field-wrap">
			<label class="edit-profile-heading">Username</label></br>
			<span class="edit-username">Link182</span>
			<input type="hidden" name="username" value="<?php echo $_SESSION['user'] ?>" />
		</div>

		<div class="field-wrap">
			<label class="edit-profile-heading" for="edit-email">Email</label>
		   <input class="edit-email-input" id="edit-email" name="email" type="text" value="<?php echo $result['Email'] ?>">
		</div>
		<div class="field-wrap">
		  <label class="edit-profile-heading">Password</label>
			<input class="edit-email-input" id="edit-password" name="password" type="text" value="<?php echo $_SESSION['user'] ?>">
		</div>
		<button class="profilebtn"/>Save Changes</button>
	</form>

</div>
<?php
	//retrieve the footer
	require('footer.php');
?>
