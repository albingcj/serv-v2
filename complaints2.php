<?php

require 'config.php';
include 'session.php';
include 'h.php';

$query = "SELECT * FROM basic WHERE id='$s'";
$query_run = mysqli_query($db, $query);

if (mysqli_num_rows($query_run) == 1) {
    $student = mysqli_fetch_array($query_run);
    if ($student['photo'] == "") {
        $k = ".\assets\images\images.jpg";
    } else {
        $k = $student['photo'];
    }

    $n = $student['fname'] . ' ' . $student['lname'];
    $g = $student['gender'];
    $e = $student['email'];
    $d2 = $student['dob'];
    $exp = explode('-', $d2);
    $newStr = trim($exp[2]) . ' - ' . trim($exp[1]) . ' - ' . trim($exp[0]);
    $d = $newStr;
    $m = $student['mobile'];
    $a = $student['paddress'] . ',' . $student['city'] . '-' . $student['zip'];
} else {

    $n = " ";
    $g = " ";
    $e = " ";
    $d = " ";
    $m = " ";
    $a = " ";
}

$query = "SELECT * FROM research WHERE id='$s'";
$query_run = mysqli_query($db, $query);

if (mysqli_num_rows($query_run) == 1) {
    $research = mysqli_fetch_array($query_run);
    $oid = $research['oid'];
    $sid = $research['sid'];
    $rid = $research['rid'];
    $gsid = $research['gsid'];
    $hid = $research['hid'];
    $iid = $research['iid'];
    $gi = $research['gi'];
    $cs = $research['cs'];
    $cgs = $research['cgs'];
} else {
    $oid = "0000-0000";
    $sid = "0000-0000";
    $rid = "0000-0000";
    $gsid = "0000-0000";
    $hid = "0";
    $iid = "0";
    $gi = "0";
    $cs = "0";
    $cgs = "0";
}
include 'h.php';
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
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>SRMS</title>
    <!-- Custom CSS -->
    <link href="assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">


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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="main">
                        <!-- Logo icon -->

                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/srms.png" alt="homepage" class="light-logo" />

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">

                                <a class="dropdown-item" href="Logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div id="aside">
            <?php include("Aside.php"); ?>
        </div>
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
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Faculty Compliants</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="main">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Faculty Compliants</li>
                                </ol>
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
                <div class="main-body">
                    <?php
                    if ($role == 'FACULTY') { ?>
                        <div class="col-sm-12 mb-3">
                            <div class="card bg-dark text-light">
                                <div class="card-body row p-5 d-flex  justify-content-between">
                                    <div class="col-auto m-auto">
                                        Add a new complaint
                                    </div>
                                    <div class=" col-auto m-auto">
                                        <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#newComplaintModal">
                                            New Complaint
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Complaint Table -->
                    <div class="col-sm-12 mb-3">
                        <div class="card xxx">
                            <div class="card-body">
                                <h5 class="card-title">History of Complaints</h5>
                                <div class="table-responsive" id="testx">
                                    <table id="details_table" class="table table-hover table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th><b>S.No</b></th>
                                                <th><b>ID</b></th>
                                                <th><b>Room No</b></th>
                                                <th><b>Details</b></th>
                                                <th><b>Status</b></th>
                                                <?php
                                                if ($role == 'FACULTY') { ?>
                                                    <th><b>Feedback</b></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php
                                            if ($role == 'MANAGER') {
                                                $query = "SELECT * FROM complaints ORDER BY id DESC";
                                                echo "<script>console.log('MANAGER')</script>";
                                            } elseif ($role == 'HOD') {
                                                $query = "SELECT * FROM complaints WHERE hod_id='$s' ORDER BY id DESC";
                                                echo "<script>console.log('hod')</script>";
                                            } elseif ($role == 'FACULTY') {
                                                $query = "SELECT * FROM complaints WHERE fac_id='$s' ORDER BY id DESC";
                                                echo "<script>console.log('faculty')</script>";
                                            } elseif ($role == 'GENERAL') {
                                                $query = "SELECT * FROM complaints WHERE status=2 ORDER BY id DESC";
                                                echo "<script>console.log('general')</script>";
                                            } elseif ($role == 'ITKM') {
                                                $query = "SELECT * FROM complaints WHERE status=3 ORDER BY id DESC";
                                                echo "<script>console.log('itkm')</script>";
                                            } else {
                                                $query = "SELECT * FROM complaints  ORDER BY id DESC ";
                                                echo "<script>console.log('others')</script>";
                                            }
                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $sno = 1;
                                                foreach ($query_run as $complaint) {
                                                    $v = $complaint['status'];
                                                    $statusMessage = '';
                                                    switch ($v) {
                                                        case 0:
                                                            $statusMessage = 'At HOD';
                                                            break;
                                                        case 1:
                                                            $statusMessage = 'At Manager';
                                                            break;
                                                        case 2:
                                                            $statusMessage = 'At Generals';
                                                            break;
                                                        case 3:
                                                            $statusMessage = 'At ITKM';
                                                            break;
                                                        case 4:
                                                            $statusMessage = 'Resolved';
                                                            break;
                                                        case 5:
                                                            $statusMessage = 'Resolved';
                                                            break;
                                                        case 100:
                                                            $statusMessage = 'Cancelled';
                                                            break;
                                                        case -10:
                                                            $statusMessage = 'HOD Rejected';
                                                            break;
                                                        case -9:
                                                            $statusMessage = 'Manager Rejected';
                                                            break;
                                                        default:
                                                            $statusMessage = 'Error';
                                                            break;
                                                    }
                                                    // Check if the user is allowed to interact with the buttons
                                                    $canInteractWithButtons1 = false;
                                                    $canInteractWithButtons2 = false;
                                                    // HOD (status 0) can interact with buttons
                                                    if (($v == 0 && $role == 'HOD')) {
                                                        $canInteractWithButtons1 = true;
                                                    }
                                                    if (($v == 1 && $role == 'MANAGER')) {
                                                        $canInteractWithButtons2 = true;
                                                    }
                                                    // Render the buttons or status message based on the $canInteractWithButtons flag
                                            ?>
                                                    <tr data-approval="<?= $v ?>">
                                                        <td><?= $sno ?></td>
                                                        <td><?= $complaint['id'] ?></td>
                                                        <td><?= $complaint['place'] ?></td>

                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">

                                                                <!-- xxxxx -->
                                                                <button type="button" class="btn btn-outline-dark border-0 m-auto shadow-sm view-btn" data-id="<?= $complaint['id'] ?>">
                                                                    <span class="ti-eye"></span>
                                                                </button>
                                                                <!-- cancel and edit complaint part-->
                                                                <?php
                                                                if ($complaint['status'] == 0 && $role == 'FACULTY') { ?>
                                                                    <button type="button" class="btn btn-outline-dark border-0 m-auto shadow-sm edit-btn" data-toggle="modal" data-target="#editComplaintModal" data-id="<?= $complaint['id'] ?>"><span class="ti-pencil"></span></button>
                                                                    <button type="button" class="btn btn-danger cancel-button m-auto shadow-sm" data-id="<?= $complaint['id'] ?>"><span class="ti-close"></span></button>
                                                                <?php }
                                                                ?>
                                                            </div>
                                                            <!-- end of the cancell part-->
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($statusMessage == 'Resolved')
                                                                echo '<button type="button" class="btn btn-success m-auto shadow-sm">
                                                            ' . $statusMessage . '</button>';
                                                            elseif ($statusMessage == 'HOD Rejected' || $statusMessage == 'Cancelled' || $statusMessage == 'Manager Rejected')
                                                                echo '<button type="button" class="btn btn-danger m-auto shadow-sm">
                                                            ' . $statusMessage . '</button>';
                                                            else
                                                                echo '<button type="button" class="btn btn-light m-auto shadow-sm">
                                                                ' . $statusMessage . '</button>';
                                                            ?>
                                                        </td>

                                                        <?php
                                                        if ($role == 'FACULTY' && $complaint['feedback'] == NULL && ($complaint['status'] == 4 or $complaint['status'] == 5)) { ?>
                                                            <td>
                                                                <!-- Button to trigger the ComplaintFeedbackmodal -->
                                                                <button type="button" class="btn btn-outline-primary m-auto shadow-sm border-0 feed-btn" data-toggle="modal" data-id="<?= $complaint['id'] ?>" data-target="#complaintFeedbackModal">
                                                                    Rate
                                                                </button>
                                                            </td>
                                                        <?php } elseif ($role == 'FACULTY' && $complaint['feedback'] != NULL) { ?>
                                                            <td><a class="btn btn-outline-dark text-warning border-0 shadow-sm" data-toggle="tooltip" data-placement="left" title="Feedback: <?= $complaint['feedback'] ?>">
                                                                    <?php
                                                                    for ($j = 0; $j < $complaint['rating']; $j++) {
                                                                        echo '☆';
                                                                    } ?>
                                                                </a></td>
                                                        <?php } elseif ($role == 'FACULTY') { ?>
                                                            <td> <button class="btn  m-auto shadow-sm disabled" data-toggle="tooltip" data-placement="left" title="Can only give feedback after finishing work" style="text-decoration: line-through;">
                                                                    Rate
                                                                </button></td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php
                                                    $sno = $sno + 1;
                                                }
                                            } ?>



                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- table end -->
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <?php include "./footer.html" ?>
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
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/libs/chart/matrix.interface.js"></script>
    <script src="assets/libs/chart/excanvas.min.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/chart/jquery.peity.min.js"></script>
    <script src="assets/libs/chart/matrix.charts.js"></script>
    <script src="assets/libs/chart/jquery.flot.pie.min.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="assets/libs/chart/turning-series.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#details_table').DataTable();
    </script>

</body>

</html>