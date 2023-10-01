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

        <input type="submit" name="val" value="Valider" class="btn">

<?php
require_once 'conection.php';

if(!empty($_SESSION['username_user'])) {
  
  header('location:admin-panel.php');
}

if(isset($_POST["user"]) && isset($_POST["pass"])){
  
  $usern = $_POST["user"];
  $passw = $_POST["pass"];
  
  // echo $usern." ".$passw;
  
  $sql=("SELECT * FROM users");
  
  $result = $conn->query($sql);
  
  //  $stmt->execute();
  //  $data = $stmt->fetchAll();
  $etat = 0;
  while($row = mysqli_fetch_assoc($result)){
    if ($usern == $row['username_user'] && $passw == $row['pwd_user'])
    {$etat=1;}
    
    if ($etat==1) {
      $_SESSION['username_user'] = $usern;
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['pwd_user'] = $passw;
      header('location:admin-panel.php');
      exit;
      //  echo "<b style= 'color: green;'> Welcome</b> $usern";
      } 
      else{
        echo "<b style= 'color: red;'> Username/Password is wrong</b>";
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