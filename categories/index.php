<?php

session_start();
include("../include/connection.php");
?>
<html>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!-- Site Metas -->
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />

<title>Watcher</title>

<!-- slider stylesheet -->
<link rel="stylesheet" href="../include/css/site_title.css" />

<link rel="stylesheet" type="text/css" href="../include/css/owl.carousel.min.css" />
<link rel="stylesheet" href="../include/css/userlinks.css" />

<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="../include/css/bootstrap.css" />

<!-- fonts style -->
<link href="../include/css/css.css" rel="stylesheet" />
<!-- Custom styles for this template -->
<link href="../include/css/style.css" rel="stylesheet" />
<!-- responsive style -->
<link href="../include/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <?php

    include "../include/header.php"
    ?>
    <!-- end header section -->

  </div>
  <div class="bg">


    <!-- brand section -->

    <section class="brand_section layout_padding2">
      <div class="container">
        <div class="brand_heading" style="margin-top: 3%; margin-bottom: 4%">
          <h3 class="custom_heading">
            Our watch Categories
          </h3>
          <p class="font-weight-bold">
            Explore the wide variety of products according to the your category
          </p>
        </div>

        <div class="row">
          <?php

          $categories = $link->rawQuery('select * from categories where is_active=1');

          foreach ($categories as $data) {
          ?>
            <div class="col-md-4" style="margin-bottom: 8%">
                <div class="imagebox">
                  <img src="../admin/categories/<?php echo $data['cat_img']; ?>" class="image" width="100%" height="100%" style="margin-top: 2%">
                  <br>
                  <h3 style="color:initial;"><?php echo $data['cat_name']; ?>'s</h3>
                  <div class="caption"><a href="../products/index.php?category=<?php echo $data['cat_name']; ?>" class="badge badge-danger" style="text-decoration: none; color: white;"><b>Explore</b></a></div> 
                </div>
            </div>
          <?php
          }

          ?>
        </div>
      </div>
    </section>


    <!-- end brand section -->

  </div>


  <!-- footer section -->
  <?php

  include "../include/footer.php"
  ?>
  <!-- footer section -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {



    })
  </script>
</body>
<script src="../include/js/site_title.js"></script>

<!-- Mirrored from html.design/demo/watcher/watch.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jan 2022 06:56:51 GMT -->

</html>