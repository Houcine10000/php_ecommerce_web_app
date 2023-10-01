<?php
session_start();

require_once 'conection.php';

if (isset($_POST['logout'])) {
  // Empty the cart by deleting all cart entries
  $sql_delete_cart = "DELETE FROM cart";
  $conn->query($sql_delete_cart);
  // Redirect the user to the logout page
  header("Location: customer-out.php");
  exit();
}


$sql_c1 = " SELECT * FROM products WHERE product_categorie = 'c1'";
$all_c1 = $conn->query($sql_c1);


$sql_c2 = " SELECT * FROM products WHERE product_categorie = 'c2'";
$all_c2 = $conn->query($sql_c2);

  
$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce-Website</title>

  <script src="
  https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
  "></script>
  <!-- <script src="path-to-the-script/splide-extension-intersection.min.js"></script> -->
  <link href="
  https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
  " rel="stylesheet">

  <link rel="stylesheet" href="./Css./style.css">
  <link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>

  <!--cart start-->
  <main class=" main-cnt" id="main-cnt">
    <i class='bx bx-x close'></i>
  <!-- <h1><?php echo mysqli_num_rows($all_cart) ?>Items</h1> -->
  <!-- <hr> -->
  <?php
    while($row_cart = mysqli_fetch_assoc($all_cart)){

      $sql = "SELECT * FROM products WHERE product_id =".$row_cart["product_id"];
      $all_product = $conn->query($sql);
      while($row = mysqli_fetch_assoc($all_product)){
        
        
        ?>
    <div class="main-cart" id="main-cart">
    <div class="cart-box cart" id="cart-box">
    <div class="images">
      <img src="<?php  echo $row["product_image"]; ?>" alt="">
    </div>

      <p class="rate">

      </p>
      <div class="caption">
      <p class="productName"><?php  echo $row["product_name"]; ?></p>
      <p class="price"><b>$<?php  echo $row["price"]; ?></b></p>
      <p class="discount"><del>$<?php  echo $row["discount"]; ?></del></p>
      <p class="cnt">Quantity
      <input style="width: 40px;height:24px;border:none;border-radius:2px;text-align:center" class="qnt" type="number" value="1">
      </p>
      </div>
      <i class='bx bxs-trash-alt' data-id="<?php  echo $row["product_id"]; ?>"></i>
      <i class='bx bxs-check-circle' style='color:#057713'><span>Added to Cart</span></i>
    </div>
  <?php
  }
}
  ?>
  <div class="bottom">
    <div class="total">
      <div class="ttl-title">Total</div>
      <div class="ttl-price">$</div>
    </div>
    <!-- <a class="buy" href="#" id="buyNowButton">Buy Now</a> -->
    <button class="buy" id="buyNowButton">Buy Now</button>
  </div>
</div>
<script>
  var remove = document.getElementsByClassName("bxs-trash-alt");
  for (let i = 0; i < remove.length; i++) {
    remove[i].addEventListener("click",function(event){
      duration=100;
      var cartBoxes = document.querySelector(".cart-box");
      // console.log(cartBoxes);
      var target = event.target;
      var cart_id = target.getAttribute("data-id");
      var xml = new XMLHttpRequest();
      xml.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
      console.log(typeof this);
          target.innerHTML = this.responseText;
          target.style.opacity = .3;
          target.parentElement.remove();
        }
      }

      xml.open("GET","conection.php?cart_id="+cart_id,true);
      xml.send();
    });
    
  }

  var x = document.querySelector(".bx-x");
  var mainCart = document.querySelector(".main-cnt");
  var duration = 100;
  x.onclick = ()=>{
    mainCart.classList.remove('open');
    setTimeout("location.reload(true);",duration);
  }

  document.getElementById("buyNowButton").addEventListener("click", function() {
  var mainCart = document.getElementById("main-cart");
  var orderInProgress = document.createElement("div");
  orderInProgress.innerText = "Order In Progress ()";
  orderInProgress.classList.add("order-in-progress");
  mainCart.style.display = "none";
  document.getElementById("main-cnt").appendChild(orderInProgress);

  var count = 10;
  var countdown = setInterval(function() {
    orderInProgress.innerText = "Order In Progress (" + count + " seconds)";
    count--;
    if (count < 0) {
      clearInterval(countdown);
      orderInProgress.innerText = "We will tell you whether your order is accepted or not in this mail '<?php echo $_SESSION["customers_mail"];  ?>'";
    }
  }, 1000);
});

