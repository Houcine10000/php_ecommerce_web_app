<?php
session_start();
?>

<?php
require_once 'conection.php';

if (isset($_POST["submit"])) {
  $FullName = $_POST["fullname"];
  $Phone = $_POST["phone"];
  $Adress = $_POST["address"];
  $Mail = $_POST["mail"];
  $Password = $_POST["password"];

  $sql = "INSERT INTO customers(customers_fullname,customers_phone,customers_adress,customers_mail,customers_pwd)
  VALUES('$FullName','$Phone','$Adress','$Mail','$Password')";

if ($conn->query($sql) === TRUE) {
  header('location: customer-log.php');
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
            <td>Phone</td>
            <td><input type="text" name="phone" id="phone" placeholder="Phone" required></td>
          </tr>

          <tr>
            <td>Address</td>
            <td><input type="text" name="address" id="address" placeholder="Address" required></td>
          </tr>

          <tr>
            <td>Email</td>
            <td><input type="text" name="mail" id="mail" placeholder="Email" required></td>
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