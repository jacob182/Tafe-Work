<?php
    //start session management
    session_start();
    //connect to the database
    require('../model/database.php');
    //retrieve the functions
    require('../model/function_members.php');
?>

<?php
    //retrieve the  details into the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  if (empty($email))
  {
    $_SESSION['error'] = 'All * fields are required.';
    header("location:../view/edit_profile.php");
    exit();
  }

  else {
  $result = edit_profile($email, $username);
    if($result) {
      $_SESSION['success'] = 'profile successfully updated';
      header("location:../view/edit_profile.php");
    }
}