<?php
 session_start();
    if(!$_SESSION["admin"]=="username"){
       header("location:admin_login.php");

    }
 include "header.php";
 include "menu.php";
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_card";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>   
    <div class="grid_10">
        <div class="box round first">
            <h2>
                Add Product    
            </h2>
            <div class="block">
               <form name="form1" method="post" action="" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Product Name</td>
                            <td><input type="text" name="pnm"></td>
                        </tr>
                        <tr>
                            <td>Product Price</td>
                            <td><input type="text" name="pprice"></td>
                        </tr>
                        <tr>
                            <td>Product Quantity</td>
                            <td><input type="text" name="pqty"></td>
                        </tr>
                        <tr>
                            <td>Product Image</td>
                            <td><input type="file" name="pimage"></td>
                        </tr>
                        <tr>
                            <td>Product Category</td>
                            <td>
                                <select name="pcategory">
                                    <option value="gents_clothes">Gents Clothes</option>
                                    <option value="ladies_clothes">Ladies Clothes</option>
                                    <option value="gents_shoes">Gents Shoes</option>
                                    <option value="ladies_shoes">Ladies Shoes</option>
                                </select>    
                            </td>
                        </tr>
                         <tr>
                            <td>Product Description</td>
                            <td>
                                <textarea cols="15" rows="10" name="pdesc"></textarea>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit1" value="Upload"></td>
                        </tr>
                    </table>
               </form>
               
<?php
    if(isset($_POST['submit1'])){
        //for random name in image
        $v1 = rand(1111,9999);
        $v2 = rand(1111,9999);
        $v3 = $v1.$v2;
        $v3 = md5($v3);
        
        $fnm =$_FILES["pimage"]["name"];
        $dst ="product_image/".$v3.$fnm;
        $dst1 =$v3.$fnm;
        move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
        
$sql = "INSERT INTO product 
VALUES ('', '$_POST[pnm]', $_POST[pprice], $_POST[pqty], '$dst1', '$_POST[pcategory]', '$_POST[pdesc]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    }
?>               
            </div>
        </div>
        
      
<?php
    include "footer.php";
?>      
