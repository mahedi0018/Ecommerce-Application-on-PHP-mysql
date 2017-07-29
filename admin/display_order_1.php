<?php

 include "header.php";
 include "menu.php";
 include "../db_connect.php";
?>
   
 
    <div class="grid_10">
        <div class="box round first">
            <h2>Display Product</h2>
            <div class="block">
                <?php
                    $id = $_GET["id"];
                    $sql = "SELECT * FROM confirm_order_product where order_id=$id";
                    $result = $conn->query($sql);
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<td>"; echo "Image";  echo "</td>";
                    echo "<td>"; echo "Product Name";  echo "</td>";
                    echo "<td>"; echo "Product Qty";  echo "</td>";
                    echo "<td>"; echo "Product Price";  echo "</td>";
                     echo "<td>"; echo "Total Price";  echo "</td>";
                    echo "</tr>";
                    while($row=mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>"; ?><img src="product_image/<?php echo $row["product_image"];?>" height="100" width="100"> <?php echo "</td>";
                        echo "<td>"; echo $row["product_name"];  echo "</td>";
                         echo "<td>"; echo $row["product_qty"];  echo "</td>";
                         echo "<td>"; echo $row["product_price"];  echo "</td>";
                         echo "<td>"; echo $row["product_total"];  echo "</td>";
                        echo "</tr>";
                        
                    }
                    echo "</table>";
                ?>
   
   
            </div>
        </div>
         
   <?php
    include "footer.php";
?>      
