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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="../include/css/bootstrap.css" />
<link rel="stylesheet" href="../include/css/site_title.css" />

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
                                        <a href="">
                                            <label>My Cart</label>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
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
                        <form role="form" id="update_info" name="update_info" method="POST" action="user_update_info.php" onsubmit="return do_update_info();">
                            <div class="row gutters">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3" style="color: burlywood;">Personal Details</h6>
                                </div>
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user['user_id']; ?>">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user['fname'] ?>" placeholder="Enter first name" id="fname" name="fname">
                                        <span class="error_fname" id="error_fname" name="error_fname" style="color:orange;"></span>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user['lname'] ?>" placeholder="Enter lname name" id="lname" name="lname">
                                        <span class="error_lname" id="error_lname" name="error_lname" style="color:orange;"></span>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="tel" class="form-control tel" pattern="\d*" value="<?php echo $user['contact'] ?>" placeholder="Enter contact no" id="phone" name="phone" minlength="10" maxlength="10">
                                    </div>
                                    <span class="error_phone" id="error_phone" name="error_phone" style="color:orange;"></span>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control" value="<?php echo $user['dob'] ?>" id="dob" name="dob">
                                    </div>
                                    <span class="error_dob" id="error_dob" name="error_dob" style="color:orange;"></span>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3" style="color: burlywood;">Address</h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="address">Detailed Address</label>
                                        <textarea class="form-control" id="address" name="address"><?php echo $user['address'] ?></textarea>
                                        <span class="error_address" id="error_address" name="error_address" style="color:orange;"></span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control" id="state" name="state">
                                            <option value=''>-- select state --</option>
                                            <?php

                                            $states = $link->get("states");

                                            foreach ($states as $data) {

                                            ?>

                                                <option value="<?php echo $data['state_id']; ?>" <?php if ($user['state'] == $data['state_id']) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?php echo $data['state_name']; ?></option>

                                            <?php

                                            }
                                            ?>
                                        </select>
                                        <span class="error_state" id="error_state" name="error_state" style="color:orange;"></span>
                                    </div>
                                </div>
                                <input type="hidden" id="ucid" name="ucid" value="<?php echo $user['city']; ?>">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <select class="form-control" id="city" name="city">
                                            <option value=''>-- select state first--</option>

                                        </select>
                                        <span class="error_city" id="error_city" name="error_city" style="color:orange;"></span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="pincode">Pin Code</label>
                                        <input type="number" class="form-control" value="<?php echo $user['pincode'] ?>" placeholder="Enter pincode" id="pincode" name="pincode">
                                        <span class="error_pincode" id="error_pincode" name="error_pincode" style="color:orange;"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right update-actions">
                                        <a class="btn btn-secondary btn-rounded mb-4" href="index.php" style="font-weight: 500;">Cancel</a>
                                        <button class="btn btn-warning btn-rounded mb-4" type="submit" style="font-weight: 500;">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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

    <script src="../include/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $("#update_info").validate({
            rules: {
                fname: {
                    required: {
                        depends: function() {
                            $(this).val($.trim($(this).val()));
                            return true;
                        }
                    },
                },
                lname: {
                    required: {
                        depends: function() {
                            $(this).val($.trim($(this).val()));
                            return true;
                        }
                    },
                },
                phone: {
                    required: {
                        depends: function() {
                            $(this).val($.trim($(this).val()));
                            return true;
                        }
                    },
                    minlength: 10,
                    maxlength: 10,
                },
                dob: {
                    required: {
                        depends: function() {
                            $(this).val($.trim($(this).val()));
                            return true;
                        }
                    },
                },
                address: {
                    required: {
                        depends: function() {
                            $(this).val($.trim($(this).val()));
                            return true;
                        }
                    },
                },
                state: {
                    required: {
                        depends: function() {
                            $(this).val($.trim($(this).val()));
                            return true;
                        }
                    },
                },
                city: {
                    required: {
                        depends: function() {
                            $(this).val($.trim($(this).val()));
                            return true;
                        }
                    },
                },
                pincode: {
                    required: {
                        depends: function() {
                            $(this).val($.trim($(this).val()));
                            return true;
                        }
                    },
                    minlength: 6,
                    maxlength: 6,
                }
            },
            messages: {
                fname: {
                    required: "Please enter first name*",
                },
                lname: {
                    required: "Please enter last name*",
                },
                phone: {
                    required: "Please enter mobile no*",
                    minlength: "Please enter 10 digit mobile no*",
                    maxlength: "Please enter 10 digit mobile no*",
                },
                dob: {
                    required: "Please select dob*",
                },
                address: {
                    required: "Please enter address*",
                },
                state: {
                    required: "Please select state*",
                },
                city: {
                    required: "Please select city*",
                },
                pincode: {
                    required: "Please enter pincode*",
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("id") == "fname") {
                    $("#error_fname").html(error);
                } else if (element.attr("id") == "lname") {
                    $("#error_lname").html(error);
                } else if (element.attr("id") == "phone") {
                    $("#error_phone").html(error);
                } else if (element.attr("id") == "dob") {
                    $("#error_dob").html(error);
                } else if (element.attr("id") == "address") {
                    $("#error_address").html(error);
                } else if (element.attr("id") == "state") {
                    $("#error_state").html(error);
                } else if (element.attr("id") == "city") {
                    $("#error_city").html(error);
                } else if (element.attr("id") == "pincode") {
                    $("#error_pincode").html(error);
                }
            }


        });

        function do_update_info() {
            // Get form
            var form = $('#update_info')[0];

            // Create an FormData object 
            var data = new FormData(form);

            if ($("#update_info").valid()) {

                $.ajax({
                    type: 'post',
                    url: 'user_update_info.php',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 800000,
                    success: function(response) {
                        if (response == "success") {
                            // swal("Information updated successfully!", "", "success");
                            swal({
                                title: "Information updated successfully!",
                                text: "",
                                icon: "success"
                            }).then(okay => {
                                if (okay) {
                                    window.location.href = "index.php";
                                }
                            });
                        } else {
                            swal("Something went wrong, Try again!", "", "error");
                        }
                    }
                });
            }

            return false;
        }

        $(document).ready(function() {

            var ucid = $('#ucid').val();
            if (ucid) {
                $.ajax({
                    type: 'POST',
                    url: 'userCity.php',
                    data: 'city_id=' + ucid,
                    success: function(html) {
                        $('#city').html('<option value="">-- Select City --</option>');
                        $('#city').append(html);
                    }
                });
            } else {
                $('#city').html('<option value="">Select state first</option>');
            }

        });

        $(document).on('change', '#state', function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: 'POST',
                    url: 'citiesData.php',
                    data: 'state_id=' + stateID,
                    success: function(html) {
                        $('#city').html('<option value="">-- Select City --</option>');
                        $('#city').append(html);
                    }
                });
            } else {
                $('#city').html('<option value="">Select state first</option>');
            }
        });
    </script>
    <script src="../include/js/site_title.js"></script>

</body>
<!-- Mirrored from html.design/demo/watcher/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:51 GMT -->

</html>