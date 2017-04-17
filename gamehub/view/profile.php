<?php
	//start session management
	session_start();

	//provide the value of the $title variable for this page
	$title = "Profile";

	//retrieve the header
	require('header.php');
?>

<div class="profile-header">

	<div class="profile-stats">
		<ul>
			<li>13    <span>Videos</span></li>
			<li>1,354 <span>Followers</span></li>
			<li>32    <span>Following</span></li>
		</ul>
	</div>
	<figure class="profile-picture" style="background-image: url('https://scontent-syd2-1.xx.fbcdn.net/v/t1.0-9/16807604_1338285416194453_2148458595263937983_n.jpg?oh=3cdc78aadc6fa54f91660c3a1a38808d&oe=598816E7')"> </figure>
	<h1><?php echo $_SESSION['user'] ?></h1>
<button class="editbtn" onclick="location.href='edit_profile.php';">Edit Profile </button>

</div>

  <?php
    //retrieve the footer
    require('footer.php');
  ?>
