<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/function_members.php');
?>

<?php
	//retrieve the registration details into the form
  $username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

//validation

if (strlen($password) < 7)
	{
		$_SESSION['error'] = 'Password must be 7 characters or more.';
		header("location:../view/signup.php");
		exit();
	}

elseif (empty($email) || empty($username) || empty($password))
{
	$_SESSION['error'] = 'All * fields are required.';
	header("location:../view/signup.php");
	exit();
}

elseif (!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
  	$_SESSION['error'] = 'Please enter a valid email address.';
  	header("location:../view/signup.php");
    exit();
  }

$count = count_username($username);

    if($count > 0)
  	{
  		$_SESSION['error'] = 'Username taken. Please retry.';
  		header("location:../view/signup.php");
  		exit();
  	}
		//generate a random salt value using the MD5 encryption method and the PHP uniqid() and rand() functions
		    $salt = md5(uniqid(rand(), true));
		    //encrypt the password (with the concatenated salt) using the SHA256 encryption method and the PHP hash() function
		    $password = hash('sha256', $password.$salt); //generate the hashed password with the salt value

    //call the add_user() function
    	$result = add_member($email, $username, $password, $salt);

    	//create user messages
    	if($result)
    	{
    		//if product is successfully added, create a success message
    		$_SESSION['success'] = 'Thank you for creating an account. Please login.';
    		//redirect to products.php
    		header('location:../view/login.php');
    	}
    	else
    	{
    		//if product is not successfully added, create an error message
    		$_SESSION['error'] = 'An error has occurred. Please try again.';
				var_dump($result);
    		//redirect to signup.php
    		header('location:../view/signup.php');
    	}
    ?>
