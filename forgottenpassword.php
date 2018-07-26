<?php
////////////////* This sends the unencryped Password to $email.  *///////////////////
require_once('connect.php'); 
include('config.php');
  if(isset($_POST) & !empty($_POST)){
    $input = $_POST['input'];
    $sql = "SELECT * FROM `usermanagement` WHERE "; //this turns email & username into one variable called $input
      if(filter_var($input, FILTER_VALIDATE_EMAIL)){
        $sql .= "email='$input'";
      }else{
        $sql .= "username='$input'";
      }
    $res = mysqli_query($connection, $sql);  
    $count = mysqli_num_rows($res); //if SQL query passes and there is a connection to the database, send email to user
    if($count == 1){
      $r = mysqli_fetch_assoc($res);
      $password = $r['password']; //PEAR mailer
    
      error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

          set_include_path("." . PATH_SEPARATOR . ($UserDir = dirname($_SERVER['DOCUMENT_ROOT'])) . "/pear/php" . PATH_SEPARATOR . get_include_path());
          require_once "Mail.php";
          
          
          $host ="ssl://sub5.mail.dreamhost.com";
          $username ="demotest@bluejaybuilds.com";
          $password1 ="N]k2D!ZSZ`[Ar!x6";
          $port = "465";
          $to = $email;
          $email_from = "$email";
          $email_subject = "Your Password" ;
          $email_body = "Your Password is $password";
          $email_address = "reply-to@example.com";

          $headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
          $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password1));
          $mail = $smtp->send($to, $headers, $email_body);


          if (PEAR::isError($mail)) {
          echo("<p>" . $mail->getMessage() . "</p>");
          } 
      else{
echo("<p>Message successfully sent!</p>");
      }
  }
} 
?>


<html>
<head>
<title>Forgot Password Script in PHP & MySQL</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >
<script   src="https://code.jquery.com/jquery-3.1.1.js" ></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?> <!-- displays success message if password was sent -->
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?> <!-- displays failure message if password was not sent -->
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Reset Your Password</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="input" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
</div>
</body>
</html>