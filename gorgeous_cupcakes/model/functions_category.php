<?php
	//create a function to retrieve all categories
	function get_categories()
	{
		global $conn;
		//query the database to select all data from the category table
		//count the number of rows in each category in the product table and save this data into a temporary column named 'catnum'
		$sql = 'SELECT category.*, COUNT(product.categoryID) AS catnum FROM category INNER JOIN product USING(categoryID) GROUP BY product.categoryID';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

	function update_category($categoryID, $categoryDescription, $categoryName)
	{
		//establishing the connection to the database
		global $conn;
		//sql value is set to update category information and connecting the values
		$sql = "UPDATE category SET categoryName = :categoryName, categoryDescription = :categoryDescription WHERE categoryID = :categoryID";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':categoryName', $categoryName);
		$statement->bindValue(':categoryDescription', $categoryDescription);
		$statement->bindValue(':categoryID', $categoryID);
		//result set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}

	function add_category($categoryName, $categoryDescription, $categoryID)
	{
		//establishing conection to database
		global $conn;
		//sql value is being set to insert product information and connecting the values
		$sql = "INSERT INTO category (categoryName, categoryDescription, categoryID) VALUES (:categoryName, :categoryDescription, :categoryID)";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':categoryName', $categoryName);
		$statement->bindValue(':categoryDescription', $categoryDescription);
		$statement->bindValue(':categoryID', $categoryID);
		//variable set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}
	//create a function to delete an existing category
	function delete_category($categoryID)
	{
		//establishing the connection to the database
		global $conn;
		//sql value is set to delete category information and connecting values
		$sql = "DELETE FROM category WHERE categoryID = :categoryID";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//value linked to the correct variable
		$statement->bindValue(':categoryID', $categoryID);
		//result set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}
	//create a function to retrieve a single category
	function get_category()
	{
		global $conn;

		//retrieve the categoryID from the URL
		$categoryID = $_GET['categoryID'];

		$sql = 'SELECT * FROM category WHERE categoryID = :categoryID';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':categoryID', $categoryID);
		$statement->execute();
		//use the fetch() method to retrieve a single row
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	}

	//create a function to retrieve data for the category dropdown menu
	function get_category_dropdown()
	{
		global $conn;

		$sql = 'SELECT * FROM category ORDER BY categoryID';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}
?>
