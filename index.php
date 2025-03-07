<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="favicon" href="img/logo.png">
    <title>Food Ordering System</title>
</head>

<body>
    <header class="navbar">
        <div class="header">
            <div class="logo">
                <a href="index.php">A2RS</a>
            </div>
            <div class="nav" id="nav">
                <ul>
                    <li><a class="nav-link nav-link-ltr" href="#dishes">DISHES</a></li>
                    <li><a class="nav-link nav-link-ltr" href="#deserts">DESERTS</a></li>
                    <li><a class="nav-link nav-link-ltr" href="#drinks">DRINKS</a></li>
                    <li><a class="nav-link nav-link-ltr" href="#order">ORDER</a></li>
                    <li><a href="logout.php" class="login">Sign Out</a></li>
                    <li><a href="#"></a> <i class='bx bxs-cart-add'></i></li>

                </ul>
            </div>
            <div class="menu-toggle" id="menu-toggle">
                <i class="fa fa-bars" aria-hidden="true" class="burger"></i>
            </div>
        </div>

    </header>
    <section class="main">
        <div class="left">
            <div class="text-content">
                <h2>Special tasty<br> Burger.</h2><br>
                <h3>At A2RS Foods, our Special Tasty Burger is more than just a meal; it's an experience. Crafted with
                    the finest ingredients, each bite of this burger is designed to delight your taste buds and leave
                    you craving more.<br><br>

                    Cooking the perfect burger is an art, and at A2RS Foods, we have mastered it. Our goal is to create
                    a burger that is juicy, flavorful, and cooked to perfection every time. We start with high-quality
                    chicken if non-veg and veg ingredients in case of veg, then it's seasoned to enhance its natural
                    flavors.
                    Then, we grill it just right, ensuring that it
                    remains juicy inside while developing a delicious, slightly charred exterior. The result is a burger
                    that is not only satisfying but also packed with taste in every bite. Whether you're a burger
                    connoisseur or simply looking for a hearty and delicious meal, our Special Tasty Burger is sure to
                    impress.</h3>
            </div>
            <button class="menu"><a href="menu.html">Go to the menu</a></button>
        </div>

        <div class="right">
            <img src="img/burger.png" alt="burger">
        </div>
    </section>

    <section class="dishes" id="dishes">
        <div class="title">
            <h1>Our Tasty Dishes</h1>
            <h4>Indulge in our diverse selection of delicious dishes, each crafted with fresh ingredients and bursting
                with flavor.</h4><br><br>
        </div>

        <div class="dish-items">
            <div class="dish-item">
                <img src="img/ham.png" alt="Ham-Burger" class="food-img">
                <h3 class="food-name">Ham-Burger</h3>
                <p class="food-price">Rs. 250</p>
            </div>
            <div class="dish-item">
                <img src="img/chowmein.png" alt="Chowmein" class="food-img">
                <h3 class="food-name">Chowmein</h3>
                <p class="food-price">Rs. 120</p>
            </div>
            <div class="dish-item">
                <img src="img/pizza.png" alt="Pizza" class="food-img">
                <h3 class="food-name">Pizza</h3>
                <p class="food-price">Rs. 890</p>
            </div>
            <div class="dish-item">
                <img src="img/momo.png" alt="Momo" class="food-img">
                <h3 class="food-name">Momo</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="dish-item">
                <img src="img/paneer kadhai.png" alt="Paneer Kadhai" class="food-img">
                <h3 class="food-name">Paneer Kadhai</h3>
                <p class="food-price">Rs. 360</p>
            </div>
            <div class="dish-item">
                <img src="img/rice curry.png" alt="Rice Curry" class="food-img">
                <h3 class="food-name">Rice Curry</h3>
                <p class="food-price">Rs. 300</p>

            </div>

        </div>
        </div>
    </section>

    <section class="deserts" id="deserts">
        <div class="title">
            <h1>Our Sweet Deserts</h1>
            <h4>Treat yourself to our irresistible desserts, perfectly sweet and crafted to delight your taste buds.
            </h4><br><br>
        </div>

        <div class="desert-items">
            <div class="desert-item">
                <img src="img/raspberry pavlova.png" alt="raspberry pavlova" class="food-img">
                <h3 class="food-name">Raspberry Pavlova</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="desert-item">
                <img src="img/gulab jamun.png" alt="gulab jamun" class="food-img">
                <h3 class="food-name">Gulab Jamun</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="desert-item">
                <img src="img/rasmalai cake.png" alt="rasmalai cake" class="food-img">
                <h3 class="food-name">Rasmalai Cake</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="desert-item">
                <img src="img/strawberry pastry.png" alt="strawberry pastry" class="food-img">
                <h3 class="food-name">Strawberry Pastry</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="desert-item">
                <img src="img/cupcake.png" alt="cupcake" class="food-img">
                <h3 class="food-name">Cupcake</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="desert-item">
                <img src="img/rasgulla.png" alt="rasgulla" class="food-img">
                <h3 class="food-name">Rasgulla</h3>
                <p class="food-price">Rs. 150</p>
            </div>
        </div>
    </section>

    <section class="drinks" id="drinks">
        <div class="title">
            <h1>Our Freshning Drinks</h1>
            <h4>Refresh with our vibrant and nutritious juices, made from the freshest fruits and vegetables.</h4>
            <br><br>
        </div>

        <div class="drink-items">
            <div class="drink-item">
                <img src="img/orange juice.png" alt="orange juice" class="food-img">
                <h3 class="food-name">Orange Juice</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="drink-item">
                <img src="img/chocolate shake.png" alt="chocolate shake" class="food-img">
                <h3 class="food-name">Chocolate Shake</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="drink-item">
                <img src="img/ice-cream shake.png" alt="ice-cream shake" class="food-img">
                <h3 class="food-name">Ice-Cream Shake</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="drink-item">
                <img src="img/strawberry cocktail.png" alt="strawberry cocktail" class="food-img">
                <h3 class="food-name">Strawberry Cocktail</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="drink-item">
                <img src="img/sweet lassi.png" alt="sweet lassi" class="food-img">
                <h3 class="food-name">Sweet Lassi</h3>
                <p class="food-price">Rs. 150</p>
            </div>
            <div class="drink-item">
                <img src="img/guava juice.png" alt="guava juice" class="food-img">
                <h3 class="food-name">Guava Juice</h3>
                <p class="food-price">Rs. 150</p>
            </div>
        </div>
    </section>

    <section class="order" id="order">
        <div class="order-content">

            <div class="upper">
                <div class="upper-left">
                    <h1>Hi, A2RS here ! Your favourite Food Delivery</h1>
                    <p>We are always focused on being the best helping hand to the local business</p><br>
                    <button class="ordering" id="orderNowButton">Order Now</button>
                </div>
                <div class="upper-right">
                    <div class="deli-img">
                        <img src="img/delivery.png" alt="delivery" class="delivery">
                    </div>

                </div>
            </div>

            <div class="down">
                <h1>Our Featured Foods</h1>
                <div class="featured-items">
                    <div class="featured-item">
                        <img src="img/ham.png" alt="Ham-Burger" class="featured-img">
                        <h3 class="food-name">Ham-Burger</h3>
                        <p class="food-price">Rs. 250</p>
                    </div>

                    <div class="featured-item">
                        <img src="img/pizza.png" alt="Pizza" class="featured-img">
                        <h3 class="food-name">Pizza</h3>
                        <p class="food-price">Rs. 890</p>
                    </div>
                    <div class="featured-item">
                        <img src="img/momo.png" alt="Momo" class="featured-img">
                        <h3 class="food-name">Momo</h3>
                        <p class="food-price">Rs. 150</p>
                    </div>
                    <div class="featured-item">
                        <img src="img/biryani.png" alt="Biryani" class="featured-img">
                        <h3 class="food-name">Biryani</h3>
                        <p class="food-price">Rs. 450</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Order Container -->
        <div class="order-container" id="ordercontainer">
            <h2>Place Your Order</h2>
            <form class="order-form" action="place_order.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="order-details">Order Details:</label>
                    <textarea id="order-details" name="order-details" required></textarea>
                </div>
                <button type="submit" class="order-button">Submit Order</button>
            </form>
        </div>

        <script>
        // Redirect to the order container section when the Order Now button is clicked
        document.getElementById('orderNowButton').onclick = function() {
            window.location.href = '#ordercontainer';
        };
        </script>
    </section>


    <!-- <script src="main.js"></script> -->

    <footer>
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-col">
                    <h4>A2RS Foods</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Affiliate Program</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#dishes">Dishes</a></li>
                        <li><a href="#deserts">Deserts</a></li>
                        <li><a href="#drinks">Drinks</a></li>
                        <li><a href="#order">Order</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact Us</h4>
                    <ul>
                        <li><a href="#">Email: contact@a2rsfoods.com</a></li>
                        <li><a href="#">Phone: +9779841250107</a></li>
                        <li><a href="#">Address: 123 Food Street, Flavor Town</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#"><i class='bx bxl-facebook'></i></a>
                        <a href="#"><i class='bx bxl-twitter'></i></a>
                        <a href="#"><i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-linkedin'></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 A2RS Foods. All Rights Reserved.</p>
        </div>
    </footer>

</body>

</html>