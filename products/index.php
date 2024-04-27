<?php

session_start();

include('../include/connection.php');

if (isset($_REQUEST['brand'])) {

    $brand = $_REQUEST['brand'];

    $brand_id = $link->rawQueryOne("SELECT brand_id FROM brands WHERE brand_name=?", array($brand));
}

if (isset($_REQUEST['catgory'])) {
    $catgory = $_REQUEST['catgory'];

    $cat_id = $link->rawQueryOne("SELECT cat_id FROM categories WHERE cat_name=?", array($category));
}

if(isset($_SESSION['email']) && $_SESSION['email'] != null)
{
    $user_data = $link->rawQueryOne("select * from users where email=?", array($_SESSION['email']));

    $user_id = $user_data['user_id'];

}

?>

<html>

<head>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Watcher</title>

    <link rel="stylesheet" href="../include/css/site_title.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../include/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../include/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- fonts style -->
    <link href="../include/css/css.css" rel="stylesheet" />
    <link href="../include/css/userlinks.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../include/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="../include/css/responsive.css" rel="stylesheet" />

    <style>
        .lefttip .righttip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
            /* If you want dots under the hoverable text */
        }

        .lefttip .lefttip_text {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
            margin-top: 21%;
            margin-left: -54%;
        }

        .righttip .righttip_text {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
            margin-top: 21%;
            margin-right: 0;
        }

        .lefttip:hover .lefttip_text {
            visibility: visible;
        }

        .righttip:hover .righttip_text {
            visibility: visible;
        }
    </style>

</head>

<body class="sub_page" style="background-color: burlywood;">
    <div class="hero_area">
        <!-- header section starts -->
        <?php

        include "../include/header.php";

        ?>
        <!-- end header section -->

    </div>


    <section class="brand_section layout_padding2" style="margin-bottom: 0;">
        <div class="container">
            <?php
            if (isset($_REQUEST['brand'])) {

                $brand = $_REQUEST['brand'];

                $brand_data = $link->rawQueryOne("SELECT * FROM brands WHERE brand_name=?", array($brand));

                $brand_id = $brand_data['brand_id'];

                $conn = mysqli_connect('localhost', 'root', '', 'watcher');
                if (!$conn) {
                    die("Connection failed" . mysqli_connect_error());
                }
                // } else {
                //     mysqli_select_db($conn, 'pagination');
                // }
                //define total number of results you want per page  
                $results_per_page = 6;

                $query = "select * from product where brand_id=$brand_id";
                $result = mysqli_query($conn, $query);
                $number_of_result = mysqli_num_rows($result);

                //determine the total number of pages available  
                $number_of_page = ceil($number_of_result / $results_per_page);

                //determine which page number visitor is currently on  
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                //determine the sql LIMIT starting number for the results on the displaying page  
                $page_first_result = ($page - 1) * $results_per_page;

                //retrieve the selected results from database   
                $query = "SELECT *FROM product where brand_id=$brand_id LIMIT " . $page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conn, $query);

                $rows = mysqli_num_rows($result);

                if ($rows > 0) {
            ?>

                    <div class="brand_heading" style="margin-top: 3%; margin-bottom: 4%">
                        <h3 class="custom_heading">
                            <?php echo $brand; ?>
                        </h3>
                        <p class="font-weight-bold">
                            Explore the variety of watches by <?php echo $brand; ?>
                        </p>
                    </div>

                    <div class="grid row">

                    <?php
                }
            }

            if (isset($_REQUEST['category'])) {

                $category = $_REQUEST['category'];

                $cat_data = $link->rawQueryOne("SELECT * FROM categories WHERE cat_name=?", array($category));

                $cat_id = $cat_data['cat_id'];

                $conn = mysqli_connect('localhost', 'root', '', 'watcher');
                if (!$conn) {
                    die("Connection failed" . mysqli_connect_error());
                }
                // } else {
                //     mysqli_select_db($conn, 'pagination');
                // }
                //define total number of results you want per page  
                $results_per_page = 6;

                $query = "select * from product where category_id=$cat_id";
                $result = mysqli_query($conn, $query);
                $number_of_result = mysqli_num_rows($result);

                //determine the total number of pages available  
                $number_of_page = ceil($number_of_result / $results_per_page);

                //determine which page number visitor is currently on  
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                //determine the sql LIMIT starting number for the results on the displaying page  
                $page_first_result = ($page - 1) * $results_per_page;

                //retrieve the selected results from database   
                $query = "SELECT *FROM product where category_id=$cat_id LIMIT " . $page_first_result . ',' . $results_per_page;
                $result = mysqli_query($conn, $query);

                $rows = mysqli_num_rows($result);

                if ($rows > 0) {
                    ?>

                        <div class="brand_heading" style="margin-top: 3%; margin-bottom: 4%">
                            <h3 class="custom_heading">
                                <?php echo $category; ?>
                            </h3>
                            <p class="font-weight-bold">
                                Explore the variety of watches for <?php echo $category; ?>
                            </p>
                        </div>

                        <div class="grid row">


                        <?php
                    }
                }

                if ($rows > 0) {

                    while ($data = mysqli_fetch_array($result)) {
                        ?>

                            <div class="col-md-4">
                                <div class="article" style="background-color: #212529; border-radius: 15px">
                                    <div style="padding: 15px">
                                        <img src="../admin/product/<?php echo $data['product_img']; ?>" alt="Lights" style="width:100%; height:60%">
                                    </div>

                                    <div class="card-body">
                                        <h5 style="color: whitesmoke;"><?php echo $data['product_name']; ?></h5>
                                        <p style="color: whitesmoke;"><i class="fas fa-rupee-sign"></i> <?php echo $data['product_price']; ?></p>
                                        <div class="row">
                                            <div class="col-md-6" style="text-align: left;">
                                                <a href="" style="font-weight: 500;"data-toggle="modal" data-target="#exampleModalCenter" onclick="showdetail('<?php echo  $data['product_id']?>')" class="btn btn-outline-warning btn-rounded lefttip">
                                                    <span class="lefttip_text">view product description</span>
                                                    <i class="fas fa-eye fa-2xl" style="font-size: x-large;"></i>
                                                </a>
                                                <a href="" data-uid="<?php echo $user_id?>" data-pid="<?php echo $data['product_id']?>" style="font-weight: 500;" class="btn btn-outline-warning btn-rounded righttip add_to_cart">
                                                    <span class="righttip_text">add to cart</span>
                                                    <i class="fas fa-cart-plus fa-2xl" style="font-size: x-large;"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-6" style="text-align: right;">
                                                <a href="" onclick="" style="font-weight: 500;" class="btn btn-outline-primary btn-rounded buynowlink" data-mdb-ripple-color="dark" data-uid="<?php echo $user_id?>" data-pid="<?php echo $data['product_id']?>">
                                                    buy now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                    }
                } else {
                        ?>

                        <div class="col-md-12" style="margin-top: 5%;">
                            <img src="../include/image/NoProducts.png" width="100%">
                        </div>

                    <?php
                }
                    ?>
                        </div>
                    </div>
                    <div style="margin-top: 3%;">
                        <?php

                        for ($page = 1; $page <= $number_of_page; $page++) {
                        ?>

                            <a class="btn btn-outline-danger btn-rounded" style="font-weight: 700;" href="index.php?page=<?php echo $page ?>&&<?php if (isset($brand)) {
                                                                                                                                                    echo "brand=" . $brand;
                                                                                                                                                } else {
                                                                                                                                                    echo "category=" . $category;
                                                                                                                                                } ?>"><?php echo $page ?></a>
                        <?php
                        }
                        ?>
                    </div>
    </section>
    <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark text-light" id="modeldata">
    
    
    </div>
  </div>
