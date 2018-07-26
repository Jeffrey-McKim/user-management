<?php
//  displays the input data of a logged in user onto a blank page, in no particular order. Still in production. Next I would create a dynamically generated table with bootstrap to beautify and and organize the userinput data

session_start();

require_once('../connect.php');
if(!isset($_SESSION['username']) & empty($_SESSION['username'])){
  header('location: ..\login.php');
}

$username = $_SESSION['username'];

  $sql = "SELECT * FROM `expensedata`"; //selects everything from expense data and checks the connection to MySql database
  $result = mysqli_query($connection, $sql);
  $resultCheck = mysqli_num_rows($result);
  
  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) { //displays user input data 
      echo $row ['date'] . "<br>";
      echo $row ['amount'] . "<br>";
      echo $row ['name'] . "<br>";
      echo $row ['itemtype'] . "<br>";
    }
  }

?>
<html>
  <head>
<title>Members Area</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="../styles.css" >

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container">
<div class="col-sm-3">
<ul class="nav nav-pills nav-stacked">
 <li class="active"><a href="http://localhost/user-management/members">Home</a></li>
       <li><a href="http://localhost/user-management//members/expensereport.php">Read Expense Report</a></li>
       <li><a href="http://localhost/user-management/members/expense.php">File Expense Report</a></li>
</ul>
  </div>
  </body>
</html>



