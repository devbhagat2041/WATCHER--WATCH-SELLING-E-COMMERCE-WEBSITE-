<?php

session_start();

include("../include/connection.php");

if (isset($_SESSION['email']) && $_SESSION['email'] != null) {
    $user = $link->rawQueryOne("select * from users where email=?", array($_SESSION['email']));

    $uid = $user['user_id'];

    $order_data = $link->rawQuery("select * from orders where user_id=?", array($uid));

    $cc = count($order_data);
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
            <h5 class="mb-3" style="color: black; text-align:center;">My Orders</h6>
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $uid; ?>">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body" style="padding-top: 3%; padding-bottom: 3%;">
                                <?php

                                foreach ($order_data as $data) {
                                    $product = $link->rawQueryOne("select * from product where product_id=?", array($data['product_id']));
                                    $qty = $data['qty'];
                                    $total = $data['total'];
                                    $payment = $data['payment_method'];
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
                                                    Qty: <span style="margin-left: 5%; color:whitesmoke"><?php echo $qty; ?></span>
                                                </div>
                                    
                                                <div class="col-md-4">
                                                    Price: <span style="margin-left: 5%; color:whitesmoke"><?php echo $product['product_price']; ?></span>
                                                </div>

                                                <div class="col-md-4">
                                                    Total: <span style="margin-left: 5%; color:whitesmoke" class="total"><?php echo $data['total'] ?></span>
                                                </div>

                                            </div>

                                            <div class="row" style="margin-top: 5%;">
                                                
                                                <div class="col-md-4">
                                                    Payment Method: <span style="margin-left: 5%; color:whitesmoke" class="total"><?php echo $data['payment_method'] ?></span>
                                                </div>

                                                <div class="col-md-4">
                                                    Order Date: <span style="margin-left: 5%; color:whitesmoke" class="total"><?php echo $data['order_date'] ?></span>
                                                </div>

                                                <div class="col-md-4">
                                                    Status: <span style="margin-left: 5%; color:whitesmoke" class="total"><?php echo $data['status']; ?></span>
                                                </div>

                                            </div>

                                            <!-- <div class="row" style="margin-top: 5%;">
                                                <div class="col-md-4">
                                                </div>
                                            </div> -->

                                            </p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                                
                                <div class="col-md-12" style="text-align: center;">
                                    <a href="index.php" class="btn" style="color: black; background-color:burlywood"><b>Back</b></a>
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
        $('.btn_place').on('click', function() {

            var uid = $("#user_id").val();
            var payment = $('input:radio.payment:checked').val();

            $.ajax({
                type: 'post',
                url: 'place_order.php',
                data: {
                    uid: uid,
                    payment: payment
                },
                success: function(response) {
                    if (response == "success") {
                        swal({
                            title: "Order placed successfully!",
                            text: "",
                            type: "success"
                        }).then(function(){
                            window.location = "orders.php";
                        });                        

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