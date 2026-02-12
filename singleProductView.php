<!DOCTYPE html>
<?php
require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.description,product.title,
    product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,product.status_id,product.maincategory_id,
    product.size_id,product.users_email FROM `product` WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;
    if ($product_num == 1) {
        $product_data = $product_rs->fetch_assoc();
?>

        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>Mad Colors | <?php echo $product_data["title"]; ?></title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
            <link rel="stylesheet" href="style.css" />

            <link rel="icon" href="resources/logo.png" />
        </head>

        <body>

            <div class="container-fluid ">
                <div class="row">

                    <?php require "header.php" ?>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-header">
                                        <nav aria-label="breadcrumb ">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item "><a href="index.php">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Single Product View</li>
                                            </ol>
                                        </nav>
                                    </div>

                                    <div class=" card-body mt-4">
                                        <div class="col-12 mt-0 bg-white singleProduct">
                                            <div class="row">
                                                <div class="col-12" style="padding: 10px;">
                                                    <div class="row">

                                                        <div class="col-lg-4 order-2 order-lg-1 d-none d-lg-block">
                                                            <div class="row">
                                                                <div class="col-12 align-items-center border border-1 border-secondary">

                                                                    <div class="mainImg" id="mainImg"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-2 order-2 order-lg-1">
                                                            <ul>

                                                                <?php
                                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                                                $image_num = $image_rs->num_rows;
                                                                $img = array();

                                                                if ($image_num != 0) {

                                                                    for ($x = 0; $x < $image_num; $x++) {
                                                                        $image_data = $image_rs->fetch_assoc();
                                                                        $img[$x] = $image_data["code"];
                                                                ?>

                                                                        <li class="d-flex flex-column justify-content-center align-items-center 
                                            border border-1 border-secondary mb-1">
                                                                            <img src="<?php echo $img[$x]; ?>" class="img-thumbnail mt-1 mb-1 " style="height: 200px;" id="productImg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x; ?>);" />
                                                                        </li>
                                                                    <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <li class="d-flex flex-column justify-content-center align-items-center 
                                            border border-1 border-secondary mb-1">
                                                                        <img src="resources/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                                    </li>
                                                                    <li class="d-flex flex-column justify-content-center align-items-center 
                                            border border-1 border-secondary mb-1">
                                                                        <img src="resources/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                                    </li>
                                                                <?php
                                                                }
                                                                ?>

                                                            </ul>
                                                        </div>

                                                        <div class="col-12 col-lg-6 order-3">
                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <div class="row ">
                                                                        <div class="col-12">
                                                                            <span class="fs-2 fw-bold text-black"><?php echo $product_data["title"]; ?></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row ">
                                                                        <div class="col-12 mb-4">
                                                                            <span class="badge">
                                                                                <i class="bi bi-star-fill text-warning fs-6"></i>
                                                                                <i class="bi bi-star-fill text-warning fs-6"></i>
                                                                                <i class="bi bi-star-fill text-warning fs-6"></i>
                                                                                <i class="bi bi-star-fill text-warning fs-6"></i>
                                                                                <i class="bi bi-star-fill text-warning fs-6"></i>

                                                                                &nbsp;&nbsp;&nbsp;

                                                                                <label class="fs-6 text-black-50">4.5 Stars | 39 Reviews and
                                                                                    Ratings</label>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <?php

                                                                    $price = $product_data["price"];
                                                                    $adding_price = ($price / 100) * 5;
                                                                    $new_price = $price + $adding_price;
                                                                    $difference = $new_price - $price;
                                                                    $percentage = ($difference / $price) * 100;

                                                                    ?>

                                                                    <div class="row">
                                                                        <div class="col-12 my-4">
                                                                            <span class="fs-3 text-black fw-bold">Rs. <?php echo $price; ?> .00</span>
                                                                            &nbsp;&nbsp; | &nbsp;&nbsp;
                                                                            <span class="fs-4 text-dark">Rs. <?php echo $new_price; ?> .00</span>
                                                                            &nbsp;&nbsp; | &nbsp;&nbsp;
                                                                            <span class="fs-5 text-black-50">Save Rs. <?php echo $difference; ?> .00 (
                                                                                <?php echo $percentage; ?>%)</span>
                                                                            <div class="col-12">
                                                                                <div class="row">
                                                                                    <div class="col-9 col-lg-10">
                                                                                        <span class="fs-6 text-black-50">
                                                                                            <img src="resources/pricetag.png" style="height: 20px;" />
                                                                                            Stand a chance to get 5% discount by using VISA or
                                                                                            MASTER
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-2">
                                                                        <div class="col-1 my-4">
                                                                            <span class="fs-6 text-black">SIZE</span>
                                                                        </div>
                                                                        <div class="col-6 my-3">
                                                                            <select class="form-select" style="font-size: 13px;">
                                                                                <option value="0">CHOSE AN OPTION</option>
                                                                                <?php
                                                                                $size_rs = Database::search("SELECT * FROM `size`");
                                                                                $size_num = $size_rs->num_rows;

                                                                                for ($x = 0; $x < $size_num; $x++) {
                                                                                    $size_data = $size_rs->fetch_assoc();
                                                                                ?>
                                                                                    <option value="<?php echo $size_data["id"]; ?>"><?php echo $size_data["name"]; ?></option>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mt-3">
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-2 my-2">
                                                                                    <div class="row g-2">
                                                                                        <div class="border border-2 border-dark rounded overflow-hidden 
                                                                float-left mt-1 position-relative product-qty">
                                                                                            <div class="col-12">
                                                                                                <input type="text" class="border-0 fs-5 fw-bold text-start" style="outline: none;" pattern="[0-9]" value="1" onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' id="qty_input" />
                                                                                                <div class="position-absolute qty-buttons">
                                                                                                    <div class="justify-content-center d-flex flex-column align-items-center 
                                                                        border border-1 border-secondary qty-inc">
                                                                                                        <i class="bi bi-caret-up-fill text-dark fs-5" onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                                                                                    </div>
                                                                                                    <div class="justify-content-center d-flex flex-column align-items-center 
                                                                        border border-1 border-secondary qty-dec">
                                                                                                        <i class="bi bi-caret-down-fill text-dark fs-5" onclick='qty_dec();'></i>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-4 d-grid">
                                                                                    <button class="btn btn-secondary" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add to cart</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-4 d-grid">
                                                                        <?php
                                                                        $wishlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "' AND
                                                                        `users_email`='" . $_SESSION["u"]["email"] . "'");
                                                                        ?>
                                                                        <a onclick="addToWshlist1(<?php echo $product_data['id']; ?>);" class=" text-decoration-none text-black mt-1" style="cursor: pointer;">Add to wishlist</a>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-12 mt-5">
                                                                            <div class="row">
                                                                                <div class="col-4 d-grid">
                                                                                    <button class="btn btn-secondary" type="submit" id="payhere-payment" onclick="payNow(<?php echo $pid ?>);">Buy Now</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <?php require "footer.php" ?>

                            </div>
                        </div>

                        <script src="bootstrap.bundle.js"></script>
                        <script src="script.js"></script>
                        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>

<?php

    } else {
        echo ("Sory for the inconvinient");
    }
} else {
    echo ("Something went wrong");
}

?>