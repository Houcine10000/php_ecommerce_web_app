<?php
  session_start();
?>

<?php
  require_once 'conection.php';
  
  $sql_cart = "SELECT * FROM cart";
  $all_cart = $conn->query($sql_cart);

  
  if (isset($_SESSION["customers_id"])) {
    $customers_id = $_SESSION['customers_id'];
    $sql_customer = "SELECT * FROM customers WHERE customers_id = $customers_id";
    $customers = $conn->query($sql_customer);
  
    }else{
    
    }


  // $customers_id = $_SESSION['customers_id'];
  // $sql_user = "SELECT * FROM customers WHERE customers_id = $customers_id";
  // $users = $conn->query($sql_user);
?>
    
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <title>Document</title>
</head>
<body>

<div class="header">
  <div class="header-title"><a class="lg" href="home.php"><img src="./img/logo2.png" alt=""></a></div>
  <div class="header-buttons">
  <a href="admin-panel.php" style="text-decoration: none; color: #fff;"><button class="header-button">admin panel</button></a>
  </div>
</div>

<center>
<div class="container">
<?php
echo"<table border=1>";
  echo"<tr>";
    echo"<th>product_id</th><th>product_name</th><th>price</th><th>discount</th><th style='display:flex;'>product_image</th><th>Reject</th><th>Accept</th><th>Customer_Info</th>";
  echo"</tr>";

  
  echo"<tr>";
    echo"</tr>";
    
    while($row_cart = mysqli_fetch_assoc($all_cart)){
    
      $sql = "SELECT * FROM products WHERE product_id =".$row_cart["product_id"];
    $all_product = $conn->query($sql);
    while($row = mysqli_fetch_assoc($all_product)){
      
      echo"<tr>";
      echo "<td>".$row['product_id']."</td>";
      echo "<td>".$row['product_name']."</td>";
      echo "<td>".$row['price']."</td>";
      echo "<td>".$row['discount']."</td>";
      echo "<td><img src='".$row['product_image']."' width=70></td>";
     echo "<td><i class='bx bxs-x-circle' style='color:#f30004'></i></a></td>";
     echo "<td><i class='bx bxs-check-square' style='color:#02a205'></i></a></td>";

     while($row = mysqli_fetch_assoc($customers)){
      echo "<td>"
      // .$row['customers_id']."<br>"
      .$row['customers_fullname']."<br>"
      .$row['customers_phone']."<br>"
      .$row['customers_adress']."<br>"
      .$row['customers_mail']."<br>";
      echo"</tr>";
    }
  }
}
echo"</table>";
?>
  </div>
</center>
<style>
/* .bxs-x-circle{
  background: transparent;
  border: none;
  padding: 10px;
  font-size: 30px;
  cursor: pointer;
}
.bxs-check-square{
  background: transparent;
  border: none;
  padding: 10px;
  font-size: 30px;
  cursor: pointer;
} */
*{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  scroll-behavior: smooth;
}

  .header {
    background-color: #00153fd5;
    padding: 20px 10%;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .header-title a img{
    width: 60%;
    font-weight: bold;
  }

  .header-buttons {
    display: flex;
    gap: 10px;
  }

  .header-button {
    border:none;
    padding: 6px 12px;
    border-radius: 4px;
    background-color: #ff7d19;
    color: #fff;
    text-decoration: none;
    cursor: pointer;
  }

  .header-button:hover {
    opacity:.9;
  }

  .container {
    width: 80%;
    padding: 20px;
    margin: 0 auto;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
  }
  
  th, td {
    padding: 10px 40px;
    border: 1px solid #ddd;
    text-align: left;
  }
  
  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }
  
  img {
    width: 100%;
    height: auto;
  }
  
  .bxs-x-circle {
    color: #f30004;
    font-size: 30px;
    cursor: pointer;
    padding: 10px;
  }
  
  .bxs-check-square {
    color: #02a205;
    font-size: 30px;
    cursor: pointer;
    padding: 10px;
  }

</style>

</body>
</html>