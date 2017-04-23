<?php
	//start session management
	session_start();

	//provide the value of the $title variable for this page
	$title = "About Us";

	//retrieve the header
	require('header.php');
?>
<div class="wrapper block">
  <div id="slides">
    <img class="imageSlides" src="..\images\CSGO_slide.png"
    style="width:100%">
    <img class="imageSlides" src="..\images\League_slide.png"
    style="width:100%">
    <img class="imageSlides" src="..\images\overwatch_slide.jpg"
    style="width:100%">
  </div>
  <div class="about-content">
    <h1>About Us</h1>
  </div>
</div>
<div class="wrapper">
	<div class="about-container">
		<div class="third-container">
	  	<h2>Our Vision</h2>

			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
			</br>
			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
			</br>
			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
			</br>
			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
		</div>
		<div class="third-container">
	  	<h2>Our Belief</h2>

			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
			</br>
			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
			</br>
			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
			</br>
			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
		</div>
		<div class="third-container">
	  	<h2>Our Gaming</h2>

			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
			</br>
			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
			</br>
			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
			</br>
			<p> SICK DESCRIPTION WHERE CAN I GET ONE</p>
		</div>
	</div>
</div>
  <?php
    //retrieve the footer
    require('footer.php');
  ?>