</script>
</main>
  <!--Cart End-->


  <!--Header start-->
  <header class="sticky">
    <?php
    if (isset($_SESSION["customers_id"])) {
    include("navbar1.php");
      
    }else{
    include("navbar2.php");

    }
    ?>
  </header>

  <script>
    var shop = document.querySelector(".bxs-cart");
    var mainCart = document.querySelector(".main-cnt");

    // shop.onclick = ()=>{
    //   mainCart.classList.add('open');
    // }

    let currentColorIdx = 1;
    var colors = ['#d39b77','#ff6666'];

    // Call changeImage() function on button click
    shop.onclick = ()=> {
    if(currentColorIdx >= colors.length){
      currentColorIdx = 0;
    }
    shop.style.color = colors[currentColorIdx++];
    mainCart.classList.add('open');
    }

  </script>
  <!--Header End-->

  <!--Home start-->
  <section class="home" id="home">
    <i class='bx bx-chevron-right' ></i>
    <!-- <i class='bx bx-chevron-left'></i> -->
    <div class="home-text">
      <h1>Men's New<br><span>Arrivals</span></h1>
      <h2>New colors, now also available in men's sizing</h2>
      <a class="btn" href="#">View Collection</a>
    </div>
  </section>

<script>
  // function changeBg(){
    
    const fonts = [
      'bg1.jpg',
      'bg2.jpg',
      'bg3.jpg',
      'bg4.jpg',
    ];
    
    const home = document.querySelector('.home');
    const arrowRight = document.querySelector('.bx-chevron-right');
    let currentImgIdx = 1;
    // const bg = fonts[Math.floor(Math.random() * fonts.length)];
    // home.style.backgroundImage = bg;
  // };
    arrowRight.onclick = ()=> {
      if(currentImgIdx >= fonts.length){
          currentImgIdx = 0;
      }
      home.style.backgroundImage = 'url("Fonts/'+ fonts[currentImgIdx++] +' ")';
    }
    setInterval(()=>{
      if(currentImgIdx >= fonts.length){
          currentImgIdx = 0;
      }
      home.style.backgroundImage = 'url("Fonts/'+ fonts[currentImgIdx++] +' ")';
    },5000);
