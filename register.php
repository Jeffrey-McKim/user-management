<?php
require_once('connect.php');
include('config.php');
if(isset($_POST) & !empty($_POST)){
  $username = mysqli_real_escape_string($connection, $_POST['username']); //user input stored in username variable. uses escape string for security. 
  $verification_key = md5($username); //creates a verifcation key (just an ecrypted username)
  $email = mysqli_real_escape_string($connection, $_POST['email']); //user input stores in email variable
  $password = md5($_POST['password']); //user input encrypted then stored as password
  $passwordagain = md5($_POST['passwordagain']);//checks to make sure passwords are indentical
  if ($password == $passwordagain){
       $fmsg = "";   
       
       $usernamesql = "SELECT * FROM `usermanagement` WHERE username= '$username'"; //if username already exsists in database, count will = 1, and spit an error
       $usernameres = mysqli_query($connection, $usernamesql);
       $count = mysqli_num_rows($usernameres);
       if($count == 1) {
        $fmsg .="please try a different username";
       }
    
       $emailsql = "SELECT * FROM `usermanagement` WHERE email= '$email'"; //if username already exsists in database, count will = 1, and spit an error
       $emailres = mysqli_query($connection, $emailsql);
       $emailcount = mysqli_num_rows($usernameres);
       if($count == 1) {
        $fmsg .="please try a different email";
       }
    
    //if no fail messages are called, then all of the information will be iserted into the database
    $sql = "INSERT INTO `usermanagement` (username, email, password, verification_key) VALUES ('$username', '$email', '$password', '$verification_key')";
    $result = mysqli_query($connection, $sql); //connections for connection to database
    if($result){ //if connected the user will be emailed a verification key
      $smsg = "User Registered seuccesfully";
      $id = mysqli_insert_id($connection);


          error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

          set_include_path("." . PATH_SEPARATOR . ($UserDir = dirname($_SERVER['DOCUMENT_ROOT'])) . "/pear/php" . PATH_SEPARATOR . get_include_path());
          require_once "Mail.php";
          
          
          $host ="ssl://sub5.mail.dreamhost.com";
          $username ="demotest@bluejaybuilds.com";
          $password1 ="N]k2D!ZSZ`[Ar!x6";
          $port = "465";
          $to = "$email";//////change this to your preferred email for testing//// 
          $email_from = "demotest@bluejaybuilds.com";
          $email_subject = "Verify Your Email " ;
          $email_body = "http://localhost/user-management/verify.php?key=$verification_key&id=id";
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
 
          
        } else{
        $fmsg .= "Failed to Register user: mail not sent";
      }
    } else{
      $fmsg = "Password not Matching";
  }  
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
     <?php if(isset($smsg)){ ?> <div class="alert alert-success" role="alert">  <?php echo $smsg; ?> </div> <?php } ?><!--if verifcation email is sent, will echo succsess message -->
       <?php if(isset($fmsg)){ ?> <div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div> <?php } ?>  <!--if verifcation email is not sent, will echo fail message -->
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please Register</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" value="<?php if(isset($username) & !empty($username) ) { echo $username; } ?>" required>
        
        </div>
        <span id="usernameResult"></span>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php if(isset($email) & !empty($email) ) { echo $email; } ?>" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Password Again</label>
        <input type="password" name="passwordagain" id="inputPassword" class="form-control" placeholder="Password Again" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
      </form>
  </div>
  
</body>
</head>
</html>