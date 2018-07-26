<?php
require_once('connect.php');
//print_r($_GET);
$key = $_GET['key']; //get the key and ID from the URL, then store them into a variable
$id = $_GET['id'];

$sql = "SELECT * FROM `usermanagement` WHERE id=$id AND verification_key='$key' AND active=0"; //select an unactive user who's ids and keys are matching 
$res = mysqli_query($connection, $sql); 
$count = mysqli_num_rows($res); //if the connection works then count will be equal to 1

if($count == 1) { //if count is equal to one run this code
  $usql= "UPDATE `usermanagement` SET active=1 WHERE id=$id"; //updates active from 0 to 1
  $ures = mysqli_query($connection, $usql); //if connection works
  if($ures){ //run this 
    $smsg = "Account activatied Successfully";
  }else{ //this would mean there is a failure to connect to the database
    $fmsg = "Account Activation Failed Contact Support";
  }
}else{ //this would mean the user information has been deleted
$fmsg = "this link has expired, please try again";
}  

?>
<html>
<head>
<title>User Registration Script in PHP</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
 
<link rel="stylesheet" href="styles.css" >

 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
  
  <div class="container">
     <?php if(isset($smsg)){ ?> <div class="alert alert-success" role="alert"> <a class="btn btn-primary" href="http://localhost/user-management/login.php" role="button">LOGIN</a><?php echo $smsg; ?> </div> <?php } ?> <!--Displays failure message -->
       <?php if(isset($fmsg)){ ?> <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div> <?php } ?> <!-- Displays success message -->
</div>
  
</body>
</head>
</html>