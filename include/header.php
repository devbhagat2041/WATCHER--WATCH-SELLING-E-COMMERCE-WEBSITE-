<?php

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
<header class="header_section" style="background-color: #273135;">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
      <a class="navbar-brand" href="../index.php">
      <i class="fad fa-watch bounce" style="font-size:larger">

            </i>&nbsp;
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
              <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../about/index.php"> About </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../categories/index.php"> Categories </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../contact/index.php">Contact us</a>
            </li>
            <?php

                  if (
                    isset($_SESSION['fname']) && isset($_SESSION['lname']) && isset($_SESSION['email'])
                    && isset($_SESSION['email']) && $_SESSION['fname'] != null && $_SESSION['lname'] != null
                    && $_SESSION['email'] != null
                  ) {
                  ?>
                  <li class="nav-item">
                    <div class="dropdown nav-link">
                      <span class="dropbtn" style="text-transform: uppercase;"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?>
                        <i class="fa fa-caret-down"></i>
                      </span>
                      <div class="dropdown-content">
                        <a href="../account/index.php">profile</a>
                        <a href="../auth/logout.php">logout</a>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="../account/cart.php"> <i class="fas fa-cart-plus"></i> <span class="badge badge-light cart-count" style="border-radius: 35%;"><?php echo $cart_count; ?></span> </a>
                  </li>
                  <?php
                  } else {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" href="../auth/signin.php"><i class="fa fa-user"></i> Sign In</a>
                  </li>
                  <?php
                  }
                  ?>
          </ul>
          <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
            <!-- <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button> -->
          </form>
        </div>
      </div>
    </nav>
  </div>
</header>