<?php
  $servername = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'my_project';
  
  $conn = new mysqli($servername, $user, $pass,$db);

      // if (!isset($_SESSION["insert_executed"])) {
      //     $insert = "INSERT INTO cart(customer_id) VALUES('$customers_id')";
      //     if ($conn->query($insert) === TRUE) {
      //         $_SESSION['insert_executed'] = true;
      //     } else {
      //         echo "Error: " . $insert . "<br>" . $conn->error;
      //     }
      // }
  
  if (isset($_GET["id"]) && isset($_GET['customers_id'])) {

    $customers_id = $_GET['customers_id'];

    $product_id = $_GET["id"];
    
    $cus = "SELECT * FROM customers WHERE customers_id = '$customers_id'";
    $sql = "SELECT * FROM cart WHERE product_id = $product_id";
    $result = $conn->query($sql);
    // $resul = $conn->query($cus);
    $total_cart = "SELECT * FROM cart";
    $total_cart_result = $conn->query($total_cart);
    $cart_num = mysqli_num_rows($total_cart_result);
    
    if (mysqli_num_rows($result) > 0) {
      
      $in_cart = "Already In";
      echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
      
    } else {

      $insert = "INSERT INTO cart(product_id, customer_id) VALUES ($product_id, $customers_id)";

      if ($conn->query($insert) === true) {
        
        $in_cart = "Added to Cart";
        echo json_encode(["num_cart"=>$cart_num,"in_cart"=>$in_cart]);
        
      }else{
        echo "<script>alert('Failed to add to cart');</script>";
      }
    }
  }


  if (isset($_GET["cart_id"])) {
    $product_id = $_GET["cart_id"];
    $sql = "DELETE FROM cart WHERE product_id =".$product_id;

    if ($conn->query($sql) === TRUE) {
      echo "";
    }
  }
?>