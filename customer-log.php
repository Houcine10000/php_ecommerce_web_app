<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./login.css">
  <title>Document</title>
</head>
<body>

  <div class="container">
    <div class="main-box">
      <h1>Log In</h1>
      <form class="form" action="" method="POST">

        <div class="inp-box">
          <input type="text" name="user" required>
          <label for=""></label>
        </div>

        <div class="inp-box">
          <input type="Password" name="pass" required>
          <label for=""></label>
        </div>

        <input type="submit" name="val" value="Log In" class="btn">

        <a href='customer-insc.php'><input type="button" value="Sign Up" class="btn"></a>

<?php
require_once 'conection.php';

if(!empty($_SESSION['customers_mail'])) {
  
  header('location:home.php');
}

if(isset($_POST["user"]) && isset($_POST["pass"])){
  
  $usern = $_POST["user"];
  $passw = $_POST["pass"];
  
  // echo $usern." ".$passw;
  
  $sql=("SELECT * FROM customers");
  
  $result = $conn->query($sql);
  
  $etat = 0;
  while($row = mysqli_fetch_assoc($result)){
    if ($usern == $row['customers_mail'] && $passw == $row['customers_pwd'])
    {$etat=1;}
    
    if ($etat==1) {
      $_SESSION['customers_mail'] = $usern;
      $_SESSION['customers_pwd'] = $passw;
      $_SESSION['customers_id'] = $row['customers_id'];
      // echo "<b style= 'color: green;'> Welcome</b> $usern";
      header('location:home.php');
      } 
      else{
        echo "<p>password or email incorrect try again</p>";
      }
    }
    $conn = null;
  }
  ?>
</form>
</div>
</div>
</body>
</html>