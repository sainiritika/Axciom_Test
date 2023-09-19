<?php
require_once 'ritika.php';
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$cat=$_POST['cat'];
$vendorid=$_POST['vendorid'];
$prodname=$_POST['prodname'];
$prodprice=$_POST['prodprice'];
$prodid=$_POST['productid'];
$qty=$_POST['qty'];
$total=$prodprice*$qty;
$query2="Insert into cart(VendorId,Category,ProductId,ProductName,ProductPrice,Qty,TotalPrice) values('$vendorid','$cat','$prodid','$prodname','$prodprice','$qty','$total')";
$result2=$conn->query($query2);
if(!$result2) die($conn->error);
$query1="select*from Products where VendorID='$vendorid' and Category='$cat'";

$result3=$conn->query($query1);

echo " vendor :: $vendorid";
    echo "<table>";
    echo "<br>";
    echo "Product added to cart ";
    if(!$result3) die($conn->error);
$rows=$result3->num_rows;
    for($i=0;$i<$rows;$i++)
    {
        $result3->data_seek($i);
        $row=$result3->fetch_array(MYSQLI_ASSOC);
        $pname=$row['ProductName'];
        $pprice=$row['ProductPrice'];
        $productid=$row['ProductId'];
        echo "<tr>";
        
	    
	    echo "<td><form method=post action=showusercart.php>";
        echo "<input type=text readonly name=productid id=productid value=$productid hidden>";
        echo "<input type=text readonly name=prodname id=prodname value=$pname>";
        echo "<input type=text readonly name=prodprice id=prodprice value=$pprice>";
        echo "<input type=text readonly name=cat id=cat value=$cat hidden>";
        echo "<input type=text readonly name=vendorid id=vendorid value=$vendorid hidden>";
        echo "Qty :: <input type=text name=qty id=qty>";
        echo "<input type=submit value=Addd_to_cart></input>";
        echo "</form></td>";
        echo "</tr>";
    }
   
    echo "</table>";
    $query4="select*from cart";

    $result4=$conn->query($query4);
    echo "<br><br>";
    echo "<table>";
    echo "<br>";
    echo "<th>VendorId</th><th>cartId</th><th>category</th><th>Productname</th><th>ProductPrice</th><th>Productid</th><th>qty</th><th>Total</th>";
    if(!$result4) die($conn->error);
$rows1=$result4->num_rows;
    for($i=0;$i<$rows1;$i++)
    {
        $result4->data_seek($i);
        $row=$result4->fetch_array(MYSQLI_ASSOC);
       
        echo "<tr>";
        
	    
	    echo "<td>".$row['VendorId']."</td>";
        echo "<td>".$row['CartId']."</td>";
        echo "<td>".$row['Category']."</td>";
        echo "<td>".$row['ProductName']."</td>";
        echo "<td>".$row['ProductPrice']."</td>";
        echo "<td>".$row['ProductId']."</td>";
        echo "<td>".$row['Qty']."</td>";

        echo "<td>".$row['TotalPrice']."</td>";

        echo "</tr>";
    }
   
    echo "</table>";


?>