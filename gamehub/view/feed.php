<?php
	//start session management
	session_start();
	//provide the value of the $title variable for this page
	$title = "feed";

	//retrieve the header
	require('header.php');
?>
<div class="wrapper">
  <div class="profile">
		<?php
		if(isLogged()) {
			print('<div class="profile-box">
	      <div class="username-wrapper">
	        <div id="user-image">
	          <img src="http://www.frackfeed.com/wp-content/uploads/2016/08/donaldtrump_fracking_meme.jpg" width="100%" height="100%">
	        </div>
	        <div id="user-name">
					' . $_SESSION['user'] . '

	        </div>
	      </div>

	      <div class="user-stats">
	        <div>
	          <div>Videos</div></br>
	          <div>#</div>
	        </div>
	        <div>
	          <div>Followers</div></br>
	          <div>#</div>
					</div>
	        <div>
						<div>Followed</div></br>
	          <div>#</div>
	        </div>
				</div>
			</div>');
		} else {
			print("<div class='signup-box'>
							<h3> Welcome</br> Please login</h3>
							<button class='profile-login'><a href='login.php'>Login</a></button>
							</div>");
		}
		?>

	</div>

  <div class ="feed">
    <div class="feed-item">
      <div class="feed-video">
        <video src="../videos\720.mp4" width="100%"></video>
      </div>
      <div class="description-wrapper">
        <div class="feed-user">
          <div class="description-user">Link182</div>
        </div>
        <div class="feed-description">
          <p>Lul this is a really cool description</p>
        </div>
      </div>
    </div>
  </div>
</div>

		<?php
    	//retrieve the footer
    	require('footer.php');
    ?>
