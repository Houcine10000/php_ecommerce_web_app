<a class="lg" href="#"><img src="./img/logo1.png" alt=""></a>
    <nav>
        <li><a href="#home">Home</a></li>
        <li><a href="#featured">Featured</a></li>
        <li><a href="#contact">Contact</a></li>
        <!-- <li><a href="customer-out.php">Logout</a></li> -->
      </nav>
      
      <div class="h-icons">
        <i class='bx bxs-cart'>
          <span class="" id="badge"><p id="plus">+</p><?php echo mysqli_num_rows($all_cart)?></span>
        </i>
        <div class="bx bx-menu" id="menu-icon"></div>
        <form method="post" action="">
          <button type="submit" name="logout" class="header-button">Logout</button>
        </form>
      <!-- <div><?php echo $_SESSION["customers_id"];  ?></div> -->
    </div>

    <style>
      .h-icons i span{
        display: flex;
        flex-direction: row;
      }
      .h-icons i span p{
        display: none;
      }
      .h-icons i span.open p{
        display: block;
      }
    </style>