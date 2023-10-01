
<?php
require_once 'conection.php';

if (isset($_POST["submit"])) {
  $product_name = $_POST["product_name"];
  $price = $_POST["price"];
  $discount = $_POST["discount"];
  $product_categorie = $_POST["product_categorie"];

  $target_dir = "uploads/";
  $product_image = $target_dir.$_FILES["product_image"]["name"];
  $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // $N_name="uploads/".uniqid().'.'.$imageFileType;
  
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["product_image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if ($product_name != "" && $price != "") {
      move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);

      // rename("uploads/".$_FILES["product_image"]["name"],$N_name);

      $sql = "INSERT INTO products(product_name,price,discount,product_image,product_categorie)
      VALUES('$product_name',$price,$discount,'$product_image','$product_categorie')";

      if ($conn->query($sql) === TRUE) {
        header('location: home.php');
        echo "The file ". htmlspecialchars( basename( $_FILES["product_image"]["name"])). " has been uploaded.";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
  
}
	// if(ISSET($_POST['submit'])){
	// 	$product_image = $_FILES['product_image']['name'];
  //   $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
  //   $uploadOk = 1;
  //   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// 	$image_temp = $_FILES['product_image']['tmp_name'];

  //   $N_name="uploads/".uniqid().'.'.$imageFileType;

  //   $product_name = $_POST["product_name"];
  //   $price = $_POST["price"];
  //   $discount = $_POST["discount"];
  //   $product_categorie = $_POST["product_categorie"];

	// 	$exp = explode(".", $product_image);
	// 	$end = end($exp);
	// 	$name = time().".".$end;
	// 	if(!is_dir("./uploads"))
	// 		mkdir("uploads");
	// 	$path = "uploads/".$name;
	// 	$allowed_ext = array("gif", "jpg", "jpeg", "png");
	// 	if(in_array($end, $allowed_ext)){
	// 		if(move_uploaded_file($image_temp, $path)){
        
  //       rename("uploads/".$_FILES["product_image"]["name"],$N_name);

	// 			mysqli_query($conn, "INSERT INTO `products` VALUES('', '$product_name', '$price', '$discount','$product_image', '$product_categorie')") or die(mysqli_error());
	// 			echo "<script>alert('User account saved!')</script>";
	// 			header("location: product-table.php");
	// 		}	
	// 	}else{
	// 		echo "<script>alert('Image only')</script>";
	// 	}
	// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../login/style.css">
  <title>Upload</title>
</head>
<body>

<?php
  include('header.php');
?>
	
<center>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <table>
        <tr>
          <td>P_Name</td>
          <td><input type="text" name="product_name" id="product_name" placeholder="Product Name" required></td>
        </tr>
        <tr>
          <td>Price</td>
          <td><input type="number" name="price" id="price" placeholder="Price" required></td>
        </tr>
        <tr>
          <td>Discount</td>
          <td><input type="number" name="discount" id="discount" placeholder="Discount" required></td>
        </tr>
        <tr>
          <td>P_cate</td>
          <td><input type="text" name="product_categorie" id="product_cate" placeholder="Product Category" required></td>
        </tr>
        <tr>
          <td>Image</td>
          <td><input type="file" name="product_image" id="imageupload" required></td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="submit" value="Upload">
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

  center {
    /* margin-top: 50px; */
  }

  form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, 50%);
    width:60%;
    background-color: #fff;
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
    padding: 40px;
  }

  td {
    padding: 10px 0;
  }

  input[type="text"],
  input[type="number"],
  input[type="file"] {
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
</style>

</body>
</html>