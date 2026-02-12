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

            <div class="col-12">
                <div class="row">

                    <div class="col-6 d-none d-lg-block background"></div>
                    <div class="col-lg-6 mt-3">
                        <div class="col-12">
                            <span class="title offset-lg-1 offset-3">Mad Colors</span>
                        </div>
                        <div class="col-10 mt-5 mx-5" id="signInBox">
                            <div class="row g-2">
                                <div class="col-12">
                                    <p class="title2">LOGIN</p>
                                    <span class="text-danger" id="msg"></span>
                                </div>

                                <?php

                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email"])) {
                                    $email = $_COOKIE["email"];
                                }

                                if (isset($_COOKIE["password"])) {
                                    $password = $_COOKIE["password"];
                                }

                                ?>

                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control border border-end-0 border-start-0 border-top-0" id="email" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control border border-end-0 border-start-0 border-top-0" id="password" />
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberme" value="">
                                        <label class="form-check-label">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#" class="link-primary text-dark" onclick="forgotPassword();">Forgot Password?</a>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-dark mt-4" onclick="login();">LOGIN</button>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-secondary mt-4" onclick="changeView();">CREAT ACCOUNT</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-10 mt-5 mx-5 d-none" id="forgotpasswordBox">
                            <div class="row g-2">
                                <div class="col-12">
                                    <p class="title2">Reset Password</p>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">New Password</label>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-11">
                                                <input type="password" class=" form-control  border border-end-0 border-start-0 border-top-0" id="np" />
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-outline-secondary" type="button" id="npb" onclick="showPassword1();">
                                                    <i id="eye" class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-11">
                                                <input type="password" class=" form-control  border border-end-0 border-start-0 border-top-0" id="cp" />
                                            </div>
                                            <div class="col-1">
                                                <button class="btn btn-outline-secondary" type="button" id="cpb" onclick="showPassword2();">
                                                    <i id="eye" class="bi bi-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="email" class="form-control border border-end-0 border-start-0 border-top-0" id="vc" />
                                </div>
                                <div class="offset-3 col-12 col-lg-6 d-grid">
                                    <button class="btn btn-secondary mt-4" onclick="resetPassword();">RESET</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-10 mt-5 mx-5 d-none" id="signUpBox">
                            <div class="row g-2">
                                <div class="col-12">
                                    <p class="title2">New Account</p>
                                </div>

                                <div class="col-12 d-none" id=msgdiv>
                                    <div class="alert alert-danger" role="alert" id="alertdiv">
                                        <i class="bi bi-x-octagon-fill fs-5" id="msg2">
                                        </i>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control border border-end-0 border-start-0 border-top-0" id="f" />
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control border border-end-0 border-start-0 border-top-0" id="l" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control border border-end-0 border-start-0 border-top-0" id="e" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control border border-end-0 border-start-0 border-top-0" id="p" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control border border-end-0 border-start-0 border-top-0" id="m" />
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-secondary mt-4" onclick="register();">REGISTER</button>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-dark mt-4" onclick="changeView();">LOGIN</button>
                                </div>
                            </div>
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