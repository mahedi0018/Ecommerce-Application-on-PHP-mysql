<?php
session_start();
if($_SESSION["delete_item"]=="")
{
    
}
$id = $_GET["id"];
include "../db_connect.php";
$sql1 = "SELECT * FROM product where id=$id";
$result1 = $conn->query($sql1);
while($row=mysqli_fetch_array($result1))
{
    
    unlink("product_image/".$row["product_image"]);
}

$sql = "DELETE FROM product WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
