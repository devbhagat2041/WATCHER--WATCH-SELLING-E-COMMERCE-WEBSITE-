<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
  header("location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminWATCHER | Categories</title>

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

              <h1 class="m-0 text-dark">Categories</h1>

            </div><!-- /.col -->

            <div class="col-sm-6">

              <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>

                <li class="breadcrumb-item active">Categories</li>

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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" id="category" name="category" method="POST" action="insert.php" onsubmit="return do_insert();">
              <div class="card-body">
                <div class="form-group">
                  <label for="category_name">Category Name</label>
                  <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name">
                  <br>
                  <span class="error_catname" id="error_catname" name="error_catname" style="color:red;"></span>
                </div>

                <div class="form-group">
                  <label for="category_image">Category Image</label>
                  <br>

                  <img id="preview_img" src="" alt="your image" style="display: none; height: 250px; width:350px" />
                  <input type="file" id="category_image" name="category_image">

                  <br>
                  <span class="error_catimg" id="error_catimg" name="error_catimg" style="color:red;"></span>
                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.content -->
          <br><br>

          <div class="table-responsive">
            <table id="categories">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Category Name</th>
                  <th>Category Image</th>
                  <th>Actions</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
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
        // var idi = 1;

        $(document).ready(function() {

          $('#categories').DataTable({

            "bProcessing": true,
            "sAjaxSource": "categories_data.php",
            "aoColumns": [{
                data: "cat_id",
                render: function(data, type, full, meta) {
                  if(data == 'N/A')
                  {
                    return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                  }
                  else{
                  return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '">' + (meta.row + 1) + '</span>';
                }
              }
              },
              {
                data: "cat_name",
                render: function(data, type, row) {
                  return '<b>' + data + '</b>';
                }
              },
              {
                data: "cat_img",
                render: function(data, type, row) {
                  if(data == 'N/A')
                  {
                    return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                  }
                  else{
                  return '<img src="' + data + '" style="height:100px;width:200px;"/>';
                  }
                }
              },
              {
                data: "cat_id",
                render: function(data, type, row) {
                  if(data == 'N/A')
                  {
                    return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                  }
                  else
                  {
                  return '<button class="btn btn-warning btnEdit" data-id="' + data + '"><i class="fas fa-edit"></i></button>' + '  ' + '<button class="btn btn-danger btnRemove" data-id="' + data + '"><i class="fas fa-trash"></i></button>';
                }
                }
              },
              {
                data: "is_active",
                render: function(data, type, row) {
                  if(data == 'N/A')
                  {
                    return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                  }
                  else if (data == 1) {
                    return '<button class="btn btn-success btnS">Active</button><br><label>click to disable</label>';
                  } else {
                    return '<button class="btn btn-danger btnD">Disabled</button><br><label>click to activate</label>';
                  }
                }
              }


            ]


          });


        });

        $("#category").validate({
          rules: {
            category_name: {
              required: {
                depends: function() {
                  $(this).val($.trim($(this).val()));
                  return true;
                }
              },
            },
            category_image: {
              required: true,
            }
          },
          messages: {
            category_name: {
              required: "Please enter category name*",
            },
            category_image: {
              required: "Please enter category image*",
            }
          },
          errorPlacement: function(error, element) {
            if (element.attr("id") == "category_name") {
              $("#error_catname").html(error);
            } else if (element.attr("id") == "category_image") {
              $("#error_catimg").html(error);
            }
          }

        });


        function do_insert() {
          // Get form
          var form = $('#category')[0];

          // Create an FormData object 
          var data = new FormData(form);

          if ($("#category").valid()) {

            $.ajax({
              type: 'post',
              enctype: 'multipart/form-data',
              url: 'insert.php',
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              timeout: 800000,
              success: function(response) {
                if (response == "success") {
                  $('#categories').DataTable().ajax.reload();
                  swal("New category added successfully!", "", "success");
                  $("#category")[0].reset();
                  $('#preview_img').css("display", "none");
                  $('#preview_img').attr("src", "");
                } else {
                  swal("Something went wrong!", "Please fill form correctly", "error");                }
              }
            });
          }

          return false;
        }


        $(document).on('click', '.btnEdit', function() {

          var cat_id = $(this).data("id");

          window.location.href = "edit.php?id=" + cat_id;

        });

        $(document).on('click', '.btnRemove', function() {

          var cat_id = $(this).data("id");

          swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((willDelete) => {
            if (willDelete) {

              $.ajax({
                type: 'post',
                url: 'delete.php',
                data: {
                  cat_id: cat_id
                },
                success: function(response) {
                  if (response == "success") {
                    $('#categories').DataTable().ajax.reload();
                    swal("Category removed successfully!", "", "success");
                  } else {
                    swal("Something went wrong, Try again!", "", "error");
                  }
                }
              });

            }
          })

        });

        $(document).on('change', '#category_image', function() {

          var ext = $('#category_image').val().split('.').pop().toLowerCase();

          if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg', 'jfif']) == -1) {

            $("#category_image").val('');
            $('#preview_img').css("display", "none");
            $('#preview_img').attr("src", "");
            swal('invalid extension!', "", "error");

          } else {

            $('#preview_img').css("display", "block");
            $('#preview_img').attr("src", URL.createObjectURL(event.target.files[0]));
          }

        });


        $(document).on('click', '.btnS', function(e) {

          var $row = $(this).closest("tr"), // Finds the closest row <tr> 
            $tds = $row.find("td:eq(0)");

          var cat_id = $tds.find('span.btnId').toArray().map(span => $(span).attr('data-id'));

          var c_id = cat_id.toString();

          $.ajax({
            type: 'post',
            url: 'visibility.php',
            data: {
              c_id: c_id
            },
            success: function(response) {
              if (response == "disabled") {
                $('#categories').DataTable().ajax.reload();
                swal("Category disabled successfully!", "", "success");
              } else if (response == "activated") {
                $('#categories').DataTable().ajax.reload();
                swal("Category activated successfully!", "", "success");
              } else {
                swal("Something went wrong, Try again!", "", "error");
              }
            }
          });

        });

        $(document).on('click', '.btnD', function(e) {

          var $row = $(this).closest("tr"), // Finds the closest row <tr> 
            $tds = $row.find("td:eq(0)");

          var cat_id = $tds.find('span.btnId').toArray().map(span => $(span).attr('data-id'));

          var c_id = cat_id.toString();

          $.ajax({
            type: 'post',
            url: 'visibility.php',
            data: {
              c_id: c_id
            },
            success: function(response) {
              if (response == "disabled") {
                $('#categories').DataTable().ajax.reload();
                swal("Category disabled successfully!", "", "success");
              } else if (response == "activated") {
                $('#categories').DataTable().ajax.reload();
                swal("Category activated successfully!", "", "success");
              } else {
                swal("Something went wrong, Try again!", "", "error");
              }
            }
          });

        });




        var url = window.location.pathname;
        var str = url;


        var arr = str.split('/');

        var filename = arr[arr.length - 2];

        if (filename == "categories") {
          $("#categories_sb").css({
            "background-color": "#007bff",
            "color": "#fff"
          });
        }
      </script>
</body>

</html>