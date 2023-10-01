<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <div class="header">
    <div class="header-title"><a class="lg" href="home.php"><img src="./img/logo2.png" alt=""></a></div>
    <div class="header-buttons">
    <a href="product-table.php" style="text-decoration: none; color: #fff;"><button class="header-button">Products</button></a>
    </div>
  </div>

  <style>
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
  </style>
</body>
</html>