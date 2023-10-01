<?php

require_once 'conection.php';

if (isset($_GET["ID"])) {
  $product_id = $_GET["ID"];
  $sql = "DELETE FROM products WHERE product_id =".$product_id;

  if ($conn->query($sql) === TRUE) {
    header('location: product-table.php');
  }
}

 
?>