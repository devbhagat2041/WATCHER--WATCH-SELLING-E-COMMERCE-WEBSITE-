<?php

session_start();

include('include/connection.php');

if(isset($_SESSION['email']) && $_SESSION['email'] != null)
{
    $user_data = $link->rawQueryOne("select * from users where email=?", array($_SESSION['email']));

    $user_id = $user_data['user_id'];

    $link->where('user_id', $user_id);
    $cart_data = $link->get('cart');

    if(count($cart_data) < 1)
    {
        $cart_count = 0;
    }
    else
    {
        $cart_count = count($cart_data);
    }

}

?>
<!DOCTYPE html>
<html>
<!-- Mirrored from html.design/demo/watcher/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:30 GMT -->

<head>
  <meta charset="utf-8" />
  <!-- Basic -->

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Watcher</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="include/css/owl.carousel.min.css" />

  <link rel="stylesheet" href="include/css/userlinks.css" />

  <link rel="stylesheet" href="include/css/site_title.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="include/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="include/css/css.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="include/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="include/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section" style="background-color: #273135;">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.php">
            <i class="fad fa-watch bounce" style="width: 26px !important;
                height: 20 !important;">
            </i>
            <span id="text">

            </span>
            <span class='console-underscore' id='console'>
              _
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav shift">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about/index.php"> About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="categories/index.php"> Categories </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact/index.php">Contact us</a>
                </li>

                <?php

                if (
                  isset($_SESSION['fname']) && isset($_SESSION['lname']) && isset($_SESSION['email'])
                  && isset($_SESSION['email']) && $_SESSION['fname'] != null && $_SESSION['lname'] != null
                  && $_SESSION['email'] != null
                ) {
                ?>
                  <input type="hidden" id="session_email" value="<?php echo $_SESSION['email']; ?>">
                  <li class="nav-item">
                    <div class="dropdown nav-link">
                      <span class="dropbtn" style="text-transform: uppercase;"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?>
                        <i class="fa fa-caret-down"></i>
                      </span>
                      <div class="dropdown-content">
                        <a href="account/index.php">profile</a>
                        <a href="auth/logout.php">logout</a>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="account/cart.php">
                      <i class="fas fa-cart-plus"></i>
                      <span class="badge badge-light cart-count" style="border-radius: 35%;"><?php echo $cart_count; ?></span>
                    </a>
                  </li>
                <?php
                } else {
                ?>
                  <input type="hidden" id="session_email" value="0">
                  <li class="nav-item">
                    <a class="nav-link" href="auth/signin.php"><i class="fa fa-user"></i> Sign In</a>
                  </li>
                <?php
                }
                ?>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="include/image/banner1.jpg" height="600px" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="include/image/banner2.jpg" height="600px" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="include/image/banner3.jfif" height="600px" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>


    <section class="brand_section layout_padding2">
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
              <a href="products/index.php?brand=<?php echo $data['brand_name']; ?>">
                <img src="admin/brands/<?php echo $data['brand_img']; ?>" width="100%" height="100%" style="margin-top: 2%">
              </a>
            </div>
          <?php
          }

          ?>
        </div>
      </div>

      <div style="margin-top: 3.5%; text-align:center;">
        <a class="btn btn-outline-dark" href="brands/index.php">Explore More</a>
      </div>
    </section>

    <!-- why section -->
    <section class="why_section layout_padding">
      <div class="container">
        <h3 class="custom_heading" style="color: lightcoral;">
          Why choose Us
        </h3>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="img_box">
              <i class="fas fa-truck" style="font-size: xxx-large; color: gainsboro;"></i>
            </div>
            <div class="detail_box">
              <h5>
                Fast Delivery
              </h5>
              <p style="color: darkgray;">
                variations of passages of Lorem Ipsum available, but the majority have suffered
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="img_box">
              <i class="fas fa-rupee-sign" style="font-size: xxx-large; color: gainsboro;"></i>
            </div>
            <div class="detail_box">
              <h5>
                Free Shiping
              </h5>
              <p style="color: darkgray;">
                variations of passages of Lorem Ipsum available, but the majority have suffered
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="img_box">
              <i class="fas fa-shield-check" style="font-size: xxx-large; color: gainsboro;"></i>
            </div>
            <div class="detail_box">
              <h5>
                Best Quality
              </h5>
              <p style="color: darkgray;">
                variations of passages of Lorem Ipsum available, but the majority have suffered
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="img_box">
              <i class="fas fa-user-headset" style="font-size: xxx-large; color: gainsboro;"></i>
            </div>
            <div class="detail_box">
              <h5>
                24x7 Customer support
              </h5>
              <p style="color: darkgray;">
                variations of passages of Lorem Ipsum available, but the majority have suffered
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- client section -->

    <section class="client_section" style="background-color: whitesmoke;">
      <div class="container" style="padding-top: 2%;">
        <h3 class="custom_heading">
          Testimonial
        </h3>
        <p class="font-weight-bold">
          It is a long established fact that a reader will be distracted by the readable content of a page
        </p>
      </div>
      <div class="container"></div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="detail_box">
                    <div class="img_box">
                      <img src="include/image/client.jpg" alt="" />
                    </div>
                    <div class="name_box">
                      <h5>
                        Sandy Den
                      </h5>
                      <h6>
                        Many Variations
                      </h6>
                    </div>
                  </div>
                  <div class="detail_text">
                    <p>
                      There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                      alteration
                      in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If
                      you
                      are going to use a passage of Lorem Ipsum, you need to beThere are many variations of passages
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="detail_box">
                    <div class="img_box">
                      <img src="include/image/client.jpg" alt="" />
                    </div>
                    <div class="name_box">
                      <h5>
                        Sandy Den
                      </h5>
                      <h6>
                        Many Variations
                      </h6>
                    </div>
                  </div>
                  <div class="detail_text">
                    <p>
                      There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                      alteration
                      in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If
                      you
                      are going to use a passage of Lorem Ipsum, you need to beThere are many variations of passages
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="detail_box">
                    <div class="img_box">
                      <img src="include/image/client.jpg" alt="" />
                    </div>
                    <div class="name_box">
                      <h5>
                        Sandy Den
                      </h5>
                      <h6>
                        Many Variations
                      </h6>
                    </div>
                  </div>
                  <div class="detail_text">
                    <p>
                      There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                      alteration
                      in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If
                      you
                      are going to use a passage of Lorem Ipsum, you need to beThere are many variations of passages
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>


    </section>


    <!-- end client section -->

    <!-- footer section -->
    <section class="section-no-border container-fluid footer_section">
      <!-- Footer -->
      <footer class="page-footer font-small stylish-color-dark pt-4" style="padding-left: 0px;">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-md-4 mx-auto">

              <!-- Content -->
              <h5 class="font-weight-bold text-uppercase mt-3 mb-4">
                <a class="navbar-brand" href="index.php">
                  <span>
                    Watcher
                  </span>
                </a>
              </h5>
              <p style="text-align: left; color:darkgrey;">
                The idea for the site came about because people were often asking for advice about which watch they should buy. The more this happened — and it happened a lot — the more we realized that searching for a watch online is a minefield of information.
              </p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 mx-auto" style="text-align: left; padding-left: 17%;">

              <!-- Links -->
              <h5 class="font-weight-bold text-uppercase mt-4 mb-4" style="color: cornsilk;">Pages</h5>

              <ul class="list-unstyled">
                <li>
                  <a href="index.php">Home</a>
                </li>
                <li>
                  <a href="brands/index.php">Brands</a>
                </li>
                <li>
                  <a href="about/index.php">About Us</a>
                </li>
                <li>
                  <a href="categories/index.php">Categories</a>
                </li>
                <li>
                  <a href="contact/index.php">Contact Us</a>
                </li>
              </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 mx-auto" style="text-align: left; padding-left: 17%;">

              <!-- Links -->
              <h5 class="font-weight-bold text-uppercase mt-4 mb-4" style="color: cornsilk;">Reachout</h5>

              <ul class="list-unstyled">
                <li style="color: darkgray;">
                  <i class="fas fa-map-marker-alt"></i> &nbsp; Surat, Gujarat - INDIA.
                </li>
                <li style="color: darkgray;">
                  <i class="fas fa-phone-office"></i> &nbsp; +91 7778889910
                </li>
                <li style="color: darkgray;">
                  <i class="fas fa-envelope"></i> &nbsp; watcherIND@gmail.com
                </li>
              </ul>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

          </div>
          <!-- Grid row -->

        </div>
        <br>
        <!-- Footer Links -->
        <!-- Social buttons -->
        <ul class="list-unstyled list-inline text-center">
          <li class="list-inline-item">
            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998; border: none; color:white;" href="https://www.facebook.com/profile.php?id=100081288412027" role="button"><i class="fab fa-facebook-f"></i></a>


          </li>
          <li class="list-inline-item">
            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee; border: none; color:white;" href="#!" role="button"><i class="fab fa-twitter"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39; border: none; color:white;" href="http://sdlwatcher.epizy.com/index.php" role="button"><i class="fab fa-google"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac; border: none; color:white;" href="https://www.instagram.com/watcher_._/" role="button"><i class="fab fa-instagram"></i></a>
          </li>
         
        </ul>
        <!-- Social buttons -->
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="color: darkgrey;">© 2022 Copyright:
          <a href="index.php" style="color: cornsilk;"> Watcher.in</a>
        </div>
        <!-- Copyright -->

      </footer>
      <!-- Footer -->
    </section>
    <!-- footer section -->
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="include/js/site_title.js"></script>

<!-- Mirrored from html.design/demo/watcher/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:45 GMT -->

</html>