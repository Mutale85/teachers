<?php
	include 'db.php';
	if (isset($_POST['nrc_lincense'])) {
		$nrc_lincense = $_POST['nrc_lincense'];
		$query = $connect->prepare("SELECT * FROM customers WHERE customer_id = ? OR licence = ?  ");
		$query->execute(array($nrc_lincense, $nrc_lincense));
		if ($query->rowCount() > 0) {?>
			<div class="col-md-12 mt-5">
				<div class="card card-info">
					<div class="card-header">
						<h5 class="card-title">Client Search</h5>
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
											$status = '<p>Defaulted<p>
														<p>'.$currency.' '.$amount_defaulted.'</p>
														<p>Date: '.date("F j, Y", strtotime($date_defaulted)).'</p>
													'; 
										}else{
											$status = 'Clean Customer';
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
	<?php	
		}else{
			echo $nrc_lincense . ' has no issues ';
		}
	}

?>