</div>


    <?php
    include "../include/footer.php";
    ?>

    <!-- jQuery -->
    <script src="../include/js/jquery.min.js"></script>

    <script src="../include/js/adminlte.js"></script>

    <!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="../include/js/site_title.js"></script>
    <script>

    $(document).ready(function(){

        $(".add_to_cart").click(function(){
            
            var uid = $(this).data('uid');
            var pid = $(this).data('pid');
            
            $.ajax({
              type: 'post',
              url: '../account/cart/add_to_cart.php',
              data: {
                  uid: uid,
                  pid: pid
              },
              success: function(response) {
                if (response == "success") {
                    location.reload();
                  alert("Product added successfully!");
                }else if (response == "exists") {
                  alert("Product already exists in cart!");
                }
                else {
                  alert("Something went wrong!","","error");
                }
              }
            });

        });

    });
    $(".buynowlink").click(function(){
            
            var uid = $(this).data('uid');
            var pid = $(this).data('pid');
            
            $.ajax({
              type: 'post',
              url: '../account/cart/add_to_cart.php',
              data: {
                  uid: uid,
                  pid: pid
              },
              success: function(response) {
                if (response == "success") {
                    window.location.href = "../account/checkout.php";
                  
                }else if (response == "exists") {
                }
                else {
                  alert("Something went wrong!","","error");
                }
              }
            });
            

        });
  const showdetail=(productid)=>{
  
    $.ajax({
        url: "./productdetail.php",
        type: "POST",
        data: {
          pid: productid,
        
        },
        cache: false,
        success: function(result) {
        $("#modeldata").html(result);
          
      }
      })

  }

    </script>
</body>
<!-- Mirrored from html.design/demo/watcher/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:51 GMT -->

</html>