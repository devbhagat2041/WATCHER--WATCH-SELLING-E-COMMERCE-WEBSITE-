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

                            <h1 class="m-0 text-dark">Inquiries/Messages</h1>

                        </div><!-- /.col -->

                        <div class="col-sm-6">

                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>

                                <li class="breadcrumb-item active">Contacts</li>

                            </ol>

                        </div><!-- /.col -->

                    </div><!-- /.row -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <br><br>

            <section class="content">
                <div class="container-fluid">

                    <div class="table-responsive">
                        <table id="inqs">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contcat</th>
                                    <th>Message</th>
                                    <th>Action</th>
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

                    $('#inqs').DataTable({

                        "bProcessing": true,
                        "sAjaxSource": "inqs_data.php",
                        "aoColumns": [{
                                data: "inq_id",
                                render: function(data, type, full, meta) {
                                    if (data == 'N/A') {
                                        return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                                    } else {
                                        return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '">' + (meta.row + 1) + '</span>';
                                    }
                                }
                            },
                            {
                                data: "name",
                                render: function(data, type, row) {
                                    return '<b>' + data + '</b>';
                                }
                            },
                            {
                                data: "email",
                                render: function(data, type, row) {
                                    return '<b>' + data + '</b>';
                                }
                            },
                            {
                                data: "contact",
                                render: function(data, type, row) {
                                    return '<b>' + data + '</b>';
                                }
                            },
                            {
                                data: "message",
                                render: function(data, type, row) {
                                    return '<b>' + data + '</b>';
                                }
                            },
                            {
                                data: "inq_id",
                                render: function(data, type, row) {
                                    if (data == 'N/A') {
                                        return '<span style="font-size: medium" class="badge badge-dark btnId" data-id="' + data + '"></span>';
                                    } else {
                                        return '<button class="btn btn-danger btnRemove" data-id="' + data + '"><i class="fas fa-trash"></i></button>';
                                    }
                                }
                            }

                        ]


                    });


                });

                $(document).on('click', '.btnRemove', function() {

                    var inq_id = $(this).data("id");

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
                                    inq_id: inq_id
                                },
                                success: function(response) {
                                    if (response == "success") {
                                        $('#inqs').DataTable().ajax.reload();
                                        swal("Inquiry removed successfully!", "", "success");
                                    } else {
                                        swal("Something went wrong, Try again!", "", "error");
                                    }
                                }
                            });

                        }
                    })

                });


                var url = window.location.pathname;
                var str = url;


                var arr = str.split('/');

                var filename = arr[arr.length - 2];

                if (filename == "inquiries") {
                    $("#inquiries_sb").css({
                        "background-color": "#007bff",
                        "color": "#fff"
                    });
                }
            </script>
</body>

</html>