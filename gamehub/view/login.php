<?php
	//start session management
	session_start();

	//provide the value of the $title variable for this page
	$title = "Login";

	//retrieve the header
	require('header.php');
?>
<h1>Log In</h1>
<div class="login-container">
  <div id="login">
    <form action="../controller/login_process.php" method="post">
      <div class="field-wrap">
        <label>Email Address*</label>
        <input type="email" id="email" placeholder="Enter your email*"/>
      </div>
      <div class="field-wrap">
        <label>Password*</label>
        <input type="password" id="password" placeholder="Enter your password*" required/>
      </div>
      <button class="loginbtn"/>Log In</button>
    </form>
  </div>
</div>

<?php
  //retrieve the footer
  require('footer.php');
?>
