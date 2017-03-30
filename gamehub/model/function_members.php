<?php
	//create a function to retrieve the total number of matching usernames
	function count_username($username)
	{
		global $conn;
		$sql = 'SELECT * FROM members WHERE username = :username';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':username', $username);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		$count = $statement->rowCount();
		return $count;
	}

	function add_member($email, $userName, $password)
	{
		global $conn;
		$sql = "INSERT INTO user (email, username, password) VALUES (:email, :username, :password)";
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':email', $email);
		$statement->bindValue(':username', $username);
		$statement->bindValue(':password', $password);
		//database executes statement
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}
