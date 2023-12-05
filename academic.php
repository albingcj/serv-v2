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

	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	
	
<![endif]-->

  <script type="text/javascript">
function CheckColors(val){
 if(val.value=='Patent')
 {
   document.getElementById('pstatus').classList.remove('d-none');
   document.getElementById('cstatus').classList.add('d-none');
 }
 else if(val.value=='Copyright') {
	 document.getElementById('pstatus').classList.add('d-none');
   document.getElementById('cstatus').classList.remove('d-none');
 }
 
 else{  
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
.d-none{
	display:none;
}

.d1-none{
	display:none;
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
                                
                                <a class="dropdown-item" href="Logout.php"><i class="ti-power-off m-r-5 m-l-5"></i> Logout</a>
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
                        <h4 class="page-title">Academic Profile</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Academic Profile Information</li>
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
				$query = "SELECT * FROM basic WHERE id='$s'";
    $query_run = mysqli_query($db, $query);

    if(mysqli_num_rows($query_run) >= 0)
    {
        $student = mysqli_fetch_array($query_run);
	} 
	
	$query2 = "SELECT * FROM faculty WHERE id='$s'";
    $query_run2 = mysqli_query($db, $query2);

    if(mysqli_num_rows($query_run2) >= 0)
    {
        $student2 = mysqli_fetch_array($query_run2);
	}
	
	
	?>
					
                <div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title">Academic Profile Information</h4>
                        <h6 class="card-subtitle"></h6>
						<div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs mb-3" role="tablist">
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"><i class="bi bi-book"></i><b> Co - Curricular Activity</b></span></a> </li>
                           		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#punish" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down"><i class="mdi mdi-tennis"></i><b> Extra - Curricular Activity</b></span></a> </li>

						   </ul>
                            <!-- Tab panes -->
	<div class="tab-content tabcontent-border">
	
	
	
	

<!-- View Student Modal -->
<div class="modal fade" id="studentViewModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Certificate</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
			 <img id="image" src="" alt="Computer man" class="center" style="width:80%;height:80%;">           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


							
 
	

							
<!--Punish tab starts -->


  <div class="tab-pane  p-20" id="punish" role="tabpanel">
  
  
       <!-- Add posting -->
	<div class="modal fade" id="punishadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Extra - Curricular Activities Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="savepunish">
            <div class="modal-body">

                <div id="errorMessagepost9" class="alert alert-warning d-none"></div>
                                
								
				
				
				<div class="mb-3"><label for="">Name Of the event *</label>
                <input type="text" name="lp" id="cs" class="form-control" required />

                </div>
				<div class="mb-3">
                    <label for="">Level *</label>
                    <input type="text" name="np" class="form-control" required />
                </div>
				
				<div class="mb-3">
                    <label for="">Organizer Details</label>
                    <input type="text" name="fod" class="form-control" required />
                </div>
				
				<div class="mb-3">
                    <label for="">Participation / Price</label>
                    <input type="text" name="tod" class="form-control" />
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save details</button>
            </div>
        </form>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Extra Curricular Activities Details
                        
                        <button type="button" style="float: right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#punishadd">
                            Add Event
                        </button>
                    </h4>
                </div>
                <div class="card-body">
 <div class="table-responsive">
                    <table id="myTable9" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><b>S.No</b></th>
                                <th><b>Name of the Event</b></th>
                                <th><b>Level</b></th>
								<th><b>Organizer Details</b></th>
								<th><b>Participation / Prize</b></th>

                                <th text-align="center"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            

                            $query = "SELECT * FROM punish where id='$s'";
                            $query_run = mysqli_query($db, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
								$sn=1;
                                foreach($query_run as $student)
                                {
									
                                    ?>
                                    <tr>
                                        <td><?= $sn ?></td>
                                        <td><?= $student['type'] ?></td>
										<td><?= $student['reason']?></td>
										<td><?= $student['fromd']?></td>
										<td><?= $student['tod']?></td>
		
                                        <td>
										<!--
                                            <button type="button" value="<?=$student['uid'];?>" class="viewStudentBtn btn btn-info btn-sm">View</button>
                                            <button type="button" value="<?=$student['uid'];?>" class="editStudentBtn btn btn-success btn-sm">Edit</button> -->
                                            <button type="button" value="<?=$student['uid'];?>" class="deletepBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
									$sn=$sn+1;
                                }
								
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
				</div>
            </div>
        </div>
    </div>

                                
								
								
								
</div>

<!-- punish tab ending -->									
								
 <div class="tab-pane active"  id="home" role="tabpanel">


<div class="modal fade" id="pcadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"> Add Co-Curricular Participation Details</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form id="pcadd2">
					<div class="modal-body">

								<div id="errorMessage" class="alert alert-warning d-none"></div>

								
								
								<div class="mb-3">
									<label for="">Name of the Event *</label>
									<select class="form-control" name="type" id="type" onchange="if(this.value=='other'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};" required >           
										<option value="">Select type</option>
										<option value="Symposium">Symposium</option>
										<option value="Workshop">Workshop</option>
										<option value="other">Others</option>
									</select>
								</div>
								
								<div class="mb-3">
									
									<input type="text" name="other" Placeholder="Enter Other Event type" class="form-control" />
								</div>
								
								
								<div class="mb-3">
									<label for="">Level *</label>
									<input type="text" name="no" class="form-control" />
								</div>
              
								
								
								<div class="mb-3">
									<label for="">Organizer Details *</label>
									<input type="text" name="title" class="form-control" />
								</div>
              
			  					<div class="mb-3">
									<label for="">Participation / Price *</label>
									<input type="text" name="fd" class="form-control" Placeholder="Enter either Participation / Prize" />
								</div>
								
								<div class="mb-3">
									<label for="">Date *</label>
									<input type="date" name="td" class="form-control" />
								</div>
								
								<div class="mb-3">
									<label for="">Certificate *</label>
									<label for="">(upload less than 2 mb)</label>
									 <div class="input-group">
									 <input type="file" class="form-control custom-file-input" name="cert" id="uploadFile4" onchange="return fileValidation4()" aria-describedby="inputGroupPrepend" required>
									<label class="custom-file-label" for="customFile">Upload here as image</label>
									</div>
									<p style="color:red;" id = "tutorial4"></p>
								</div>

					</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Add Data</button>
							</div>
        </form>
        </div>
    </div>
	
</div>



<div class="modal fade" id="studentViewModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Paper</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
            <div class="modal-body">
			 <img id="image4" src="" alt="Computer man" class="center" style="width:80%;height:80%;">           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Co-curricular details
                        
                        <button type="button" style="float: right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pcadd">
                            Add Details
                        </button>
                    </h4>
                </div>
                <div class="card-body">
		<div class="table-responsive">
                    <table id="myTable4" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><b>S.No</b></th>
								<th><b>Name of the Event</b></th>
								<th><b>Level</b></th>
								<th><b>Organizer Details</b></th>
                                <th><b>Participation / Prize</b></th>
								<th><b>Date</b></th>
                                <th><b>View</b></th>
                                <th text-align="center"><b>Action</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            
							<?php
		
                            $query = "SELECT * FROM training where id='$s'";
                            $query_run = mysqli_query($db, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
								$s=1;
                                foreach($query_run as $student)
                                {
									
                                    ?>
                                    <tr>
                                        <td><?= $s ?></td>
                                        <td><?= $student['type'] ?></td>
                                        <td><?= $student['no'] ?></td>
                                        <td><?= $student['name'] ?></td>
										 <td><?= $student['fromd'] ?></td>
										 <td><?= $student['tod'] ?></td>
										<td text-align="center"><button type="button" id="ledonof" value="<?=$student['uid'];?>" class="btnimg4 btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#studentViewModal4">View</button></td>
                                        <td text-align="center">
                                            <!--<button type="button" value="<?=$student['uid'];?>" class="editfamilyBtn btn btn-success btn-sm">Edit</button> -->
                                            <button type="button" value="<?=$student['uid'];?>" class="deletepcBtn btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
									$s=$s+1;
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
				</div>
            </div>
        </div>
    </div>
	


 



 <!-- Edit Student Modal >
<div class="modal fade" id="studentEditModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="updatefamily">
            <div class="modal-body">

                <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

           <input type="hidden" name="student_id2" id="student_id2" >
		   
		   
		   <div class="mb-3">
									<label for="">Name *</label>
									<input type="text" name="name" id="name2" class="form-control" />
								</div>
								
								<div class="mb-3">
									<label for="">Gender *</label>
									<select class="form-control" name="gender" id="gender" required>           
										<option value="">Select Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Transgender">Transgender</option>
									</select>
								</div>
								<div class="mb-3">Relationship *</label>
									<select class="form-control" name="relationship" id="relationship">
										<option value="">Select Relationship</option>
										<option value="Brother">Brother</option>
										<option value="Brother-in-Law">Brother-in-Law</option>
										<option value="Daughter">Daughter</option>
										<option value="Daughter-in-Law">Daughter-in-Law</option>
										<option value="Father">Father</option>
										<option value="Father-in-Law">Father-in-Law</option>
										<option value="Grand-Daughter">Grand-Daughter</option>
										<option value="Grand-Father">Grand-Father</option>
										<option value="Grand-Mother">Grand-Mother</option>
										<option value="Grand-Son">Grand-Son</option>
										<option value="Husband">Husband</option>
										<option value="Mother">Mother</option>
										<option value="Mother-in-Law">Mother-in-Law</option>
										<option value="Others">Others</option>
										<option value="Sister">Sister</option>
										<option value="Sister-in-Law">Sister-in-Law</option>
										<option value="Son">Son</option>
										<option value="Son-in-Law">Son-in-Law</option>
										<option value="Uncle">Uncle</option>
										<option value="Wife">Wife</option>
									  </select>
								</div>

								<div class="mb-3">
									<label for="">Mobile *</label>
									<input type="text" name="mobile" id="mobile" class="form-control" />
								</div>
 
								</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Update Member</button>
							</div>
		   
		   
		   

				
        </form>
        </div>
    </div>
</div>

-->

    



</div>
								
	
						
						
<!-- Tabs content -->
						
						
						
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
		
		
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).on('submit', '#saveexp', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_exp", true);

            $.ajax({
                type: "POST",
                url: "Acode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#studentAddModal').modal('hide');
                        $('#saveexp')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable2').load(location.href + " #myTable2");
						

                    }else if(res.status == 500) {
						$('#errorMessage').addClass('d-none');
                        $('#studentAddModal').modal('hide');
                        $('#saveexp')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });
		
		
		
		$(document).on('submit', '#pcadd2', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_pc", true);

            $.ajax({
                type: "POST",
                url: "Acode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage4').removeClass('d-none');
                        $('#errorMessage4').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage4').addClass('d-none');
                        $('#pcadd').modal('hide');
                        $('#pcadd2')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable4').load(location.href + " #myTable4");
						

                    }else if(res.status == 500) {
						$('#errorMessage4').addClass('d-none');
                        $('#pcadd').modal('hide');
                        $('#pcadd2')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.editStudentBtn', function () {

            var student_id = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?student_id=" + student_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){
						
						$('#student_id').val(res.data.uid);

                       // $('#course2').val(res.data.course);
						//$('#degree2').val(res.data.Degree);
                        $('#branch').val(res.data.branch);
                        $('#name').val(res.data.iname);
						
                        $('#univ').val(res.data.univ);
                        $('#state').val(res.data.state);
                        $('#ms').val(res.data.mos);
                        $('#mes').val(res.data.mes);
						
                        $('#yc').val(res.data.yc);
                        $('#cs').val(res.data.cs);
                        $('#score').val(res.data.score);
                        $('#cnum').val(res.data.cnum);
						//$('#uploadFile').val(res.data.cert);

                        $('#studentEditModal').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updateStudent', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_student", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#studentEditModal').modal('hide');
                        $('#updateStudent')[0].reset();

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

        $(document).on('click', '.viewStudentBtn', function () {

            var student_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "code.php?student_id=" + student_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#view_Course').text(res.data.course);
                        $('#view_Degree').text(res.data.Degree);
                        $('#view_branch').text(res.data.branch);
						$('#view_iname').text(res.data.iname);
                        $('#view_univ').text(res.data.univ);
						
						$('#view_state').text(res.data.state);
                        $('#view_mos').text(res.data.mos);
                        $('#view_mes').text(res.data.mes);
                        $('#view_yc').text(res.data.yc);
						
						$('#view_cs').text(res.data.cs);
                        $('#view_score').text(res.data.score);
                        $('#view_cn').text(res.data.cnum);
                      

                        $('#studentViewModal').modal('show');
                    }
                }
            });
        });

$(document).on('click', '.btnimg', function () {

            var student_id = $(this).val();
            $.ajax({
                type: "GET",
                url: "Acode.php?student_id=" + student_id,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){


						$("#image").attr("src", res.data.cert);
                      
                        $('#studentViewModal2').modal('show');
                    }
                }
            });
        });


$(document).on('click', '.btnimg1', function () {

            var student_id22 = $(this).val();
            $.ajax({
                type: "GET",
                url: "Acode.php?student_id22=" + student_id22,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){


						$("#image2").attr("src", res.data.paper);
                      
                        $('#studentViewModal3').modal('show');
                    }
                }
            });
        });

