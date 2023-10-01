<a class="lg" href="#"><img src="./img/logo1.png" alt=""></a>
    <nav>
        <li><a href="#home">Home</a></li>
        <li><a href="#featured">Featured</a></li>
        <li><a href="#contact">Contact</a></li>
      </nav>
      
      <div class="h-icons">
        <i class='bx bxs-cart'><span id="badge"><?php echo mysqli_num_rows($all_cart)?></span></i>
        <div class="bx bx-menu" id="menu-icon"></div>
        <a href="customer-out.php"><button class="header-button">Signin</button></a>
      <!-- <div><?php echo $_SESSION["customers_id"];  ?></div> -->
    </div>