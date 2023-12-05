<?php

require 'config.php';
include("session.php");


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
    <link href="assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	
	
<![endif]-->

    <script type="text/javascript">
        function CheckColors(val) {
            if (val.value == 'Patent') {
                document.getElementById('pstatus').classList.remove('d-none');
                document.getElementById('cstatus').classList.add('d-none');
            } else if (val.value == 'Copyright') {
                document.getElementById('pstatus').classList.add('d-none');
                document.getElementById('cstatus').classList.remove('d-none');
            } else {
                document.getElementById('pstatus').classList.add('d-none');
                document.getElementById('cstatus').classList.add('d-none');
            }
        }
    </script>

    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        .d-none {
            display: none;
        }

        .d1-none {
            display: none;
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
                        <h4 class="page-title">Faculty Compliants</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php
                $query = "SELECT * FROM compliants WHERE hod_id='$s'";
                $query_run = mysqli_query($db, $query);

                if (mysqli_num_rows($query_run) >= 0) {
                    $hod = mysqli_fetch_array($query_run);
                } ?>



                <section id="sections" class="py-4 mb-4 bg-faded">
                    <div class="container">
                        <div class="row">
                            <div class="col-auto">
                                <a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCompliantModal"><i class="fa fa-plus"></i> New Compliant</a>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#pendingModal"><i class="fa fa-spinner"></i> Pendings</a>
                            </div>


                            <div class="col-auto">
                                <a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#forwardedModal"><i class="fa fa-check"></i>Forwarded Compliants</a>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="btn btn-danger btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#rejectedModal"><i class="fa fa-check"></i>Rejected Compliants</a>
                            </div>
                            <div class="col-md"></div>
                        </div>
                    </div>

                </section>
                <section id="post">
                    <!-- Modal for rejection confirmation -->
                    <div class="modal fade" id="rejectConfirmationModal" tabindex="-1" aria-labelledby="rejectConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="rejectConfirmationModalLabel">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to reject this complaint?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="confirmReject">Reject</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" id="rtab">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <th>S.no</th>
                                    <th>Compliant Id</th>
                                    <th>Raised Date</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                    <th>Approval Details</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM compliants WHERE hod_id='$s'";
                                    $query_run = mysqli_query($db, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        $cnt = 1;
                                        foreach ($query_run as $compliants) {
                                            $v = $compliants['status'];
                                            $role = 'HOD'; // Assuming you have a role field in your database

                                            // Render the current status
                                            $statusMessage = '';
                                            switch ($v) {
                                                case 0:
                                                    $statusMessage = 'At HOD';
                                                    break;
                                                case 1:
                                                    $statusMessage = 'At Principal';
                                                    break;
                                                case 2:
                                                    $statusMessage = 'At Manager';
                                                    break;
                                                case 3:
                                                    $statusMessage = 'Approved';
                                                    break;
                                                case -1:
                                                    $statusMessage = 'Rejected';
                                                    break;
                                                default:
                                                    $statusMessage = 'Unknown';
                                                    break;
                                            }

                                            // Check if the user is allowed to interact with the buttons
                                            $canInteractWithButtons = false;

                                            // HOD (status 0) can interact with buttons
                                            if ($v == 0 && $role == 'HOD') {
                                                $canInteractWithButtons = true;
                                            }

                                            // Render the buttons or status message based on the $canInteractWithButtons flag
                                    ?>
                                            <tr>
                                                <td align="center"><?= $cnt ?></td>
                                                <td><?= $compliants['date'] ?></td>
                                                <td align="center"><?= $compliants['date'] ?></td>
                                                <td>
                                                    <button type="button" value="<?= $compliants['id']; ?>" class="viewCompliantBtn btn btn-success btn-sm">View</button>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($canInteractWithButtons) {
                                                        // Render the buttons for HOD
                                                    ?>
                                                        <button type="button" value="<?= $compliants['id']; ?>" class="approveCompliantBtn btn btn-success btn-sm">Approve</button>
                                                        <button type="button" value="<?= $compliants['id']; ?>" class="rejectCompliantBtn btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectConfirmationModal">Reject</button>
                                                    <?php
                                                    } else {
                                                        // Display the current status and a message for users who cannot interact
                                                        echo '<span class="badge badge-pill badge-info col-auto">' . $statusMessage . '</span>';
                                                        echo '<div class="text-danger">Not approved to interact</div>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button type="button" value="<?= $compliants['id']; ?>" class="compliantDetailsBtn btn btn-success btn-sm">View</button>
                                                </td>
                                            </tr>
                                    <?php
                                            $cnt++;
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

                <!-- Tabs content -->
                <!-- addCompliantModal					 -->
                <div class="modal fade" id="addCompliantModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Compliant</h5>
                                <button type="button" class="btn" data-dismiss="modal" aria-label="Close">
                                    <i class="mdi mdi-close"></i> <!-- Font Awesome close icon -->
                                </button>
                            </div>
                            <form id="addCompliant">
                                <div class="modal-body">

                                    <div id="errorsacademic" class="alert alert-warning d-none"></div>

                                    <div class="mb-3">
                                        <label for="">Compliant Type *</label>
                                        <select class="form-control" name="type" id="type" onchange="toggleDivVisibility()" required>
                                            <option value="">Select Type</option>
                                            <option value="General">General</option>
                                            <option value="Software based">Software based</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Block *</label>
                                        <select class="form-control" name="block" id="block" onchange="toggleDivVisibility()" required>
                                            <option value="">Select Block</option>
                                            <option value="APJ Block">APJ Block</option>
                                            <option value="RK Block">RK Block</option>
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

                                    <div class="mb-3" id="place">
                                        <label for="">Room / Place *</label>
                                        <input type="text" name="place" id="place" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Compliant Description *</label>
                                        <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Compliant</button>
                                </div>
                                <div id="test"> </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- addCompliantModal End		 -->
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



    <script>
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



    <script>
        //AddCompliant
        $(document).on('submit', '#addCompliant', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_compliant", true);
            console.log(formData);

            $.ajax({
                type: "POST",
                url: "CCode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    console.log(res.status);
                    $('#test').html(res);
                    if (res.status == 422) {
                        $('#errorsacademic').removeClass('d-none');
                        $('#errorsacademic').text(res.message);

                    } else if (res.status == 200) {

                        $('#errorsacademic').addClass('d-none');
                        $('#studentAcademic').modal('hide');
                        $('#addCompliant')[0].reset();

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    } else if (res.status == 500) {
                        $('#errorsacademic').addClass('d-none');
                        $('#studentAcademic').modal('hide');
                        $('#addCompliant')[0].reset();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });
        //AddCompliant Ends
    </script>

    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#myTable2').DataTable();
    </script>


    <script>
        //approve and reject
        $(document).ready(function() {
            // Function to hide action buttons for a specific row
            function hideActionButtonsForRow(row) {
                row.find(".approveCompliantBtn").hide();
                row.find(".rejectCompliantBtn").hide();
            }

            // Function to disable action buttons for a specific row
            function disableActionButtonsForRow(row) {
                row.find(".approveCompliantBtn").prop('disabled', true);
                row.find(".rejectCompliantBtn").prop('disabled', true);
            }

            // Function to enable action buttons for a specific row
            function enableActionButtonsForRow(row) {
                row.find(".approveCompliantBtn").prop('disabled', false);
                row.find(".rejectCompliantBtn").prop('disabled', false);
            }

            // Add click event handlers for the "Approve" button
            $(".approveCompliantBtn").click(function() {
                var complaintId = $(this).val();
                var row = $(this).closest("tr"); // Find the closest row

                // Hide and disable action buttons for this row
                hideActionButtonsForRow(row);
                disableActionButtonsForRow(row);

                // Make an AJAX request to increment the status in the "update_comp.php" file
                $.ajax({
                    url: 'update_comp.php',
                    type: 'POST',
                    data: {
                        complaintId: complaintId,
                        increment: 1
                    },
                    success: function(response) {
                        console.log(response);
                        if (response === 'success') {
                            // Refresh the content of the #myTable element using load method
                            $('#myTable').load(window.location.href + ' #myTable', function() {
                                // Enable action buttons for this row after the content is refreshed
                                enableActionButtonsForRow(row);
                            });
                        } else {
                            alert('Failed to update status.');
                            // Show action buttons again for this row if the request fails
                            enableActionButtonsForRow(row);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', status, error);
                        // Show action buttons again for this row if there's an error
                        enableActionButtonsForRow(row);
                    }
                });
            });

            // Add click event handlers for the "Reject" button
            $(".rejectCompliantBtn").click(function() {
                var complaintId = $(this).val();
                var row = $(this).closest("tr"); // Find the closest row

                // Open the Bootstrap modal
                $('#rejectConfirmationModal').modal('show');

                // Handle the rejection when the "Reject" button in the modal is clicked
                $("#confirmReject").click(function() {
                    // Hide the modal
                    $('#rejectConfirmationModal').modal('hide');

                    // Hide and disable action buttons for this row
                    hideActionButtonsForRow(row);
                    disableActionButtonsForRow(row);

                    // Make an AJAX request to reject the complaint (increment status)
                    $.ajax({
                        url: 'update_comp.php',
                        type: 'POST',
                        data: {
                            complaintId: complaintId,
                            increment: 1 // Increment the status by 1
                        },
                        success: function(response) {
                            console.log(response);
                            if (response === 'success') {
                                // Refresh the content of the #myTable element using load method
                                $('#myTable').load(window.location.href + ' #myTable', function() {
                                    // Enable action buttons for this row after the content is refreshed
                                    enableActionButtonsForRow(row);
                                });
                            } else {
                                alert('Failed to reject complaint.');
                                // Show action buttons again for this row if the request fails
                                enableActionButtonsForRow(row);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', status, error);
                            // Show action buttons again for this row if there's an error
                            enableActionButtonsForRow(row);
                        }
                    });
                });

                // Hide the "Reject" button in the modal
                row.find(".rejectCompliantBtn").hide();
            });
        });
    </script>
</body>

</html>