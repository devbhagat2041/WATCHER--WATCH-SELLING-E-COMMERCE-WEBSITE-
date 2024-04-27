<?php

session_start();

include('../include/connection.php');

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Watcher</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../include/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../include/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../include/css/site_title.css" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <!-- fonts style -->
    <link href="../include/css/css.css" rel="stylesheet" />
    <link href="../include/css/userlinks.css" rel="stylesheet" />
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


    <section class="brand_section layout_padding2" style="margin-bottom: 8%;">
        <div class="container">
            <div class="brand_heading">
                <h3 class="custom_heading">
                    Our watch brands
                </h3>
                <p class="font-weight-bold">
                    It is a long established fact that a reader will be distracted by the readable content of a page
                </p>
            </div>

            <div class="row">
                <?php

                $brands = $link->rawQuery('select * from brands LIMIT 4');

                foreach ($brands as $data) {
                ?>
                    <div class="col-md-6" style="margin-top: 2%">
                    <a href="../products/index.php?brand=<?php echo $data['brand_name']; ?>">
                        <img src="../admin/brands/<?php echo $data['brand_img']; ?>" width="100%" height="100%" style="margin-top: 2%">
                    </a>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>

        
    </section>



    <?php
    include "../include/footer.php";
    ?>

    <!-- jQuery -->
    <script src="../include/js/jquery.min.js"></script>

    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap -->
    <script src="../include/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../include/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../include/js/adminlte.js"></script>



    <!-- OPTIONAL SCRIPTS -->
    <script src="../include/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../include/js/jquery.mousewheel.js"></script>
    <script src="../include/js/raphael.min.js"></script>
    <script src="../include/js/jquery.mapael.min.js"></script>
    <script src="../include/js/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../include/js/Chart.min.js"></script>

    <!-- PAGE SCRIPTS -->
    <script src="../include/js/dashboard2.js"></script>

    <!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="../include/js/site_title.js"></script>

</body>
<!-- Mirrored from html.design/demo/watcher/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:51 GMT -->

</html>