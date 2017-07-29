<?php
 session_start();
 include "header.php";
 include "menu.php";
 include "../db_connect.php";
 $_SESSION["delete_item"]="yes";
?>
   
 
    <div class="grid_10">
        <div class="box round first">
            <h2>Display Product</h2>
            <div class="block">
                <?php
                    
                    $sql = "SELECT * FROM product ";
                    $result = $conn->query($sql);
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<td>"; echo "Image";  echo "</td>";
                    echo "<td>"; echo "Product Name";  echo "</td>";
                    echo "<td>"; echo "Product Qty";  echo "</td>";
                    echo "<td>"; echo "Product Price";  echo "</td>";
                    echo "<td>"; echo "Product category";  echo "</td>";
                    echo "<td>"; echo "Delete";  echo "</td>";
                    echo "<td>"; echo "Edit";  echo "</td>";
                    echo "</tr>";
                    while($row=mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                         echo "<td>"; ?><img src="product_image/<?php echo $row["product_image"];?>" height="100" width="100"> <?php echo "</td>";
                         
                         echo "<td>"; echo $row["product_name"];  echo "</td>";
                         echo "<td>"; echo $row["product_qty"];  echo "</td>";
                         echo "<td>"; echo $row["product_price"];  echo "</td>";
                         echo "<td>"; echo $row["product_cat"];  echo "</td>";
                         echo "<td>";?><a href="delete_item.php?id=<?php echo $row["id"];?>">Delete</a><?php   echo "</td>";
                        echo "<td>";?> <a href="edit.php?id=<?php echo $row["id"];?>">Edit</a> <?php echo "</td>";
                        
                        echo "</tr>";
                        
                    }
                    echo "</table>";
                 
                ?>
   
   
            </div>
        </div>
         
   <?php
    include "footer.php";
?>  