<?php
require "connection.php";

$pageno;

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Mad Colors | Product</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/logo.png" />
    </head>

    <body>
        <div class=" container-fluid">
            <div class="row">

                <?php require "header.php" ?>

                <div class="col-12 offset-lg-1 col-lg-10 mt-3 mb-3">
                    <div class="row" id="sort">

                        <div class="col-12">
                            <div class="row justify-content-center gap-2">

                                <?php

                                if (isset($_GET["page"])) {
                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }

                                $products_rs = Database::search("SELECT * FROM `product`");
                                $products_num = $products_rs->num_rows;

                                $results_per_page = 12;
                                $number_of_pages = ceil($products_num / $results_per_page);

                                $page_results = ($pageno - 1) * $results_per_page;
                                $product_rs =  Database::search("SELECT * FROM `product` LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                $product_num = $product_rs->num_rows;

                                for ($x = 0; $x < $product_num; $x++) {
                                    $product_data = $product_rs->fetch_assoc();
                                ?>

                                    <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">
                                        <?php

                                        $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                        $product_img_data = $product_img_rs->fetch_assoc();

                                        ?>
                                        <a href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>'>
                                            <img src="<?php echo  $product_img_data["code"]; ?>" class="card-img-top img-thumbnail mt-2 bi bi-cart3" style="height: 300px;" />
                                        </a>
                                        <div class="col-12 mx-3">
                                            <div class="row justify-content-center">

                                                <?php

                                                $watchlist_rs = Database::search("SELECT * FROM `wishlist` WHERE `product_id`='" . $product_data["id"] . "'");
                                                $watchlist_num = $watchlist_rs->num_rows;

                                                if ($watchlist_num == 1) {
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

                        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-lg justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php

                                    for ($x = 1; $x <= $number_of_pages; $x++) {
                                        if ($x == $pageno) {
                                    ?>
                                            <li class="page-item active">
                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                            </li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="page-item">
                                                <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                            </li>
                                    <?php
                                        }
                                    }

                                    ?>

                                    <li class="page-item">
                                        <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>

                <?php require "footer.php" ?>

            </div>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
