<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_category.php');

	//retrieve the data that was entered into the form fields using the $_POST array
	$categoryID = $_POST['categoryID']; //the value in the hidden form field
	$categoryName = $_POST['categoryName'];
	$categoryDescription = $_POST['categoryDescription'];

	//START SERVER-SIDE VALIDATION
	//check if all required fields have data
	if (empty($categoryName) || empty($categoryDescription) || empty($categoryID))
	{
		//if required fields are empty initialise a session called 'error' with an appropriate user message
		$_SESSION['error'] = 'All * fields are required.';
		//redirect to the category_update_form page to display the message
		header("location:../view/category_update_form.php");
		exit();
	}

	//END SERVER-SIDE VALIDATION

		//create user messages
		if($result)
		{
			//if category is successfully added, create a success message to display on the category page
			$_SESSION['success'] = 'Category successfully updated.';
			//redirect to category.php
			header('location:../view/category.php');
		}
		else
		{
			//if product is not successfully added, create an error message to display on the add category page
			$_SESSION['error'] = 'An error has occurred. Please try again.';
			//redirect to category_add_form.php
			header('location:../view/category.php');
		}
?>
