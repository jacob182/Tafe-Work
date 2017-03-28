<?php
	//start session management
	session_start();

	//provide the value of the $title variable for this page
	$title = "Signup";

	//retrieve the header
	require('header.php');
?>

<h1>Sign Up</h1>
<div class="login-container">

  <div id="login">
    <form action="" method="post">

      <div class="field-wrap">
        <label>
          Username*
        </label>
        <input type="text"/>
      </div>

      <div class="field-wrap">
        <label>
          Email Address*
        </label>
        <input type="email"/>
      </div>

      <div class="field-wrap">
        <label>
          Confirm Email Address*
        </label>
        <input type="email"/>
      </div>

      <div class="field-wrap">
        <label>
          Password*
        </label>
        <input type="password"/>
      </div>

      <div class="field-wrap">
        <label>
          Confirm Password*
        </label>
        <input type="password"/>
      </div>
      <button class="signupbtn"/>Sign Up</button>

    </form>

  </div>
</div>

<?php
  //retrieve the footer
  require('footer.php');
?>
