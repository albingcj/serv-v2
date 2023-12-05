<?php
require 'config.php';
include 'session.php';
require 'h.php';

// values for corresponding roles:
if ($role == 'ITKM') {
    $s1 = 1;
    $s2 = 3;
    $s3 = 5;
}
if ($role == 'GENERAL') {
    $s1 = 2;
    $s2 = 4;
    $s3 = 6;
}

// |     list of table      |
// -------------------------|
// | t1	|   total           |
// | t2	|   pending         |
// | t3	|   completed       |
// | t4	|   itkm finished   |
// | t5	|   itkm pending    |
// | t6	|   gen completed   |
// | t7	|   gen pending     |
?>

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
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">

    <link href="assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />


    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
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
            opacity: 0.5
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

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">


                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="Logout"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>

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
        <?php include("Aside.php"); ?>
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
                        <h4 class="page-title">Software based Complaints</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Software Based Complaints</li>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">

                    <!-- Module for dhandabani -->
                    <?php
                    // Include the database connection
                    // include 'config.php';

                    // Query to get total complaints with all status
                    $totalComplaintsQuery = "SELECT COUNT(*) as total FROM complaints WHERE status IN ($s1, $s2, $s3)";
                    $totalComplaintsResult = mysqli_query($db, $totalComplaintsQuery);
                    $totalComplaintsCount = mysqli_fetch_assoc($totalComplaintsResult)['total'];

                    // Query to get pending complaints with status pending
                    $pendingComplaintsQuery = "SELECT COUNT(*) as pending FROM complaints WHERE status = $s1";
                    $pendingComplaintsResult = mysqli_query($db, $pendingComplaintsQuery);
                    $pendingComplaintsCount = mysqli_fetch_assoc($pendingComplaintsResult)['pending'];

                    // Query to get completed complaints with workers assigned
                    $assignedComplaintsQuery = "SELECT COUNT(*) as assigned FROM complaints WHERE status = $s2";
                    $assignedComplaintsResult = mysqli_query($db, $assignedComplaintsQuery);
                    $assignedComplaintsCount = mysqli_fetch_assoc($assignedComplaintsResult)['assigned'];

                    // Query to get completed complaints with status completed
                    $completedComplaintsQuery = "SELECT COUNT(*) as completed FROM complaints WHERE status = $s3";
                    $completedComplaintsResult = mysqli_query($db, $completedComplaintsQuery);
                    $completedComplaintsCount = mysqli_fetch_assoc($completedComplaintsResult)['completed'];

                    ?>


                    <div class="col-sm-12 mb-3">
                        <!-- card containing a button to add new workers -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWorkerModal">
                                            Add New Worker
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>





                        <!-- top 3 buttons  -->
                        <div class="card text-light">
                            <div class="card-body">
                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-4 col-xlg-6" id="myTable1x">
                                        <div class="card card-hover">
                                            <div class="box bg-cyan text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-wallet-travel"></i></h1>
                                                <h4 class="text-white"><b>Total Complaints</b></h4>
                                                <h4 class="text-white"><b><?php echo $totalComplaintsCount; ?> </b></h4>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-4 col-xlg-3" id="myTable3x">
                                        <div class="card card-hover">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                                                <h4 class="text-white"><b>Completed </b></h4>
                                                <h4 class="text-white"><b><?php echo $completedComplaintsCount; ?> </b></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <!-- <div class="col-md-6 col-lg-4 col-xlg-3"> -->
                                    <div class="col">
                                        <div class="card card-hover" id="myTable2x">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white"><i class=" mdi mdi-worker"></i></h1>
                                                <h4 class="text-white"><b>Pending</b></h4>
                                                <h4 class="text-white"><b><?php echo $pendingComplaintsCount; ?></b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container-fluid">
                        <?php
                        $query = "SELECT * FROM complaints WHERE status=$s1 OR status=$s2 ORDER BY id DESC";
                        $query_run = mysqli_query($db, $query);

                        ?>


                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!-- total list -->
                                    <table id="myTable1" class="table table-hover table-bordered text-center" style="display: table;">
                                        <thead class="thead-dark">
                                            <th>S.no</th>
                                            <th>Complaint Id</th>
                                            <th>Room No</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM complaints where status=$s1 or status=$s2 or status=$s3 ORDER BY id DESC";
                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $cnt = 1;
                                                foreach ($query_run as $complaints) {
                                            ?>
                                                    <tr>
                                                        <td align="center"><?= $cnt ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <button type="button" value="<?= $complaints['id']; ?>" class="complaintDetailsBtn btn btn-outline-dark border-0 m-auto shadow-sm" data-toggle="modal" data-target="#complaintDetailsModal" data-raised-date="<?= $complaints['date'] ?>" data-approval-date="<?= $complaints['fin_date'] ?>" data-place="<?= $complaints['place'] ?>" data-block-name="<?= $complaints['block'] ?>" data-description="<?= $complaints['description'] ?>" data-cid="<?= $complaints['cid'] ?>" data-workers="<?= $complaints['workers'] ?>">
                                                                <span class="ti-eye"></span></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($complaints['status'] == $s1) {

                                                                //$wquery = "SELECT * FROM workers ORDER BY status ASC"; also order this by rating and name
                                                                $wquery = "SELECT * FROM workers ORDER BY status ASC, name ASC";
                                                                $wresult = mysqli_query($db, $wquery);

                                                                if ($wresult) {
                                                                    $workers = mysqli_fetch_all($wresult, MYSQLI_ASSOC);
                                                                } else {
                                                                    echo "Error: " . $wquery . "<br>" . mysqli_error($db);
                                                                }
                                                            ?>
                                                                <button type="button" value="<?= $complaints['id']; ?>" class="AssignWorkBtn btn btn-dark shadow-sm" data-bs-toggle="modal" data-bs-target="#assignWorkModal1">
                                                                    Assign Work
                                                                </button>
                                                                <!-- xxxxxx -->
                                                                <div class="modal fade" id="assignWorkModal1" tabindex="-1" role="dialog" aria-labelledby="assignWorkModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">

                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="assignWorkModalLabel">Assign Work</h5>
                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <label for="assignTo">Assign To:</label>
                                                                                <div class="row overflow-scroll m-auto" style="width: 100%; overflow-x: auto;">
                                                                                    <?php
                                                                                    $chunks = array_chunk($workers, 10);

                                                                                    echo '<div class="d-flex">';

                                                                                    foreach ($chunks as $group) {
                                                                                        echo '<div class="column p-1 px-3 mx-2">';
                                                                                        echo '<div class="form-group text-left">';

                                                                                        foreach ($group as $worker) {
                                                                                            $sx = " ";
                                                                                            if ($worker['status'] == 1) {
                                                                                                $sx = "disabled checked";
                                                                                            }
                                                                                            echo '<div class="d-flex align-items-center form-check form-check-lg justify-content-between mb-2">';



                                                                                            echo '<input type="checkbox" class="form-check-input " id="worker' . $worker['id'] . '" name="assignTo[]" value="' . $worker['id'] . '" ' . $sx . '>';
                                                                                            echo '<label class="form-check-label col d-flex align-items-center justify-content-between " for="worker' . $worker['id'] . '">';
                                                                                            echo '<div class="col-auto">' . $worker['name'] . '[' . $worker['id'] . ']</div> ';

                                                                                            if ($worker['rating'] == 0) {
                                                                                                echo '<div class="mr-0 btn btn-outline-dark shadow-sm  col-auto">';
                                                                                                echo 'Not rated';
                                                                                                echo '</div>';
                                                                                            } else {
                                                                                                echo '<div class="mr-0 btn btn-outline-dark text-warning shadow-sm  col-auto">';

                                                                                                for ($i = 0; $i < $worker['rating']; $i++) {
                                                                                                    echo '☆';
                                                                                                }
                                                                                                echo '</div>';
                                                                                            }
                                                                                            echo '</label>';
                                                                                            echo '</div>';
                                                                                        }

                                                                                        echo '</div>';
                                                                                        echo '</div>';
                                                                                    }

                                                                                    echo '</div>';
                                                                                    ?>
                                                                                </div>
                                                                            </div>


                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary" id="saveChangesButton1" data-complaint-id="<?= $complaints['id']; ?>">Save changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } else if ($complaints['status'] == $s2) { ?>
                                                                <button type=" button" value="<?= $complaints['id']; ?>" class="finishWorkBtn btn btn-success shadow-sm" onclick="confirmFinishWork(this.value)">
                                                                    Finish Work
                                                                </button>
                                                            <?php
                                                            } else if ($complaints['status'] == $s3) {
                                                                echo "<span class='btn btn-success shadow-sm'>Completed on : " . $complaints['fin_date'] . "</span>";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>


                                            <?php
                                                    $cnt++;
                                                }
                                            }
                                            ?>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- total pending -->
                                    <table id="myTable2" class="table table-hover table-bordered text-center" style="display: none;">
                                        <thead class="thead-dark">
                                            <th>S.no</th>
                                            <th>Complaint Id</th>
                                            <th>Room No</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM complaints WHERE status=$s1 or status = $s2 ORDER BY id DESC";
                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $cnt = 1;
                                                foreach ($query_run as $complaints) {
                                            ?>
                                                    <tr>
                                                        <td><?= $cnt ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <button type="button" value="<?= $complaints['id']; ?>" class="complaintDetailsBtn btn btn-outline-dark border-0 m-auto shadow-sm" data-toggle="modal" data-target="#complaintDetailsModal" data-raised-date="<?= $complaints['date'] ?>" data-approval-date="<?= $complaints['fin_date'] ?>" data-place="<?= $complaints['place'] ?>" data-block-name="<?= $complaints['block'] ?>" data-description="<?= $complaints['description'] ?>" data-cid="<?= $complaints['cid'] ?>" data-workers="<?= $complaints['workers'] ?>">
                                                                <span class="ti-eye"></span></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($complaints['status'] == $s1) {

                                                                $wquery = "SELECT * FROM workers ORDER BY status ASC";
                                                                $wresult = mysqli_query($db, $wquery);

                                                                if ($wresult) {
                                                                    $workers = mysqli_fetch_all($wresult, MYSQLI_ASSOC);
                                                                } else {
                                                                    echo "Error: " . $wquery . "<br>" . mysqli_error($db);
                                                                }
                                                            ?>
                                                                <button type="button" value="<?= $complaints['id']; ?>" class="AssignWorkBtn btn btn-dark shadow-sm" data-bs-toggle="modal" data-bs-target="#assignWorkModal2">
                                                                    Assign Work
                                                                </button>
                                                                <!-- xxxxxx -->
                                                                <div class="modal fade" id="assignWorkModal2" tabindex="-1" role="dialog" aria-labelledby="assignWorkModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">

                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="assignWorkModalLabel">Assign Work</h5>
                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <label for="assignTo">Assign To:</label>
                                                                                <div class="row overflow-scroll" style="width: 100%; overflow-x: auto;">
                                                                                    <?php
                                                                                    $chunks = array_chunk($workers, 8);

                                                                                    echo '<div class="d-flex">';

                                                                                    foreach ($chunks as $group) {
                                                                                        echo '<div class="column p-1 px-3">';
                                                                                        echo '<div class="form-group text-left">';

                                                                                        foreach ($group as $worker) {
                                                                                            $sx = " ";
                                                                                            if ($worker['status'] == 1) {
                                                                                                $sx = "disabled checked";
                                                                                            }

                                                                                            echo '<div class="d-flex align-items-center form-check form-check-lg justify-content-between">';
                                                                                            echo '<input type="checkbox" class="form-check-input " id="worker' . $worker['id'] . '" name="assignTo[]" value="' . $worker['id'] . '" ' . $sx . '>';
                                                                                            echo '<label class="form-check-label mx-2" for="worker' . $worker['id'] . '">' . $worker['name'] . '</label>';
                                                                                            echo '<div class="mr-0 btn btn-outline-dark text-warning border-0 shadow-sm  col-auto">';
                                                                                            for ($i = 0; $i < $worker['rating']; $i++) {
                                                                                                echo '☆';
                                                                                            }
                                                                                            echo '</div>';
                                                                                            echo '</div>';
                                                                                        }

                                                                                        echo '</div>';
                                                                                        echo '</div>';
                                                                                    }

                                                                                    echo '</div>';
                                                                                    ?>
                                                                                </div>
                                                                            </div>


                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } else if ($complaints['status'] == $s2) { ?>
                                                                <button type=" button" value="<?= $complaints['id']; ?>" class="finishWorkBtn btn btn-success shadow-sm" onclick="confirmFinishWork(this.value)">
                                                                    Finish Work
                                                                </button>
                                                            <?php
                                                            } else if ($complaints['status'] == $s3) {
                                                                echo "<span class='btn btn-success shadow-sm'>Completed on : " . $complaints['fin_date'] . "</span>";
                                                            }
                                                            ?>


                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt++;
                                                }
                                            }
                                            ?>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- total finished -->
                                    <table id="myTable3" class="table table-hover table-bordered text-center" style="display: none;">
                                        <thead class="thead-dark">
                                            <th>S.no</th>
                                            <th>Complaint Id</th>
                                            <th>Room No</th>
                                            <th>Details</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM complaints WHERE status= $s3 ORDER BY id DESC";
                                            $query_run = mysqli_query($db, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                $cnt = 1;
                                                foreach ($query_run as $complaints) {
                                            ?>
                                                    <tr>

                                                        <td align="center"><?= $cnt ?></td>
                                                        <td><?= $complaints['cid'] ?></td>
                                                        <td><?= $complaints['place'] ?></td>
                                                        <td>
                                                            <button type="button" value="<?= $complaints['id']; ?>" class="complaintDetailsBtn btn btn-outline-dark border-0 m-auto shadow-sm" data-toggle="modal" data-target="#complaintDetailsModal" data-raised-date="<?= $complaints['date'] ?>" data-approval-date="<?= $complaints['fin_date'] ?>" data-block-name="<?= $complaints['block'] ?>" data-place="<?= $complaints['place'] ?>" data-description="<?= $complaints['description'] ?>" data-cid="<?= $complaints['cid'] ?>" data-workers="<?= $complaints['workers'] ?>">
                                                                <span class="ti-eye"></span></button>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo "<span class='btn btn-success shadow-sm'>Completed on : " . $complaints['fin_date'] . "</span>";
                                                            ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt++;
                                                }
                                            }
                                            ?>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Tabs content -->
                        <!-- viewComplaintModal					 -->
                        <div class="modal fade" id="complaintDetailsModal" tabindex="-1" role="dialog" aria-labelledby="complaintDetailsModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="complaintDetailsModalLabel">Complaint Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mx-3 bg-dark text-light text-center">
                                            <div class="row p-3">

                                                <div class="col-12">
                                                    <b>
                                                        <h3>
                                                            <p>Complaint ID : <span id="cid"></span></p>
                                                        </h3>
                                                    </b>
                                                </div>
                                            </div>
                                            <div class="row p-3">

                                                <div class="col">
                                                    <h4>
                                                        <div class="border p-2"> Block : <span id="block"></span></div>
                                                    </h4>
                                                </div>
                                                <div class="col">
                                                    <h4>
                                                        <div class="border p-2">Room No / Place : <span id="place"></span></div>
                                                    </h4>
                                                </div>

                                            </div>
                                            <div class="row p-3">

                                                <div class="col border mx-3">
                                                    <h6 class="p-1">Raised Date: <span id="raisedDate"></span></h6>
                                                </div>
                                                <div class="col border mx-3">
                                                    <h6 class="p-1"> Finished Date: <span id="approvalDate"></span></h6>
                                                </div>

                                            </div>
                                            <div class="row p-3">
                                                <div class="col mx-1">
                                                    <fieldset class="border border-light col h-100">
                                                        <legend class="col-auto ">
                                                            <h5 class="m-auto">Description</h5>
                                                        </legend>
                                                        <h5><span class="p-1" id="description">

                                                            </span></h5>
                                                    </fieldset>

                                                </div>
                                                <div id="workersDiv" class="col mx-1"></div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- viewComplaintModal End		 -->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
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

    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <script src="assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable1x').click(function() {
                toggleTable('myTable1');
            });

            $('#myTable2x').click(function() {
                toggleTable('myTable2');
            });

            $('#myTable3x').click(function() {
                toggleTable('myTable3');
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.complaintDetailsBtn').click(function() {
                var raisedDate = $(this).data('raised-date');
                var approvalDate = $(this).data('approval-date');
                var cid = $(this).data('cid');
                var block = $(this).data('block-name');
                var place = $(this).data('place');
                var description = $(this).data('description');
                var workers = $(this).data('workers');

                var workerIds = workers.split(',');

                // An array to store promises for each AJAX request
                var ajaxPromises = [];

                // Create HTML for each worker ID
                var workerHtml = workerIds.map(function(workerId) {
                    // Create a deferred object to represent the completion of the AJAX request
                    var deferred = $.Deferred();

                    // Use AJAX to send the workerId to a PHP script
                    $.ajax({
                        type: 'POST',
                        url: 'testx.php', // Update the URL to the correct path of your PHP script
                        data: {
                            workerId: workerId
                        },
                        success: function(response) {
                            // Handle the response from the PHP script
                            var workerName = response; // Assuming the response is the worker name
                            var html = '<div class="row col-10 mb-2 justify-content-center btn btn-primary ">' + workerName + ' [' + workerId + ']</div>';

                            // var html = '<div class="row col-10 mb-2 justify-content-center">' +
                            //     '<button class="btn btn-primary" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="' + workerId + '">' + workerName + '</button>' +
                            //     '</div>';



                            // Resolve the deferred object, indicating that the AJAX request is complete
                            deferred.resolve(html);
                        },
                        error: function() {
                            console.log("AJAX error occurred.");
                            // Resolve the deferred object with an empty string or any default value
                            deferred.resolve('');
                        }
                    });

                    // Push the promise into the array
                    ajaxPromises.push(deferred.promise());
                });

                // Wait for all AJAX requests to complete
                $.when.apply($, ajaxPromises).done(function() {
                    // Convert arguments to an array
                    var resolvedHtmls = Array.prototype.slice.call(arguments);

                    // Check if resolvedHtmls is not an array (happens when only one AJAX request is made)
                    if (!Array.isArray(resolvedHtmls)) {
                        resolvedHtmls = [resolvedHtmls];
                    }

                    // Display the result wherever you need it
                    $('#workersDiv').html(
                        '<div><fieldset class="border border-light h-100">' +
                        '<legend class="col-auto "><h5 class="m-auto">Workers Assigned</h5></legend>' +
                        resolvedHtmls.join('') +
                        '</fieldset></div>'
                    );
                });

                $('#raisedDate').text(raisedDate);
                $('#approvalDate').text(approvalDate);
                $('#cid').text(cid);
                $('#block').text(block);
                $('#place').text(place);
                $('#description').text(description);
            });
        });


        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        $('#myTable1').DataTable({
            paging: true
        });

        function toggleTable(tableName) {
            var table1 = document.getElementById('myTable1');
            var table2 = document.getElementById('myTable2');
            var table3 = document.getElementById('myTable3');

            if (tableName === 'myTable1') {
                $('#myTable1').DataTable().destroy();
                $('#myTable1').DataTable({
                    paging: true
                });
                table1.style.display = 'table';
                table2.style.display = 'none';
                table3.style.display = 'none';
                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables

            } else if (tableName === 'myTable2') {
                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
                $('#myTable2').DataTable({
                    paging: true
                });
                table1.style.display = 'none';
                table2.style.display = 'table';
                table3.style.display = 'none';
                $('#myTable1').DataTable().destroy(); // Destroy DataTable for hidden tables
                $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables

            } else if (tableName === 'myTable3') {
                $('#myTable3').DataTable().destroy(); // Destroy DataTable for hidden tables
                $('#myTable3').DataTable({
                    paging: true
                });
                table1.style.display = 'none';
                table2.style.display = 'none';
                table3.style.display = 'table';
                $('#myTable1').DataTable().destroy(); // Destroy DataTable for hidden tables
                $('#myTable2').DataTable().destroy(); // Destroy DataTable for hidden tables
            }

        }

        function confirmFinishWork(complaintId) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Mark as Done!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'btn btn-success mr-2',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes"
                    // Send an AJAX request to update the status
                    $.ajax({
                        url: 'update_status.php',
                        type: 'POST',
                        data: {
                            complaintId: complaintId,
                            newStatus: <?= $s3 ?>,
                        }, // Send complaint ID and new status
                        success: function(response) {
                            // Handle the response if needed
                            swalWithBootstrapButtons.fire(
                                'Finished!',
                                'Your Work has been marked as completed.',
                                'success'
                            ).then(function(result) {
                                location.reload();
                            });
                        },
                        error: function() {
                            // Handle errors if any
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // User clicked "Cancel"
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your work is still pending :(',
                        'error'
                    )
                }
            })
        }
    </script>

    <script>
        // Basic Example with form
        var form = $("#example-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });

        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
    </script>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>


    <!-- xxxxxxx -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#saveChangesButton1').on('click', function() {

                // Get the complaintId from the data attribute
                var complaintId = $(this).data('complaint-id');

                // Collect selected worker IDs
                var selectedWorkerIDs = [];
                $('input[type="checkbox"]:checked').each(function() {
                    if (!$(this).prop('disabled')) {
                        selectedWorkerIDs.push($(this).val());
                    }
                });
                // console.log(selectedWorkerIDs);
                $.ajax({
                    url: 'update_status.php',
                    type: 'POST',
                    data: {
                        complaintId: complaintId,
                        selectedWorkerIDs: selectedWorkerIDs
                    },
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {
                            $('#assignWorkModal1').modal('hide');
                            location.reload();

                        } else if (res.status == 400) {
                            console.error('Error: Invalid data received');
                        }
                    },
                    error: function() {
                        console.error('Error: An error occurred during the request.');
                        location.reload();
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#saveChangesButton2').on('click', function() {

                // Get the complaintId from the data attribute
                var complaintId = $(this).data('complaint-id');

                // Collect selected worker IDs
                var selectedWorkerIDs = [];
                $('input[type="checkbox"]:checked').each(function() {
                    if (!$(this).prop('disabled')) {
                        selectedWorkerIDs.push($(this).val());
                    }
                });
                // console.log(selectedWorkerIDs);
                $.ajax({
                    url: 'update_status.php',
                    type: 'POST',
                    data: {
                        complaintId: complaintId,
                        selectedWorkerIDs: selectedWorkerIDs
                    },
                    success: function(response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {
                            $('#assignWorkModal2').modal('hide');
                            location.reload();
                        } else if (res.status == 400) {
                            console.error('Error: Invalid data received');
                        }
                    },
                    error: function() {
                        console.error('Error: An error occurred during the request.');
                        location.reload();
                    }
                });
            });
        });
    </script>






</body>

</html>