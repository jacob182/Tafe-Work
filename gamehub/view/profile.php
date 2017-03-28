<?php
	//start session management
	session_start();

	//provide the value of the $title variable for this page
	$title = "Profile";

	//retrieve the header
	require('header.php');
?>

<h1>Profile</h1>

  <div class="profile-header">
    <div class="profile-image">
    </div>
    <div class="profile-description">
      <div class="profile-name">
      Link182
      </div>
    </div>
  </div>
  <?php
    //retrieve the footer
    require('footer.php');
  ?>
