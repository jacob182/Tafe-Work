<?php
	//start session management
	session_start();
	//include authorisation management
	require('../controller/authorisation.php');
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_products.php');
	require('../model/functions_category.php');
	require('../model/functions_messages.php');

	//provide the value of the $title variable for this page
	$title = "Update Category";

	//retrieve the header
	require('header.php');
	//retrieve the navigation
	require('nav.php');
?>

<section id="main">
	<h2>Update Category</h2>

	<?php
		//retrieve the categoryID from the URL
		$categoryID = $_GET['categoryID'];

		//call user_message() function
		$message = user_message();
		//call the category() function
		$result = get_category();
	?>

	<!-- create a table to enter the new category data -->
	<!-- Note the use of HTML5 client-side form validation in the form fields -->
  <form action="../controller/category_update_process.php" method="post" enctype="multipart/form-data">
		<div>
			<label>Category Name* </label>
			<input id="categoryName" type="text" name="categoryName" value="<?php echo $result['categoryName'] ?>" required />
		</div>
		<div>
			<label>Description* </label>
			<textarea id="categoryDescription" name="categoryDescription" required /><?php echo $result['categoryDescription'] ?></textarea>
		</div>

		<div>
			<input type="submit" value="Update Category" />
		</div>
	</form>
</section> <!-- end main -->

<?php
	//retrieve the sidebar
	require('sidebar.php');
	//retrieve the footer
	require('footer.php');
?>
