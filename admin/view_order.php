<?php

session_start();

if (!isset($_SESSION['email']) && $_SESSION['password'] == null) {
  header("location:index.php");
}

include('include/connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Actine Page</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminWATCHER | Dashboard </title>

  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="include/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="include/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="include/css/font.css" rel="stylesheet">

  <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="dashboard.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard.php" class="brand-link">
        <img src="include/image/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminWATCHER</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="include/image/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="" class="d-block">Admin</a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="dashboard.php" class="nav-link" id="dashboard">
                <i class="nav-icon fa fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="categories/index.php" class="nav-link" id="categories">
                <i class="fas fa-bars" style="margin-left: 6px;font-size: larger;"></i>
                <p style="margin-left: 7px;">
                  Categories
                  <i class="fa fa-angle-right" style="margin-left: 90px;font-size: larger;"></i>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="brands/index.php" class="nav-link" id="brands">
                <i class="fas fa-bold" style="margin-left: 6px;font-size: larger;"></i>
                <p style="margin-left: 10px;">
                  Brands
                  <i class="fa fa-angle-right" style="margin-left: 117px;font-size: larger;"></i>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="product/index.php" class="nav-link" id="products">
                <i class="fab fa-product-hunt" style="font-size: 20px;margin-left: 3px;"></i>
                <p style="font-size: 16px;margin-left: 8px;">
                  Products
                  <i class="fa fa-angle-right" style="margin-left: 102px;font-size: larger;"></i>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="inquiries/index.php" class="nav-link" id="inquiries">
                <i class="fas fa-comment-alt-lines" style="margin-left: 6px;font-size: larger;"></i>
                <p style="margin-left: 7px;">
                  Inquiries
                  <i class="fa fa-angle-right" style="margin-left: 102px;font-size: larger;"></i>
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
              <a href="auth/logout.php" class="nav-link">
                <i class="fa fa-sign-out" style="font-size: 21px; margin-left: 5px;"></i>
                <p style="margin-left: 5px;">
                  Log Out
                </p>
              </a>
            </li>

          </ul>
        </nav>

        <!-- Sidebar Menu -->
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-6">
            <h4 class="card-title">View user Orders</h4><br>
            <?php
            $servername = "localhost"; //server
            $username = "root"; //username
            $password = ""; //password
            $dbname = "watcher";  //database
            
            // Create connection
            $db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
            $qry = "select a.*,b.*,c.product_name from orders a, users b, product c where a.user_id=b.user_id and a.product_id = c.product_id and order_id=".$_GET['id'];
            $query=mysqli_query($db,$qry);
			      $rows=mysqli_fetch_array($query);
            ?>
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
													<td><strong>username:</strong></td>
												    <td><center><?php echo $rows['fname']; ?></center></td>
													   <td><center>
													   <a href="javascript:void(0);" onClick="popUpWindow('order_update.php?form_id=<?php echo htmlentities($rows['order_id']);?>');" title="Update order">
															 <button type="button" class="btn btn-primary">Take Action</button></a>
															 </center>
											 </td>
												  
																																					
				</tr>
                <tr>
												<td><strong>Title:</strong></td>
												    <td><center><?php echo $rows['product_name']; ?></center></td>
                </tr>
                <tr>
													<td><strong>Quantity:</strong></td>
												    <td><center><?php echo $rows['qty']; ?></center></td>
													  
												   																							
											</tr>
											<tr>
													<td><strong>Price:</strong></td>
												    <td><center>$<?php echo $rows['total']; ?></center></td>
													   
												   																							
											</tr>
											<tr>
													<td><strong>Address:</strong></td>
												    <td><center><?php echo $rows['address']; ?></center></td>
													  
												   																							
											</tr>
											<tr>
													<td><strong>Date:</strong></td>
												     <td><center><?php echo $rows['order_date']; ?></center></td>
													  
												   																							
											</tr>
											<tr>
													<td><strong>status:</strong></td>
													<?php 
																			$status=$rows['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<td> <center><button type="button" class="btn btn-info" style="font-weight:bold;"><span class="fa fa-bars"  aria-hidden="true" >Dispatch</button></center></td>
																		   <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
																			<td>   <center><button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span>On a Way!</button></center></td> 
																			<?php
																				}
																			if($status=="closed")
																				{
																			?>
																			<td>  <center><button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true">Delivered</button></center></td> 
																			<?php 
																			} 
																			?>
																			<?php
																			if($status=="rejected")
																				{
																			?>
																			<td>  <center><button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>cancelled</button> </center></td> 
																			<?php 
																			} 
																			?>
													  
												   																							
											</tr>
                </tbody>
            </table>
            </div>
          </div>
        </div>
    </div>
</div>
<script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>


    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="js/lib/datatables/datatables-init.js"></script>
</body>

</html>