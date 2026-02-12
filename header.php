<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class="col-12 mt-1">
        <div class="row">

            <div class="offset-1 col-12 col-lg-4 align-self-start">
                <span class="title offset-lg-1 offset-3">Mad Colors</span>
            </div>
            <div class="offset-lg-1 col-lg-3 col-6">
                <form class="form mt-4">
                    <input type="text" class="hinput" placeholder="Search Products.................." />
                    <button type="submit" class="hbutton"><i class="bi bi-search"></i></button>
                </form>
            </div>

            <div class="offset-lg-1 col- col-lg-2 col-6 align-self-end mb-3">
                <div class="row">
                    <div class="col-5 col-lg-7 offset-lg-0 offset-3">
                        <?php

                        if (isset($_SESSION["u"])) {
                            $data = $_SESSION["u"];

                        ?>
                            <span class="fw-bold" onclick="signout();">Sign Out</span>
                        <?php

                        } else {
                        ?>
                            <span class="fw-bold" onclick="signin();">Sing In / Login</span>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="col-3 col-lg-5 cart-icon">
                        <a href="wishlist.php" class="text-decoration-none  fs-5 "><i class="bi bi-heart" style="color: red;"></i></a>
                        <a href="cart.php" class="text-decoration-none  fs-4 "><i class="bi bi-cart3" style="color: red;"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <hr />

    <div class="col-12">
        <div class="row">
            <div class="offset-lg-1 col-lg-2 col-6 menu">
                <ul class="nav navbar-nav top-menu">
                    <li class="dropdown nav-itm open">
                        <a href="" class="dropdown-toggle text-decoration-none text-dark" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">WOMEN WEAR</a>
                        <div class=" dropdown-menu" style="width: 550px; height: 350px;">
                            <div class=" dropdown-inner col-12">
                                <div class="row">
                                    <div class=" menu-content col-6 text-center">
                                        <p><a href="" class="see-all text-decoration-none text-dark">See All Women Wear</a></p>
                                        <ul class=" list-unstyled">
                                            <li>Dresses</li>
                                            <li>Tops</li>
                                            <li>Crops</li>
                                        </ul>
                                    </div>
                                    <div class=" col-6">
                                        <img src="resources/meanu-images/menu_img1.jpg" class="menu-image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-6 menu">
                <ul class="nav navbar-nav top-menu">
                    <li class="dropdown nav-itm open">
                        <a href="" class="dropdown-toggle text-decoration-none text-dark" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">MEN WEAR</a>
                        <div class=" dropdown-menu" style="width: 550px; height: 350px;">
                            <div class=" dropdown-inner col-12">
                                <div class="row">
                                    <div class=" menu-content col-6 text-center">
                                        <p><a href="" class="see-all text-decoration-none text-dark">See All Men Wear</a></p>
                                        <ul class=" list-unstyled">
                                            <li>Casual Shirts</li>
                                            <li>T-shirts</li>
                                            <li>Hoodies</li>
                                        </ul>
                                    </div>
                                    <div class=" col-6">
                                        <img src="resources/meanu-images/menu_img2.jpg" class="menu-image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-2 col-6 menu">
                <ul class="nav navbar-nav top-menu">
                    <li class="dropdown nav-itm open">
                        <a href="" class="dropdown-toggle text-decoration-none text-dark" data-bs-toggle="dropdown" data-bs-auto-close="inside" aria-expanded="false">KIDS WEAR</a>
                        <div class=" dropdown-menu" style="width: 550px; height: 350px;">
                            <div class=" dropdown-inner col-12">
                                <div class="row">
                                    <div class=" menu-content col-6 text-center">
                                        <p><a href="" class="see-all text-decoration-none text-dark">See All Kids Wear</a></p>
                                        <ul class=" list-unstyled">
                                            <li>Boys Wear</li>
                                            <li>Girls Wear</li>
                                        </ul>
                                    </div>
                                    <div class=" col-6">
                                        <img src="resources/meanu-images/menu_img3.jpg" class="menu-image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="offset-lg-1 col-lg-2 col-3 text-center text-lg-start">
                <!-- <button class=" border-0 bg-transparent" onclick="product.php">Shop</button> -->
                <a href="product.php" class="link-secondary text-decoration-none fw-bold">Shop</a>
            </div>
            <div class="col-lg-2 col-2">
                <a href="mailto:lokuganhewagehashini30@gmail.com"><i class="bi bi-envelope-fill fs-5" style="color: red;"></i></a>
                <a href="tel:0712343245"><i class="bi bi-telephone-fill fs-5 mx-lg-3" style="color: red;"></i></a>
            </div>
        </div>
    </div>

    <div class="col-12">
        <hr class="border border-1 border-dark" />
    </div>

    <script src="script.js"></script>
</body>

</html>