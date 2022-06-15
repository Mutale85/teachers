<?php
	include 'db.php';
	if (isset($_POST['unit_id'])) {
		$unit_id = $_POST['unit_id'];
		$query = $connect->prepare("SELECT * FROM civilian_residents WHERE parent_id = ?");
		$query->execute(array($unit_id));
		if ($query->rowCount() > 0) {
			foreach ($query->fetchAll() as $row) {
				extract($row);
		?>
			<tr>
				<td>
					<table class="table table-bordered">
						<tr>
							<th>Man Number</th>
							<td><?php echo $service_number;?></td>
						</tr>
						<tr>
							<th>Names</th>
							<td><?php echo $firstname;?> <?php echo $surname;?></td>
						</tr>
						<tr>
							<th>Occupation</th>
							<td><?php echo $occupation;?></td>
						</tr>
						<tr>
							<th>Working Station</th>
							<td><?php echo $deployment_station;?></td>
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
							<th>Phone Number</th>
							<td><?php echo $phone_number;?></td>
						</tr>
						<tr>
							<th>Gender</th>
							<td><?php echo $gender;?></td>
						</tr>
						<tr>
							<th>Marrital Status</th>
							<td><?php echo $marital_status;?></td>
						</tr>
						
						<tr>
							<th>More Info</th>
							<td><a href="civilian/<?php echo preg_replace("#[^0-9]#", "_", $service_number);?>" class="editCivilian text-decoration-none"> <i class="bi bi-info-square"></i> More Info</a></td>
						</tr>
						<tr>
							<th>Edit</th>
							<td><a href="edit-civilian?service_number=<?php echo $service_number;?>&unit_id=<?php echo $parent_id?>" class="editCivilian text-decoration-none"> <i class="bi bi-pen"></i></a></td>
						</tr>
						<tr>
							<th>Remove</th>
							<td><a href="<?php echo $service_number;?>" class="deleteCivilian text-decoration-none text-danger"><i class="bi bi-trash"></i> Delete</a></td>
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