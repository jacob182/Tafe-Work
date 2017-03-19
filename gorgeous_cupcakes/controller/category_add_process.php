<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
  require('../model/functions_category.php');

	//retrieve the data that was entered into the form fields using the $_POST array
	$categoryName = $_POST['categoryName'];
	$categoryDescription = $_POST['categoryDescription'];
	$categoryID = $_POST['categoryID'];

	//START SERVER-SIDE VALIDATION
	//check if all required fields have data
	if (empty($categoryName) || empty($categoryDescription) || empty($categoryID))
	{
		//if required fields are empty initialise a session called 'error' with an appropriate user message
		$_SESSION['error'] = 'All * fields are required.';
		//redirect to the category_add_form page to display the message
		header("location:../view/category_add_form.php");
		exit();
	}
		//END SERVER-SIDE VALIDATION

		//call the add_category function
		$result = add_category($categoryName, $categoryDescription, $categoryID);

		//create user messages
		if($result)
		{
			//if product is successfully added, create a success message to display on the products page
			$_SESSION['success'] = 'Category successfully added.';
			//redirect to products.php
			header('location:../view/products.php');
		}
		else
		{
			//if product is not successfully added, create an error message to display on the add product page
			$_SESSION['error'] = 'An error has occurred. Please try again.';
			//redirect to products.php
			header('location:../view/products.php');
		}
?>
