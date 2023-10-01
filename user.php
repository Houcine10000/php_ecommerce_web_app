<?php
session_start();
?>

<html>
<head> <title>Users-Table</title>
</head>
<body>

<div class="header">
  <div class="header-title"><a class="lg" href="home.php"><img src="./img/logo2.png" alt=""></a></div>
  <div class="header-buttons">
    <a href="add-user.php" style="text-decoration: none; color: #fff;"><button class="header-button">Add</button></a>
    <a href="admin-panel.php" style="text-decoration: none; color: #fff;"><button class="header-button">admin panel</button></a>
  </div>
</div>

  
<center>
<?php
	
  require_once 'conection.php';
 
$sql = ("SELECT * FROM users");
$all_users = $conn->query($sql);

// and somewhere later:
echo "<div class='container'>";
echo "<table>";
echo "<tr>";
echo "<th>ID</th><th>Name</th><th>Mail</th><th>Username</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($all_users)) {
  echo "<tr>";
  echo "<td>".$row['id_user']."</td>";
  echo "<td>".$row['nom_user']."</td>";
  echo "<td>".$row['mail_user']."</td>";
  echo "<td>".$row['username_user']."</td>";
  echo "</tr>";
}

echo "</table>";
echo "</div>";

$conn = null;

?>
</center>

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
    object-fit:cover;
  }
  
  .delete-btn,
  .update-btn {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 4px;
    border:none;
    background-color: #11ae72;
    color: #fff;
    text-decoration: none;
    cursor: pointer;
  }
  
  .delete-btn:hover,
  .update-btn:hover {
    opacity:.8;
  }
</style>

</body>
</html>