$(document).on('click', '.btnimg4', function () {

            var student_id222 = $(this).val();
            $.ajax({
                type: "GET",
                url: "Acode.php?student_id222=" + student_id222,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){


						$("#image4").attr("src", res.data.cert);
                      
                        $('#studentViewModal4').modal('show');
                    }
                }
            });
        });





        $(document).on('click', '.deleteStudentBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var student_id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "Acode.php",
                    data: {
                        'delete_student': true,
                        'student_id': student_id
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable2').load(location.href + " #myTable2");
                        }
                    }
                });
            }
        });

    </script>
		
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
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
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

function fileValidation() {
            var fileInput =
                document.getElementById('validationCustomUsername');
             var fileSize = ((document.getElementById('validationCustomUsername').files[0].size)/1024);
            var filePath = fileInput.value;
         
            // Allowing file type
            var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
             
            if (!allowedExtensions.exec(filePath)) {
				swal("OOPS!", "Only Image Files are allowed!", "error");
                fileInput.value = '';
                return false;
			}
			else
			{
				if (fileSize>2000) {
                swal("OOPS!", "File size should be less than 2MB!", "error");
                fileInput.value = '';
                return false;
			}
			}				
			
        }

function fileValidation2() {
            var fileInput =
                document.getElementById('uploadFile');
             var fileSize = ((document.getElementById('uploadFile').files[0].size)/1024);
            var filePath = fileInput.value;
         document.getElementById("tutorial").innerHTML= " ";
            // Allowing file type
            var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
             
            if (!allowedExtensions.exec(filePath)) {
				var msg="Only Image Files are allowed!";
                fileInput.value = '';
				document.getElementById("tutorial").innerHTML= msg;
			}
			else
			{
				if (fileSize>2000) {
                var msg="File size should be less than 2MB!";
                fileInput.value = '';
				document.getElementById("tutorial").innerHTML= msg;
			}
			}	

			
			
        }
		
		
