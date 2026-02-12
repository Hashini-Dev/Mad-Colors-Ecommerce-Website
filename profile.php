<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mad Colors | Login</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo.png" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <?php
            require "header.php";

            require "connection.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `users_email`='" . $email . "'");

                $address_rs = Database::search("SELECT * FROM `users_has_address` INNER JOIN `city` ON 
                users_has_address.city_id=city.id INNER JOIN `district` ON 
                city.district_id=district.id INNER JOIN `province` ON 
                district.province_id=province.id WHERE `users_email`='" . $email . "'");

                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();
            ?>


                <div class="col-12 ">
                    <div class="row">

                        <div class="col-lg-3 col-12 card mx-5">
                            <div class="card-header text-center">
                                <span class="title3">Profile Image</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                    <?php
                                    if (empty($image_data["path"])) {
                                    ?>
                                        <img src="resources/profile_image/newuser.svg" class="rounded-circle mt-2" style="width: 130px;" id="viewImg" />
                                    <?php
                                    } else {
                                    ?>

                                        <img src="<?php echo $image_data["path"]; ?>" class="rounded-circle mt-2" style="width: 130px;" id="viewImg" />

                                    <?php
                                    }
                                    ?>

                                    <span class="fw-bold"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                                    <span class="fw-bold text-black-50"><?php echo $email; ?></span>

                                    <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                    <label for="profileimg" class="btn btn-secondary mt-5" onclick="changeImage();">Upload Profile Image</label>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-12 card">
                            <div class="card-header text-center">
                                <span class="title3">Profile Details</span>
                            </div>
                            <div class="card-body">
                                <div class="row mt-4">

                                    <div class="col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fname" value="<?php echo $data["fname"]; ?>" />
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lname" value="<?php echo $data["lname"]; ?>" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" readonly value="<?php echo $data["password"]; ?>" />
                                            <span class="input-group-text bg-secondary" id="basic-addon2">
                                                <i class="bi bi-eye-slash-fill text-white"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>" />
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Registered Date</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $data["join_date"]; ?>" />
                                    </div>

                                    <?php
                                    if (!empty($address_data["line1"])) {
                                    ?>

                                        <div class="col-12">
                                            <label class="form-label">Address Line 1</label>
                                            <input type="text" class="form-control" value="<?php echo $address_data["line1"]; ?>" id="line1" />
                                        </div>

                                    <?php
                                    } else {
                                    ?>

                                        <div class="col-12">
                                            <label class="form-label">Address Line 1</label>
                                            <input type="text" class="form-control" id="line1">
                                        </div>

                                    <?php
                                    }

                                    if (!empty($address_data["line2"])) {
                                    ?>

                                        <div class="col-12">
                                            <label class="form-label">Address Line 2</label>
                                            <input type="text" class="form-control" value="<?php echo $address_data["line2"]; ?>" id="line2" />
                                        </div>

                                    <?php
                                    } else {
                                    ?>

                                        <div class="col-12">
                                            <label class="form-label">Address Line 2</label>
                                            <input type="text" class="form-control" id="line2" />
                                        </div>

                                    <?php
                                    }

                                    $province_rs = Database::search("SELECT * FROM `province`");
                                    $district_rs = Database::search("SELECT * FROM `district`");
                                    ?>

                                    <div class="col-6">
                                        <label class="form-label">Province</label>
                                        <select class="form-select" id="province">
                                            <option value="0">Select Province</option>
                                            <?php
                                            $province_num = $province_rs->num_rows;
                                            for ($x = 0; $x < $province_num; $x++) {
                                                $province_data = $province_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                    if (!empty($address_data["province_id"])) {

                                                                                                        if ($province_data["id"] == $address_data["province_id"]) {

                                                                                                    ?>selected<?php
                                                                                                            }
                                                                                                        }

                                                                                                                ?>><?php echo $province_data["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">District</label>
                                        <select class="form-select" id="district">
                                            <option value="0">Select District</option>
                                            <?php
                                            $district_num = $district_rs->num_rows;
                                            for ($x = 0; $x < $district_num; $x++) {
                                                $district_data = $district_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                    if (!empty($address_data["district_id"])) {
                                                                                                        if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                    ?>selected<?php
                                                                                                            }
                                                                                                        }
                                                                                                                ?>><?php echo $district_data["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">City</label>
                                        <select class="form-select" id="city">
                                            <option value="0">Select City</option>
                                            <?php
                                            $city_rs = Database::search("SELECT * FROM `city`");
                                            $city_num = $city_rs->num_rows;
                                            for ($x = 0; $x < $city_num; $x++) {
                                                $city_data = $city_rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                if (!empty($address_data["city_id"])) {
                                                                                                    if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                ?>selected<?php
                                                                                                        }
                                                                                                    }
                                                                                                            ?>><?php echo $city_data["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <?php

                                    if (!empty($address_data["postal_code"])) {
                                    ?>

                                        <div class="col-6">
                                            <label class="form-label">Postel-Code</label>
                                            <input type="text" class="form-control" id="pcode" value="<?php echo $address_data["postal_code"]; ?>" />
                                        </div>

                                    <?php
                                    } else {
                                    ?>

                                        <div class="col-6">
                                            <label class="form-label">Postel-Code</label>
                                            <input type="text" class="form-control" id="pcode" />
                                        </div>

                                    <?php
                                    }

                                    ?>

                                    <div class="col-12 d-grid mt-3">
                                        <button class="btn btn-secondary" onclick="updateProfile();">Update My Profile</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            <?php
            } else {
                header("Location:http://localhost/eshop/home.php");
            }
            ?>

            <?php require "footer.php" ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>