<?php //still in production. Would like to create a stricter logic for users to input only valid sums of money, valid dates, and select from a list of catagories. The data should also be encrypted and password protected. This is just a simple version. 


session_start();

require_once('../connect.php');
if(!isset($_SESSION['username']) & empty($_SESSION['username'])){ //if a user is not logged in they will be redirected to the login page
  header('location: ..\login.php');
}
$username = $_SESSION['username'];

if(isset($_POST) & !empty($_POST)) { //finds user input then stores them into the relevant vaiable 
$amount = $_POST['amount'];
}
if(isset($_POST) & !empty($_POST)) { //finds user input then stores them into the date vaiable 
$date = $_POST['date'];
}
if(isset($_POST) & !empty($_POST)) { //finds user input then stores them into the itemtype vaiable 
$itemtype = $_POST['itemtype'];
  $sql = "INSERT INTO `expensedata` (amount, date, itemtype) VALUES ('$amount', '$date', '$itemtype')"; //inserts the user data into the database
if (mysqli_query($connection, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " ; //echoes an error if the data wasn't imported properly 
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
<<body>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Members Area</a>
    </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php.php">Manage Profile</a></li>
            <li><a href="update-password.php">Change Password</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="..\logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
<div class="col-sm-3">
<ul class="nav nav-pills nav-stacked">
      <li><a href="http://localhost/user-management/members">Home</a></li>
      <li><a href="http://localhost/user-management//members/expensereport.php">Read Expense Report</a></li>
      <li><a href="http://localhost/user-management//members/expense.php">Expense Report</a></li>
</ul>

</div>

    <div class="col-sm-6 col-centered">

            <!-- value of form data is stored into the relevant variable  -->
            <form method="post" class="form-horizontal">

                  <div class="form-group">
                      <label for="input1" class="col-sm-4 control-label">Amount</label>
                      <div class="col-sm-8">
                        <input type="text" name="amount" class="form-control" value="<?php if(isset($amount) & !empty($amount) ) { echo $amount; } ?>" placeholder="$0.00">
                      </div>
                  </div>

                  <div class="date form-group">
                      <label for="input1" class="col-sm-4 control-label">date</label>
                      <div class="col-sm-8">
                        <input type="date" name="date" class="form-control" value="<?php if(isset($date) & !empty($date) ) { echo $date; } ?>" placeholder="//">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="input1" class="col-sm-4 control-label">Item Description</label>
                      <div class="col-sm-8">
                        <input type="text" name="itemtype" class="form-control" value="<?php if(isset($itemtype) & !empty($itemtype) ) { echo $itemtype; } ?>" required>
                        
                      </div>
                  </div>
                        <div class="form-group">
                      <label for="input1" class="col-sm-4 control-label">Username</label>
                      <div class="col-sm-8">
                        <input type="text" name="itemtype" class="form-control" value="<?php if(isset($username) & !empty($username) ) { echo $username; } ?>"  placeholder="$username" required disabled>
                        
                      </div>
                  </div>

                  <input type="submit" class="btn btn-primary col-md-3 col-md-offset-9" value="Update">
            </form> 
          </div>
 </div>
</div>
</div>
</div>
</body>
</html>
