<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mad Colors | Wishlist</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php require "header.php";

            if (isset($_SESSION["u"])) {

            ?>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <nav aria-label="breadcrumb ">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class=" card-body text-center">
                                    <i class="bi bi-heart" style="font-size: 60px;"></i>
                                    <p class="title4">My Wishlist</p>

                                    <div class="col-12">
                                        <hr class="border border-1 border-primary" />
                                    </div>

                                    <?php
                                    require "connection.php";
                                    $user = $_SESSION["u"]["email"];

                                    $wish_rs = Database::search("SELECT * FROM `wishlist` WHERE `users_email`='" . $user . "'");
                                    $wish_num = $wish_rs->num_rows;

                                    if ($wish_num == 0) {
                                    ?>

                                        <!-- empty view -->
                                        <div class="col-12 mt-5 mb-5">
                                            <div class="row justify-content-center">
                                                <div class="col-12 ">
                                                    <label class="form-label fs-1 fw-bold">Wishlist is currently empty.</label>
                                                </div>
                                                <div class=" col-12 col-lg-3 d-grid">
                                                    <a href="index.php" class="btn btn-secondary fs-3 fw-bold">RETURN TO SHOP</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- empty view -->

                                    <?php
                                    } else {
                                    ?>

                                        <div class="col-12">
                                            <div class="col-12 mt-5 mb-3">
                                                <div class="row">
                                                    <div class="col-3 bg-light py-2"></div>
                                                    <div class="col-2 bg-light py-2">
                                                        <span class="fs-4 fw-bold ">Product Name</span>
                                                    </div>
                                                    <div class="col-2 bg-light py-2">
                                                        <span class="fs-4 fw-bold">Unit Price</span>
                                                    </div>
                                                    <div class="col-2 bg-light py-2">
                                                        <span class="fs-4 fw-bold">stock Status</span>
                                                    </div>
                                                    <div class="col-3 py-2"></div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <hr />
                                            </div>

                                            <?php
                                            for ($x = 0; $x < $wish_num; $x++) {
                                                $wish_data = $wish_rs->fetch_assoc();
                                            ?>

                                                <div class="col-12 mt-5 mb-3">
                                                    <div class="row">

                                                        <div class="col-3 bg-light py-2 d-inline">
                                                            <i class="bi bi-trash3 p-3" style="font-size: 40px;" onclick='removeFromWatchlist(<?php echo $wish_data["id"]; ?>);'></i>
                                                            
                                                            <?php
                                                            $img = array();

                                                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $wish_data["product_id"] . "'");
                                                            $image_data = $image_rs->fetch_assoc();
                                                            ?>

                                                            <img src="<?php echo $image_data["code"]; ?>" style="height: 150px;" />
                                                        </div>

                                                        <?php
                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $wish_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc();
                                                        ?>

                                                        <div class="col-2 bg-light py-2 mt-5">
                                                            <h5 class="text-black-50 fs-6"><?php echo $product_data["title"]; ?></h5>
                                                        </div>
                                                        <div class="col-2 bg-light py-2 mt-5">
                                                            <span class="text-black-50">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                        </div>
                                                        <div class="col-2 bg-light py-2 mt-5">

                                                            <?php
                                                            if ($product_data["qty"] > 0) {
                                                            ?>
                                                                <span class="text-black-50">In Stock</span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <span class="text-black-50">Out of Stock</span>
                                                            <?php
                                                            }
                                                            ?>

                                                        </div>
                                                        <div class="col-3 mt-4">
                                                            <div class="d-lg-grid">
                                                                <a href="#" class="btn btn-outline-danger mb-2">Buy Now</a>
                                                                <a href="#" class="btn btn-outline-warning mb-2" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>

                                            <div class="col-12">
                                                <hr />
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            } else {
                header("Location:index.php");
            }
            ?>

            <?php require "footer.php" ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>