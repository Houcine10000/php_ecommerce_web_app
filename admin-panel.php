<?php
  session_start();


require_once 'conection.php';

if (isset($_SESSION["id_user"])) {
    $id_user = $_SESSION['id_user'];
    $sql_user = "SELECT * FROM users WHERE id_user = $id_user";
    $users = $conn->query($sql_user);
      
    }else{
      header('location:login.php');
    }

// $id_user = $_SESSION['id_user'];
// $sql_user = "SELECT * FROM users WHERE id_user = $id_user";
// $users = $conn->query($sql_user);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- <link rel="stylesheet" href="styles.css"> -->
    <title>Admin panel</title>

    <style>
      * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
    text-decoration: none;
    list-style: none;
}

header{
  padding: 23px 14%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 999;
  background: transparent;
  transition: all .38s ease;
}

header.sticky{
  padding: 10px 1%;
  background: #fff;
  box-shadow: 0px 4px 15px rgb(0 0 0 / 8%);

}

header .lg img{
  height: 40px;
}

nav{
  display: flex;
  align-items:center;
  /* justify-content:center;
  flex-direction:row; */
}
nav li{
  margin-right: 2.5rem;
}
nav li a{
  padding: 5px 10px;
  font-size: 14px;
  font-weight: 400;
  background: #00153fd5;
  color: #fff;
  border-radius:30px;
  transition: all .30s ease;
  transition: all .35s ease;
}
nav li a:hover{
  color: #ff7d19;
  cursor: pointer;
}

nav .user{
  display: flex;
  align-items:center;
  justify-content:center;
  flex-direction:row;
  width: 35px;
  height: 35px;
  border-radius:50%;
  margin-right: 1.5rem;
}

nav .user img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

nav .user span{
  font-size: 16px;
  font-weight: 600;
  margin-left: .5rem;
}

/* sidebar */

.sidebar {
    position: fixed;
    top: 60px;
    width: 260px;
    height: calc(100% - 60px);
    background: #00153fd5;
    overflow-x: hidden;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 2;
}

.sidebar ul {
    margin-top: 20px;
}

.sidebar ul li {
    width: 100%;
    list-style: none;
}

.sidebar ul li:hover {
    background: #fff;
}

.sidebar ul li:hover a {
    color: #ff7d19;
}

.sidebar ul li a {
    width: 100%;
    text-decoration: none;
    color: #fff;
    height: 60px;
    display: flex;
    align-items: center;
}

.sidebar ul li a i {
    min-width: 60px;
    font-size: 24px;
    text-align: center;
}

/* .sidebar ul li a .user{
  width: 40px;
  height: 40px;
  border-radius:50%;
  margin-left: 1rem;
  margin-right: 1rem;
}

.sidebar ul li a .user img{
  width: 100%;
  height: 100%;
  object-fit: cover;
} */

/* main */

.main {
    position: absolute;
    top: 60px;
    width: calc(100% - 260px);
    min-height: calc(100vh - 60px);
    left: 260px;
    background: #f5f5f5;
}

.cards {
    width: 100%;
    padding: 35px 20px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 20px;
}

.cards .card {
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #00153fd5;
    border-radius: 10px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
}

.number {
    font-size: 35px;
    font-weight: 500;
    color: #ff7d19;
}

.card-name {
    color: #fff;
    font-weight: 600;
}

.icon-box i {
    font-size: 45px;
    color: #ff7d19;
}


/* charts */

.charts {
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-gap: 20px;
    width: 100%;
    padding: 20px;
    padding-top: 0;
}

.chart {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
    width: 100%;
}

.chart h2 {
    margin-bottom: 5px;
    font-size: 20px;
    color: #666;
    text-align: center
}

@media (max-width:1115px) {
    .sidebar {
        width: 60px;
    }
    .main {
        width: calc(100% - 60px);
        left: 60px;
    }
}

@media (max-width:880px) {
    /* .topbar {
        grid-template-columns: 1.6fr 6fr 0.4fr 1fr;
    } */
    .fa-bell {
        justify-self: left;
    }
    .cards {
        width: 100%;
        padding: 35px 20px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
    }
    .charts {
        grid-template-columns: 1fr;
    }
    .doughnut-chart {
        padding: 50px;
    }
    #doughnut {
        padding: 50px;
    }
}

@media (max-width:500px) {
    .topbar {
        grid-template-columns: 1fr 5fr 0.4fr 1fr;
    }
    .logo h2 {
        font-size: 20px;
    }
    .search {
        width: 80%;
    }
    .search input {
        padding: 0 20px;
    }
    .fa-bell {
        margin-right: 5px;
    }
    .cards {
        grid-template-columns: 1fr;
    }
    .doughnut-chart {
        padding: 10px;
    }
    #doughnut {
        padding: 0px;
    }
    .user {
        width: 40px;
        height: 40px;
    }
}
    </style>
</head>

<body>

<header class="sticky">
    <a class="lg" href="home.php"><img src="./img/logo2.png" alt=""></a>
    
    <nav>
      <li><a href="logout.php">Logout</a></li>
      <?php
      while($row = mysqli_fetch_assoc($users)){
        ?>

      <div class="user"><img src="./img/logo.png" alt=""><span><?php echo $row['username_user'] ?></span></div>

      <?php
      }
      ?>
    </nav>

  </header>

        <!-- <div class="header">
          <div class="header-title"><a class="lg" href="home.php"><img src="./img/logo2.png" alt=""></a></div>
          </div>
        </div> -->

        <div class="sidebar">
            <ul>
                <!-- <li>
                    <a href="#">
                        <div class="user"><img src="./img/logo.png" alt=""></div>
                        <div class="name">kira</div>
                    </a>
                </li> -->
                <li>
                    <a href="#">
                        <i class="fas fa-th-large"></i>
                        <div>Dashboard</div>
                    </a>
                </li>
                <li>
                    <a href="product-table.php">
                    <i class='bx bxs-store-alt'></i>                        
                    <div>Products</div>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <div>Users</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-users"></i>
                        <div>Customers</div>
                    </a>
                </li>
                <li>
                    <a href="orders.php">
                        <i class="fas fa-chart-bar"></i>
                        <div>Orders</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-hand-holding-usd"></i>
                        <div>Earnings</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cog"></i>
                        <div>Settings</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-question"></i>
                        <div>Help</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">1217</div>
                        <div class="card-name">Products</div>
                    </div>
                    <div class="icon-box">
                    <i class='bx bxs-store-alt'></i>                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">42</div>
                        <div class="card-name">Users</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">68</div>
                        <div class="card-name">Customers</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">$4500</div>
                        <div class="card-name">Earnings</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="charts">
                <div class="chart">
                    <h2>Earnings (past 12 months)</h2>
                    <div>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <div class="chart doughnut-chart">
                    <h2>Customers</h2>
                    <div>
                        <canvas id="doughnut"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="chart1.js"></script>
    <script src="chart2.js"></script>
</body>

</html>