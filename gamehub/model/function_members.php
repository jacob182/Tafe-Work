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

	function add_member($email, $username, $password, $salt)
	{
		global $conn;
		$sql = "INSERT INTO members (email, username, password, salt) VALUES (:email, :username, :password, :salt)";
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':email', $email);
		$statement->bindValue(':username', $username);
		$statement->bindValue(':password', $password);
		$statement->bindValue(':salt', $salt);
		//database executes statement
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}

		function retrieve_salt($username)
		{
			global $conn;
			$sql = 'SELECT * FROM members WHERE username = :username';
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
		   $sql = 'SELECT * FROM members WHERE username = :username AND password = :password';
		  $statement = $conn->prepare($sql);
		  $statement->bindValue(':username', $username);
			$statement->bindValue(':password', $password);
		  $statement->execute();
		  $result = $statement->fetchAll();
		  $statement->closeCursor();
			$count = $statement->rowCount();

		  return $count;
		}

		function isLogged() {
		  if(isset($_SESSION['user'])) {
		    return true;
		  }
		  return false;
		}

		function get_member($username)
	{
  	global $conn;
  	$sql = "SELECT * FROM members WHERE username = :username";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':username', $username);
  	$statement->execute();
  	$result = $statement->fetch();
  	$statement->closeCursor();
  	return $result;
	}

		function edit_profile($email, $username)
	{
		//establishing the connection to the database
		global $conn;
		//sql value is set to update product information and connecting the values
		$sql = "UPDATE members SET email = :email WHERE username = :username";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//values binded to the parameters
		$statement->bindValue(':email', $email);
		$statement->bindValue(':username', $username);
		//result set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}

	function delete_profile()
	{
		//establishing the connection to the database
		global $conn;
		//sql value is set to delete user information and connecting values
		$sql = "DELETE FROM members WHERE username = :username";
		//preparing for sql query
		$statement = $conn->prepare($sql);
		//value linked to the correct variable
		$statement->bindValue(':username', $username);
		//result set and executed
		$result = $statement->execute();
		//some drivers require this function to create an efficient connection to the server
		$statement->closeCursor();
		//result is returned to the database
		return $result;
	}
		?>
