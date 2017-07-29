<?php
session_start();
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


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    
    
    
    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" name="form1" method="post" action="">
    <p><input type="text"  name="username" placeholder="username" value="username" ></p>
    <p><input type="password" placeholder="Password" name="pwd"  value=""></p>
    <p><input type="submit" name="submit1" value="Log in" ></p>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    
    
    
<?php
      if(isset($_POST['submit1'])){
         $sql = "SELECT * FROM admin_login WHERE username='$_POST[username]' && password = '$_POST[pwd]'";
          $result = $conn->query($sql);
          
          
          while($row=mysqli_fetch_array($result)){
              $_SESSION["admin"] = $row["username"];
              header('location:add_product.php');
          }
      }else{
              
                  echo "<p>This is some text in a paragraph.</p>";
          }
?>    
  </body>
</html>
