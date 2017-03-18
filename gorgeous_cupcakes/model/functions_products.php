<?php
	//create a function to retrieve all products
	function get_products()
	{
		global $conn;
		//query the database to select all data from the product table
		$sql = 'SELECT * FROM product ORDER BY productName LIMIT 0,6';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

	//create a function to retrieve all products in a specific category
	function get_products_by_category()
	{
		global $conn;

		//retrieve the categoryID from the URL
		$categoryID = $_GET['categoryID'];

		//query the database to select all data from the product table
		$sql = 'SELECT * FROM product WHERE categoryID = :categoryID ORDER BY productName';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':categoryID', $categoryID);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

	//create a function to retrieve a single product
	function get_product()
	{
		global $conn;

		//retrieve the productID from the URL
		$productID = $_GET['productID'];

		//query the database to select all data from the product table
		$sql = 'SELECT * FROM product INNER JOIN category USING(categoryID) WHERE productID = :productID ORDER BY productName';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':productID', $productID);
		//statement executed
		$statement->execute();
		//use the fetch() method to retrieve a single row
		$result = $statement->fetch();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}

	//create a function to add a new product
	function add_product($productName, $productDescription, $productPrice, $categoryID)
	{
		//establishing conection to database
		global $conn;
		//sql value is being set to insert product information and connecting the values
		$sql = "INSERT INTO product (productName, productDescription, productPrice, categoryID) VALUES (:productName, :productDescription, :productPrice, :categoryID)";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':productName', $productName);
		$statement->bindValue(':productDescription', $productDescription);
		$statement->bindValue(':productPrice', $productPrice);
		$statement->bindValue(':categoryID', $categoryID);
		//variable set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}

	//create a function to add a new product with a photo
	function add_product_with_photo($productName, $productDescription, $productPrice, $newPhotoName, $categoryID)
	{
		//establishing connection to the databse
		global $conn;
		//sql value is set to insert product information and connecting the values
		$sql = "INSERT INTO product (productName, productDescription, productPrice, productPhoto, categoryID) VALUES (:productName, :productDescription, :productPrice, :productPhoto, :categoryID)";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':productName', $productName);
		$statement->bindValue(':productDescription', $productDescription);
		$statement->bindValue(':productPrice', $productPrice);
		$statement->bindValue(':productPhoto', $newPhotoName);
		$statement->bindValue(':categoryID', $categoryID);
		//result set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}


	//create a function to update an existing product
	function update_product($productID, $productName, $productDescription, $productPrice, $categoryID)
	{
		//establishing the connection to the database
		global $conn;
		//sql value is set to update product information and connecting the values
		$sql = "UPDATE product SET productName = :productName, productDescription = :productDescription, productPrice = :productPrice, categoryID = :categoryID WHERE productID = :productID";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':productName', $productName);
		$statement->bindValue(':productDescription', $productDescription);
		$statement->bindValue(':productPrice', $productPrice);
		$statement->bindValue(':categoryID', $categoryID);
		$statement->bindValue(':productID', $productID);
		//result set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}

	//create a function to update an existing product with a photo
	function update_product_with_photo($productID, $productName, $productDescription, $productPrice, $newPhotoName, $categoryID)
	{
		//establishing the conection to the database
		global $conn;
		//sql value is set to update product information and connecting the values
		$sql = "UPDATE product SET productName = :productName, productDescription = :productDescription, productPrice = :productPrice, productPhoto = :productPhoto, categoryID = :categoryID WHERE productID = :productID";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':productName', $productName);
		$statement->bindValue(':productDescription', $productDescription);
		$statement->bindValue(':productPrice', $productPrice);
		$statement->bindValue(':productPhoto', $newPhotoName);
		$statement->bindValue(':categoryID', $categoryID);
		$statement->bindValue(':productID', $productID);
		//result set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}


	//create a function to delete an existing product
	function delete_product($productID)
	{
		//establishing the connection to the database
		global $conn;
		//sql value is set to delete product information and connecting values
		$sql = "DELETE FROM product WHERE productID = :productID";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//value linked to the correct variable
		$statement->bindValue(':productID', $productID);
		//result set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}
?>
