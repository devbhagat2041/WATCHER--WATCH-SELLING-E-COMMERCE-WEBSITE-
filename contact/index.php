<?php

  session_start();

  include "../include/connection.php";

?>

<html>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <!-- Site Metas -->
  <meta name="keywords" content=""/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>

  <title>Watcher</title>

  <link rel="stylesheet" href="../include/css/site_title.css" />

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="../include/css/owl.carousel.min.css"/>
  <link rel="stylesheet" href="../include/css/userlinks.css"/>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../include/css/bootstrap.css"/>

  <!-- fonts style -->
  <link href="../include/css/css.css" rel="stylesheet"/>
  <!-- Custom styles for this template -->
  <link href="../include/css/style.css" rel="stylesheet"/>
  <!-- responsive style -->
  <link href="../include/css/responsive.css" rel="stylesheet"/>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section starts -->
   <?php

    include"../include/header.php";
   ?>
    <!-- end header section -->

  </div>


  <!-- contact section -->

  <section class="contact_section layout_padding">
    <h2 class="custom_heading text-center">
      NOW CONTACT US
    </h2>
    <div class="container mt-5 pt-5">
      <form role="form" method="POST" id="contact_form" name="contact_form" action="submit_inq.php" onsubmit="return do_submit_inq();">
        <div>
          <input type="text" placeholder="NAME" id="name" name="name"/>
          <span id="error_name" style="color: orange;"></span>
        </div>
        <div>
          <input type="email" placeholder="EMAIL" id="email" name="email"/>
          <span id="error_email" style="color: orange;"></span>
        </div>
        <div>
          <input type="tel" class="tel" pattern="\d*" placeholder="PHONE NUMBER" id="phone" name="phone" minlength="10" maxlength="10"/>
          <span id="error_phone" style="color: orange;"></span>
        </div>
        <div>
          <input type="text" class="message-box" placeholder="MESSAGE" id="message" name="message"/>
          <span id="error_message" style="color: orange;"></span>
        </div>
        <div class="d-flex justify-content-center mt-5 pt-5">
          <button type="submit">
            SEND
          </button>
        </div>
      </form>
    </div>
  </section>

  <!-- end contact section -->


  <!-- end info_section -->

  <!-- footer section -->
  <?php
    include"../include/footer.php";
  ?>
  <!-- footer section -->

  <script src="../include/js/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="../include/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script>
    $("#contact_form").validate({
      rules: {
        name: {
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
          email: true,
        },
        phone: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
          minlength: 10,
          maxlength: 10,
        },
        message: {
          required: {
            depends: function() {
              $(this).val($.trim($(this).val()));
              return true;
            }
          },
        }
      },
      messages: {
        name: {
          required: "Please enter your name*",
        },
        email: {
          required: "Please enter your E-mail*",
        },
        phone: {
          required: "Please enter mobile no*",
          minlength: "Please enter 10 digit mobile no*",
          maxlength: "Please enter 10 digit mobile no*",
        },
        message: {
          required: "Please enter your message*",
        }
      },
      errorPlacement: function(error, element) {
        if (element.attr("id") == "name") {
          $("#error_name").html(error);
        } else if (element.attr("id") == "email") {
          $("#error_email").html(error);
        } else if (element.attr("id") == "phone") {
          $("#error_phone").html(error);
        } else if (element.attr("id") == "message") {
          $("#error_message").html(error);
        } 
      }


    });


    function do_submit_inq() {
      // Get form
      var form = $('#contact_form')[0];

      // Create an FormData object 
      var data = new FormData(form);

      if ($("#contact_form").valid()) {

        $.ajax({
          type: 'post',
          url: 'submit_inq.php',
          data: data,
          processData: false,
          contentType: false,
          cache: false,
          timeout: 800000,
          success: function(response) {
            if(response == "success")
            {
              swal("Message submitted successfully!", "", "success");
              $('#contact_form')[0].reset();
            }
            else
            {
              swal("Something went wrong, Try again!", "", "error");
              $('#contact_form')[0].reset();
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