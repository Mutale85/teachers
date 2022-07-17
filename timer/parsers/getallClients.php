<?php
	include "../../includes/db.php";
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		if ($action == 'getallClients') {
			$parent_id = $_POST['parent_id'];
			$query = $connect->prepare("SELECT * FROM `clients_details` WHERE parent_id = ? AND user_delete = '0' ");
			$query->execute(array($parent_id));
			if ($query->rowCount() > 0) {?>
			<div class="table table-responsive">
				<table class="cell-table table table-striped" id="clientTable">
					<thead>
						<tr>
							<th>Names</th>
							<th>Company</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody id="divBody">
		<?php
				foreach ($query->fetchAll() as $row) {
					extract($row);
		?>
					<tr>
						<td><?php echo $client_name;?></td>
						<td><?php echo $company_name;?></td>
						<td><?php echo $email;?></td>
						<td><?php echo $phone;?></td>
						<td>
							<div class="btn-group">
								<a href="<?php echo $client_id?>" class="btn btn-outline-primary editClient"><i class="bi bi-pencil-square"></i></a>
								<a href="<?php echo $client_id?>" class="btn btn-outline-danger deleteClient"><i class="bi bi-trash"></i></a>
							</div>
						</td>
					</tr>

		<?php
				}
		?>
				</tbody>
			</table>
		</div>
		<script>
			$("#clientTable").DataTable();
		</script>
		<?php
			}

		}
	}
?>