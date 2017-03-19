<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	require('../model/functions_category.php');
?>

<?php
	//retrieve the productID from the URL
	$categoryID = $_GET['categoryID'];

	//call the delete_product() function
	$result = delete_category($categoryID);

	//create user messages
	if($result){
		//if product is successfully added, create a success message to display on the products page
		$_SESSION['success'] = 'category successfully deleted.';
		//redirect to products.php
		header('location:../view/products.php');
	}else{
		//if product is not successfully added, create an error message to display on the product page
		$_SESSION['error'] = 'An error has occurred. Please try again.';
		//redirect to product_form.php
		header('location:../view/products.php');
	}
?>
