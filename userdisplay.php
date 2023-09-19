<?php

require_once 'ritika.php';
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$userid=$_POST['userid'];
$password=$_POST['mypassword'];

$query1="SELECT * FROM Users where UserId='$userid' AND Password='$password'";
$result1=$conn->query($query1);
if(!$result1) die($conn->error);
$rows=$result1->num_rows;

if($rows==0)
{
	echo<<<main
    <html>
    <head>
        <title>User Login</title>
    </head>
    <body>

    <h1>Event Management System</h1>
    <form method="post" action="userdisplay.php">
    <label for="userid">User Id</label>
     <input type="text" name="userid" id="userid" placeholder="User Id">
     <br>   
     <label for="mypassword">Password</label>
     <input type="password" name="mypassword" id="mypassword" placeholder="Password">
        <br>
        <button type="reset">Cancel</button>
        <button type="submit">Login</button>
    </form>

    </body>
    </html>


    main;


}
else{
    echo "Welcome User";
    echo<<<ritika
    <html>
    <head>
    </head>
    <body>
    <form action="vendorlist.html" method="post">

    <br><br>
    <button type="submit">VENDOR</button>
    </form>
    </body>
    </html>
    ritika;
}
$result1->close();
$conn->close();
?>
