<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mad Colors | Admin Sign In</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resources/logo.png" />
</head>

<body class="admin-body">

    <div class="container-fluid vh-100">
        <div class="row">

            <div class="col-12">
                <div class="row">

                    <div class="card col-lg-4 col-8 offset-2 offset-lg-4 mt-5 p-5" style="background-color: #dc3545;background-image: linear-gradient(90deg,#dc3545 0%,#fd0d91 100%);">
                        <div class="col-12 mt-2 text-center">
                            <img src="resources/profile_image/newuser.svg" class="rounded-circle mt-2" style="width: 130px;" id="viewImg" />
                        </div>
                        <div class="col-12" id="loginBox">
                            <div class="row g-2">
                                <div class="col-12 mt-3 text-center">
                                    <span class="fs-3">LOGIN</span>
                                </div>
                                <div class="col-12 mt-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control border border-end-0 border-start-0 border-top-0" id="e" />
                                </div>
                                <div class="col-8 offset-2 d-grid mt-3">
                                    <button class="btn btn-secondary" onclick="adminVerification();">Send verification code</button>
                                </div>
                                <div class="col-8 offset-2 d-grid mt-3">
                                    <a href="login.php" class=" text-center">Back to customer login</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <p>&copy; 2023 madcolors.lk | All Rights Reserved</p>
                            <p class="fw-bold">Soft Tech &trade;</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal" tabindex="-1" id="verificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Enter Your Verification Code</label>
                            <input type="text" class=" form-control" id="vcode" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>