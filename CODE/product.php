<?php require "../includes/header.php"; ?>

<body>
  <section id="header">
    <a href="#"><img src="img/f32f17d9-cb85-4b65-bf8b-ed96c8ce3c92.png" class="logo" alt="logo"></a>
    <div>
      <ul id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a class="active" href="shop.php">Shop</a></li>
        <li><a href="Blog.php">Blog</a></li>
        <li><a href="About.php">About</a></li>
        <li><a href="contact.php">contact</a></li>
        <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
        <a href="#" id="close"><i class="fas fa-window-close"></i></a>
      </ul>
    </div>

    <div id="mobile">
      <a href="cart.html"><i class="fas fa-shopping-cart"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>
  </section>



  <section id="productdetails" class="section-p1">
    <div class="single-pro-image">
      <img src="../ASSETES/IMG/SINGLEPC/91b363e6-de48-40f5-b4cd-b1aaf0cfdbec.jpg" width="100%" id="MainImg"
        alt="Main Product Image">

      <div class="small-img-group">
        <div class="small-img-col">
          <img src="../ASSETES/IMG/SINGLEPC/91b363e6-de48-40f5-b4cd-b1aaf0cfdbec.jpg" width="100%" class="small-img"
            alt="Product Image 1">
        </div>
        <div class="small-img-col">
          <img src="../ASSETES/IMG/SINGLEPC/bae53c19-92a3-4227-bfdd-50893dd6d934.jpg" width="100%" class="small-img"
            alt="Product Image 2">
        </div>
        <div class="small-img-col">
          <img src="../ASSETES/IMG/SINGLEPC/c9e100cb-9265-43f6-9142-ba4e46f4c003.jpg" width="100%" class="small-img"
            alt="Product Image 3">
        </div>
        <div class="small-img-col">
          <img src="../ASSETES/IMG/SINGLEPC/laptop92824(04).jpg" width="100%" class="small-img" alt="Product Image 4">
        </div>
      </div>
    </div>
    <div class="single-pro-details">
      <h6>Home / Laptops</h6>
      <h4>High-Performance Gaming Laptop</h4>
      <h3>$1,299.00</h3>
      <label for="spec-select">Select Specifications:</label>
      <select id="spec-select">
        <option>8GB RAM / 256GB SSD</option>
        <option>16GB RAM / 512GB SSD</option>
        <option>32GB RAM / 1TB SSD</option>
      </select>
      <label for="quantity" class="quantity-label">Quantity:</label>
      <input type="number" id="quantity" min="1" value="1">
      <button class="normal" onclick="window.location.href='cart.php'">Add to Cart</button>

      <h4>Product Details</h4>
      <p><span>Why You'll Love It:</span> Discover the ultimate gaming experience with this high-performance laptop.
        Engineered for speed and power, it boasts the latest graphics, ample storage, and lightning-fast processing to
        handle even the most demanding games. Perfect for both gaming enthusiasts and professionals looking for
        unmatched performance.</p>
    </div>

  </section>

  <section id="product1" class="section-p1">
    <h2>Featured products</h2>
    <p>Summer Collection New Modern Designs.</p>
    <div class="product-container">
      <div class="pro">
        <img src="../ASSETES/IMG/SINGLEPC/4abe43ea-9ba2-4980-9b6b-2c7d9915d0b9.jpg" alt="">
        <div class="dis">
          <span>Addidass</span>
          <h5>Cartoon Astronut T-shirts</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$45</h4>
        </div>
        <a href="#" class="no"><i class="fa-solid fa-cart-plus "></i></a>
      </div>

      <div class="pro">
        <img src="../ASSETES/IMG/SINGLEPC/91b363e6-de48-40f5-b4cd-b1aaf0cfdbec.jpg" alt="">
        <div class="dis">
          <span>BrandOne</span>
          <h5>Galaxy Explorer T-shirt</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$45</h4>
        </div>
        <a href="cart.php" class="no"><i class="fa-solid fa-cart-plus "></i></a>
      </div>

      <div class="pro">
        <img src="../ASSETES/IMG/SINGLEPC/bae53c19-92a3-4227-bfdd-50893dd6d934.jpg" alt="">
        <div class="dis">
          <span>BrandTwo</span>
          <h5>>Robot Revolution T-shirt</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$45</h4>
        </div>
        <a href="#" class="no"><i class="fa-solid fa-cart-plus "></i></a>
      </div>
      <div class="pro">
        <img src="../ASSETES/IMG/SINGLEPC/c9e100cb-9265-43f6-9142-ba4e46f4c003.jpg" alt="">
        <div class="dis">
          <span>BrandThree</span>
          <h5>Space Adventure T-shirt</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$45</h4>
        </div>
        <a href="cart.php" class="no"><i class="fa-solid fa-cart-plus "></i></a>
      </div>

      <div class="pro">
        <img src="../ASSETES/IMG/SINGLEPC/laptop92824(04).jpg" alt="">
        <div class="dis">
          <span>BrandFive</span>
          <h5>Mountain Explorer T-shirt</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$45</h4>
        </div>
        <a href="cart.php" class="no"><i class="fa-solid fa-cart-plus "></i></a>
      </div>

      <div class="pro">
        <img src="../ASSETES/IMG/SINGLEPC/laptop92824(09).jpg" alt="">
        <div class="dis">
          <span>BrandSeven</span>
          <h5>Urban Jungle T-shirt</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$45</h4>
        </div>
        <a href="cart.php" class="no"><i class="fa-solid fa-cart-plus "></i></a>
      </div>

      <div class="pro">
        <img src="../ASSETES/IMG/SINGLEPC/4abe43ea-9ba2-4980-9b6b-2c7d9915d0b9.jpg" alt="">
        <div class="dis">
          <span>Addidass</span>
          <h5>Cartoon Astronut T-shirts</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$45</h4>
        </div>
        <a href="cart.php" class="no"><i class="fa-solid fa-cart-plus "></i></a>
      </div>

      <div class="pro">
        <img src="../ASSETES/IMG/SINGLEPC/91b363e6-de48-40f5-b4cd-b1aaf0cfdbec.jpg" alt="">
        <div class="dis">
          <span>Addidass</span>
          <h5>Cartoon Astronut T-shirts</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$45</h4>
        </div>
        <a href="cart.php" class="no"><i class="fa-solid fa-cart-plus "></i></a>
      </div>

    </div>
  </section>

  <section id="Newsletter" class="section-m1">
    <div class="container">
      <div class="container-items">
        <div class="text-content">
          <h2>Signup for Newsletter</h2>
          <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="em-bu">
          <input type="text" name="email" id="email" placeholder="Your E-mail Address">
          <button class="Normal">Sign Up</button>
        </div>
      </div>
    </div>
  </section>


  <footer class="section-p1">
    <div class="colum">
      <h4>Contact</h4>
      <p><strong>Address:</strong> Kannakiamman Kovil Road, Thirupernthurai, Batticaloa</p>
      <p><strong>Phone:</strong> +94 753883167 / (+94) 075 3883166</p>
      <p><strong>Hours:</strong> 10.00 - 18.00, Mon-Sat</p>
    </div>

    <div class="follow">
      <h4>Follow us</h4>
      <div class="Icon">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-pinterest-p"></i>
        <i class="fab fa-youtube"></i>
      </div>
    </div>

    <div class="col">
      <h4>About</h4>
      <a href="#">About Us</a>
      <a href="#">Delivery Information</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms & Conditions</a>
      <a href="#">Contact Us</a>
    </div>

    <div class="col">
      <h4>Account</h4>
      <a href="#">My Account</a>
      <a href="#">Sign In</a>
      <a href="#">View Cart</a>
      <a href="#">My Wishlist</a>
      <a href="#">Track My Order</a>
    </div>

    <div class="col install">
      <h4>Install App</h4>
      <p>From App Store or Google Play</p>
      <div class="Row">
        <img src="../ASSETES/pay.png" alt="">
        <img src="../ASSETES/app.jpg" alt="">
      </div>
      <p>Secured Payment Gateways</p>
      <img src="../ASSETES/play.jpg" alt="">
    </div>
  </footer>

  <script>
    var mainimg = document.getElementById("MainImg");
    var smallimg = document.getElementsByClassName("small-img");

    smallimg[0].onclick = function () {
      mainimg.src = smallimg[0].src;
    }

    smallimg[1].onclick = function () {
      mainimg.src = smallimg[1].src;
    }
    smallimg[2].onclick = function () {
      mainimg.src = smallimg[2].src;
    }
    smallimg[3].onclick = function () {
      mainimg.src = smallimg[3].src;
    }
  </script>

  <script src="script2.js"></script>


</body>

</html>