

<?php

require_once 'ritika.php';
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$username=$_POST['uname'];
$password=$_POST['password'];


$email=$_POST['email'];


$query2="INSERT INTO Users(UserId,Password,Email) VALUES('$username','$password','$email')";
$result2=$conn->query($query2);
if(!$result2) die($conn->error);


?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="form.css">
    <title>User Addes</title>
  </head>
  <body>

    <h1> Successfully Added User</h1>
  </body>
</html>