<?php

//Attempt to connect to MySQL server and check for connection error
/** syntax
$connection = mysqli_connect('db_host','db_user','db_password','db_name') or die(mysqli_error($connection));
*/
include 'dbconnect.php';

// table name 
$tbl_name=temp_users;

// Random confirmation code 
$confirm_code=md5(uniqid(rand())); 

// VALUES sent from FORM  Escape user inputs for security, 
$id = mysqli_real_escape_string($connection, $_REQUEST['id']);
$first_name = mysqli_real_escape_string($connection, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($connection, $_REQUEST['last_name']);
$username = mysqli_real_escape_string($connection, $_REQUEST['username']);
$email = mysqli_real_escape_string($connection, $_REQUEST['email']);
$password =  mysqli_real_escape_string($connection, $_REQUEST['password']);

// Insert data into database
 $sql="INSERT INTO $tbl_name(first_name, last_name, username, email,password, confirm_code) VALUES ('$first_name', '$last_name', '$username', '$email', '$password', '$confirm_code')"; 

if(mysqli_query($connection, $sql)){

// send e-mail to ...
$to = $email;

// Your subject
$subject="Your confirmation link here";

// From
$header="from: your name <your email>";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://localhost/LoginPage/conformation.php?passkey=$confirm_code";

// send email
$sentmail = mail($to,$subject,$message,$header);

echo '
<link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="UTF-8">
  <title>Success !!</title>
</head>
<body>
  	<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>You have successfully Sign<span>Up!</span> on our page !!</div>
			<div>Please check your email</div>
		</div>
		<br>
  	</form>
</body>
</html>
';
 	
}

// if not found 
else {
echo "Not found your email in our database";
}

// if your email succesfully sent
if($sentmail){
echo "Your Confirmation link Has Been Sent To Your Email Address.";
}
else {
echo "Cannot send Confirmation link to your e-mail address";
}




//echo "You have successfully sing up on our page";
	//echo '';
   // echo '<button onclick="history.go(-1);"> Back </button>' ;

?>