function fileValidation3() {
            var fileInput =
                document.getElementById('uploadFile2');
             var fileSize = ((document.getElementById('uploadFile2').files[0].size)/1024);
            var filePath = fileInput.value;
         document.getElementById("tutorial2").innerHTML= " ";
            // Allowing file type
                 var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
             
            if (!allowedExtensions.exec(filePath)) {
				var msg="Only images are allowed!";
                fileInput.value = '';
				document.getElementById("tutorial2").innerHTML= msg;
			}
			else
			{
				if (fileSize>2000) {
                var msg="File size should be less than 2MB!";
                fileInput.value = '';
				document.getElementById("tutorial2").innerHTML= msg;
			}
			}	

			
			
        }
		
function fileValidation4() {
            var fileInput =
                document.getElementById('uploadFile4');
             var fileSize = ((document.getElementById('uploadFile4').files[0].size)/1024);
            var filePath = fileInput.value;
         document.getElementById("tutorial4").innerHTML= " ";
            // Allowing file type
                 var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
             
            if (!allowedExtensions.exec(filePath)) {
				var msg="Only images are allowed!";
                fileInput.value = '';
				document.getElementById("tutorial4").innerHTML= msg;
			}
			else
			{
				if (fileSize>2000) {
                var msg="File size should be less than 2MB!";
                fileInput.value = '';
				document.getElementById("tutorial4").innerHTML= msg;
			}
			}	

			
			
        }

