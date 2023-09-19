<?php
require_once 'ritika.php';
$conn=new mysqli($hn,$un,$pw,$db);
if($conn->connect_error) die($conn->connect_error);
$userid=$_POST['userid'];

echo<<<ritika
<html>
<body>
<form action="productadded.php" method="post">
<label for="ProductName">ProductName
    <input type="text" name="prodname" id="prodname" placeholder="Enter Product Name">
    <br>
    <label for="ProductPrice">ProductPrice
    <input type="text" name="prodprice" id="prodprice" placeholder="Enter Product Price">
    <br>
    <label for="Category">Category</label>
    <select name="cat" id="cat">
        <option value="Catering">Catering</option>
        <option value="Florist">Florist</option>
        <option value="Decoration">Decoration</option>
        <option value="Lightning">Lightning</option>
    </select>
    <br>
    <input type="text" name="userid" id="userid" value=$userid hidden>
    <button type="submit">Add To Cart</button>
</form>
</body>
</html>
ritika;
?>