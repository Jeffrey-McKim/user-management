<?php
//connects to localhost, root, and the "demo" database

$connection = mysqli_connect("localhost", "root", "");
if(!$connection){
  echo "Failed to connect database";
}

$dbselect = mysqli_select_db($connection, "demo");
if(!$dbselect){
  echo "failed to connect database" . die(mysqli_error($connection));
}



?>