</script>


<script>

        $(document).on('submit', '#basic', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_basic", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate2').removeClass('d-none');
                        $('#errorMessageUpdate2').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate2').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                       

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });
		
 $(document).on('submit', '#research', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_research", true);

            $.ajax({
                type: "POST",
                url: "Acode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorresearch').removeClass('d-none');
                        $('#errorresearch').text(res.message);

                    }else if(res.status == 200){

                        $('#errorresearch').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                       

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });		
		
		
$(document).on('submit', '#aprofile', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_aprofile", true);

            $.ajax({
                type: "POST",
                url: "Acode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#erroraprofile').removeClass('d-none');
                        $('#erroraprofile').text(res.message);

                    }else if(res.status == 200){

                        $('#erroraprofile').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                       

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });		
		




		
		
		
$(document).on('submit', '#savejournal', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_journal", true);

            $.ajax({
                type: "POST",
                url: "Acode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#studentAddModal2').modal('hide');
                        $('#savejournal')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable3').load(location.href + " #myTable3");

                    }else if(res.status == 500) {
						$('#errorMessage').addClass('d-none');
                        $('#studentAddModal2').modal('hide');
                        $('#savejournal')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });	
	

$(document).on('submit', '#savepost', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_post", true);
			console.log(formData);

            $.ajax({
                type: "POST",
                url: "Acode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessagepost').removeClass('d-none');
                        $('#errorMessagepost').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessagepost').addClass('d-none');
                        $('#postingadd').modal('hide');
                        $('#savepost')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable5').load(location.href + " #myTable5");

                    }else if(res.status == 500) {
						$('#errorMessagepost').addClass('d-none');
                        $('#postingadd').modal('hide');
                        $('#savepost')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });	

$(document).on('submit', '#savepunish', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_punish", true);
			console.log(formData);

            $.ajax({
                type: "POST",
                url: "Acode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessagepost9').removeClass('d-none');
                        $('#errorMessagepost9').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessagepost9').addClass('d-none');
                        $('#punishadd').modal('hide');
                        $('#savepunish')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable9').load(location.href + " #myTable9");

                    }else if(res.status == 500) {
						$('#errorMessagepost').addClass('d-none');
                        $('#punishadd').modal('hide');
                        $('#savepunish')[0].reset();
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });


	
	
$(document).on('click', '.editfamilyBtn', function () {

            var student_id2 = $(this).val();
            
            $.ajax({
                type: "GET",
                url: "code.php?student_id2=" + student_id2,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 404) {

                        alert(res.message);
                    }else if(res.status == 200){
						
						$('#student_id2').val(res.data.uid);

                        $('#name2').val(res.data.name);
                        $('#gender').val(res.data.gender);
						
                        $('#relationship').val(res.data.relationship);
                        $('#mobile').val(res.data.mobile);
                        

                        $('#studentEditModal2').modal('show');
                    }

                }
            });

        });

        $(document).on('submit', '#updatefamily', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_family", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        
                        $('#studentEditModal2').modal('hide');
                        $('#updatefamily')[0].reset();

                        $('#myTable1').load(location.href + " #myTable1");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });


        $(document).on('click', '.deletefamilyBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var student_id3 = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_family': true,
                        'student_id3': student_id3
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable1').load(location.href + " #myTable1");
                        }
                    }
                });
            }
        });

        $(document).on('click', '.deletepcBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var student_id5 = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "Acode.php",
                    data: {
                        'delete_pc': true,
                        'student_id5': student_id5
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable4').load(location.href + " #myTable4");
                        }
                    }
                });
            }
        });


 $(document).on('click', '.deletejBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var student_id4 = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "Acode.php",
                    data: {
                        'delete_journal': true,
                        'student_id4': student_id4
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable3').load(location.href + " #myTable3");
                        }
                    }
                });
            }
      });




$(document).on('click', '.deletepBtn', function (e) {
            e.preventDefault();

            if(confirm('Are you sure you want to delete this data?'))
            {
                var student_id6 = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "Acode.php",
                    data: {
                        'delete_post': true,
                        'student_id6': student_id6
                    },
                    success: function (response) {

                        var res = jQuery.parseJSON(response);
                        if(res.status == 500) {

                            alert(res.message);
                        }else{
                            alertify.set('notifier','position', 'top-right');
                            alertify.success(res.message);

                            $('#myTable9').load(location.href + " #myTable9");
                        }
                    }
                });
            }
        });



		
</script>


</body>

</html>