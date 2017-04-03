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

	function add_member($email, $username, $password)
	{
		global $conn;
		$sql = "INSERT INTO members (email, username, password) VALUES (:email, :username, :password)";
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

	function login($username, $password)
		{
			global $conn;
			$sql = 'SELECT * FROM user WHERE username = :username AND password = :password';
			$statement = $conn->prepare($sql);
			$statement->bindValue(':username', $username);
			$statement->bindValue(':password', $password);
			$statement->execute();
			$result = $statement->fetchAll();
			$statement->closeCursor();
			$count = $statement->rowCount();
			return $count;
		}

		function retrieve_salt($username)
		{
			global $conn;
			$sql = 'SELECT * FROM user WHERE username = :username';
			$statement = $conn->prepare($sql);
			$statement->bindValue(':username', $username);
			$statement->execute();
			$result = $statement->fetch();
			$statement->closeCursor();
			return $result;
		}

		function login($username, $password)
	{
		global $conn;
		$sql = 'SELECT * FROM user WHERE username = :username AND password = :password';
		$statement = $conn->prepare($sql);
		$statement->bindValue(':username', $username);
		$statement->bindValue(':password', $password);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		$count = $statement->rowCount();
		return $count;
	}
		?>