</script>
  <!--Home end-->

  <!--Featured start-->
  <section class="featured" id="featured">
    <div class="center-txt">
      <h1>Featured Categories</h1>
    </div>
    
    <div class="featured-content">

      <?php
          while($row = mysqli_fetch_assoc($all_c1)){
        ?>

        <div>
          <div class="overlay"></div>
          <img src="<?php  echo $row["product_image"]; ?>">
          <h2>$<?php  echo $row["price"]; ?><br><del><span>$<?php  echo $row["discount"]; ?></span></del></h2>
          <i class='add bx bx-shopping-bag' data-id="<?php  echo $row["product_id"]; ?>"></i>
        </div>
      <?php
        }
      ?>
    </div>
  </section>
  <!--Featured end-->

  <!--cta start-->
  <section class="cta" >
    <div class="cta-txt">
      <h1>summer on sale</h1>
      <h2>NEW Arrivals <br> 20% OFF</h2>
      <a class="shop-btn" href="#">Shop Now</a>
    </div>
  </section>

  <script>    
    const ctas = [
      'cta1.jpg',
      'cta2.jpg',
      'cta3.png',
    ];
    
    const cta = document.querySelector('.cta');
    let currentCta = 1;
    // arrowRight.onclick = ()=> {
    //   if(currentImgIdx >= fonts.length){
    //       currentImgIdx = 0;
    //   }
      // cta.style.backgroundImage = 'url("Fonts/'+ fonts[currentImgIdx++] +' ")';
    // }
    setInterval(()=>{
      if(currentCta >= ctas.length){
        currentCta = 0;
      }
      cta.style.backgroundImage = 'url("Fonts/'+ ctas[currentCta++] +' ")';
      // console.log(ctas);
    },3000);
    </script>
    <!--cta end-->

  <!--New Arrivals start-->

  <section class="splide">
    <div class="splide__slider">
      <div class="splide__track">
        <ul class="splide__list">
          <?php
            while($row = mysqli_fetch_assoc($all_c2)){
          ?>
          <li class="splide__slide">
            <div class="box">
              <img src="<?php  echo $row["product_image"]; ?>">
              <div class="sale">
                <h2>Sale</h2>
              </div>
              <div class="box-txt">
              <h3><?php  echo $row["product_name"]; ?></h3>
              <p><b>$<?php  echo $row["price"]; ?></b></p>
              <p class="discount"><b><del>$<?php  echo $row["discount"]; ?></del></b></p>
              </div>
              <button id="add"><i class='add bx bx-shopping-bag' data-id="<?php  echo $row["product_id"]; ?>"></i></button>
              </div>
              <?php
              }
              ?> 
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>

      <script>
      var product_id = document.getElementsByClassName('add');
      for (let i = 0; i < product_id.length; i++) {
          product_id[i].addEventListener("click", function(event) {
              duration = 100;
              var target = event.target;
              var id = target.getAttribute("data-id");
              $('#main-cart').load(location.href + " #main-cart");
              var xml = new XMLHttpRequest();
              xml.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    // console.log(this.responseText);
                      var data = JSON.parse(this.responseText);
                    // console.log(data);
                      target.innerHTML = data.in_cart;
                      target.style.background = '#1d1d1d';
                      badge = document.getElementById("badge");
                      badge.innerHTML = data.num_cart + 1;
                      let plus = document.getElementById("plus");
      
                      // Calculate and update the total price
                      var totalPrice = calculateTotalPrice();
                      document.querySelector(".ttl-price").innerHTML = "$" + totalPrice.toFixed(2);

                  }
              }
              xml.open("GET", "conection.php?id=" + id + "&customers_id=<?php echo $_SESSION['customers_id']; ?>", true);
              xml.send();
          });
      }

      function calculateTotalPrice() {
        var prices = document.querySelectorAll(".price b");
        var quantities = document.querySelectorAll(".qnt");
        var totalPrice = 0;

        for (var i = 0; i < prices.length; i++) {
          var price = parseFloat(prices[i].innerText.replace("$", ""));
          var quantity = parseInt(quantities[i].value);
          totalPrice += price * quantity;
      }

        return totalPrice;
      }

      // Calculate the total price initially when the page loads
      var initialTotalPrice = calculateTotalPrice();
      document.querySelector(".ttl-price").innerHTML = "$" + initialTotalPrice.toFixed(2);

    </script>
  <!--New Arrivals end-->

    <!--brand start-->
    <section>
      <div class="brand-content">
        <img src="img/brand1.png">
        <img src="img/brand2.png">
        <img src="img/brand3.png">
        <img src="img/brand4.png">
        <img src="img/brand5.png">
        <img src="img/brand6.png">
      </div>
    </section>

    <!-- <section class="splide">
    <div class="splide__slider">
      <div class="splide__track">
        <ul class="splide__list">
          <li class="splide__slide"><img src="img/brand1.png"></li>
          <li class="splide__slide"><img src="img/brand2.png"></li>
          <li class="splide__slide"><img src="img/brand3.png"></li>
          <li class="splide__slide"><img src="img/brand4.png"></li>
          <li class="splide__slide"><img src="img/brand5.png"></li>
          <li class="splide__slide"><img src="img/brand6.png"></li>
        </ul>
      </div>
    </div>
  </section> -->

    <script>
      var splide = new Splide( '.splide', {
        type    : 'loop',
        autoplay: 'play',
        perPage : 1,
      //   intersection: {
      //   inView: {
      //   autoplay: true,
      //   },
      // },
      } );


      splide.on( 'autoplay:playing', function ( rate ) {
        // console.log( rate ); // 0-1
      } );


      splide.mount();
    </script>
    <!--brand end-->

    <!--Contact start-->
    <section class="contact" id="contact">

      <div class="main-contact">
          <h1>Classix</h1>
          <h2>Let's contact with us</h2>
          <div class="icons">
            <img src="Links/discord-fill.png">
            <img src="Links/facebook-circle-fill.png">
            <img src="Links/instagram-fill.png">
          </div>
        </div>

        <div class="main-contact">
          <h1>Explore</h1>
            <li><a href="#home">Home</a></li>
            <li><a href="#featured">Featured</a></li>
            <li><a href="#new">New</a></li>
            <li><a href="#contact">Contact</a></li>
        </div>

        <div class="main-contact">
          <h1>Our Services</h1>
          <li><a href="#">Pricing</a></li>
          <li><a href="#">Free Shipping</a></li>
          <li><a href="#">Gift Cards</a></li>
          </div>
        </div>

        <div class="main-contact">
          <h1>Shopping</h1>
          <li><a href="#">Clothing Store</a></li>
          <li><a href="#">Trending Shoes</a></li>
          <li><a href="#">Accessories</a></li>
          <li><a href="#">Sale</a></li>
          </div>
    </section>

    <div class="last-txt">
      <p>Copyright © 2022 All rights reserved | This template is made with 🤎 by Houcine-/D </p>
    </div>
    <a href="#home" class="scroll-top">
      <i class='bx bx-chevrons-up'></i>
    </a>
    <!--Contact end-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script src="./main.js"></script>
</body>
</html>