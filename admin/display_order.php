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
                    $sql = "SELECT * FROM confirm_order_address order by id desc";
                    $result = $conn->query($sql);
                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<td>"; echo "First Name";  echo "</td>";
                    echo "<td>"; echo "Last Name";  echo "</td>";
                    echo "<td>"; echo "Email";  echo "</td>";
                    echo "<td>"; echo "Address";  echo "</td>";
                    echo "<td>"; echo "City";  echo "</td>";
                    echo "<td>"; echo "Pincode";  echo "</td>";
                    echo "<td>"; echo "Contact No.";  echo "</td>";
                    echo "<td>"; echo "View Order";  echo "</td>";
                    echo "</tr>";
                    while($row=mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>"; echo $row["first_name"];  echo "</td>";
                        echo "<td>"; echo $row["last_name"];  echo "</td>";
                        echo "<td>"; echo $row["email"];  echo "</td>";
                        echo "<td>"; echo $row["address"];  echo "</td>";
                        echo "<td>"; echo $row["city"];  echo "</td>";
                        echo "<td>"; echo $row["pincode"];  echo "</td>";
                        echo "<td>"; echo $row["contactno"];  echo "</td>";
                        echo "<td>"; ?><a href="display_order_1.php?id=<?php echo $row["id"];?>">View Order </a> <?php echo "</td>";
                        echo "</tr>";
                        
                    }
                    echo "</table>";
                ?>
   
   
            </div>
        </div>
         
   <?php
    include "footer.php";
?>      
