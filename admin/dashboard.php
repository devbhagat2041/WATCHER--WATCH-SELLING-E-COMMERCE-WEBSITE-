<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
  header("location:index.php");
}

include('include/connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminWATCHER | Dashboard </title>

  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="include/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="include/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="include/css/font.css" rel="stylesheet">

  <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="dashboard.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard.php" class="brand-link">
        <img src="include/image/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminWATCHER</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="include/image/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="" class="d-block">Admin</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="dashboard.php" class="nav-link" id="dashboard">
                <i class="nav-icon fa fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="categories/index.php" class="nav-link" id="categories">
                <i class="fas fa-bars" style="margin-left: 6px;font-size: larger;"></i>
                <p style="margin-left: 7px;">
                  Categories
                  <i class="fa fa-angle-right" style="margin-left: 90px;font-size: larger;"></i>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="brands/index.php" class="nav-link" id="brands">
                <i class="fas fa-bold" style="margin-left: 6px;font-size: larger;"></i>
                <p style="margin-left: 10px;">
                  Brands
                  <i class="fa fa-angle-right" style="margin-left: 117px;font-size: larger;"></i>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="product/index.php" class="nav-link" id="products">
                <i class="fab fa-product-hunt" style="font-size: 20px;margin-left: 3px;"></i>
                <p style="font-size: 16px;margin-left: 8px;">
                  Products
                  <i class="fa fa-angle-right" style="margin-left: 102px;font-size: larger;"></i>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="inquiries/index.php" class="nav-link" id="inquiries">
                <i class="fas fa-comment-alt-lines" style="margin-left: 6px;font-size: larger;"></i>
                <p style="margin-left: 7px;">
                  Inquiries
                  <i class="fa fa-angle-right" style="margin-left: 102px;font-size: larger;"></i>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="auth/logout.php" class="nav-link">
                <i class="fa fa-sign-out" style="font-size: 21px; margin-left: 5px;"></i>
                <p style="margin-left: 5px;">
                  Log Out
                </p>
              </a>
            </li>

          </ul>
        </nav>

        <!-- Sidebar Menu -->
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>




    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1 class="m-0 text-dark">Dashboard</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item active">Dashboard</li>

              </ol>

            </div><!-- /.col -->

          </div><!-- /.row -->

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-flag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Brands</span>
                  <span class="info-box-number">
                    <?php

                    $brands = $link->rawQuery("select * from brands");

                    $bcc = count($brands);

                    echo $bcc;
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-product-hunt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Products</span>
                  <span class="info-box-number">
                    <?php

                    $products = $link->rawQuery("select * from product");

                    $pcc = count($products);

                    echo $pcc;
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Orders</span>
                  <span class="info-box-number">
                    <?php

                    $orders = $link->rawQuery("select * from orders");

                    $occ = count($orders);

                    echo $occ;
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <span class="info-box-number">
                    <?php

                    $users = $link->rawQuery("select * from users");

                    $ucc = count($users);

                    echo $ucc;
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->


            <h3 style="margin-left: 1.5%; margin-top: 2%; margin-bottom: 1.5%;">Orders</h3>

            <div class="table-responsive">
              <table id="order_tbl" name="order_tbl" class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Payment Method</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <!--/. container-fluid -->
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2019 <a href="dashboard.php">AdminWATCHER</a>.</strong>
      All rights reserved.

    </footer>

    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="include/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="include/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="include/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="include/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="include/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>


    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="include/js/jquery.mousewheel.js"></script>
    <script src="include/js/raphael.min.js"></script>
    <script src="include/js/jquery.mapael.min.js"></script>
    <script src="include/js/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="include/js/Chart.min.js"></script>

    <!-- PAGE SCRIPTS -->
    <script src="include/js/dashboard2.js"></script>

    <script type="text/javascript">
      var url = window.location.pathname;
      var filename = url.substring(url.lastIndexOf('/') + 1);

      if (filename == "dashboard.php") {
        $("#dashboard").css("background-color", "#007bff");
      }

      $(document).ready(function() {

        $('#order_tbl').DataTable({

          "bProcessing": true,
          "sAjaxSource": "orders/order_data.php",
          "aoColumns": [{
              data: "order_id",
              render: function(data, type, full, meta) {
                if (data == 'N/A') {
                  return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                } else {
                  return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '">' + (meta.row + 1) + '</span>';
                }
              }
            },
            {
              data: "order_date",
              render: function(data, type, row) {

                return '<b>' + data + '</b>';
              }
            },
            {
              data: "user_name",
              render: function(data, type, row) {

                return '<b>' + data + '</b>';
              }
            },
            {
              data: "product_name",
              render: function(data, type, row) {
                return '<b>' + data + '</b>';
              }
            },
            {
              data: "product_price",
              render: function(data, type, row) {
                return '<b>' + data + '</b>';
              }
            },
            {
              data: "qty",
              render: function(data, type, row) {
                return '<b>' + data + '</b>';
              }
            },
            {
              data: "total",
              render: function(data, type, row) {
                return '<b>' + data + '</b>';
              }
            },
            {
              data: "payment_method",
              render: function(data, type, row) {
                return '<b>' + data + '</b>';
              }
            },
            {
              data: "contact",
              render: function(data, type, row) {
                return '<b>' + data + '</b>';
              }
            },
            {
              data: "email",
              render: function(data, type, row) {
                return '<b>' + data + '</b>';
              }
            },
            {
              data: "address",
              render: function(data, type, row) {
                return '<b>' + data + '</b>';
              }
            },
            {
              data: "status",
              render: function(data, type, row) {
                return '<b>' + data + '</b>';
              }
            },
            {
                data: "order_id",
                render: function(data, type, row) {
                  if(data == 'N/A')
                  {
                    return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                  }
                  else{
                  return '<a href="view_order.php?id=' + data + '"><button class="btn btn-warning btnEdit" data-id="' + data + '"><i class="fas fa-edit"></i></button></a>' + '  ' + '<button class="btn btn-danger btnRemove" data-id="' + data + '"><i class="fas fa-trash"></i></button>';
                  }
                }
              },

          ]


        });


      });
    </script>
</body>

</html>