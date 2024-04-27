<?php

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

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!-- fonts style -->
  <link href="../include/css/css.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../include/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../include/css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="../include/css/site_title.css" />

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

  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row d-flex justify-content-center align-items-center">
        <div class="card card-primary" style="background-color: #273135; margin-top: 5%; margin-bottom: 5%; width: 40%;">
          <div class="card-header" style="background-color: #273135; color:white;">
            <h3 class="card-title">Sign In</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form"  style="background-color: #273135; color:white;" id="loginform" name="loginform" method="POST" action="user_auth.php" onsubmit="return do_login();">
            <div class="card-body">

              <div class="form-group">

                
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your e-mail">
                  
                  <span class="error_email" id="error_email" name="error_email" style="color:orange;"></span>
                

              </div>

              <div class="form-group">

                
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                  
                  <span class="error_password" id="error_password" name="error_password" style="color:orange;"></span>
                

              </div>

            </div>
            <!-- /.card-body -->

            <div style="text-align:center;">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <br>
            <div style="text-align: center;">
              <p>Don't have an account? <a href="signup.php" style="color: yellow;">Sign Up</a>.</p>
            </div>
          </form>
        </div>
        <!-- /.content -->
        <br><br>

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
  <script>
    $("#loginform").validate({
      rules: {
        
        email: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
          remote: {
            url: "get-email.php",
            type: "post",
          },
          email: true,
        },
        password: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
          minlength: 5,
          maxlength: 8,
        }
      },
      messages: {
    
        email: {
          required: "Please enter e-mail*",
          remote: "E-mail does not exist, please register*"
        },
        password: {
          required: "Please enter password*",
        }
      },
      errorPlacement: function(error, element) {
         if (element.attr("id") == "email") {
          $("#error_email").html(error);
        } else if (element.attr("id") == "password") {
          $("#error_password").html(error);
        } 
      }


    });


    function do_login() {
      // Get form
      var form = $('#loginform')[0];

      // Create an FormData object 
      var data = new FormData(form);

      if ($("#loginform").valid()) {

        $.ajax({
          type: 'post',
          url: 'user_auth.php',
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 800000,
          success: function(response) {
            if(response == "success")
            {
                window.location.href = "../index.php";
            }
            else
            {
              swal("Wrong password, Try again!", "", "error");
              $('#password').reset();
            }
          }
        });
      }

      return false;
    }



  </script>
      <script src="../include/js/site_title.js"></script>

</body>
<!-- Mirrored from html.design/demo/watcher/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:51 GMT -->

</html>