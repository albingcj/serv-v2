 <?php
require 'config.php';
//include("session.php");
?>
<?php
				 if(isset($_POST['input']))
				 {
					 ?>

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                   <!-- <img src=".\assets\images\profile\1152018.jpg" alt="Admin" class="rounded-circle" width="150"> -->
					<img src="<?php echo $k;?>" alt="" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $n; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $de;?></p>
                      <p class="text-muted font-size-sm"><?php echo $dep;?></p>
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">ORCID</h6>
                    <span class="text-secondary"> <?php echo $oid; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Scopus ID</h6>
                    <span class="text-secondary"> <?php echo $sid; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Researcher ID</h6>
                    <span class="text-secondary"> <?php echo $rid; ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Google Scholar ID</h6>
                    <span class="text-secondary"> <?php echo $gsid; ?></span>
                  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">H-Index</h6>
                    <span class="text-secondary"> <?php echo $hid; ?></span>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">i10-Index</h6>
                    <span class="text-secondary"> <?php echo $iid; ?></span>
                  </li>
				                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">G-Index</h6>
                    <span class="text-secondary"> <?php echo $gi; ?></span>
                  </li>
				  				                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Citations Scopus</h6>
                    <span class="text-secondary"> <?php echo $cs; ?></span>
                  </li>
				  				                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Citations Google Scholar</h6>
                    <span class="text-secondary"> <?php echo $cgs; ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $n; ?>
                    </div>
                  </div>
                  <hr>
				  
				    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $g; ?>
                    </div>
                  </div>
                  <hr>
				  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $e; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">	Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $d; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $m; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      	<?php echo $a; ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-12 mb-3">
                  <div class="card h-100">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-0">Qualification</h5>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"><b>Course</b></th>
                                        <th scope="col"><b>Institutions</b></th>
                                        <th scope="col"><b>Year</b></th>
                                    </tr>
                                </thead>
								<?php
								$records = mysqli_query($db,"select *from academic where id='$s'");
								while($data = mysqli_fetch_array($records))
								{
									?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $data['course']; ?></td>
                                        <td><?php echo $data['iname']; ?></td>
                                        <td><?php echo $data['yc']; ?></td>
                                    </tr>
                                </tbody>
								<?php } ?>
                            </table>
                        </div>
                  </div>
                </div>
              </div>



            </div>

					<!-- family Start -->
			
			<div class="col-sm-12 mb-3">
			<div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Family Details</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>S.No</b></th>
												<th><b>Name</b></th>
												<th><b>Relationship</b></th>
												<th><b>Mobile</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$query2 = "SELECT * FROM family where id='$s'";
										$query_run2 = mysqli_query($db, $query2);

										if(mysqli_num_rows($query_run2) > 0)
										{
											$sn=1;
											foreach($query_run2 as $student2)
											{
                                    ?>

                                            <tr>
                                                <td><?php echo $sn;?></td>
												 <td><?= $student2['name'] ?></td> 
												 <td><?= $student2['relationship'] ?></td>
												  <td><?= $student2['mobile'] ?></td>

                                                
										
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
						
						<!-- family end -->
			
						<!-- exp Start -->
			
			<div class="col-sm-12 mb-3">
			<div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Experience Details</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>S.No</b></th>
												<th><b>Institution/Corporate Name</b></th>
												<th><b>Designation</b></th>
												<th><b>From</b></th>
												<th><b>To</b></th>
												<th><b>Duration</b></th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										$query = "SELECT * FROM exp where id='$s'";
                            $query_run = mysqli_query($db, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $student)
                                {
									
									if($student['tod']=="0000-00-00")
										{
											$ssss= "Current";
										}
										
										else
										{
										$ssss= $student['tod'];
										}
									
                                    ?>
                                    <tr>
                                        <td><?= $student['type'] ?></td>
                                        <td><?= $student['iname'] ?></td>
                                        <td><?= $student['design'] ?></td>
                                        <td><?= $student['fromd'] ?></td>
                                        <td><?php echo $ssss; ?></td>
										<td><?= $student['exp'] ?></td>
										
                                    </tr>
				
                                    <?php
                                }
                            }
                            ?>
                                                

                                        
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
						</div>
						
						<!-- exp end -->
			
			<!-- posting Start -->
			
			<div class="col-sm-12 mb-3">
			<div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Posting Details</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>S.No</b></th>
												<th><b>Level</b></th>
												<th><b>Posting Name</b></th>
												<th><b>From</b></th>
												<th><b>To</b></th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
                            

                            $query = "SELECT * FROM posting where id='$s'";
                            $query_run = mysqli_query($db, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
								$sn=1;
                                foreach($query_run as $student)
                                {
									if($student['tod']=="0000-00-00")
										{
											$sss= "Current";
										}
										
										else
										{
										$sss= $student['tod'];
										}
									
                                    ?>
                                    <tr>
                                        <td><?= $sn ?></td>
                                        <td><?= $student['level'] ?></td>
										<td><?= $student['pname']?></td>
										<td><?= $student['fromd']?></td>
										<td><?php echo $sss; ?></td>
		
                                       
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
						
						<!-- posting end -->
						
						
		<!-- Training Start -->
			
			<div class="col-sm-12 mb-3">
			<div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Training Details</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>S.No</b></th>
												<th><b>Type of Training</b></th>
												<th><b>Name of the organization</b></th>
												<th><b>Title</b></th>
												<th><b>From</b></th>
												<th><b>To</b></th>
												
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
		
                            $query = "SELECT * FROM training where id='$s'";
                            $query_run = mysqli_query($db, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
								$sno=1;
                                foreach($query_run as $student)
                                {
									
                                    ?>
                                    <tr>
                                        <td><?= $sno ?></td>
                                        <td><?= $student['type'] ?></td>
                                        <td><?= $student['no'] ?></td>
                                        <td><?= $student['name'] ?></td>
										 <td><?= $student['fromd'] ?></td>
										 <td><?= $student['tod'] ?></td>
										
                                    </tr>
                                    <?php
									$sno=$sno+1;
                                }
                            }
                            ?>
                                                

                                        
                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
						</div>
						
						<!-- training end -->
   </div>
   
				 <?php } ?>