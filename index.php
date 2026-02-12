<?php
require "connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mad Colors | Home</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo.png" />
</head>

<body>
    <div class=" container-fluid">
        <div class="row">

            <?php require "header.php" ?>

            <div class="col-12">
                <div class="row">

                    <div id="carouselExampleControls" class="carousel slide mb-3" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resources/slider-images/photo1.jpg" class="d-block w-100 poster-image ">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/slider-images/photo2.jpg" class="d-block w-100 poster-image">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/slider-images/photo3.jpg" class="d-block w-100 poster-image ">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/slider-images/photo4.jpg" class="d-block w-100 poster-image ">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/slider-images/photo5.jpg" class="d-block w-100 poster-image ">
                            </div>
                            <div class="carousel-item">
                                <img src="resources/slider-images/photo6.webp" class="d-block w-100 poster-image ">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <hr>

                </div>
            </div>

            <div class="col-12" style="color: red;">
                <div class="row">

                    <div class="col-3 inline">
                        <div class="row">
                            <div class="offset-1 col-2 fs-1">
                                <i class="bi bi-cash-coin"></i>
                            </div>
                            <div class="col-4 text-center">
                                <span>CASH ON <br /> DELIVERY</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 inline">
                        <div class="row">
                            <div class="offset-1 col-2 fs-1">
                                <i class="bi bi-credit-card-2-back"></i>
                            </div>
                            <div class="col-4 text-center">
                                <span>SECURE <br /> PAYMENT</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 inline">
                        <div class="row">
                            <div class="offset-1 col-2 fs-1">
                                <i class="bi bi-truck"></i>
                            </div>
                            <div class="col-4 text-center">
                                <span>ISLAND-WILD <br /> DELIVERY</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 inline">
                        <div class="row">
                            <div class="offset-1 col-2 fs-1">
                                <i class="bi bi-emoji-heart-eyes"></i>
                            </div>
                            <div class="col-4 text-center">
                                <span>UNLIMITED <br /> DESIGN</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-lg-3 col-5 mx-1 image1">
                        <div class="row justify-content-center mt-5 ">
                            <div class="col-12">
                                <div class="card bg-transparent border border-white">
                                    <div class="card-body text-white">
                                        <h1 class="card-title">MEN'S</h1>
                                        <a href="#" class="text-white text-decoration-none">VIEW COLLECTION</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-5 mx-1 image2">
                        <div class="row justify-content-center mt-5 ">
                            <div class="col-12">
                                <div class="card bg-transparent border border-white">
                                    <div class="card-body text-white">
                                        <h1 class="card-title">WOMEN'S</h1>
                                        <a href="#" class="text-white text-decoration-none">VIEW COLLECTION</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-5 mx-1 image3">
                        <div class="row justify-content-center mt-5 ">
                            <div class="col-12">
                                <div class="card bg-transparent border border-white">
                                    <div class="card-body text-white">
                                        <h1 class="card-title">KIDS'S</h1>
                                        <a href="#" class="text-white text-decoration-none">VIEW COLLECTION</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-5 mx-5 my-5 image">
                        <div class="row justify-content-center mt-4 ">
                            <div class="col-12">
                                <div class="card bg-transparent border border-white">
                                    <div class="card-body text-white text-center">
                                        <img src="resources/tape.svg" style="height: 60px;" />
                                        <h3 class="card-title">SIZE GUIDE</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-4">
                        <hr class="border border-3 border-dark" />
                    </div>
                    <div class="col-4 text-center text-black-50" style="font-size: 35px;">NEW ARRIVALS</div>
                    <div class="col-4 ">
                        <hr class="border border-3 border-dark" />
                    </div>
                </div>
            </div>

            <div class="col-12 mt-1 mb-1">
                <div class="row ">

                    <div class="col-12">
                        <div class="row justify-content-center gap-2">

                            <?php

                            $product_rs = Database::search("SELECT * FROM `product` WHERE
                            `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                            $product_num = $product_rs->num_rows;

                            for ($z = 0; $z < $product_num; $z++) {
                                $product_data = $product_rs->fetch_assoc();

                            ?>
                                <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                                    <?php

                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                    $image_data = $image_rs->fetch_assoc();

                                    ?>

                                    <a href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>'>
                                        <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail mt-2 bi bi-cart3" style="height: 300px;" />
                                    </a>
                                    <div class="col-12 mx-3">
                                        <div class="row">
                                            <span class="badge bg-secondary col-2 mt-1 bg-danger">New</span>
                                            <?php

                                            $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "'");
                                            $wishlist_num = $wishlist_rs->num_rows;

                                            if ($wishlist_num == 1) {
                                            ?>
                                                <span class=" offset-4 col-3"> <i class="bi bi-heart-fill text-danger fs-5" onclick='addToWishlist(<?php echo $product_data["id"]; ?>);' id="heart<?php echo $product_data["id"]; ?>"></i></span>

                                            <?php
                                            } else {
                                            ?>

                                                <span class=" offset-4 col-3"> <i class="bi bi-heart fs-5" style="color: red;" onclick='addToWishlist(<?php echo $product_data["id"]; ?>);' id="heart<?php echo $product_data["id"]; ?>"></i></span>

                                            <?php
                                            }
                                            ?>

                                            <span class="col-3"> <i class="bi bi-cart2 fs-5" style="color: red;" onclick="addToCart(<?php echo $product_data['id']; ?>);"></i></span>
                                        </div>
                                    </div>
                                    <div class="card-body ms-0 m-0 text-center">
                                        <h5 class="card-title fs-6 fw-bold"><?php echo $product_data["title"]; ?></h5>
                                        <span class="card-text">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-4">
                        <hr class="border border-3 border-dark" />
                    </div>
                    <div class="col-4 text-center text-black-50" style="font-size: 35px;">SHOP BY CATEGORY</div>
                    <div class="col-4 ">
                        <hr class="border border-3 border-dark" />
                    </div>
                </div>
            </div>

            <?php

            $c_rs = Database::search("SELECT * FROM `maincategory`");
            $c_num = $c_rs->num_rows;

            for ($y = 0; $y < $c_num; $y++) {
                $cdata = $c_rs->fetch_assoc();

            ?>

                <div class="col-12 mt-3 mb-3">
                    <a href="#" class="text-decoration-none link-dark fs-3 fw-bold"><?php echo $cdata["name"]; ?></a> &nbsp;&nbsp;
                    <a href="#" class="text-decoration-none link-dark fs-6">See All &nbsp; &rarr;</a>
                </div>

                <div class="col-12 mt-1 mb-1">
                    <div class="row ">

                        <div class="col-12">
                            <div class="row justify-content-center gap-2">

                                <?php

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `maincategory_id`='" . $cdata["id"] . "' AND
                                        `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
                                $product_num = $product_rs->num_rows;

                                for ($z = 0; $z < $product_num; $z++) {
                                    $product_data = $product_rs->fetch_assoc();

                                ?>

                                    <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">
                                        <?php

                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();

                                        ?>
                                        <a href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>'>
                                            <img src="<?php echo $image_data["code"]; ?>" class="card-img-top img-thumbnail mt-2 bi bi-cart3" style="height: 300px;" />
                                        </a>
                                        <div class="col-12 mx-3">
                                            <div class="row justify-content-center">

                                                <?php

                                                $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "'");
                                                $wishlist_num = $wishlist_rs->num_rows;

                                                if ($wishlist_num == 1) {
                                                ?>
                                                    <span class="col-3"> <i class="bi bi-heart-fill text-danger fs-5" onclick='addToWishlist(<?php echo $product_data["id"]; ?>);' id="heart<?php echo $product_data["id"]; ?>"></i></span>

                                                <?php
                                                } else {
                                                ?>

                                                    <span class="col-3"> <i class="bi bi-heart fs-5" style="color: red;" onclick='addToWishlist(<?php echo $product_data["id"]; ?>);' id="heart<?php echo $product_data["id"]; ?>"></i></span>

                                                <?php
                                                }
                                                ?>
                                                <span class="col-3"> <i class="bi bi-cart2 fs-5" style="color: red;" onclick="addToCart(<?php echo $product_data['id']; ?>);"></i></span>
                                            </div>
                                        </div>
                                        <div class="card-body ms-0 m-0 text-center">
                                            <h5 class="card-title fs-6 fw-bold"><?php echo $product_data["title"]; ?></h5>
                                            <span class="card-text">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                        </div>

                    <?php
                }

                    ?>

                    </div>
                </div>

                <?php require "footer.php" ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>