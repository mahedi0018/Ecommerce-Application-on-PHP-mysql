<?php
session_start();
if($_SESSION["paypalphp"]=="")
{
    ?>
    <script type="text/javascript">
        window.location="shop.php";
    </script>    
    <?php
}
include_once('../db_connect.php') ;
$order_id = $_GET["id"];

$sql = "SELECT * FROM checkout_address WHERE id=$order_id";
$result = $conn->query($sql);
while($row=mysqli_fetch_array($result))
{
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $email= $row["email"];
    $address= $row["address"];
    $city= $row["city"];
    $pincode= $row["pincode"];
    $contactno= $row["contactno"];
    
}
$sql1 = "INSERT  INTO confirm_order_address VALUES  ('','$first_name','$last_name','$email','$address','$city','$pincode','$contactno')";

if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully in confirm_order_address";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}
$sql2 = "SELECT id FROM confirm_order_address order by id desc limit 1";
$result2 = $conn->query($sql2);
while($row=mysqli_fetch_array($result2))
{
	$id = $row["id"];
}
foreach($_COOKIE['item'] as $name=>$values)
{
	$values1=explode("__",$values);
	$sql3 = "INSERT INTO confirm_order_product VALUES('','$id','$values1[1]','$values1[2]','$values1[3]','$values1[0]','$values1[4]')";

	if ($conn->query($sql3) === TRUE) {
		echo "New record created successfully in confirm_order_product ";
	} else {
		echo "Error: " . $sql3 . "<br>" . $conn->error;
	}
}
$_SESSION["pay"]="";
$_SESSION["paypalphp"]="";
?>

<script type="text/javascript">
	setTimeout(function(){
		window.location="shop.php";
	},4000);
</script>






