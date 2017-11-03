<?php
//Attempt to connect to MySQL server and check for connection error
/** syntax
$connection = mysqli_connect('db_host','db_user','db_password','db_name') or die(mysqli_error($connection));
*/

$connection = mysqli_connect('localhost','root','','phpgang') or die(mysqli_error($connection));

// Escape user inputs for security
$id = mysqli_real_escape_string($connection, $_REQUEST['id']);
$first_name = mysqli_real_escape_string($connection, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($connection, $_REQUEST['last_name']);
$username = mysqli_real_escape_string($connection, $_REQUEST['username']);
$email = mysqli_real_escape_string($connection, $_REQUEST['email']);
$password =  mysqli_real_escape_string($connection, $_REQUEST['password']);

// attempt insert query execution
$sql="INSERT INTO users (id,first_name,last_name,username,email,password) VALUES ('$id','$first_name','$last_name','$username','$email','$password')";

if(mysqli_query($connection, $sql)){
echo '
<link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="UTF-8">
  <title>Success !!</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
  	<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>You have successfully Sign<span>Up!</span> on our page !!</div>
		</div>
		<br>
  	</form>
</body>
</html>
';
 	
}


else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}


//echo "You have successfully sing up on our page";
	//echo '';
   // echo '<button onclick="history.go(-1);"> Back </button>' ;

?>
