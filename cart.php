<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mad Colors | Cart</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo.png" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php require "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {

                $user = $_SESSION["u"]["email"];

                $total = 0;
                $subtal = 0;
                $shipping = 0;
            ?>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <nav aria-label="breadcrumb ">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class=" card-body">
                                    <p class="title4 text-center">My Cart</p>

                                    <div class="col-12">
                                        <hr class="border border-1 border-primary" />
                                    </div>

                                    <?php

                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_email`='" . $user . "'");
                                    $cart_num = $cart_rs->num_rows;

                                    if ($cart_num == 0) {

                                    ?>

                                        <!-- empty view -->
                                        <div class="col-12 mt-5 mb-5">
                                            <div class="row justify-content-center">
                                                <div class="col-12 ">
                                                    <label class="form-label fs-1 fw-bold">Cart is currently empty.</label>
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
                                            <div class="row">

                                                <div class="col-12 col-lg-8">
                                                    <div class="row">
                                                        <div class="col-3 bg-light py-2 text-center">
                                                            <span class="fs-5 fw-bold">Product</span>
                                                        </div>
                                                        <div class="col-2 bg-light py-2">
                                                            <span class="fs-5 fw-bold ">Descripition</span>
                                                        </div>
                                                        <div class="col-3 bg-light py-2 text-center">
                                                            <span class="fs-5 fw-bold ">Quantity</span>
                                                        </div>
                                                        <div class="col-2 bg-light py-2">
                                                            <span class="fs-5 fw-bold">Price</span>
                                                        </div>
                                                        <div class="col-2 bg-light py-2">
                                                            <span class="fs-5 fw-bold">Delete</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr />
                                                    </div>

                                                    <?php
                                                    for ($x = 0; $x < $cart_num; $x++) {
                                                        $cart_data = $cart_rs->fetch_assoc();

                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'");
                                                        $product_data = $product_rs->fetch_assoc();

                                                        $total = $total + ($product_data["price"] * $cart_data["qty"]);


                                                        $address_rs = Database::search("SELECT district.id AS did FROM `users_has_address` INNER JOIN `city` ON 
                                        users_has_address.city_id=city.id INNER JOIN `district` ON city.district_id=district.id WHERE 
                                          `users_email`='" . $user . "'");
                                                        $address_data = $address_rs->fetch_assoc();

                                                        $ship = 0;

                                                        if ($address_data["did"] == 1) {
                                                            $ship = $product_data["delivery_fee_colombo"];
                                                            $shipping = $shipping + $product_data["delivery_fee_colombo"];
                                                        } else {
                                                            $ship = $product_data["delivery_fee_other"];
                                                            $shipping = $shipping + $product_data["delivery_fee_other"];
                                                        }

                                                    ?>

                                                        <div class="col-12 mt-5 mb-3">
                                                            <div class="row">

                                                                <?php

                                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $cart_data["product_id"] . "'");
                                                                $image_data = $image_rs->fetch_assoc();

                                                                ?>
                                                                <div class="col-3 bg-light py-2 d-inline text-center">
                                                                    <img src="<?php echo $image_data["code"]; ?>" style="height: 150px;" />
                                                                </div>
                                                                <div class="col-2 bg-light py-2 mt-5">
                                                                    <h5 class="text-black-50 fs-6"> <?php echo $product_data["title"]; ?></h5>
                                                                </div>
                                                                <div class="col-3 bg-light py-2 mt-5">
                                                                    <input type="number" class="border border-1 border-secondary fs-5  cardqtytext" value="<?php echo $product_data["qty"]; ?>">
                                                                </div>
                                                                <div class="col-2 bg-light py-2 mt-5">
                                                                    <span class="text-black-50">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                                </div>
                                                                <div class="col-2 bg-light py-2 mt-4">
                                                                    <i class="bi bi-trash3 p-3" style="font-size: 40px;" onclick="deleteFromCart(<?php echo $cart_data['id']; ?>);"></i>
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

                                                <div class="offset-lg-1 col-12 col-lg-3">
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <label class="form-label fs-3 fw-bold">Order Summary</label>
                                                        </div>

                                                        <div class="col-12">
                                                            <hr />
                                                        </div>

                                                        <div class="col-6 mb-3">
                                                            <span class="fs-6 fw-bold"><?php echo $cart_num; ?> Products</span>
                                                        </div>

                                                        <div class="col-6 text-end mb-3">
                                                            <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                                        </div>

                                                        <div class="col-6">
                                                            <span class="fs-6 fw-bold">Shipping</span>
                                                        </div>

                                                        <div class="col-6 text-end">
                                                            <span class="fs-6 fw-bold">Rs. <?php echo $shipping; ?> .00</span>
                                                        </div>

                                                        <div class="col-12 mt-3">
                                                            <hr />
                                                        </div>

                                                        <div class="col-6 mt-2">
                                                            <span class="fs-4 fw-bold">Total</span>
                                                        </div>

                                                        <div class="col-6 mt-2 text-end">
                                                            <span class="fs-4 fw-bold">Rs. <?php echo $total + $shipping; ?> .00</span>
                                                        </div>

                                                        <div class="col-12 mt-3 mb-3 d-grid">
                                                            <button class="btn btn-secondary fs-5 fw-bold">CHECKOUT</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>


                    <?php
                                    }
                    ?>

                    </div>
                </div>

            <?php
            } else {
                echo ("Please login or signup first");
            }

            ?>

            <?php require "footer.php" ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script>
        const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        const popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        })
    </script>
</body>

</html>