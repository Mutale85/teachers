<?php
	include 'db.php';
	if (isset($_POST['unit_id'])) {
		$unit_id = $_POST['unit_id'];
		$query = $connect->prepare("SELECT * FROM service_personnel WHERE parent_id = ?");
		$query->execute(array($unit_id));
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
							<td><a href="personnel/<?php echo $service_number;?>" class=" text-decoration-none "><i class="bi bi-info-circle"></i> More Details</a></td>
						</tr>
						<tr>
							<th>Edit</th>
							<td><a href="edit-personnel?service_number=<?php echo $service_number;?>&unit_id=<?php echo $parent_id?>" class="editPersonnel text-decoration-none"> <i class="bi bi-pencil-square"></i> Edit</a></td>
						</tr>
						<tr>
							<th>Remove</th>
							<td><a href="<?php echo $service_number;?>" class="deletePersonnel text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
						</tr>

					</table>
				</td>
			</tr>
		<?php
			}
		}else{

		}
	}

?>