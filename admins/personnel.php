<base href="http://localhost/zaflusaka/admins/">
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");
    	$service_number = basename($_SERVER['REQUEST_URI']);
    ?>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include("logo.php");?>      
        <div class="app-main">
            <!-- include navigation -->
            <?php include 'nav.php'; ?>
            <!-- end of nav -->    
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                       
                    </div>            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Service Personnel Residents
                                   
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="service_personnel_table">
                                            <thead>
												<tr>
													<th>Personnel Details</th>
													<th>Other Details</th>
												</tr>
											</thead>
											<tbody id="service_personnel_data">
												<?php
													$parent_id = $_SESSION['parent_id'];

													$query = $connect->prepare("SELECT * FROM service_personnel WHERE parent_id = ?  AND service_number = ?");
													$query->execute(array($parent_id, $service_number));
													if ($query->rowCount() > 0) {
														foreach ($query->fetchAll() as $row) {
															extract($row);
															
													?>
														<tr>
															<td>
																<table class="table table-bordered">
																	<tr>
																		<th>Service Number</th>
																		<td><?php echo $service_number ?></td>
																	</tr>
																	<tr>
																		<th>Rank</th>
																		<td><?php echo $rank;?></td>
																	</tr>
																	<tr>
																		<th>Names</th>
																		<td><?php echo $firstname;?> <?php echo $surname;?></td>
																	</tr>
																	<tr>
																		<th>Trade / Branch</th>
																		<td><?php echo $trade_branch;?></td>
																	</tr>
																	<tr>
																		<th>Unit</th>
																		<td><?php echo $unit?></td>
																	</tr>
																	<tr>
																		<th>Residential Address</th>
																		<td><?php echo nl2br($quarter_number)?></td>
																	</tr>
																</table>
															</td>
															
															<td>
																<table class="table table-bordered">
																	<tr>
																		<th>Gender</th>
																		<td><?php echo $gender?></td>
																	</tr>
																	<tr>
																		<th>Marital Status</th>
																		<td><?php echo $marital_status?></td>
																	</tr>
																	<tr>
																		<th>Phone</th>
																		<td><?php echo $phone_number;?></td>
																	</tr>
																	<tr>
																		<th>View More</th>
																		<td><a href="personnel/<?php echo $service_number;?>" class=" text-decoration-none"><i class="bi bi-info-circle"></i> More Details</a></td>
																	</tr>
																	<tr>
																		<th>Edit</th>
																		<td><a href="edit-personnel?service_number=<?php echo $service_number;?>&unit_id=<?php echo $parent_id?>" class="editCustomers text-decoration-none"> <i class="bi bi-pencil-square"></i> Edit</a></td>
																	</tr>
																	<tr>
																		<th>Remove</th>
																		<td><a href="<?php echo $service_number;?>" class="deleteCustomers text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
																	</tr>
																</table>
															</td>
														</tr>
													<?php
														}
													}else{

													}
												?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Children and Dependants
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="children">
                                            <thead>
												<tr>
													<th>#</th>
													<th>Full names</th>
													<th>Age</th>
													<th>NRC Number</th>
													<th>Gender</th>
													<th>Occupation</th>
													<th>Relationship</th>
													<th>Education Level</th>
													<th>Edit</th>
													<th>Remove</th>
												</tr>
											</thead>
											<tbody id="civilian_personnel_data">
												<?php
													$i = 1;
													$parent_id = $_SESSION['parent_id'];
													$query = $connect->prepare("SELECT * FROM children_and_dependants WHERE service_number = ? AND parent_id = ?");
													$query->execute(array($service_number, $parent_id));
													if ($query->rowCount() > 0) {
														foreach ($query->fetchAll() as $row) {
															extract($row);
															
													?>
														<tr>
															<td><?php echo $i++?></td>
															<td><?php echo $fullnames;?></td>
															<td><?php echo $date_of_birth;?></td> 
															<td><?php echo $nrc;?></td>
															<td><?php echo $gender;?></td>
															<td><?php echo $occupation;?></td>
															<td><?php echo $relationship;?></td>
															<td><?php echo $level_of_education;?></td>
															<td><a href="<?php echo $id;?>" class="editChild text-decoration-none"> <i class="bi bi-pen"></i></a></td>
															<td><a href="<?php echo $id;?>" class="deleteChild text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
														</tr>
													<?php 
														}
													}else{

													}
												?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-block d-flex justify-content-between card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Motor Vehicles
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="children">
                                            <thead>
												<tr>
													<th>#</th>
													<th>Vehicle Make</th>
													<th>Model</th>
													<th>Year</th>
													<th>Reg Number</th>
													<th>Color</th>
													<th>Remarks</th>
													<th>Edit</th>
													<th>Remove</th>
												</tr>
											</thead>
											<tbody id="civilian_personnel_data">
												<?php
													$i = 1;
													$parent_id = $_SESSION['parent_id'];
													$query = $connect->prepare("SELECT * FROM motor_vehicles WHERE service_number = ? AND parent_id = ?");
													$query->execute(array($service_number, $parent_id));
													if ($query->rowCount() > 0) {
														foreach ($query->fetchAll() as $row) {
															extract($row);
															
													?>
														<tr>
															<td><?php echo $i++?></td>
															<td><?php echo $make;?></td>
															<td><?php echo $model;?></td> 
															<td><?php echo $year;?></td>
															<td><?php echo $reg_number;?></td>
															<td><?php echo $color;?></td>
															<td><?php echo $remarks;?></td>
															<td><a href="<?php echo $id;?>" class="editvehicle text-decoration-none"> <i class="bi bi-pen"></i></a></td>
															<td><a href="<?php echo $id;?>" class="deletevehicle text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
														</tr>
													<?php 
														}
													}else{

													}
												?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-block d-flex justify-content-between card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Private Employees
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="children">
                                            <thead>
												<tr>
													<th>#</th>
													<th>Full names</th>
													<th>Age</th>
													<th>NRC Number</th>
													<th>Gender</th>
													<th>Address</th>
													<th>Engagement</th>
													<th>Edit</th>
													<th>Remove</th>
												</tr>
											</thead>
											<tbody id="civilian_personnel_data">
												<?php
													$i = 1;
													$parent_id = $_SESSION['parent_id'];
													$query = $connect->prepare("SELECT * FROM private_employees WHERE service_number = ? AND parent_id = ?");
													$query->execute(array($service_number, $parent_id));
													if ($query->rowCount() > 0) {
														foreach ($query->fetchAll() as $row) {
															extract($row);
															
													?>
														<tr>
															<td><?php echo $i++?></td>
															<td><?php echo $fullnames;?></td>
															<td><?php echo $date_of_birth;?></td> 
															<td><?php echo $nrc;?></td>
															<td><?php echo $gender;?></td>
															<td><?php echo $address;?></td>
															<td><?php echo $employee_type;?></td>
															<td><a href="<?php echo $id;?>" class="editEmployee text-decoration-none"> <i class="bi bi-pen"></i></a></td>
															<td><a href="<?php echo $id;?>" class="deleteEmployee text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
														</tr>
													<?php 
														}
													}else{

													}
												?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-block d-flex justify-content-between card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FOOTER -->
                <?php include 'footer.php'; ?> 
                <!-- FOOTER END -->
            </div>
        </div>
    </div>
    <script>
    	$("#service_personnel_table, #children").DataTable();
    </script>
</body>
</html>
