<?php require "../includes/header.php"; ?>

<body>
    <section id="header">
        <a href="#"><img src="img/f32f17d9-cb85-4b65-bf8b-ed96c8ce3c92.png" class="logo" alt="logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="Blog.php">Blog</a></li>
                <li><a href="About.php">About</a></li>
                <li><a class="active" href="contact.php">contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
                <a href="#" id="close"><i class="fas fa-window-close"></i></a>
            </ul>

        </div>

        <div id="mobile">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>

    </section>

    <section id="page-header" class="Blog-header about-header">
        <h2>#Let's_Talk. </h2>
        <p>Discover exclusive discounts and special offers with our latest coupons. Enjoy up to 70% off on select items!
        </p>
    </section>
    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Discover Exclusive Discounts</h2>
            <h3>Head Office</h3>
            <ul class="contact-list">
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Kannaki Amman Kovil Road, Batticaloa, Sri Lanka</p>
                    <div class="popper" data-content="Main office address in Batticaloa.">
                        <span class="popper-text"><a href="#">More Info</a></span>
                    </div>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>+94 123 456 789</p>
                    <div class="popper" data-content="Contact us via phone.">
                        <span class="popper-text"><a href="#">More Info</a></span>
                    </div>
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    <p>info@example.com</p>
                    <div class="popper" data-content="Send us an email.">
                        <span class="popper-text"><a href="#">More Info</a></span>
                    </div>
                </li>
                <li>
                    <i class="fas fa-clock"></i>
                    <p>Mon - Fri: 9 AM - 5 PM</p>
                    <div class="popper" data-content="Office working hours.">
                        <span class="popper-text"><a href="#">More Info</a></span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.643941561389!2d81.69308419999999!3d7.721297600000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afacd58b5d1508b%3A0xe67a0047e0788b6a!2sKannaki%20Amman%20Kovil%20Rd%2C%20Batticaloa!5e0!3m2!1sen!2slk!4v1723384690430!5m2!1sen!2slk"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>


    <?php require "../includes/footer.php"; ?>