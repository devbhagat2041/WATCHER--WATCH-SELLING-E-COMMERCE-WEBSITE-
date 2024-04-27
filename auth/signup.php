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
  <link rel="stylesheet" href="../include/css/site_title.css" />

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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

  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      <div class="row d-flex justify-content-center align-items-center">
        <div class="card card-primary" style="background-color: #273135; margin-top: 5%; margin-bottom: 5%;">
          <div class="card-header" style="background-color: #273135; color:white;">
            <h3 class="card-title">Sign Up</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form"  style="background-color: #273135; color:white;" id="reg" name="reg" method="POST" action="user_register.php" onsubmit="return do_register();">
            <div class="card-body">

              <div class="form-group row">

                <div class="col-md-6">
                  <label for="fname">First name</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name">
                  
                  <span class="error_fname" id="error_fname" name="error_fname" style="color:orange;"></span>
                </div>

                <div class="col-md-6">
                  <label for="lname">Last name</label>
                  <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
                  
                  <span class="error_lname" id="error_lname" name="error_lname" style="color:orange;"></span>
                </div>

              </div>

              <div class="form-group row">

                <div class="col-md-6">
                  <label for="contact">Contact</label>
                  <input type="tel" class="form-control tel" pattern="\d*" id="contact" name="contact" placeholder="Enter contact number" minlength="10" maxlength="10">
                  
                  <span class="error_contact" id="error_contact" name="error_contact" style="color:orange;"></span>
                </div>

                <div class="col-md-6">
                  <label for="dob">DOB</label>
                  <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter date of birth">
                  
                  <span class="error_dob" id="error_dob" name="error_dob" style="color:orange;"></span>
                </div>

              </div>

              <div class="form-group row">
                <div class="col-md-12">

                  <label for="address">Address</label>
                  <textarea row="5" class="form-control" id="address" name="address" placeholder="Enter your detailed address"></textarea>
                  
                  <span class="error_address" id="error_address" name="error_address" style="color:orange;"></span>

                </div>
              </div>

              <div class="form-group row">

                <div class="col-md-4">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your e-mail">

                  <span class="error_email" id="error_email" name="error_email" style="color:orange;"></span>
                </div>

                <div class="col-md-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" minlength="6" maxlength="8">
                  
                  <span class="error_password" id="error_password" name="error_password" style="color:orange;"></span>
                </div>

                <div class="col-md-4">
                  <label for="c_password">Confirm Password</label>
                  <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Enter confirm password" minlength="6" maxlength="8">
                  
                  <span class="error_cpassword" id="error_cpassword" name="error_cpassword" style="color:orange;"></span>
                </div>

              </div>



              <div class="form-group row">

                <div class="col-md-4 col-sm-12">

                  <label for="state">State</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <select class="form-control" id="state" name="state">
                        <option value=''>-- select state --</option>
                        <?php

                        $states = $link->get("states");

                        foreach ($states as $data) {

                        ?>

                          <option value="<?php echo $data['state_id']; ?>"><?php echo $data['state_name']; ?></option>

                        <?php

                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <span class="error_state" id="error_state" name="error_state" style="color:orange;"></span>

                </div>

                <div class="col-md-4 col-sm-12">

                  <label for="city">City</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <select class="form-control" id="city" name="city">
                        <option value=''>-- select state first--</option>

                      </select>
                    </div>
                  </div>
                  <span class="error_city" id="error_city" name="error_city" style="color:orange;"></span>

                </div>

                <div class="col-md-4 col-sm-12">

                  <label for="pincode">Pincode</label>
                  <input class="form-control" id="pincode" name="pincode" type="number" placeholder="Enter pincode" />
                  <span class="error_pincode" id="error_pincode" name="error_pincode" style="color:orange;"></span>

                </div>

              </div>




            </div>
            <!-- /.card-body -->

            <div style="text-align:center;">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <br>
            <div style="text-align: center;">
              <p>Already have an account? <a href="signin.php" style="color: yellow;">Sign In</a>.</p>
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
    $("#reg").validate({
      rules: {
        fname: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
        },
        lname: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
        },
        email: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
          remote: {
            url: "check-email.php",
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
          minlength: 6,
          maxlength: 8,
        },
        c_password: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
          minlength: 6,
          maxlength: 8,
          equalTo: '#password',
        },
        contact: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
          minlength: 10,
          maxlength: 10,
        },
        dob: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
        },
        address: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
        },
        state: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
        },
        city: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
        },
        pincode: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
          minlength: 6,
          maxlength: 6,
        }
      },
      messages: {
        fname: {
          required: "Please enter first name*",
        },
        lname: {
          required: "Please enter last name*",
        },
        email: {
          required: "Please enter E-mail*",
          remote: "Email already exists*"
        },
        password: {
          required: "Please enter password*",
        },
        c_password: {
          required: "Please enter confirm password*",
          equalTo: "Password do not match*",
        },
        contact: {
          required: "Please enter mobile no*",
          minlength: "Please enter 10 digit mobile no*",
          maxlength: "Please enter 10 digit mobile no*",
        },
        dob: {
          required: "Please select dob*",
        },
        address: {
          required: "Please enter address*",
        },
        state: {
          required: "Please select state*",
        },
        city: {
          required: "Please select city*",
        },
        pincode: {
          required: "Please enter pincode*",
        }
      },
      errorPlacement: function(error, element) {
        if (element.attr("id") == "fname") {
          $("#error_fname").html(error);
        } else if (element.attr("id") == "lname") {
          $("#error_lname").html(error);
        } else if (element.attr("id") == "email") {
          $("#error_email").html(error);
        } else if (element.attr("id") == "password") {
          $("#error_password").html(error);
        } else if (element.attr("id") == "c_password") {
          $("#error_cpassword").html(error);
        }else if (element.attr("id") == "contact") {
          $("#error_contact").html(error);
        } else if (element.attr("id") == "dob") {
          $("#error_dob").html(error);
        } else if (element.attr("id") == "address") {
          $("#error_address").html(error);
        } else if (element.attr("id") == "state") {
          $("#error_state").html(error);
        } else if (element.attr("id") == "city") {
          $("#error_city").html(error);
        } else if (element.attr("id") == "pincode") {
          $("#error_pincode").html(error);
        }
      }


    });


    function do_register() {
      // Get form
      var form = $('#reg')[0];

      // Create an FormData object 
      var data = new FormData(form);

      if ($("#reg").valid()) {

        $.ajax({
          type: 'post',
          url: 'user_register.php',
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 800000,
          success: function(response) {
            if(response == "success")
            {
              swal("You are registered successfully!", "", "success");
              $('#reg')[0].reset();
            }
            else
            {
              swal("Something went wrong, Try again!", "", "error");
              $('#reg')[0].reset();
            }
          }
        });
      }

      return false;
    }


    $(document).on('change', '#state', function() {
      var stateID = $(this).val();
      if (stateID) {
        $.ajax({
          type: 'POST',
          url: 'citiesData.php',
          data: 'state_id=' + stateID,
          success: function(html) {
            $('#city').html('<option value="">-- Select City --</option>');
            $('#city').append(html);
          }
        });
      } else {
        $('#city').html('<option value="">Select state first</option>');
      }
    });




  </script>
      <script src="../include/js/site_title.js"></script>

</body>
<!-- Mirrored from html.design/demo/watcher/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:51 GMT -->

</html>