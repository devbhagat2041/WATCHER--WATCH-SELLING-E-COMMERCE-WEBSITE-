<?php

session_start();

if (isset($_SESSION['email'])) {
  header("location:dashboard.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="include/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="login.php"><b>Admin</b>WATCHER</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post" name="adminLogin" id="adminLogin" action="auth/admin_auth.php" onsubmit="return do_login();">

          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <span class="error_msg" id="error_msg" name="error_msg" style="color:red;"></span>

          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" maxlength="8" value="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <span class="error_password" id="error_password" name="error_password" style="color:red;"></span>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block" id="login" name="login">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
          <span class="error_crd" id="error_crd" name="error_crd" style="color:red; display:none; text-align:center; margin-top:2%"></span>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>


        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot_password.php">I forgot my password</a>
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script>
    $("#adminLogin").validate({
      rules: {
        email: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
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
          maxlength: 8,
        }
      },
      messages: {
        email: {
          required: "Please enter your E-mail*",
          email: "Please enter valid email ID*",
        },
        password: {
          required: "Please enter your Password*",
          maxlength: "Password must be of 8 characters max*",
        }
      },
      errorElement: "em",
      errorPlacement: function(error, element) {
        // Add the `invalid-feedback` class to the error element
        // error.addClass("invalid-feedback");

        if (element.attr("id") == "email") {
              $("#error_msg").html(error);
            } else if (element.attr("id") == "password") {
              $("#error_password").html(error);
            }
      },
      // highlight: function(element, errorClass, validClass) {
      //   $(element).addClass("is-invalid").removeClass("is-valid");
      // },
      // unhighlight: function(element, errorClass, validClass) {
      //   $(element).addClass("is-valid").removeClass("is-invalid");
      // }

    });



    function do_login() {
      var email = $("#email").val();
      var pass = $("#password").val();
      var remember = 0;

      if ($("#remember").prop('checked') == true) {
        remember = 1;
      }

      if (email != "" && pass != "") {

        $.ajax({
          type: 'post',
          url: 'auth/admin_auth.php',
          data: {
            do_login: "do_login",
            email: email,
            password: pass,
            remember: remember
          },
          success: function(response) {
            if (response == "success") {
              window.location.href = "dashboard.php";
            } else {
              
              $("#error_crd").css("display","block");
              $("#error_crd").html("Wrong Credentials*");
            }
          }
        });
      }

      return false;
    }
  </script>
  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE App -->
  <script src="include/js/adminlte.min.js"></script>

</body>

</html>