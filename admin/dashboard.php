<?php
    session_start();
    include('../includes/dbconn.php');
    include('../includes/check-login.php');
    check_login();

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Hostel Management System</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <style>
        /* New styling for preloader */
        /* body {
            background-color: yellow;
        } */
        .preloader {
            background-color: yellow;
            color: white;
        }

        /* New styling for the topbar */
        .topbar {
            background-color: orange;
            color: white;
        }

        /* New styling for the left-sidebar */
        .left-sidebar {
            background-color: orange;
            color: white;
        }

        /* New styling for the page-breadcrumb */
        /* .page-breadcrumb {
            background-color: yellow;
            color: white;
        } */

        /* New styling for the card headers */
        /* .card-header {
            background-color: orange;
            color: white;
        }

        /* New styling for the card bodies */
        .card-body {
            background-color: orange;
            color: black; /* Change text color to black for readability */
        } */

        /* New styling for the table headers */
        table th {
            background-color: orange;
            color: black;
        }

        /* New styling for the table rows */
        table td {
            background-color: yellow;
            color: black; /* Change text color to black for readability */
        }
        .card-group .card {
        /* Your CSS styles for cards go here */
        border: 2px solid #ccc;
        border-radius: 10px;
        margin: 10px;
        padding: 10px;
        background-color: #f5f5f5;
        color: red;
        /* Add any other styles you want */
    }
    
    .card-group .card h2 {
        font-size: 26px;
        color: black;
        /* Add any other header styles you want */
    }
    
    .card-group .card h6 {
        font-size: 20px;
        color: #777;
        /* Add any other subtitle styles you want */
    }
    
    .card-group .card .opacity-7 {
        color: #aaa;
        /* Add any other styles for the icon */
    }
    .feather.feather {
            stroke: black; /* Change the stroke color to black */
        }
        

    </style>

    
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <?php include 'includes/navigation.php'?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6" style="background-color:orange;">
                <?php include 'includes/sidebar.php'?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                       
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php include 'counters/student-count.php'?></h2>
                                
                                    </div>
                                    <h6 class="text-dark mb-1 font-weight-medium">Students</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?php include 'counters/room-count.php'?></h2>
                                    <h6 class="text-dark mb-1 font-weight-medium">Total Rooms
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="grid"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php include 'counters/booked-count.php'?></h2>
                                    </div>
                                    <h6 class="text-dark mb-1 font-weight-medium">Booked Rooms</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="book-open"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php include 'counters/pass-count.php'?></h2>
                                    <h6 class="text-dark mb-1 font-weight-medium">Passes applied</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->


                <div class="col-12">
                        <div class="card">
                            
                            <div class="card-body">
                            
                            <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="color: black;">#</th>
                                            <!-- <th scope="col">User ID</th> -->
                                            <th scope="col" style="color: black;">Student's Email</th>
                                            <th scope="col" style="color: black;">Last Activity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php	
                                        $aid=$_SESSION['id'];
                                        $ret="SELECT * from userlog ORDER BY loginTime DESC";
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->execute() ;
                                        $res=$stmt->get_result();
                                        $cnt=1;
                                        while($row=$res->fetch_object()) {
                                                ?>
                                        <tr><td><?php echo $cnt;;?></td>
                                        <!-- <td><?php echo $row->userId;?></td> -->
                                        <td><?php echo $row->userEmail;?></td>
                                        <td><?php echo $row->loginTime;?></td>
                                            </tr>
                                            <?php
                                        $cnt=$cnt+1;
                                            } ?>
											
										
									</tbody>
                                </table>
                            </div>
                            
                            </div>
                        
                        </div>
                    </div>
                
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include '../includes/footer.php' ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
</body>

</html>