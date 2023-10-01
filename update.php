<?php
require_once 'conection.php';
  
  // $id = "";
  // $product_name = "";
  // $price = "";
  // $discount = "";
  // $product_image = "";
  // $product_categorie = "";

  // $error="";
  // $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['ID'])){
      header("location:product-table.php");
      exit;
    }
    $id = $_GET['ID'];
    $sql = "select * from products where product_id=$id";
    $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    while(!$row = mysqli_fetch_assoc($result)){
      header("location:product-table.php");
      exit;
    }

    $product_name = $row['product_name'];
    $price = $row['price'];
    $discount = $row['discount'];
    $product_image = $row['product_image'];
    $product_categorie = $row['product_categorie'];

  }
  else{
    
    $id = $_POST["id"];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    // $product_image = $_POST['product_image'];
    $product_categorie = $_POST['product_categorie'];
    
    $sql = "UPDATE products SET product_name='$product_name',
    price='$price',discount='$discount',
    product_categorie='$product_categorie' 
    WHERE product_id='$id'";
    
    $result = $conn->query($sql);

    if ($result) {
      header("location:product-table.php");
    } else {
      echo "Error updating record: " . $conn->error;
    }  
      
  }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../login/style.css">
  <title>Update</title>
</head>
<body>

<?php
  include('header.php');
?>

<center>
  <form action="" method="POST" enctype="multipart/form-data">
    <fieldset>
      <table>
        <tr>
          <td></td>
          <td><input type="hidden" name="id" value='<?php echo $row["product_id"]; ?>' required></td>
        </tr>
        <tr>
          <td>P_Name</td>
          <td><input type="text" name="product_name" id="product_name" placeholder="Product Name" value='<?php echo $product_name; ?>' required></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><input type="number" name="price" id="price" placeholder="Price" value='<?php echo $price; ?>' required></td>
        </tr>
        <tr>
          <td>Discount</td>
          <td><input type="number" name="discount" id="discount" placeholder="Discount" value='<?php echo $discount; ?>' required></td>
        </tr>
        <tr>
          <td>P_cate</td>
          <td><input type="text" name="product_categorie" id="product_cate" placeholder="Product Category" value='<?php echo $product_categorie; ?>' required></td>
        </tr>
        <tr>
          <td>Image</td>
          <td><img name="product_image" src="<?php echo $product_image;?>" alt="Product Image"></td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="submit" value="Update">
          </td>
        </tr>
      </table>
    </fieldset>
  </form>
</center>

<style>
      *{
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  scroll-behavior: smooth;
}

  body {
    position: relative;
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
  }

  form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 50%);
    background-color: #fff;
    width:60%;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  fieldset {
    border: none;
    padding: 0;
    margin: 0;
  }

  legend {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  table {
    width: 60%;
  }

  td {
    padding: 10px 0;
  }

  input[type="text"],
  input[type="number"] {
    width: 100%;
    padding: 6px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type="submit"] {
    padding: 6px 12px;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
  }

  img {
    width: 60px;
  }
</style>

</body>
</html>