<?php

session_start();

include("../include/connection.php");

if (isset($_SESSION['email']) && $_SESSION['email'] != null) {
    $user = $link->rawQueryOne("select * from users where email=?", array($_SESSION['email']));

    $uid = $user['user_id'];

    $cart_data = $link->rawQuery("select * from cart where user_id=?", array($uid));

    $cc = count($cart_data);
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

        <?php

        if ($cc == 0 || !isset($cc) || $cc == null) {

        ?>
            <div class="row gutters">
                <div class="col-md-12" style="margin-top: 5%;">
                    <img src="../include/image/NoProducts.png" width="100%">
                </div>
            </div>

        <?php
        } else {
        ?>
            <h5 class="mb-3" style="color: black; text-align:center;">Cart Details</h6>

                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body" style="padding-top: 3%; padding-bottom: 3%;">
                                <?php

                                foreach ($cart_data as $data) {
                                    $product = $link->rawQueryOne("select * from product where product_id=?", array($data['product_id']));
                                    $category = $link->rawQueryOne("select * from categories where cat_id=?", array($product['category_id']));
                                    $brand = $link->rawQueryOne("select * from brands where brand_id=?", array($product['brand_id']));
                                    $cart = $link->rawQueryOne("select * from cart where user_id=? and product_id=?", array($uid, $data['product_id']))
                                ?>
                                    <div class="row gutters">
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                            <img src="../admin/product/<?php echo $product['product_img'] ?>" width="100%" height="75%">
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12">
                                            <p>
                                            <h5><?php echo $product['product_name']; ?></h5>

                                            <div class="row" style="margin-top: 5%;">
                                                <div class="col-md-4">
                                                    Category: <span style="margin-left: 5%; color:whitesmoke"><?php echo $category['cat_name']; ?></span>
                                                </div>
                                                <div class="col-md-4">
                                                    Brand: <span style="margin-left: 5%; color:whitesmoke"><?php echo $brand['brand_name']; ?></span>
                                                </div>
                                                <div class="col-md-4">
                                                    Price: <span style="margin-left: 5%; color:whitesmoke"><?php echo $product['product_price']; ?></span>
                                                </div>
                                            </div>

                                            <div class="row" style="margin-top: 5%;">
                                                <div class="col-md-4">
                                                    Qty:
                                                    <span style="margin-left: 5%;">
                                                        <button class="btn btn-primary fas fa-plus" style="font-size: smaller; padding: 3px;" title="plus"></button>
                                                        &nbsp;<input type="text" disabled data-uid="<?php echo $uid; ?>" data-pid="<?php echo $data['product_id']; ?>" class="qty" value="<?php echo $cart['qty']; ?>" style="width: 20%; text-align:center; background-color:white">&nbsp;
                                                        <button class="btn btn-warning fas fa-minus" style="font-size: smaller; padding: 3px;" title="minus"></button>
                                                    </span>
                                                </div>
                                                <div class="col-md-4">
                                                    Total: <span style="margin-left: 5%; color:whitesmoke" class="total"><?php echo $cart['total'] ?></span>
                                                </div>
                                            </div>

                                            <div class="row" style="margin-top: 5%;">
                                                <div class="col-md-4">
                                                    <span class="btn btn-danger fas fa-trash-alt delete" data-id="<?php echo $cart['cart_id']; ?>" title="Remove"></span>
                                                </div>
                                            </div>

                                            </p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                <?php
                                
                                    $gt = 0;

                                    foreach($cart_data as $c_data)
                                    {
                                        $gt = $gt + $c_data['total'];
                                    }
                                
                                ?>

                                
                                <div class="col-md-12" style="text-align: center;">
                                    <span><h4>Grand Total: Rs. <?php echo $gt; ?></h4></span>
                                </div>
                                        <br>
                                <div class="col-md-12" style="text-align: center;">
                                    <a href="checkout.php" class="btn" style="color: black; background-color:burlywood"><b>Checkout</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

        }
            ?>
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
    <script src="../include/js/site_title.js"></script>
    <script>
        $('.fa-plus').on('click', function() {

            let val = $(this).next('input').val();
            var uid = $(this).next('input').data('uid');
            var pid = $(this).next('input').data('pid');

            var newval = ++val;

            if (val > 0 && val <= 5) {

                var qty = newval;

                $(this).next('input').prop('value', newval);

                $.ajax({
                    type: 'post',
                    url: 'update_qty.php',
                    data: {
                        uid: uid,
                        pid: pid,
                        qty: qty
                    },
                    success: function(response) {
                        if (response == "success") {
                            location.reload();
                        } else {
                            alert("Something went wrong!", "", "error");
                        }
                    }
                });



            } else if (val > 5 || newval > 5) {
                swal('maximum value must be 5');
                $(this).next('input').prop('value', 5);
            } else {
                swal('minimum value must be 1');
                $(this).next('input').prop('value', 1);
            }

        })

        $('.fa-minus').on('click', function() {

            let val = $(this).prev('input').val();
            var uid = $(this).prev('input').data('uid');
            var pid = $(this).prev('input').data('pid');

            var newval = --val;

            if (val > 0) {
                $(this).prev('input').prop('value', newval);

                var qty = newval;

                $.ajax({
                    type: 'post',
                    url: 'update_qty.php',
                    data: {
                        uid: uid,
                        pid: pid,
                        qty: qty
                    },
                    success: function(response) {
                        if (response == "success") {
                            location.reload();
                        } else {
                            alert("Something went wrong!", "", "error");
                        }
                    }
                });

            } else if (val > 5) {
                swal('maximum value must be 5');
                $(this).prev('input').prop('value', 5);
            } else {
                swal('minimum value must be 1');
                $(this).prev('input').prop('value', 1);
            }

        })

        $('.delete').on('click', function() {

            var cid = $(this).data('id');

            $.ajax({
                type: 'post',
                url: 'remove_from_cart.php',
                data: {
                    cid: cid
                },
                success: function(response) {
                    if (response == "success") {
                        location.reload();
                    } else {
                        alert("Something went wrong, Try again!");
                    }
                }
            });

        });
    </script>
</body>
<!-- Mirrored from html.design/demo/watcher/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:51 GMT -->

</html>