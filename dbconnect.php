<?php

//Attempt to connect to MySQL server and check for connection error
/** syntax
$connection = mysqli_connect('db_host','db_user','db_password','db_name') or die(mysqli_error($connection));
*/

$connection = mysqli_connect('localhost','root','','phpgang') or die(mysqli_error($connection));

 ?>