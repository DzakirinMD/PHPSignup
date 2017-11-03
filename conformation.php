<?php

include 'dbconnect.php';

// Passkey that got from link 
$passkey=$_GET['passkey'];
$tbl_name1="temp_users";

// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM $tbl_name1 WHERE confirm_code ='$passkey'";
$result1=mysqli_query($connection, $sql1);

// If successfully queried 
if($result1){

// Count how many row has this passkey
$count=mysqli_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){

$rows=mysqli_fetch_array($result1);
$fname=$rows['first_name'];
$lname=$rows['last_name'];
$uname=$rows['username'];
$email=$rows['email'];
$password=$rows['password']; 
$tbl_name2="users";

// Insert data that retrieves from "temp_members_db" into table "registered_members" 
$sql2="INSERT INTO $tbl_name2(first_name, last_name, username, email,password)VALUES('$fname', '$lname', '$uname', '$email', '$password')";
$result2=mysqli_query($connection, $sql2);
}

// if not found passkey, display message "Wrong Confirmation code" 
else {
echo "Wrong Confirmation code";
}

// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
if($result2){

echo '
<link rel="stylesheet" type="text/css" href="css/style.css">
  <meta charset="UTF-8">
  <title>Success !!</title>
</head>
<body>
  	<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Thank<span>you</span> for verifying !!</div>
		</div>
		<br>
  	</form>
</body>
</html>';

// Delete information of this user from table "temp_members_db" that has this passkey 
$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
$result3=mysqli_query($connection, $sql3);

}

}
?>