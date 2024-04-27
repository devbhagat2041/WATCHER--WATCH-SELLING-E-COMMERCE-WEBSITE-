<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
  header("location:../index.php");
}

include '../include/connection.php';

$product_id = $_GET['id'];

$sql_productdata = $link->rawQueryOne("select * from product where product_id=?", array($product_id));

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminWATCHER | Edit product</title>

  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../include/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../include/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="../include/css/font.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
    include "../include/header.php";
    ?>

    <?php

    include "../include/sidebar.php"
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">

              <h1 class="m-0 text-dark">Products</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>

                <li class="breadcrumb-item active">Edit Product</li>

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
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Edit Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" id="product" name="product" method="POST" action="update.php" onsubmit="return do_update();">
              <div class="card-body">
                <input type="hidden" name="product_id" id="product_id" value="<?php echo $sql_productdata['product_id']; ?>">
                <div class="form-group">
                  <label for="product_name">Product Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo $sql_productdata['product_name']; ?>">
                  <br>
                  <span class="error_productname" id="error_productname" name="error_productname" style="color:red;"></span>
                </div>


                <div class="form-group">
                  <label for="product_name">Product Description</label>
                  <textarea class="form-control" rows="10" id="product_description" name="product_description" placeholder="Enter product description"><?php echo $sql_productdata['product_description']; ?></textarea>
                  <br>
                  <span class="error_productdescription" id="error_productdescription" name="error_productdescription" style="color:red;"></span>
                </div>

                <div class="form-group">
                  <label for="product_name">Product Price</label>
                  <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter product price" value="<?php echo $sql_productdata['product_price']; ?>">
                  <br>
                  <span class="error_productprice" id="error_productprice" name="error_productprice" style="color:red;"></span>
                </div>


                <div class="form-group">
                  <label for="product_image">Product Image</label>
                  <br>

                  <img id="preview_img" src="<?php echo $sql_productdata['product_img']; ?>" alt="current image" style="display: block; height: 250px; width:350px" />
                  <input type="file" id="product_image" name="product_image">

                  <br>
                  <span class="error_productimg" id="error_productimg" name="error_productimg" style="color:red;"></span>
                </div>

                <div class="form-group">
                  <label for="brand_category">Select Category</label>
                  <br>
                  <span class="error_brandname" id="error_categoryid" name="error_brandname" style="color:red;"></span>
                  <div class="input-group">
                    <div class="custom-file">
                      <select class="form-control" id="category" name="category">
                        <option value='' default>-- select category --</option>

                      </select>
                    </div>
                  </div>
                  <span class="error_brandname" id="error_category" name="error_category" style="color:red;"></span>
                </div>

                <div class="form-group">
                  <label for="product_brand">Select Brand</label>
                  <br>
                  <span class="error_productname" id="error_productid" name="error_productname" style="color:red;"></span>
                  <div class="input-group">
                    <div class="custom-file">
                      <select class="form-control" id="brand" name="brand">
                        <option value='' default>-- select brand --</option>

                      </select>
                    </div>
                  </div>
                  <span class="error_brandname" id="error_brand" name="error_brand" style="color:red;"></span>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div><br>
          <!-- /.content -->
          <div style="text-align: center;">
            <a href="index.php" class="btn btn-dark"><i class="fas fa-long-arrow-alt-left"></i> Back</a>
          </div>

          <br><br>

        </div>
      </section>
      <!-- /.content-wrapper -->
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      <!-- Main Footer -->
      <?php
      include "../include/footer.php";
      ?>
      <!-- ./wrapper -->
      <!-- REQUIRED SCRIPTS -->
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

      <!-- jQuery -->
      <!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>-->
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script>
        $(document).ready(function() {

          $("#product").validate({
            rules: {
              product_name: {
                required: true,
              },
              product_description: {
                required: true,
              },
              product_price: {
                required: true,
              },
              category: {
                required: true,
              },
              brand: {
                required: true,
              },
            },
            messages: {
              product_name: {
                required: "Please enter your brand name*",
              },
              product_description: {
                required: "Please enter product description*",
              },
              product_price: {
                required: "Please enter your product price*",
              },
              category: {
                required: "Please select category*",
              },
              brand: {
                required: "Please select brand*",
              }
            },
            errorPlacement: function(error, element) {
              if (element.attr("id") == "product_name") {
                $("#error_productname").html(error);
              } else if (element.attr("id") == "product_description") {
                $("#error_productdescription").html(error);
              } else if (element.attr("id") == "product_price") {
                $("#error_productprice").html(error);
              } else if (element.attr("id") == "category") {
                $("#error_category").html(error);
              } else if (element.attr("id") == "brand") {
                $("#error_brand").html(error);
              }
            }

          });
        });



        function do_update() {
          // Get form
          var form = $('#product')[0];

          // Create an FormData object 
          var data = new FormData(form);

          if ($("#product").valid()) {

            $.ajax({
              type: 'post',
              enctype: 'multipart/form-data',
              url: 'update.php',
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 800000,
              success: function(response) {
                if (response == "success") {
                  swal("Product updated successfully!", "", "success");
                  // window.location.href = "index.php";
                  $('#product_tbl').DataTable().ajax.reload();
                } else {
                  alert("Please fill form correctly!");
                }
              }
            });
          }

          return false;
        }

        $.ajax({
          type: "POST",
          url: "categories_data.php?product_id=" + "<?php echo $product_id; ?>",
          data: {}
        }).done(function(data) {
          $("#category").append(data);
        });

        $.ajax({
          type: "POST",
          url: "brands_data.php?product_id=" + "<?php echo $product_id; ?>",
          data: {}
        }).done(function(data) {
          $("#brand").append(data);
        });


        $(document).on('change', '#product_image', function() {

          var ext = $('#product_image').val().split('.').pop().toLowerCase();

          if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {

            $("#product_image").val('');
            $('#preview_img').css("display", "none");
            $('#preview_img').attr("src", "");
            swal('invalid extension!', "", "error");

          } else {

            $('#preview_img').css("display", "block");
            $('#preview_img').attr("src", URL.createObjectURL(event.target.files[0]));
          }

        });
      </script>
</body>

</html>