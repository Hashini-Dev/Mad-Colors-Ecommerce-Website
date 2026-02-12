<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Mad Colors | Admin Panel</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="style.css" />

        <link rel="icon" href="resources/logo.png" />
    </head>

    <body style="background-color: #fdf7fa;">

        <div class=" container-fluid">
            <div class="row">

                <div class="col-12 col-lg-2">
                    <div class="row">
                        <div class="col-12 align-items-start bg-dark">
                            <div class="row g-2 ">
                                <div class="col-12 mt-5">
                                    <h4 class=" text-white text-center"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></h4>
                                    <hr class=" border border-1 border-white" />
                                </div>
                                <div class="nav flex-column nav-pills me-3" role="tablist" aria-orientation="vertical">
                                    <nav class="nav flex-column">
                                        <a class="nav-link text-white fs-5" aria-current="page" href="#"><i class="bi bi-speedometer2 p-2"></i>Dashboard</a>
                                        <div class="p-2">
                                            <span class="fs-5 text-white p-3"><i class="bi bi-box-seam p-2"></i>Products</span>
                                        </div>
                                        <a class="nav-link text-white-50" aria-current="page" href="myProducts.php">All Products</a>
                                        <a class="nav-link text-white fs-5" href="manageUsers.php"><i class="bi bi-person p-2"></i>Manage Users</a>
                                        <a class="nav-link text-white fs-5" href="manageProduct.php"><i class="bi bi-kanban p-2"></i>Manage Products</a>
                                    </nav>
                                </div>
                                <div class="col-12 mt-5 text-center">
                                    <hr class=" border border-1 border-white" />
                                    <h4 class=" text-white">Selling History</h4>
                                    <hr class=" border border-1 border-white" />
                                </div>
                                <div class="col-12 mt-3 d-grid text-center">
                                    <label class=" form-label fs-6 fw-bold text-white">From Date</label>
                                    <input type="date" class=" form-control" />
                                    <label class=" form-label fs-6 fw-bold text-white mt-2">To Date</label>
                                    <input type="date" class=" form-control" />
                                    <a href="#" class="btn btn-danger mt-3">Search</a>
                                    <hr class=" border border-1 border-white" />
                                    <label class=" form-label fs-6 fw-bold text-white">Daily Sellings</label>
                                    <hr class=" border border-1 border-white" />
                                    <hr class=" border border-1 border-white" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-10">
                    <div class="row">
                        <nav class="navbar bg-danger">
                            <span class="fs-4 text-white p-2">Dashboard</span>
                            <div class=" align-self-end">
                                <i class="bi bi-bell fs-4 btn btn-close-white"></i>
                                <i class="bi bi-envelope fs-4 btn btn-close-white"></i>
                                <i class="bi bi-gear fs-4 btn btn-close-white"></i>
                            </div>
                        </nav>
                        <div class="col-12 mt-4 mb-4">
                            <div class="row g-1">
                                <div class="col-6 col-lg-3 px-3">
                                    <div class="row g-1">
                                        <div class="col-12 bg-white text-dark rounded" style="height: 150px;">
                                            <br />
                                            <span class="fs-6 mx-3 fw-bold">Daily Earnings</span>
                                            <?php

                                            $today = date("Y-m-d");
                                            $thismonth = date("m");
                                            $thisyear = date("Y");

                                            $a = "0";
                                            $b = "0";
                                            $c = "0";
                                            $e = "0";
                                            $f = "0";

                                            $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                            $invoice_num = $invoice_rs->num_rows;

                                            for ($x = 0; $x < $invoice_num; $x++) {
                                                $invoice_data = $invoice_rs->fetch_assoc();

                                                $f = $f + $invoice_data["qty"];

                                                $d = $invoice_data["date"];
                                                $splitDate = explode(" ", $d);
                                                $pdate = $splitDate[0];

                                                if ($pdate == $today) {
                                                    $a = $a + $invoice_data["total"];
                                                    $c = $c + $invoice_data["qty"];
                                                }

                                                $splitMonth = explode("-", $pdate);
                                                $pyear = $splitMonth[0];
                                                $pmonth = $splitMonth[1];

                                                if ($pyear == $thisyear) {
                                                    if ($pmonth == $thismonth) {
                                                        $b = $b + $invoice_data["total"];
                                                        $e = $e + $invoice_data["qty"];
                                                    }
                                                }
                                            }

                                            ?>
                                            <div class=" offset-5 text-center">
                                                <i class="bi bi-arrow-down" style="color: #06d6a0;"></i>
                                                <span class="fs-5">Rs. <?php echo $a; ?> .00</span>
                                                <br />
                                                <span class="text-secondary" style="font-size: 13px;">Todays Income</span>
                                            </div>
                                            <span style="color: #06d6a0;" class="mx-3">40%</span>
                                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 25%; background-color:#06d6a0"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 px-3">
                                    <div class="row g-1">
                                        <div class="col-12 bg-white text-dark rounded" style="height: 150px;">
                                            <br />
                                            <span class="fs-6 mx-3 fw-bold">Monthly Earnings</span>
                                            <div class=" offset-5 text-center">
                                                <i class="bi bi-arrow-up" style="color: #788bff;"></i>
                                                <span class="fs-5">Rs. <?php echo $b; ?> .00</span>
                                                <br />
                                                <span class="text-secondary" style="font-size: 13px;">Todays Income</span>
                                            </div>
                                            <span style="color: #788bff;" class="mx-3">40%</span>
                                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 25%; background-color:#788bff"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 px-3">
                                    <div class="row g-1">
                                        <div class="col-12 bg-white text-dark rounded" style="height: 150px;">
                                            <br />
                                            <span class="fs-6 mx-3 fw-bold">Monthly Sellings</span>
                                            <div class=" offset-5 text-center">
                                                <i class="bi bi-arrow-up" style="color: #9c89b8;"></i>
                                                <span class="fs-5"><?php echo $e; ?> Items</span>
                                                <br />
                                                <span class="text-secondary" style="font-size: 13px;">Todays Income</span>
                                            </div>
                                            <span style="color: #9c89b8;" class="mx-3">40%</span>
                                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 25%; background-color:#9c89b8"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3 px-3">
                                    <div class="row g-1">
                                        <div class="col-12 bg-white text-dark rounded" style="height: 150px;">
                                            <br />
                                            <span class="fs-6 mx-3 fw-bold">Total Sellings</span>
                                            <div class=" offset-5 text-center">
                                                <i class="bi bi-arrow-down" style="color: #ff99c8;"></i>
                                                <span class="fs-5"><?php echo $f; ?> Items</span>
                                                <br />
                                                <span class="text-secondary" style="font-size: 13px;">Todays Income</span>
                                            </div>
                                            <span style="color: #ff99c8;" class="mx-3">40%</span>
                                            <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 25%; background-color:#ff99c8"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 bg-danger">
                            <div class="row">
                                <div class="col-12 col-lg-3 text-center  my-3">
                                    <label class="form-label fs-4 fw-bold text-white">Total Active Time</label>
                                </div>
                                <div class="col-12 col-lg-9 text-center my-3">
                                    <label class="form-label fs-4 fw-bold text-warning">00 Years 00 Months 00 Days 00 Hours 00 Minutes 00 Seconds</label>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-12 mt-4">
                            <div class="row g-1">
                                <div class="col-12 px-3">
                                    <div class="row g-1">
                                        <div class="col-12 col-lg-6 bg-white text-dark rounded" style="height: 450px;">
                                            <br /> -->
                        <!-- <span class="fs-6 mx-3 fw-bold">Total Selling Items</span> -->
                        <!-- <div class="chart-body">
                                            <section class="section">
                                                <div class="chart">
                                                    <div class="barchart">
                                                        <div class="graph" style="height: 85%;">
                                                            <div class="percent">85%</div>
                                                        </div>
                                                        <div class="name" style="height: 85%;">Women</div>
                                                    </div>
                                                    <div class="barchart">
                                                        <div class="graph" style="height: 75%;">
                                                            <div class="percent">75%</div>
                                                        </div>
                                                        <div class="name" style="height: 75%;">Men</div>
                                                    </div>
                                                    <div class="barchart">
                                                        <div class="graph" style="height: 55%;">
                                                            <div class="percent">55%</div>
                                                        </div>
                                                        <div class="name" style="height: 55%;">Kids</div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div> -->
                        <!-- </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="offset-1 col-10 col-lg-4 my-3 rounded bg-body">
                            <div class="row g-1">
                                <div class="col-12 text-center">
                                    <label class="form-label fs-4 fw-bold text-decoration-underline">Mostly Sold Item</label>
                                </div>
                                <div class="col-12 text-center">
                                    <img src="resources/empty.svg" class="img-fluid rounded-top" style="height: 250px;" />
                                </div>
                                <div class="col-12 text-center">
                                    <span class="fs-5 fw-bold">OFF SHOULDER FULL FASHION  SHORT DRESS</span><br />
                                    <span class="fs-6">50 Items</span><br />
                                    <span class="fs-6">Rs. 4750 .00</span>
                                </div>
                                <div class="col-12">
                                    <div class="first-place"></div>
                                </div>
                            </div>
                        </div>
                        <div class="offset-1 col-10 col-lg-4 my-3 rounded bg-body">
                            <div class="row g-1">
                                <div class="col-12 text-center">
                                    <label class="form-label fs-4 fw-bold text-decoration-underline">Most Famouse Seller</label>
                                </div>
                                <div class="col-12 text-center">
                                    <img src="resources/profile_image/newuser.svg" class="img-fluid rounded-top" style="height: 250px;" />
                                </div>
                                <div class="col-12 text-center">
                                    <span class="fs-5 fw-bold">Hashi Lokuganhewa</span><br />
                                    <span class="fs-6">hashi@gmail.com</span><br />
                                    <span class="fs-6">0718433458</span>
                                </div>
                                <div class="col-12">
                                    <div class="first-place"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>

    </body>

    </html>

<?php

} else {
    echo ("You are Not a valid user");
}

?>