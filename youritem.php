<?php
require_once 'ritika.php';
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$userid=$_POST['userid'];

$query2="Select*from Products where VendorID='$userid'";
$result2=$conn->query($query2);
$rows=$result2->num_rows;
if($rows==0)
{
    echo "no data found";
}
else
{
    echo<<<main
    <html>
    <head>
    <style>
    .navbar {
        overflow: hidden;
        background-color: #ffffff;
        position: relative;
        
        top: 0;
        width: 100%;
      }
    </style>
    </head>
    <body>      
    <center>
    

    <a href="vendorlogin.html"><button class="button">back to login</button></a>
    

    
    </center>
    <hr>
    </body>
    </html>
    main;
    echo "<table>";
    echo "<tr>";
    echo "<th>ProductId</th><th>ProductName</th><th>ProductPrice</th><th>VendorId</th>";
    echo "</tr>";
    for($i=0;$i<$rows;$i++)
    {
        $result2->data_seek($i);
        $row=$result2->fetch_array(MYSQLI_ASSOC);
        
	    echo "<tr>";
     
	    echo "<td>".$row['ProductId']."</td><td>".$row['ProductName']."</td><td>".$row['ProductPrice']."</td><td>".$row['VendorID']."</td>";
	    echo "</tr>";
	
    }
    echo "</table>";
    echo<<<ritika
    <html>
    <body>
    <form action="additem.php" method="post">
    <input type="text" name="userid" id="userid" value=$userid hidden>
    <button type="submit">Insert</button>
    </form>
   
    </body>
    </html>
    ritika;
}
    
?>