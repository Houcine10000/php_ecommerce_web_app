<?php
session_start();
?>

<?php
require_once 'conection.php';

if (isset($_POST["submit"])) {
  $FullName = $_POST["fullname"];
  $Mail = $_POST["mail"];
  $username = $_POST["username"];
  $Password = $_POST["password"];

  $sql = "INSERT INTO users(
    nom_user,
    mail_user,
    username_user,
    pwd_user
    )
  VALUES('$FullName','$Mail','$username','$Password')";

if ($conn->query($sql) === TRUE) {
  header('location: user.php');
} else{
  echo "Error";
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
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

    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    form {
    position: absolute;
    /* top: 50%; */
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
    input[type="password"] {
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
</head>

<body>

<div class="header">
  <div class="header-title"><a class="lg" href="home.php"><img src="./img/logo2.png" alt=""></a></div>
</div>

  <center>
    <form action="" method="POST">

      <fieldset>
        <table>

          <tr>
            <td>Full Name</td>
            <td><input type="text" name="fullname" id="fullname" placeholder="Full Name" required></td>
          </tr>

          <tr>
            <td>Email</td>
            <td><input type="text" name="mail" id="mail" placeholder="Email" required></td>
          </tr>

          <tr>
            <td>Username</td>
            <td><input type="text" name="username" id="username" placeholder="Address" required></td>
          </tr>

          <tr>
            <td>Password</td>
            <td><input type="password" name="password" id="password" placeholder="Password" required></td>
          </tr>

          <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
          </tr>

        </table>
      </fieldset>
    </form>
  </center>
</body>
</html>