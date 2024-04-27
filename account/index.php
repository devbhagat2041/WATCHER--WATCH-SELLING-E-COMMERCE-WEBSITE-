<?php

session_start();

include("../include/connection.php");

if (isset($_SESSION['email']) && $_SESSION['email'] != null) {
    $user = $link->rawQueryOne("select * from users where email=?", array($_SESSION['email']));

    $cityid = $user['city'];

    $stateid = $user['state'];

    $usercity = $link->rawQueryOne("select * from cities where city_id=?", array($cityid));

    $userstate = $link->rawQueryOne("select * from states where state_id=?", array($stateid));
}

?>

<html>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!-- Site Metas -->
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />

<title>Watcher</title>

<!-- slider stylesheet -->
<link rel="stylesheet" type="text/css" href="../include/css/owl.carousel.min.css" />
<link rel="stylesheet" href="../include/css/userlinks.css" />
<link rel="stylesheet" href="include/css/account.css" />
<link rel="stylesheet" href="../include/css/site_title.css" />

<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="../include/css/bootstrap.css" />

<!-- fonts style -->
<link href="../include/css/css.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="../include/css/style.css" rel="stylesheet" />
<!-- responsive style -->
<link href="../include/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page" style="background-color: burlywood;">
    <div class="hero_area">
        <!-- header section starts -->
        <?php

        include "../include/header.php";
        ?>
        <!-- end header section -->

    </div>


    <div class="container" style="margin-top: 2%; margin-bottom: 2%;">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile" style="font-family: Georgia, 'Times New Roman', Times, serif;">
                                <h5 class="user-name" style="font-weight: 600;"><?php echo $user['fname'] . " " . $user['lname']; ?></h5>
                            </div>
                            <div class="about" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                <h5 class="mb-2" style="color: burlywood;">About</h5>
                                <p style="font-weight: 400; font-size:large;">
                                    <?php echo $user['email']; ?><br>
                                    +91 <?php echo $user['contact']; ?><br>
                                    <?php echo $usercity['city_name']; ?>, <?php echo $userstate['state_name']; ?><br>
                                    India
                                </p>
                            </div>
                            <div class="my_links" style="margin-top: 5%;">
                                <ul>
                                    <li>
                                        <a href="cart.php">
                                            <label>My Cart</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="orders.php">
                                            <label>My Orders</label>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row gutters">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3" style="color: burlywood;">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fname">First Name</label>
                                    <div style="color:aliceblue;"><i><?php echo $user['fname'] ?></i></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="lname">Last Name</label>
                                    <div style="color:aliceblue;"><i><?php echo $user['lname'] ?></i></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div style="color:aliceblue;"><i><?php echo $user['email'] ?></i></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <div style="color:aliceblue;"><i>+91 <?php echo $user['contact'] ?></i></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <div style="color:aliceblue;"><i><?php echo $user['dob'] ?></i></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="vmail">Email Verified</label>
                                    <div style="color:aliceblue;">
                                        <i>
                                            <?php

                                            if ($user['is_email_verified'] == 1) {
                                                echo "Yes";
                                            } else {
                                                echo "No";
                                            }

                                            ?>
                                        </i>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3" style="color: burlywood;">Address</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="dadd">Detailed Address</label>
                                    <div style="color:aliceblue;"><i><?php echo $user['address'] ?></i></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <div style="color:aliceblue;"><i><?php echo $usercity['city_name'] ?></i></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <div style="color:aliceblue;"><i><?php echo $userstate['state_name'] ?></i></div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="pin">Pin Code</label>
                                    <div style="color:aliceblue;"><i><?php echo $user['pincode'] ?></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right btn-upd">
                                    <a class="btn btn-warning btn-rounded mb-4" href="update.php" style="font-weight: 500;">Update</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end info_section -->

    <!-- footer section -->
    <?php
    include "../include/footer.php";
    ?>
    <!-- footer section -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </script>
    <script src="../include/js/site_title.js"></script>

</body>
<!-- Mirrored from html.design/demo/watcher/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:51 GMT -->

</html>