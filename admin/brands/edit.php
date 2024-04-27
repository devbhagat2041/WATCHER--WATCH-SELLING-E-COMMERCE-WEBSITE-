<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
  header("location:../index.php");
}

include '../include/connection.php';

$brand_id = $_GET['id'];

$sql_branddata = $link->rawQueryOne("select * from brands where brand_id=?", array($brand_id));

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminWATCHER | Edit Brand</title>

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

              <h1 class="m-0 text-dark">Brands</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>

                <li class="breadcrumb-item active">Edit Brand</li>

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
              <h3 class="card-title">Edit Brand</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" id="brand" name="brand" method="POST" action="update.php" onsubmit="return do_update();">
              <div class="card-body">
                <input type="hidden" name="brand_id" id="brand_id" value="<?php echo $sql_branddata['brand_id']; ?>">
                <div class="form-group">
                  <label for="brand_name">Brand Name</label>
                  <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter brand name" value="<?php echo $sql_branddata['brand_name']; ?>">
                  <br>
                  <span class="error_brandname" id="error_brandname" name="error_brandname" style="color:red;"></span>
                </div>

                <div class="form-group">
                  <label for="category_image">Brand Image</label>
                  <br>

                  <img id="preview_img" src="<?php echo $sql_branddata['brand_img']; ?>" alt="current image" style="display: block; height: 250px; width:350px" />
                  <input type="file" id="brand_image" name="brand_image">

                  <br>
                  <span class="error_brandimg" id="error_brandimg" name="error_brandimg" style="color:red;"></span>
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

          $("#brand").validate({
            rules: {
              brand_name: {
                required: true,
              },

              category: {
                required: true,
              }
            },
            messages: {
              brand_name: {
                required: "Please enter your brand name*",
              },

              category: {
                required: "Please select category*",
              }
            },
            errorPlacement: function(error, element) {
              if (element.attr("id") == "brand_name") {
                $("#error_brandname").html(error);
              } else if (element.attr("id") == "category") {
                $("#error_category").html(error);
              }
            }


          });
        });



        function do_update() {
          // Get form
          var form = $('#brand')[0];

          // Create an FormData object 
          var data = new FormData(form);

          if ($("#brand").valid()) {

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
                  swal("Brand updated successfully!", "", "success");
                  // window.location.href = "index.php";
                  $('#brand_tbl').DataTable().ajax.reload();
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
          url: "categories_data.php?brand_id=" + "<?php echo $brand_id; ?>",
          data: {}
        }).done(function(data) {
          $("#category").append(data);
        });



        $(document).on('change', '#brand_image', function() {

          var ext = $('#brand_image').val().split('.').pop().toLowerCase();

          if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'webp']) == -1) {

            $("#brand_image").val('');
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