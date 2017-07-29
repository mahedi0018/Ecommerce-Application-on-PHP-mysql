<?php
 
 include "header.php";
 include "menu.php";
 include "../db_connect.php";
 $id = $_GET["id"];

?>
   
 
    <div class="grid_10">
        <div class="box round first">
            <h2>Edit Product</h2>
            <div class="block">
                <?php
                    
                    $sql = "SELECT * FROM product ";
                    $result = $conn->query($sql);
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<td>"; echo "Image";  echo "</td>";
                
                    echo "<td>"; echo "Delete";  echo "</td>";
                    echo "</tr>";
                    while($row=mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                         echo "<td>"; ?><img src="product_image/<?php echo $row["product_image"];?>" height="100" width="100"> <?php echo "</td>";
                         
                        
                         echo "<td>";?><a href="delete_item.php?id=<?php echo $row["id"];?>">Delete</a><?php   echo "</td>";
                        
                        echo "</tr>";
                        ?>
                              <form name="form1" method="post" action="" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Product Name</td>
                                        <td><input type="text" name="pnm" value="<?php echo $row["product_name"];?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Product Price</td>
                                        <td><input type="text" name="pprice" value="<?php echo $row["product_price"];?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Product Quantity</td>
                                        <td><input type="text" name="pqty" value="<?php echo $row["product_qty"];?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Product Image</td>
                                        <td><input type="file" name="pimage" ></td>
                                    </tr>
                                    <tr>
                                        <td>Product Category</td>
                                        <td>
                                            <select name="pcategory" value="<?php echo $row["product_name"];?>">
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
                                        <td colspan="2" align="center"><input type="submit" name="submit1" value="Update"></td>
                                    </tr>
                                </table>
                               </form>
                        <?php
                        
                    }
                    echo "</table>";
                
                
                ?>
                
   
   
            </div>
        </div>
         
   <?php
         if(isset($_POST["submit"]))
                 {
                     $v1 = rand(1111,9999);
                     $v2 = rand(1111,9999);
                     $v3 = $v1.$v2;
                     $v3 =md5($v3);
                     $fnm = $_FILES["pimage"]["name"];
                     $des = "product_image/".$v3.$fnm;
                     $dst1 =$v3.$fnm;
                     move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst);
                     $sql1 = "UPDATE product SET 
                      product_name='$_POST[pnm]', product_price=$_POST[pprice], product_qty=$_POST[pqty],product_image='$dst1', 'product_cat=$_POST[pcategory]', product_desc='$_POST[pdesc]' WHERE id=$id";
                     if ($conn->query($sql1) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql1 . "<br>" . $conn->error;
                    }

                    $conn->close();
                 }
    include "footer.php";
?>  