<?php

if(isset($_POST['submit']))
{
  $name = $_FILES['file']['name'];
  $temp = $_FILES['file']['tmp_name'];

  move_uploaded_file($temp,"uploaded/".$name);
}

if (isset($_POST['submit']))
{
    $name = $_FILES['file']['name'];
    $tmep = $_FILES['file']['tmp_name'];

    move_uploaded_file($temp,"uploaded/".$name);
    $url = "localhost/gamehub/video/$name"
    mysql_query("INSERT INTO 'videos' VALUE ('','$name','$url')")
}

if(isset($_POST['submit']))
{echo"<br />".$name."has been uploaded";
} else{
  echo"nope";
}
 ?>
