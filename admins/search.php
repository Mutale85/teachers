<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
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
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                                <div>Checklist Dashboard
                                    <div class="page-title-subheading">Every Search tokens are deducted, while every addition attracts free search tokens
                                    </div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button type="button" data-toggle="tooltip" title="<?php echo $_SESSION['business_type']?>" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                                    <i class="fa fa-star"></i>
                                </button>
                            </div>    
                        </div>
                    </div>            
                     <!-- DASHEBOARD -->
                    <span class="Dashboard" id="Dashboard"></span>           
                    <!-- DASHEBOARD -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Search Client
                                    <div class="btn-actions-pane-right">
                                        <?php
                                        	$customer_id = "";
                                        	if (isset($_GET['q'])) {
                                        		$customer_id = trim($_GET['q']);
                                        	}
                                        ?>
                                    </div>
                                </div>
                                <div class="card-body">
                                	<?php 
                                		if (getAvailableTokens($connect, $parent_id) == 0) {?>
                                			<p>You have no tokens availables <a href="purchase-tokens" class="text-decoration-none">Purchase Token</a> or <a href="submit-new-client" class="text-decoration-none"> Get Free Tokens</a></p>
                                	<?php	
                                		}else{
                                	?>
                                    <form method="get" id="searchForm" action="search">
										<div class="form-group">
											<label class="mb-2">Enter NRC or License Number</label>
											<input type="text" name="q" id="q" class="form-control" placeholder="NRC / License" required value="<?php echo $customer_id?>">
											<input type="hidden" name="org" id="org" class="form-control" value="<?php echo trim(base64_encode($_SESSION['parent_id']))?>">
										</div>
										<button type="submit" id="submit_customer" class="btn btn-primary">Search</button>
									</form>
                                
                                    <?php
                                    	}
                                    	if (isset($_GET['q'])) {
											$customer_id 	= trim($_GET['q']);
											$parent_id 		= $_SESSION['parent_id'];
											$user_id   		= $_SESSION['user_id'];

											echo searchCounterUpdater($connect, $parent_id, $user_id, $customer_id);
											$query = $connect->prepare("SELECT * FROM car_hiring_customers WHERE customer_id = ? OR licence = ? ");
											$query->execute(array($customer_id, $customer_id));
											$rowcount = $query->rowCount();
											if ($rowcount > 0) {?>
												<div class="mt-5">
													<div class="card card-info">
														<div class="card-header">
															<h5 class="card-title">Client Result</h5>
														</div>
														<div class="card-body">
															<div class="table table-responsive">
																<table class="table table-striped" id="customersTable" style="width: 100%;">
																	<thead>
																		<tr>
																			<th>Client Names</th>
																			<th>Client ID</th>
																			<th>License</th>
																			<th>Default Status</th>
																			<th>Remarks</th>
																			<th>Listed By</th>
																		</tr>
																	</thead>
																	<tbody id="search_result">
																	<?php
																		foreach ($query->fetchAll() as $row) {
																			extract($row);
																			if($defaulted == 1){
																				$status = '<span class="text-danger">Defaulted</span>
																						'; 
																			}else{
																				$status = 'Cleared';
																			}
																	?>
																		<tr>
																			<td><?php echo $firstname ?> <?php echo $lastname ?></td>
																			<td><?php echo $customer_id ?></td>
																			<td><?php echo $licence ?></td>
																			<td><?php echo $status?></td>
																			<td><?php echo $remarks?></td>
																			<td><?php echo getCompanyName($connect, $company_id)?></td>
																		</tr>
																	<?php
																		}
																	?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
                                                <script>
                                                    callDashBoard();
                                                </script>
										<?php	
											}else{?>
												<div class="mt-5 d-flex justify-content-between">
												 	<p class="fs-5"><b><?php echo $customer_id ?></b> has not been registered yet </p>
												 	<p class="fs-5"><a href="submit-new-client" class="text-decoration-none">Add User and Earn Search Tokens</a></p>
												</div>
                                                <script>
                                                    callDashBoard();
                                                </script>
									<?php		}
										}
                                    ?>
                                </div>
                                <div class="d-flex justify-content-between card-footer">
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
    	$(function(){
    		$("#customersTable").DataTable();
    	})
        callDashBoard();
    </script>
</body>
</html>
