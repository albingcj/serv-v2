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
    <!-- table -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">


    <style>
        body {

            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        /* start of star rating */
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: auto;
            font-size: 50px;
            color: #FFD600;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.5;
        }

        /* end of star rating */
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

    <!-- Modal for New Complaint -->
    <div class="modal fade" id="newComplaintModal" tabindex="-1" role="dialog" aria-labelledby="newComplaintModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newComplaintModalLabel">New Complaint</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="complaint">
                    <div class="modal-body">
                        <!-- Complaint form for the modal -->
                        <div class="form-group">
                            <label for="exampleDataList" class="form-label">Department</label>
                            <input class="form-control" list="departmentList" id="department1" name="department1"" placeholder=" Type to search..." required>
                            <datalist id="departmentList">
                                <option value="ME">Mechanical Engineering</option>
                                <option value="EEE">Electrical And Electronics Engineering</option>
                                <option value="ECE">Electronics And Communication Engineering</option>
                                <option value="CSE">Computer Science And Engineering</option>
                                <option value="IT">Information Technology</option>
                                <option value="CSBS">Computer Science And Business Systems</option>
                                <option value="AIDS">Artificial Intelligence And Data Science</option>
                                <option value="AIML">Artificial Intelligence And Machine Learning</option>
                                <option value="MCA">Master Of Computer Applications</option>
                                <option value="MBA">Master Of Business Administration</option>
                            </datalist>
                        </div>

                        <div class="form-group">
                            <label for="complaint_type">Complaint Type</label>
                            <input class="form-control" list="complaintList" id="complaint_type1" name="complaint_type1" placeholder="Type to search..." required>
                            <datalist id="complaintList">
                                <option value="System Complaints"></option>
                                <option value="General Complaints"></option>
                            </datalist>
                        </div>

                        <div class="form-group">
                            <label for="block">Block Name</label>
                            <input class="form-control" list="blockList" id="block1" name="block1" placeholder="Type to search..." required>
                            <datalist id="blockList">
                                <option value="Main Block">
                                <option value="PG Block">
                                <option value="Boys New Hostel">
                                <option value="Boys Old Hostel">
                                <option value="Boys Mess">
                                <option value="Ladies Hostel">
                                <option value="Girls Mess">
                                <option value="Guest House">
                                <option value="Staff Quarters">
                                <option value="Transport(Bus)">
                                <option value="Others">
                            </datalist>
                        </div>
                        <div class="form-group">
                            <label for="place">Room Number / Place </label>
                            <input type="text" class="form-control" id="place1" name="place1" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="complaintDescription">Complaint Description</label>
                            <textarea class="form-control" id="description" name="description1" rows="3" required style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal for displaying complaint details -->
    <div class="modal fade" id="complaintModal" tabindex="-1" role="dialog" aria-labelledby="complaintModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="complaintModalLabel">Complaint Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="mx-3 bg-dark text-light text-center shadow-sm ">
                        <div class="row p-2 m-auto">
                            <div class="col-12 mt-3">
                                <b>
                                    <h3>
                                        <span id="viewCid"></span>
                                    </h3>
                                </b>
                            </div>
                            <div class="col-12">
                                <b>
                                    <h4>
                                        <span id="viewType"></span>
                                    </h4>
                                </b>
                            </div>
                        </div>
                        <div class="row p-2 m-auto hideBlock">

                            <div class="col">
                                <h4>
                                    <div class="border p-2"><span id="viewBlock"></span></div>
                                </h4>
                            </div>
                            <div class="col">
                                <h4>
                                    <div class="border p-2"> Room No / Place : <span id="viewPlace"></span></div>
                                </h4>
                            </div>

                        </div>
                        <div class="row p-2 m-auto hideBlock">
                            <div class="col-12">
                                <fieldset class="border border-light">
                                    <legend class="col-auto mx-3">
                                        <h5 class="m-auto">Description</h5>
                                    </legend>
                                    <p>
                                    <h5>
                                        <span class="p-1" id="viewDesc">No description found.</span>
                                    </h5>
                                    </p>
                                </fieldset>
                            </div>
                        </div>

                        <!-- Display the rejection reason if approval is less than 0 -->
                        <div class="p-2 mx-2 pb-3 justify-content-center" id="viewReject"> </div>
                    </div>
                    <!-- <hr> -->
                    <div class="m-3 p-3 bg-light shadow-sm">
                        <div class="row mx-2 mb-4">
                            <div class="col-5 btn">HOD <span id="viewHod"></span></div>
                            <div class="col d-flex justify-content-center justify-content-sm-end" id="hodApr">
                            </div>
                        </div>
                        <!-- <hr> -->
                        <div class=" row m-2">
                            <div class="col-5 btn">MANAGER</div>
                            <div class="col d-flex justify-content-center justify-content-sm-end" id="manApr">
                            </div>
                        </div>
                    </div>
                    <!-- <hr> -->



                    <!-- Manager forward Accordion -->
                    <div class="collapse" id="managerCollapse">
                        <div class="form-group">
                            <div class="d-flex text-center my-1 px-5 mx-auto " id="manFrwrd">
                            </div>
                        </div>
                    </div>

                    <!-- <hr> -->

                    <!-- Rejection Reason Accordion -->

                    <div class="mx-3">
                        <div class="collapse" id="rejAcrd">
                        </div>
                    </div>


                    <div class="row mx-3">
                        <div class="col btn btn-dark p-3 shadow-sm" id="finStat">

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing complaint details -->
    <div class="modal fade" id="editComplaintModal" tabindex="-1" role="dialog" aria-labelledby="editComplaintModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="editComplaint">
                    <!-- <input type="hidden" name="modalType" value="editComplaintModal"> -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="editComplaintModalLabel">Edit Complaint Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="complaint_type">Complaint Type</label>
                            <select class="form-control" id="complaint_type2" name="complaint_type2" required>
                                <option value="System Complaints">System Complaints</option>
                                <option value="General Complaints">General Complaints</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="block">Block Name</label>
                            <select class="form-control" id="block2" name="block2" required>
                                <option value="Main Block">Main Block</option>
                                <option value="PG Block">PG Block</option>
                                <option value="Boys New Hostel">Boys New Hostel</option>
                                <option value="Boys Old Hostel">Boys Old Hostel</option>
                                <option value="Boys Mess">Boys Mess</option>
                                <option value="Ladies Hostel">Ladies Hostel</option>
                                <option value="Girls Mess">Girls Mess</option>
                                <option value="Guest House">Guest House</option>
                                <option value="Staff Quarters">Staff Quarters</option>
                                <option value="Transport(Bus)">Transport(Bus)</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="editRoomNumber">Room Number / Place:</label>
                            <input type="text" class="form-control" id="rno" name="rno" required>

                        </div>
                        <div class="form-group">
                            <label for="editComplaintDescription">Complaint Description:</label>
                            <textarea class="form-control" id="eddescription" name="eddescription" required rows="4" style="resize: none;"></textarea>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="editSubmitBtn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- model for the feedback part-->
    <!-- xxxxxx -->
    <div class="modal fade" id="complaintFeedbackModal" tabindex="-1" role="dialog" aria-labelledby="complaintModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="complaintModalLabel">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="feedbackForm">
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="rating" id="rating">
                                <input type="radio" name="rating" value="5" id="r5"><label for="r5">☆</label>
                                <input type="radio" name="rating" value="4" id="r4"><label for="r4">☆</label>
                                <input type="radio" name="rating" value="3" id="r3"><label for="r3">☆</label>
                                <input type="radio" name="rating" value="2" id="r2"><label for="r2">☆</label>
                                <input type="radio" name="rating" value="1" id="r1"><label for="r1">☆</label>
                            </div>
                            <label for="feedbackComment">Comment:</label>
                            <textarea class="form-control" id="feedbackComment" name="feedbackComment" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="feedSubmitBtn">Submit Feedback</button>
                    </div>
                </form>
            </div>
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
                    if ($role == 'FACULTY') : ?>
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
                    <?php endif; ?>

                    <?php
                    //if manager logged in show these modules for better details preview
                    if ($role == 'MANAGER') :
                        // Include the database connection
                        // include 'config.php';

                        // Query to get total complaints with status 3 or 5
                        $totalComplaintsQuery = "SELECT COUNT(*) as total FROM complaints WHERE status IN (1,2,3,4,5,-9)";
                        $totalComplaintsResult = mysqli_query($db, $totalComplaintsQuery);
                        $totalComplaintsCount = mysqli_fetch_assoc($totalComplaintsResult)['total'];

                        // Query to get pending complaints with status 3
                        $pendingComplaintsQuery = "SELECT COUNT(*) as pending FROM complaints WHERE status = 1";
                        $pendingComplaintsResult = mysqli_query($db, $pendingComplaintsQuery);
                        $pendingComplaintsCount = mysqli_fetch_assoc($pendingComplaintsResult)['pending'];

                        // Query to get completed complaints with status 5
                        $completedComplaintsQuery = "SELECT COUNT(*) as completed FROM complaints WHERE status IN (2,3,4,5)";
                        $completedComplaintsResult = mysqli_query($db, $completedComplaintsQuery);
                        $completedComplaintsCount = mysqli_fetch_assoc($completedComplaintsResult)['completed'];

                        // Query to get completed complaints with status 5
                        $rejectedComplaintsQuery = "SELECT COUNT(*) as rejected FROM complaints WHERE status IN (-9)";
                        $rejectedComplaintsResult = mysqli_query($db, $rejectedComplaintsQuery);
                        $rejectedComplaintsCount = mysqli_fetch_assoc($rejectedComplaintsResult)['rejected'];

                        // Query to get pending complaints with status 3
                        $itkmpendingComplaintsQuery = "SELECT COUNT(*) as pending FROM complaints WHERE status = 3";
                        $itkmpendingComplaintsResult = mysqli_query($db, $itkmpendingComplaintsQuery);
                        $itkmpendingComplaintsCount = mysqli_fetch_assoc($itkmpendingComplaintsResult)['pending'];

                        // Query to get completed complaints with status 5
                        $itkmcompletedComplaintsQuery = "SELECT COUNT(*) as completed FROM complaints WHERE status =5";
                        $itkmcompletedComplaintsResult = mysqli_query($db, $itkmcompletedComplaintsQuery);
                        $itkmcompletedComplaintsCount = mysqli_fetch_assoc($itkmcompletedComplaintsResult)['completed'];

                        // Query to get pending complaints with status 3
                        $genpendingComplaintsQuery = "SELECT COUNT(*) as pending FROM complaints WHERE status = 2";
                        $genpendingComplaintsResult = mysqli_query($db, $genpendingComplaintsQuery);
                        $genpendingComplaintsCount = mysqli_fetch_assoc($genpendingComplaintsResult)['pending'];

                        // Query to get completed complaints with status 5
                        $gencompletedComplaintsQuery = "SELECT COUNT(*) as completed FROM complaints WHERE status =4";
                        $gencompletedComplaintsResult = mysqli_query($db, $gencompletedComplaintsQuery);
                        $gencompletedComplaintsCount = mysqli_fetch_assoc($gencompletedComplaintsResult)['completed'];

                        // finished jobs in the last 5 days
                        $itkm5dquery = mysqli_query($db, "SELECT COUNT(*) as completed FROM complaints WHERE status = 5 AND DATE(fin_date) >= CURDATE() - INTERVAL 5 DAY");
                        $itkm5d = mysqli_fetch_assoc($itkm5dquery)['completed'];
                        $gen5dquery = mysqli_query($db, "SELECT COUNT(*) as completed FROM complaints WHERE status = 4 AND DATE(fin_date) >= CURDATE() - INTERVAL 5 DAY");
                        $gen5d = mysqli_fetch_assoc($gen5dquery)['completed'];
                    ?>

                        <div class="card text-light">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3" id="a1">
                                        <div class="card card-hover">
                                            <div class="box bg-cyan text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-wallet-travel"></i></h1>
                                                <h4 class="text-white"><b>Total Complaints</b></h4>
                                                <h4 class="text-white"><b><?php echo $totalComplaintsCount; ?> </b></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3" id="a2">
                                        <div class="card card-hover">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                                                <h4 class="text-white"><b>Forwarded </b></h4>
                                                <h4 class="text-white"><b><?php echo $completedComplaintsCount; ?> </b></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <!-- <div class="col-md-6 col-lg-4 col-xlg-3"> -->
                                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3" id="a3">
                                        <div class="card card-hover">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white"><i class=" mdi mdi-worker"></i></h1>
                                                <h4 class="text-white"><b>Pending</b></h4>
                                                <h4 class="text-white"><b><?php echo $pendingComplaintsCount; ?></b></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3" id="a4">
                                        <div class="card card-hover">
                                            <div class="box bg-danger text-center">
                                                <h1 class="font-light text-white"><i class=" mdi mdi-close-circle-outline"></i></h1>
                                                <h4 class="text-white"><b>Rejected</b></h4>
                                                <h4 class="text-white"><b><?php echo $rejectedComplaintsCount; ?></b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 my-2">
                                        <div class="shadow-sm border border-secondary rounded">
                                            <div class="p-2 bg-secondary text-center">
                                                <h4 class="text-white"><b>ITKM</b></h4>
                                                <span>
                                                    <h5>Finished in the past 5 days: <?= $itkm5d ?></h5>
                                                </span>
                                            </div>
                                            <div class="row pl-3 pt-3 pr-3">
                                                <!-- First Nested Card -->
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="a5">
                                                    <div class="card card-hover">
                                                        <div class="box bg-info text-center">
                                                            <h4 class="text-white"><b>Completed</b></h4>
                                                            <h4 class="text-white"><b><?php echo $itkmcompletedComplaintsCount; ?> </b></h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Second Nested Card -->
                                                <div class="col-sm-6 col-md-6  col-lg-6 col-xl-6" id="a6">
                                                    <div class="card card-hover">
                                                        <div class="box bg-info text-center">
                                                            <h4 class="text-white"><b>Pending</b></h4>
                                                            <h4 class="text-white"><b><?php echo $itkmpendingComplaintsCount; ?></b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 my-2">
                                        <div class="shadow-sm  border border-secondary rounded">
                                            <div class="p-2 bg-secondary text-center">
                                                <h4 class="text-white"><b>General Complaints</b></h4>
                                                <span>
                                                    <h5>Finished in the past 5 days: <?= $gen5d ?></h5>
                                                </span>
                                            </div>
                                            <div class="row pl-3 pt-3 pr-3">
                                                <!-- First Nested Card -->
                                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="a7">
                                                    <div class="card card-hover">
                                                        <div class="box bg-info text-center">
                                                            <h4 class="text-white"><b>Completed</b></h4>
                                                            <h4 class="text-white"><b><?php echo $gencompletedComplaintsCount; ?> </b></h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Second Nested Card -->
                                                <div class="col-sm-6 col-md-6  col-lg-6 col-xl-6" id="a8">
                                                    <div class="card card-hover">
                                                        <div class="box bg-info text-center">
                                                            <h4 class="text-white"><b>Pending</b></h4>
                                                            <h4 class="text-white"><b><?php echo $genpendingComplaintsCount; ?></b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Complaint Table -->
                    <div class="col-sm-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">History of Complaints</h5>
                                <div class="table-responsive">
                                    <table id="myTable1" class="table table-hover table-bordered text-center" style="display: table;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th><b>S.No</b></th>
                                                <th><b>CID</b></th>
                                                <th><b>Room No / Place</b></th>
                                                <th><b>Details</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Feedback</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php

                                            if ($role == 'MANAGER') {
                                                $query = "SELECT * FROM complaints where status IN (1,2,3,4,5,-9) ORDER BY id DESC";
                                                echo "<script>console.log('MANAGER')</script>";
                                            } elseif ($role == 'HOD') {
                                                $query = "SELECT * FROM complaints WHERE hod_id='$s' and status!=100 ORDER BY id DESC";
                                                echo "<script>console.log('hod')</script>";
                                            } elseif ($role == 'FACULTY') {
                                                $query = "SELECT * FROM complaints WHERE fac_id='$s' ORDER BY id DESC";
                                                echo "<script>console.log('faculty')</script>";
                                            } elseif ($role == 'GENERAL') {
                                                $query = "SELECT * FROM complaints WHERE status=2 ORDER BY id DESC";
                                                echo "<script>console.log('faculty')</script>";
                                            } elseif ($role == 'ITKM') {
                                                $query = "SELECT * FROM complaints WHERE status=3 ORDER BY id DESC";
                                                echo "<script>console.log('faculty')</script>";
                                            } else {
                                                $query = "SELECT * FROM complaints  ORDER BY id DESC ";
                                                echo "<script>console.log('others')</script>";
                                            }

                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $sno = 1;
                                                foreach ($query_run as $complaints) {
                                                    $v = $complaints['status'];
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

                                            ?>
                                                    <tr>
                                                        <td><?= $sno ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <button type="button" class="btn btn-primary border-0 m-auto shadow-sm view-btn" data-id="<?= $complaints['id'] ?>" data-cid="<?= $complaints['cid'] ?>">
                                                                    <span class="ti-eye"></span>
                                                                </button>
                                                                <!-- cancel and edit complaint part-->
                                                                <?php
                                                                if ($complaints['status'] == 0 && $role == 'FACULTY') { ?>
                                                                    <button type="button" class="btn btn-warning border-0 m-auto shadow-sm edit-btn" data-toggle="modal" data-target="#editComplaintModal" data-id="<?= $complaints['id'] ?>"><span class="ti-pencil"></span></button>
                                                                    <button type="button" class="btn btn-danger cancel-button border-0 m-auto shadow-sm" data-id="<?= $complaints['id'] ?>"><span class="ti-close"></span></button>
                                                                <?php } else if ($role == 'FACULTY') { ?>
                                                                    <button type="button" class="btn btn-secondary disabled border-0 m-auto shadow-sm" data-toggle="tooltip" data-placement="top" title="This complaint is no longer editable"><span class="ti-pencil"></span></button>
                                                                    <button type="button" class="btn btn-secondary disabled border-0 m-auto shadow-sm" data-toggle="tooltip" data-placement="top" title="This complaint is no longer deletable"><span class="ti-close"></span></button>
                                                                <?php }
                                                                ?>
                                                            </div>
                                                            <!-- end of the cancell part-->
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($statusMessage == 'Resolved')
                                                                echo '<button type="button" class="btn btn-success m-auto shadow-sm" data-toggle="tooltip" data-placement="top" title="Resolved on : ' . $complaints['fin_date'] . '">' . $statusMessage . '</button>';
                                                            elseif ($statusMessage == 'HOD Rejected' || $statusMessage == 'Cancelled' || $statusMessage == 'Manager Rejected')
                                                                echo '<button type="button" class="btn btn-danger m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 0)
                                                                echo '<button type="button" class="btn btn-dark m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 1)
                                                                echo '<button type="button" class="btn btn-secondary m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            else
                                                                echo '<button type="button" class="btn btn-info text-light m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            ?>
                                                        </td>

                                                        <?php
                                                        if ($complaints['feedback'] != NULL) { ?>
                                                            <td>
                                                                <a class="btn btn-outline-dark text-warning border-0 shadow-sm" data-toggle="tooltip" data-placement="left" title="Feedback: <?= $complaints['feedback'] ?>">
                                                                    <?php
                                                                    for ($j = 0; $j < $complaints['rating']; $j++) {
                                                                        echo '☆';
                                                                    } ?>
                                                                </a>
                                                            </td>
                                                        <?php } elseif ($role == 'FACULTY' && $statusMessage == 'Resolved') {
                                                        ?>
                                                            <td>
                                                                <button type="button" class="btn btn-outline-primary m-auto shadow-sm border-0 feed-btn" data-toggle="modal" data-id="<?= $complaints['id'] ?>" data-target="#complaintFeedbackModal">
                                                                    Rate now
                                                                </button>
                                                            <td>
                                                            <?php  } else { ?>
                                                            <td>
                                                                <button class="btn  m-auto shadow-sm disabled" data-toggle="tooltip" data-placement="left" title="Can be given only by faculty" style="text-decoration: line-through;">
                                                                    Not Rated Yet
                                                                </button>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php $sno = $sno + 1;
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                                    <table id="myTable2" class="table table-hover table-bordered text-center" style="display: none;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th><b>S.No</b></th>
                                                <th><b>CID</b></th>
                                                <th><b>Room No / Place</b></th>
                                                <th><b>Details</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Feedback</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php

                                            $query = "SELECT * FROM complaints where status IN (2,3,4,5) ORDER BY id DESC";
                                            // echo "<script>console.log('MANAGER')</script>";

                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $sno = 1;
                                                foreach ($query_run as $complaints) {
                                                    $v = $complaints['status'];
                                                    $statusMessage = '';
                                                    switch ($v) {

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
                                                        default:
                                                            $statusMessage = 'Error';
                                                            break;
                                                    }

                                            ?>
                                                    <tr>
                                                        <td><?= $sno ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <button type="button" class="btn btn-primary border-0 m-auto shadow-sm view-btn" data-id="<?= $complaints['id'] ?>" data-cid="<?= $complaints['cid'] ?>">
                                                                    <span class="ti-eye"></span>
                                                                </button>

                                                            </div>
                                                            <!-- end of the cancell part-->
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($statusMessage == 'Resolved')
                                                                echo '<button type="button" class="btn btn-success m-auto shadow-sm" data-toggle="tooltip" data-placement="top" title="Resolved on : ' . $complaints['fin_date'] . '">' . $statusMessage . '</button>';
                                                            else
                                                                echo '<button type="button" class="btn btn-info text-light m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            ?>
                                                        </td>

                                                        <?php
                                                        if ($complaints['feedback'] != NULL) { ?>
                                                            <td>
                                                                <a class="btn btn-outline-dark text-warning border-0 shadow-sm" data-toggle="tooltip" data-placement="left" title="Feedback: <?= $complaints['feedback'] ?>">
                                                                    <?php
                                                                    for ($j = 0; $j < $complaints['rating']; $j++) {
                                                                        echo '☆';
                                                                    } ?>
                                                                </a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <button class="btn  m-auto shadow-sm disabled" data-toggle="tooltip" data-placement="left" title="Can be given only by faculty" style="text-decoration: line-through;">
                                                                    Not Rated Yet
                                                                </button>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php $sno = $sno + 1;
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                                    <table id="myTable3" class="table table-hover table-bordered text-center" style="display: none;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th><b>S.No</b></th>
                                                <th><b>CID</b></th>
                                                <th><b>Room No / Place</b></th>
                                                <th><b>Details</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Feedback</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php

                                            $query = "SELECT * FROM complaints where status = 1 ORDER BY id DESC";
                                            // echo "<script>console.log('MANAGER')</script>";

                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $sno = 1;
                                                foreach ($query_run as $complaints) {
                                                    $v = $complaints['status'];
                                                    $statusMessage = '';
                                                    switch ($v) {
                                                        case 1:
                                                            $statusMessage = 'At Manager';
                                                            break;
                                                        default:
                                                            $statusMessage = 'Error';
                                                            break;
                                                    }

                                            ?>
                                                    <tr>
                                                        <td><?= $sno ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <button type="button" class="btn btn-primary border-0 m-auto shadow-sm view-btn" data-id="<?= $complaints['id'] ?>" data-cid="<?= $complaints['cid'] ?>">
                                                                    <span class="ti-eye"></span>
                                                                </button>

                                                            </div>
                                                            <!-- end of the cancell part-->
                                                        </td>
                                                        <td>
                                                            <?php

                                                            echo '<button type="button" class="btn btn-info text-light m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            ?>
                                                        </td>

                                                        <?php
                                                        if ($complaints['feedback'] != NULL) { ?>
                                                            <td>
                                                                <a class="btn btn-outline-dark text-warning border-0 shadow-sm" data-toggle="tooltip" data-placement="left" title="Feedback: <?= $complaints['feedback'] ?>">
                                                                    <?php
                                                                    for ($j = 0; $j < $complaints['rating']; $j++) {
                                                                        echo '☆';
                                                                    } ?>
                                                                </a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <button class="btn  m-auto shadow-sm disabled" data-toggle="tooltip" data-placement="left" title="Can be given only by faculty" style="text-decoration: line-through;">
                                                                    Not Rated Yet
                                                                </button>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php $sno = $sno + 1;
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                                    <table id="myTable4" class="table table-hover table-bordered text-center" style="display: none;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th><b>S.No</b></th>
                                                <th><b>CID</b></th>
                                                <th><b>Room No / Place</b></th>
                                                <th><b>Details</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Feedback</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php

                                            $query = "SELECT * FROM complaints where  status = -9 ORDER BY id DESC";
                                            // echo "<script>console.log('MANAGER')</script>";

                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $sno = 1;
                                                foreach ($query_run as $complaints) {
                                                    $v = $complaints['status'];
                                                    $statusMessage = '';
                                                    switch ($v) {

                                                        case -9:
                                                            $statusMessage = 'Manager Rejected';
                                                            break;
                                                        default:
                                                            $statusMessage = 'Error';
                                                            break;
                                                    }

                                            ?>
                                                    <tr>
                                                        <td><?= $sno ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <button type="button" class="btn btn-primary border-0 m-auto shadow-sm view-btn" data-id="<?= $complaints['id'] ?>" data-cid="<?= $complaints['cid'] ?>">
                                                                    <span class="ti-eye"></span>
                                                                </button>

                                                            </div>
                                                            <!-- end of the cancell part-->
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($statusMessage == 'Manager Rejected')
                                                                echo '<button type="button" class="btn btn-danger m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            ?>
                                                        </td>

                                                        <?php
                                                        if ($complaints['feedback'] != NULL) { ?>
                                                            <td>
                                                                <a class="btn btn-outline-dark text-warning border-0 shadow-sm" data-toggle="tooltip" data-placement="left" title="Feedback: <?= $complaints['feedback'] ?>">
                                                                    <?php
                                                                    for ($j = 0; $j < $complaints['rating']; $j++) {
                                                                        echo '☆';
                                                                    } ?>
                                                                </a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <button class="btn  m-auto shadow-sm disabled" data-toggle="tooltip" data-placement="left" title="Can be given only by faculty" style="text-decoration: line-through;">
                                                                    Not Rated Yet
                                                                </button>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php $sno = $sno + 1;
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                                    <table id="myTable5" class="table table-hover table-bordered text-center" style="display: none;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th><b>S.No</b></th>
                                                <th><b>CID</b></th>
                                                <th><b>Room No / Place</b></th>
                                                <th><b>Details</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Feedback</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php

                                            $query = "SELECT * FROM complaints WHERE status = 5 ORDER BY id DESC";
                                            // echo "<script>console.log('MANAGER')</script>";

                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $sno = 1;
                                                foreach ($query_run as $complaints) {
                                                    $v = $complaints['status'];
                                                    $statusMessage = '';
                                                    switch ($v) {
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
                                                        case -9:
                                                            $statusMessage = 'Manager Rejected';
                                                            break;
                                                        default:
                                                            $statusMessage = 'Error';
                                                            break;
                                                    }

                                            ?>
                                                    <tr>
                                                        <td><?= $sno ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <button type="button" class="btn btn-primary border-0 m-auto shadow-sm view-btn" data-id="<?= $complaints['id'] ?>" data-cid="<?= $complaints['cid'] ?>">
                                                                    <span class="ti-eye"></span>
                                                                </button>

                                                            </div>
                                                            <!-- end of the cancell part-->
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($statusMessage == 'Resolved')
                                                                echo '<button type="button" class="btn btn-success m-auto shadow-sm" data-toggle="tooltip" data-placement="top" title="Resolved on : ' . $complaints['fin_date'] . '">' . $statusMessage . '</button>';
                                                            elseif ($statusMessage == 'Manager Rejected')
                                                                echo '<button type="button" class="btn btn-danger m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 0)
                                                                echo '<button type="button" class="btn btn-dark m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 1)
                                                                echo '<button type="button" class="btn btn-secondary m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            else
                                                                echo '<button type="button" class="btn btn-info text-light m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            ?>
                                                        </td>

                                                        <?php
                                                        if ($complaints['feedback'] != NULL) { ?>
                                                            <td>
                                                                <a class="btn btn-outline-dark text-warning border-0 shadow-sm" data-toggle="tooltip" data-placement="left" title="Feedback: <?= $complaints['feedback'] ?>">
                                                                    <?php
                                                                    for ($j = 0; $j < $complaints['rating']; $j++) {
                                                                        echo '☆';
                                                                    } ?>
                                                                </a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <button class="btn  m-auto shadow-sm disabled" data-toggle="tooltip" data-placement="left" title="Can be given only by faculty" style="text-decoration: line-through;">
                                                                    Not Rated Yet
                                                                </button>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php $sno = $sno + 1;
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                                    <table id="myTable6" class="table table-hover table-bordered text-center" style="display: none;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th><b>S.No</b></th>
                                                <th><b>CID</b></th>
                                                <th><b>Room No / Place</b></th>
                                                <th><b>Details</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Feedback</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php

                                            $query = "SELECT * FROM complaints  WHERE status = 3 ORDER BY id DESC";
                                            // echo "<script>console.log('MANAGER')</script>";

                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $sno = 1;
                                                foreach ($query_run as $complaints) {
                                                    $v = $complaints['status'];
                                                    $statusMessage = '';
                                                    switch ($v) {
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
                                                        case -9:
                                                            $statusMessage = 'Manager Rejected';
                                                            break;
                                                        default:
                                                            $statusMessage = 'Error';
                                                            break;
                                                    }

                                            ?>
                                                    <tr>
                                                        <td><?= $sno ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <button type="button" class="btn btn-primary border-0 m-auto shadow-sm view-btn" data-id="<?= $complaints['id'] ?>" data-cid="<?= $complaints['cid'] ?>">
                                                                    <span class="ti-eye"></span>
                                                                </button>

                                                            </div>
                                                            <!-- end of the cancell part-->
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($statusMessage == 'Resolved')
                                                                echo '<button type="button" class="btn btn-success m-auto shadow-sm" data-toggle="tooltip" data-placement="top" title="Resolved on : ' . $complaints['fin_date'] . '">' . $statusMessage . '</button>';
                                                            elseif ($statusMessage == 'Manager Rejected')
                                                                echo '<button type="button" class="btn btn-danger m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 0)
                                                                echo '<button type="button" class="btn btn-dark m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 1)
                                                                echo '<button type="button" class="btn btn-secondary m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            else
                                                                echo '<button type="button" class="btn btn-info text-light m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            ?>
                                                        </td>

                                                        <?php
                                                        if ($complaints['feedback'] != NULL) { ?>
                                                            <td>
                                                                <a class="btn btn-outline-dark text-warning border-0 shadow-sm" data-toggle="tooltip" data-placement="left" title="Feedback: <?= $complaints['feedback'] ?>">
                                                                    <?php
                                                                    for ($j = 0; $j < $complaints['rating']; $j++) {
                                                                        echo '☆';
                                                                    } ?>
                                                                </a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <button class="btn  m-auto shadow-sm disabled" data-toggle="tooltip" data-placement="left" title="Can be given only by faculty" style="text-decoration: line-through;">
                                                                    Not Rated Yet
                                                                </button>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php $sno = $sno + 1;
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                                    <table id="myTable7" class="table table-hover table-bordered text-center" style="display: none;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th><b>S.No</b></th>
                                                <th><b>CID</b></th>
                                                <th><b>Room No / Place</b></th>
                                                <th><b>Details</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Feedback</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php

                                            $query = "SELECT * FROM complaints  WHERE status = 4 ORDER BY id DESC";
                                            // echo "<script>console.log('MANAGER')</script>";

                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $sno = 1;
                                                foreach ($query_run as $complaints) {
                                                    $v = $complaints['status'];
                                                    $statusMessage = '';
                                                    switch ($v) {
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
                                                        case -9:
                                                            $statusMessage = 'Manager Rejected';
                                                            break;
                                                        default:
                                                            $statusMessage = 'Error';
                                                            break;
                                                    }

                                            ?>
                                                    <tr>
                                                        <td><?= $sno ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <button type="button" class="btn btn-primary border-0 m-auto shadow-sm view-btn" data-id="<?= $complaints['id'] ?>" data-cid="<?= $complaints['cid'] ?>">
                                                                    <span class="ti-eye"></span>
                                                                </button>

                                                            </div>
                                                            <!-- end of the cancell part-->
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($statusMessage == 'Resolved')
                                                                echo '<button type="button" class="btn btn-success m-auto shadow-sm" data-toggle="tooltip" data-placement="top" title="Resolved on : ' . $complaints['fin_date'] . '">' . $statusMessage . '</button>';
                                                            elseif ($statusMessage == 'Manager Rejected')
                                                                echo '<button type="button" class="btn btn-danger m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 0)
                                                                echo '<button type="button" class="btn btn-dark m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 1)
                                                                echo '<button type="button" class="btn btn-secondary m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            else
                                                                echo '<button type="button" class="btn btn-info text-light m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            ?>
                                                        </td>

                                                        <?php
                                                        if ($complaints['feedback'] != NULL) { ?>
                                                            <td>
                                                                <a class="btn btn-outline-dark text-warning border-0 shadow-sm" data-toggle="tooltip" data-placement="left" title="Feedback: <?= $complaints['feedback'] ?>">
                                                                    <?php
                                                                    for ($j = 0; $j < $complaints['rating']; $j++) {
                                                                        echo '☆';
                                                                    } ?>
                                                                </a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <button class="btn  m-auto shadow-sm disabled" data-toggle="tooltip" data-placement="left" title="Can be given only by faculty" style="text-decoration: line-through;">
                                                                    Not Rated Yet
                                                                </button>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php $sno = $sno + 1;
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                                    <table id="myTable8" class="table table-hover table-bordered text-center" style="display: none;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th><b>S.No</b></th>
                                                <th><b>CID</b></th>
                                                <th><b>Room No / Place</b></th>
                                                <th><b>Details</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Feedback</b></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <?php

                                            $query = "SELECT * FROM complaints  WHERE status = 2 ORDER BY id DESC";
                                            // echo "<script>console.log('MANAGER')</script>";

                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $sno = 1;
                                                foreach ($query_run as $complaints) {
                                                    $v = $complaints['status'];
                                                    $statusMessage = '';
                                                    switch ($v) {
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
                                                        case -9:
                                                            $statusMessage = 'Manager Rejected';
                                                            break;
                                                        default:
                                                            $statusMessage = 'Error';
                                                            break;
                                                    }

                                            ?>
                                                    <tr>
                                                        <td><?= $sno ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <button type="button" class="btn btn-primary border-0 m-auto shadow-sm view-btn" data-id="<?= $complaints['id'] ?>" data-cid="<?= $complaints['cid'] ?>">
                                                                    <span class="ti-eye"></span>
                                                                </button>

                                                            </div>
                                                            <!-- end of the cancell part-->
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($statusMessage == 'Resolved')
                                                                echo '<button type="button" class="btn btn-success m-auto shadow-sm" data-toggle="tooltip" data-placement="top" title="Resolved on : ' . $complaints['fin_date'] . '">' . $statusMessage . '</button>';
                                                            elseif ($statusMessage == 'Manager Rejected')
                                                                echo '<button type="button" class="btn btn-danger m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 0)
                                                                echo '<button type="button" class="btn btn-dark m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            elseif ($v == 1)
                                                                echo '<button type="button" class="btn btn-secondary m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            else
                                                                echo '<button type="button" class="btn btn-info text-light m-auto shadow-sm">' . $statusMessage . '</button>';
                                                            ?>
                                                        </td>

                                                        <?php
                                                        if ($complaints['feedback'] != NULL) { ?>
                                                            <td>
                                                                <a class="btn btn-outline-dark text-warning border-0 shadow-sm" data-toggle="tooltip" data-placement="left" title="Feedback: <?= $complaints['feedback'] ?>">
                                                                    <?php
                                                                    for ($j = 0; $j < $complaints['rating']; $j++) {
                                                                        echo '☆';
                                                                    } ?>
                                                                </a>
                                                            </td>
                                                        <?php } else { ?>
                                                            <td>
                                                                <button class="btn  m-auto shadow-sm disabled" data-toggle="tooltip" data-placement="left" title="Can be given only by faculty" style="text-decoration: line-through;">
                                                                    Not Rated Yet
                                                                </button>
                                                            </td>
                                                        <?php } ?>

                                                    </tr>

                                            <?php $sno = $sno + 1;
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
                <!-- </div> -->
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
        </script>
        <script>
            $(document).ready(function() {
                $('#a1').click(function() {
                    toggleTable('myTable1');
                });

                $('#a2').click(function() {
                    toggleTable('myTable2');
                });

                $('#a3').click(function() {
                    toggleTable('myTable3');
                });

                $('#a4').click(function() {
                    toggleTable('myTable4');
                });

                $('#a5').click(function() {
                    toggleTable('myTable5');
                });

                $('#a6').click(function() {
                    toggleTable('myTable6');
                });

                $('#a7').click(function() {
                    toggleTable('myTable7');
                });

                $('#a8').click(function() {
                    toggleTable('myTable8');
                });


            });


            $('#myTable1').DataTable({
                paging: true
            });

            function toggleTable(tableName) {
                var table1 = document.getElementById('myTable1');
                var table2 = document.getElementById('myTable2');
                var table3 = document.getElementById('myTable3');
                var table4 = document.getElementById('myTable4');
                var table5 = document.getElementById('myTable5');
                var table6 = document.getElementById('myTable6');
                var table7 = document.getElementById('myTable7');
                var table8 = document.getElementById('myTable8');


                if (tableName === 'myTable1') {
                    $('#myTable1').DataTable().destroy();
                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables               
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                

                    $('#myTable1').DataTable({
                        paging: true
                    });
                    table1.style.display = 'table';
                    table2.style.display = 'none';
                    table3.style.display = 'none';
                    table4.style.display = 'none';
                    table5.style.display = 'none';
                    table6.style.display = 'none';
                    table7.style.display = 'none';
                    table8.style.display = 'none';

                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables               
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                

                } else if (tableName === 'myTable2') {
                    $('#myTable1').DataTable().destroy();
                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables               
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                

                    $('#myTable2').DataTable({
                        paging: true
                    });
                    table2.style.display = 'table';
                    table1.style.display = 'none';
                    table3.style.display = 'none';
                    table4.style.display = 'none';
                    table5.style.display = 'none';
                    table6.style.display = 'none';
                    table7.style.display = 'none';
                    table8.style.display = 'none';

                    $('#myTable1').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables

                } else if (tableName === 'myTable3') {
                    $('#myTable1').DataTable().destroy();
                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables               
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable3').DataTable({
                        paging: true
                    });
                    table3.style.display = 'table';
                    table1.style.display = 'none';
                    table2.style.display = 'none';
                    table4.style.display = 'none';
                    table5.style.display = 'none';
                    table6.style.display = 'none';
                    table7.style.display = 'none';
                    table8.style.display = 'none';

                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable1').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables

                } else if (tableName === 'myTable4') {
                    $('#myTable1').DataTable().destroy();
                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables               
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable4').DataTable({
                        paging: true
                    });
                    table4.style.display = 'table';
                    table2.style.display = 'none';
                    table3.style.display = 'none';
                    table1.style.display = 'none';
                    table5.style.display = 'none';
                    table6.style.display = 'none';
                    table7.style.display = 'none';
                    table8.style.display = 'none';

                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable1').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables

                } else if (tableName === 'myTable5') {
                    $('#myTable1').DataTable().destroy();
                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables               
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable({
                        paging: true
                    });
                    table5.style.display = 'table';
                    table2.style.display = 'none';
                    table3.style.display = 'none';
                    table4.style.display = 'none';
                    table1.style.display = 'none';
                    table6.style.display = 'none';
                    table7.style.display = 'none';
                    table8.style.display = 'none';

                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable1').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables

                } else if (tableName === 'myTable6') {
                    $('#myTable1').DataTable().destroy();
                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables               
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable({
                        paging: true
                    });
                    table6.style.display = 'table';
                    table2.style.display = 'none';
                    table3.style.display = 'none';
                    table4.style.display = 'none';
                    table5.style.display = 'none';
                    table1.style.display = 'none';
                    table7.style.display = 'none';
                    table8.style.display = 'none';

                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable1').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables

                } else if (tableName === 'myTable7') {
                    $('#myTable1').DataTable().destroy();
                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables               
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable({
                        paging: true
                    });
                    table7.style.display = 'table';
                    table2.style.display = 'none';
                    table3.style.display = 'none';
                    table4.style.display = 'none';
                    table5.style.display = 'none';
                    table6.style.display = 'none';
                    table1.style.display = 'none';
                    table8.style.display = 'none';

                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable1').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables

                } else if (tableName === 'myTable8') {
                    $('#myTable1').DataTable().destroy();
                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables               
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable().destroy(); // Destroy DataTable for hidden tables                
                    $('#myTable8').DataTable({
                        paging: true
                    });
                    table8.style.display = 'table';
                    table2.style.display = 'none';
                    table3.style.display = 'none';
                    table4.style.display = 'none';
                    table5.style.display = 'none';
                    table6.style.display = 'none';
                    table7.style.display = 'none';
                    table1.style.display = 'none';

                    $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable4').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable5').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable6').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable7').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                    $('#myTable1').DataTable().destroy(); // Destroy DataTable for hidden tables                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables

                }

            }
        </script>
        <script>
            //Add new complaint
            $(document).ready(function() {
                $("#complaint").submit(function(event) {
                    event.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "complaint-data.php",
                        data: formData,
                        success: function(response) {

                            $('#complaint')[0].reset();
                            $('#newComplaintModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Successfully Added!',
                            }).then(function(result) {
                                location.reload();
                            });


                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error("Error: " + errorThrown);
                        }
                    });
                });
            });
        </script>


        <script>
            $(document).on('click', '.reject-button', function() {
                // Toggle the visibility of the 'finStat' div with a fade effect
                $('#finStat').fadeToggle(50); // Adjust the duration (in milliseconds) as needed
            });

            // JavaScript code to handle the view button click event
            $(document).on('click', '.view-btn', function() {
                var button = $(this);
                var role = '<?php echo $role; ?>';
                var complaintID = button.data("id");
                var cid = $(this).data('cid');

                var uniqueBtnId = 'colBtn' + complaintID;
                var uniqueCollapseId = 'rejectionCollapse' + complaintID;

                // Initialize FormData object
                var formData = new FormData();
                formData.append("view", true);
                formData.append("id", complaintID);

                // Make an Ajax request to fetch complaint details
                $.ajax({
                    type: 'POST',
                    url: 'testx.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(1);
                        console.log(response);
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {
                            $('#viewCid').html('[ ID : ' + cid + ' ]');
                            $('#viewType').html(res.type);
                            $('#viewBlock').text(res.block);
                            $('#viewPlace').text(res.place);
                            $('#viewDesc').text(res.desc);
                            $('#viewHod').text(res.hod);
                            // console.log(res.stat);


                            if (res.stat < 0) {
                                $('#viewReject').html(
                                    '<fieldset class="border border-light">' +
                                    '<legend class="col-auto mx-3"><h5 class="m-auto">Rejection Reason</h5></legend>' +
                                    '<h5><span class="p-1"><p>' + res.rej + '</p></span></h5>' +
                                    '</fieldset>');
                            }


                            if (res.stat == 0 && role == 'HOD') {


                                $('#hodApr').html('<button type="button" class="col btn btn-success" id="approveBtn" data-id=' + complaintID + ' data-action="approve">Approve</button>' +
                                    '<button type="button" class="col btn btn-danger btn-sm reject-button" id="' + uniqueBtnId + '" data-toggle="collapse" data-target="#rejAcrd">Reject <i class="ti-angle-down"></i></button>'
                                );

                                // Add the collapse element to the modal with the unique ID
                                $('#rejAcrd').html(
                                    '<div class="form-group text-center">' +
                                    '<label for="rejectComment">Reason to reject this complaint:</label>' +
                                    '<textarea class="form-control" id="rejectComment" name="rejectComment" rows="3" required></textarea>' +
                                    '<button type="button" class="btn btn-danger" id="rejBtn" data-id=' + complaintID + ' data-action="reject">Reject</button>' +
                                    '</div>'
                                );
                                $(document).on('click', '.rejectBtn', function() {
                                    var complaintID = $(this).data('id');
                                    var uniqueCollapseId = 'rejectionCollapse' + complaintID;
                                    var rejComment = $('#rejComment').val();

                                    // Make an AJAX request to update the database with the rejection comment
                                    $.ajax({
                                        type: 'POST',
                                        url: 'testx.php', // Replace with the appropriate URL
                                        data: {
                                            complaintID: complaintID,
                                            rejComment: rejComment // Pass the rejection comment
                                        },
                                        success: function(response) {
                                            // Handle the response here (if needed)
                                            console.log(response);

                                            // Close the modal or take any other action
                                            $('#complaintModal').modal('hide');
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(xhr.responseText);
                                        }
                                    });

                                    // Toggle the collapse element associated with the "Reject" button
                                    $('#' + uniqueCollapseId).collapse('toggle');
                                });


                            } else {
                                var statx = '';
                                var btc = '';
                                if (res.stat == 100) {
                                    statx = 'Request cancelled';
                                    btc = 'btn-danger';
                                } else if (res.stat > 0 || res.stat == -9) {
                                    statx = 'Approved on ' + res.hoddate;
                                    btc = 'btn-success';
                                } else if (res.stat == 0) {
                                    statx = 'Pending';
                                    btc = 'btn-info';
                                } else if (res.stat == -10) {
                                    btc = 'btn-danger';
                                    statx = 'Rejected by HOD';
                                }

                                $('#hodApr').html('<div class="btn col ' + btc + ' m-auto">' + statx + '</div>');

                            }
                            if (res.stat == 1 && role == 'MANAGER') {
                                $('#manApr').html(
                                    '<button type="button" class="col btn btn-success btn-sm approve-button" data-toggle="collapse" data-target="#managerCollapse"> Approve <i class="ti-angle-down"></i> ' +
                                    '<button type="button" class="col btn btn-danger btn-sm reject-button" id="' + uniqueBtnId + '" data-toggle="collapse" data-target="#rejAcrd">Reject <i class="ti-angle-down"></i></button>'
                                );



                                $('#manFrwrd').html('<div class="col" >' +
                                    '<button type="button" class="btn btn-outline-primary" id="frwrdBtn" data-id=' + complaintID + ' data-action="ap1">Forward to General</button>' +
                                    '</div>' +
                                    '<div class="col" >' +
                                    '<button type="button" class="btn btn-outline-primary" id="frwrdBtn2" data-id="' + complaintID + '" data-action="ap2">Forward to ITKM</button>' +
                                    '</div>');

                                // Add the collapse element to the modal with the unique ID
                                $('#rejAcrd').html(
                                    '<div class="form-group text-center">' +
                                    '<label for="rejectComment">Reason to reject this complaint:</label>' +
                                    '<textarea class="form-control" id="rejectComment" name="rejectComment" rows="3" required></textarea>' +
                                    '<button type="button" class="btn btn-danger" id="rejBtn" data-id=' + complaintID + ' data-action="reject">Reject</button>' +
                                    '</div>'
                                );


                            } else {
                                var statx = '';
                                var btc = '';
                                if (res.stat == 100) {
                                    statx = 'Request cancelled';
                                    btc = 'btn-danger';
                                } else if (res.stat > 1) {
                                    statx = 'Approved on ' + res.hoddate;
                                    btc = 'btn-success';
                                } else if (res.stat == 1 || res.stat == 0) {
                                    statx = 'Pending';
                                    btc = 'btn-info';
                                } else if (res.stat == -9) {
                                    btc = 'btn-danger';
                                    statx = 'Rejected by Manager';
                                } else if (res.stat == -10) {
                                    btc = 'btn-danger';
                                    statx = 'Rejected by HOD';
                                }
                                $('#manApr').html('<div class="btn col ' + btc + ' m-auto">' + statx + '</div>');
                            }
                            if (res.fdate != undefined) {
                                $('#finStat').html('Finished on ' + res.fdate);
                            } else if (res.stat < 0 || res.stat == 100) {
                                $('#finStat').html('Cancelled');
                            } else {
                                $('#finStat').html('Work still on queue');
                            }




                            // Show the modal
                            $('#complaintModal').modal('show');
                        } else {
                            console.log("Update failed!");
                        }



                    },
                    error: function() {
                        console.log("AJAX error occurred.");
                    },
                });
            });
            //approval code
            $(document).ready(function() {
                // Attach click handlers to the "Approve" and "Reject" buttons
                $(document).on('click', '#approveBtn', function() {
                    console.log(1);
                    handleApproval($(this).data('id'), 1);
                    $stat = 'Approved!';
                    $icon = 'success';
                });

                $(document).on('click', '#frwrdBtn', function() {
                    handleApproval($(this).data('id'), 1);
                    $stat = 'Approved!';
                    $icon = 'success';
                    console.log(2);
                });

                $(document).on('click', '#frwrdBtn2', function() {
                    handleApproval($(this).data('id'), 2);
                    $stat = 'Approved!';
                    $icon = 'success';
                    console.log(3);
                });

                $(document).on('click', '#rejBtn', function() {
                    var rejectionComment = $('#rejectComment').val();

                    handleRejection($(this).data('id'), rejectionComment); // Pass the rejection comment
                    $stat = 'Rejected!';
                    $icon = 'error';
                    console.log(-10);
                });

                function handleApproval(complaintID, approvalValue) {
                    // Send data to update-complaints-data.php using Ajax
                    $.ajax({
                        type: 'POST',
                        url: 'update-complaint-data.php',
                        data: {
                            complaintID: complaintID,
                            approval: approvalValue
                        },
                        success: function(response) {
                            // Handle the response here (if needed)
                            console.log(response);
                            $('#complaintModal').modal('hide');

                            Swal.fire({
                                icon: $icon,
                                title: $stat
                            }).then(function(result) {
                                location.reload();
                            });

                            // $("#table-body").load(" #table-body > *");
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }

                function handleRejection(complaintID, rejectionComment) {
                    // Send data to update-complaint-data.php for rejection using Ajax
                    $.ajax({
                        type: 'POST',
                        url: 'update-complaint-data.php',
                        data: {
                            complaintID: complaintID,
                            approval: -10,
                            rejComment: rejectionComment
                        },
                        success: function(response) {
                            // Handle the response here (if needed)
                            console.log(response);
                            $('#complaintModal').modal('hide');

                            Swal.fire({
                                icon: $icon,
                                title: $stat
                            }).then(function(result) {
                                location.reload();
                            });

                            // $("#table-body").load(" #table-body > *");
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        </script>


        <script>
            // edit

            $(document).on('click', '.edit-btn', function() {
                var button = $(this);
                var complaintID = button.data("id");

                // Make an AJAX request to retrieve existing complaint details
                $.ajax({
                    type: 'GET',
                    url: 'complaint-data.php', // Replace with your PHP script to fetch data
                    data: {
                        id: complaintID
                    },
                    success: function(response) {
                        // Parse the JSON response (assuming your server returns JSON)

                        console.log('Response:', response);
                        var complaintDetails = JSON.parse(response);
                        $('#complaint_type2').val(complaintDetails.complaint_type);
                        $('#block2').val(complaintDetails.block);

                        $('#rno').val(complaintDetails.place);
                        $('#eddescription').val(complaintDetails.description);

                        // Set the complaint ID as a data attribute for the Save button
                        $('#editSubmitBtn').data('complaint-id', complaintID);

                        // Show the edit modal
                        $('#editComplaintModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });


            $(document).on('click', '#editSubmitBtn', function(event) {
                event.preventDefault();

                var complaintID = $(this).data('complaint-id');
                var complaintType = $('#complaint_type2').val();
                var blockName = $('#block2').val();
                var roomNumber = $('#rno').val();
                var complaintDescription = $('#eddescription').val();

                // Log the values directly from the form elements
                console.log("Complaint Type:", complaintType);
                console.log("Block:", blockName);

                // Check if required fields are empty
                // if (!complaintType || !blockName || !roomNumber || !complaintDescription) {
                //     alert("Please fill in all required fields.");
                //     return; // Exit the function if validation fails
                // }

                var updatedData = {
                    id: complaintID,
                    complaintType: complaintType,
                    blockName: blockName,
                    roomNumber: roomNumber,
                    complaintDescription: complaintDescription
                };

                $.ajax({
                    type: 'POST',
                    url: 'testx.php',
                    data: updatedData,
                    success: function(response) {
                        console.log(response);

                        // Close the modal
                        $('#editComplaintModal').modal('hide');
                        Swal.fire({
                            icon: 'success', // Set the success icon
                            title: 'Feedback Added!'
                        }).then(function(result) {
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        </script>



        <!-- xxxxxxx -->

        <script>
            // feedback

            $(document).on('click', '.feed-btn', function() {
                var button = $(this);
                var complaintID = button.data("id");
                console.log(complaintID);
                $('#feedSubmitBtn').data('complaint-id', complaintID);
            });


            $(document).on('click', '#feedSubmitBtn', function() {
                var complaintID = $(this).data('complaint-id');
                var rating = $('input[name="rating"]:checked').val();

                var feedbackComment = $('#feedbackComment').val();
                console.log(rating, feedbackComment);

                var updatedData = {
                    id: complaintID,
                    rating: rating,
                    feedC: feedbackComment
                };

                $.ajax({
                    type: 'POST',
                    url: 'testx.php',
                    data: updatedData,
                    success: function(response) {
                        console.log(response);
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {

                            console.log("feedback added successfully");

                            Swal.fire({
                                icon: 'success', // Set the success icon
                                title: 'Feedback Added!'
                            }).then(function(result) {
                                location.reload();
                            });

                            $('#complaintFeedbackModal').modal('hide');
                            $("#table-body").load(" #table-body > *");


                            // button.hide();
                        } else {
                            Swal.fire({
                                icon: 'error', // Set the success icon
                                title: 'Error!'
                            }).then(function(result) {
                                location.reload();
                            });
                            console.log("Error adding complaint");
                        }
                        // Close the modal

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        </script>




        <script>
            //complaint cancellation

            $(document).ready(function() {
                $(document).on('click', '.cancel-button', function() {
                    // event.preventDefault();
                    console.log('clicked');
                    var button = $(this);
                    var complaintId = button.data('id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: 'testx.php',
                                method: 'POST',
                                data: {
                                    complaintId: complaintId,
                                    action: 'cancel'
                                },
                                success: function(response) {
                                    var res = jQuery.parseJSON(response);
                                    console.log(response);

                                    if (res.status == 200) {
                                        console.log("Complaint canceled successfully");

                                        // Remove the cancelled row from the table.
                                        // button.closest('tr').remove();
                                        // $('#zero_config').load(location.href + ' #zero_config');
                                        // $("#table-body").load(" #table-body > *");
                                        location.reload();

                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error Cancelling!'
                                        }).then(function(result) {
                                            location.reload();
                                        });
                                        console.log("Error canceling complaint");
                                    }
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                    console.log("AJAX Error: " + textStatus);
                                }
                            });
                        }
                    });
                });
            });
        </script>

        <script>
            console.log('<?= $role ?>');
        </script>
</body>

</html>