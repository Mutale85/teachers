<?php
	include '../../includes/db.php';

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		$parent_id = $_POST['parent_id'];
		if ($action == 'chart_display') {
			$query = $connect->prepare("SELECT *, COUNT(id) AS all_incomes, SUM(income_amount) AS total_amount FROM `income_table` WHERE parent_id = ? ");
	        $query->execute(array( $parent_id));
	        $count_income = $query->rowCount();
	        if($count_income > 0){
	        	$row = $query->fetch();
	        	if ($row) {
	        		$total_income = $row['total_amount'];
	        		$all_incomes = $row['all_incomes'];
	        	}
	        }else{
	        	$zero = 0;
	        	$total_income = $zero;
	        }

			$query = $connect->prepare("SELECT *, COUNT(id) AS all_expenses, SUM(expense_amount) AS total_amount FROM `expenses` WHERE parent_id = ? ");
	        $query->execute(array( $parent_id));
	        $count_expenses = $query->rowCount();
	        if($count_expenses > 0){
	        	$row = $query->fetch();
	        	if ($row) {
	        		$total_expenses = $row['total_amount'];
	        		$all_expenses = $row['all_expenses'];
	        	}
	        }else{
	        	$zero = 0;
	        	$total_expenses = $zero;
	        }

	        if ($total_expenses > $total_income) {
	        	$balance = 0;
	        }else{
	        	$balance = $total_income - $total_expenses;
	    	}
	    	$currency = $row['currency'];
	    ?>
	    	<div class="row">
	    		<div class="col-md-6 mb-4">
			    	<div class="card">
						<div class="card-header">
							<h4 class="card-title">Transactions</h4>
						</div>
						<div class="card-body">
							
							<canvas id="donutChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
							<div class="mb-2 text-success">
								Income : <?php echo $currency;?> <?php echo number_format($total_income, 2); ?>
							</div>
							<div class="mb-2 text-danger">
								Expenses : <?php echo $currency;?> <?php echo number_format($total_expenses, 2); ?>
							</div>
							<div class="mb-2 text-secondary">
								Balance: <?php echo $currency;?> <?php echo number_format($balance, 2); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-4">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Budget Status</h4>
						</div>
						<div class="card-body">
							<div class="expenses">
								<div class="d-flex justify-content-between">
									<div><i class="bi bi-circle text-danger"></i> <span class="text-secondary">Expenses</span></div>
									<div><?php echo $all_expenses ?> Transactions </div>
								</div>
								<div class="progress mb-3" style="height:30px; border-radius: 5px;">
								<div class="progress-bar bg-danger" style="width:<?php echo $all_expenses * 10 ?>%; height:30px; border-radius: 5px;"></div>
							</div>
						</div>
						<div class="income">
							<div class="d-flex justify-content-between">
								<div><i class="bi bi-circle text-success"></i> <span class="text-secondary">Income</span></div>
								<div><?php echo $all_incomes ?> Transactions</div>
							</div>
							<div class="progress mb-3" style="height:30px; border-radius: 5px;">
								<div class="progress-bar bg-success" style="width:<?php echo $all_incomes * 10?>%; height:30px; border-radius: 5px;"></div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
			    var donutData        = {
			      	labels: [
			          	'Expenses <?php echo $currency;?>',
			          	'Income <?php echo $currency;?>',
			          	'Balance <?php echo $currency;?>',
			      	],
			      	datasets: [
			        	{
			          		data: [<?php echo $total_expenses ?>,<?php echo $total_income?>, <?php echo $balance?>],
			          		backgroundColor : ['#f56954', '#00a65a', '#d2d6de'],
			        	}
			     	]
			    }
			    var donutOptions     = {
			      maintainAspectRatio : false,
			      responsive : true,
			    }
			    //Create pie or douhnut chart
			    // You can switch between pie and douhnut using the method below.
			    new Chart(donutChartCanvas, {
			      type: 'doughnut',
			      data: donutData,
			      options: donutOptions
			    })
			</script>
		<?php

		}

		if ($action == 'tables_display') {
		?>
			<div class="row">
				<div class="col-md-6 mb-4">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Income Table </h4>
						</div>
						<div class="card-body">
	  						<div class="table table-responsive">
	  							<table class="table table-striped" id="incomeTable">
	  								<thead>
	  									<tr>
	  										<th>Name</th>
	  										<th>Date</th>
	  										<th>Amount</th>
	  										<th>Actions</th>
	  									</tr>
	  								</thead>
	  								<tbody class="text-dark">
	  									<?php
	  										$number = 1;
	  										$query = $connect->prepare("SELECT * FROM income_table WHERE parent_id = ? ORDER BY income_date ");
	  										$query->execute(array( $parent_id));
	  										if ($query->rowCount() > 0) {
	  											foreach ($query->fetchAll() as $row) {
	  												extract($row);
	  											

	  									?>
	  										<tr>
	  											<td><?php echo $income_name ?></td>
	  											<td><?php echo date("d M,Y", strtotime($income_date)) ?></td>
	  											<td><?php echo $currency ?> <?php echo number_format($income_amount,2) ?></td>
	  											<td>
	  												<div class="btn-group">
	  													<a href="" data-id="<?php echo $id?>" class="editIncome btn-sm btn btn-primary"><i class="bi bi-pencil-square"></i></a>
	  													<a href="" data-id="<?php echo $id?>" class="deleteIncome btn-sm btn btn-danger"><i class="bi bi-trash"></i></a>
													</div>
	  											</td>
	  											
	  										</tr>
	  									<?php			
	  											}
	  										}else{

	  										}

	  									?>
	  								</tbody>
	  								<?php
	  								$query = $connect->prepare("SELECT *, SUM(income_amount) AS total_incomes FROM income_table WHERE parent_id = ?  ");
	  								$query->execute(array( $parent_id));
	  								$rows = $query->fetch();
	  								if ($rows) {
	  									$total_incomes = $rows['total_incomes'];
	  									$currency = $rows['currency'];	
	  								}
	  								?>
	  								<tfoot>
	  									<tr>
	  										<th>Total Income</th>
	  										<th></th>
	  										<th><?php echo $currency;?><?php echo number_format($total_incomes,2)?></th>
	  										<th></th>
	  									</tr>
	  								</tfoot>
	  							</table>
	  						</div>
	  					</div>
  					</div>
  				</div>
				<div class="col-md-6 mb-4">
					<div class="card ">
						<div class="card-header">
							<h4 class="card-title">Expenses Table</h4>
						</div>
						<div class="card-body">
	  						<div class="table table-responsive">
	  							<table class="cell-table  table-sm" id="expensesTable" style="width: 100%">
	  								<thead>
	  									<tr>
	  										
	  										<th>Name</th>
	  										<th>Date</th>
	  										<th>Amount</th>
	  										<th>Action</th>
	  									</tr>
	  								</thead>
	  								<tbody class="text-dark">
	  									<?php
	  										$number = 1;
	  										$query = $connect->prepare("SELECT * FROM expenses WHERE parent_id = ? ORDER BY expense_date ");
	  										$query->execute(array( $parent_id));
	  										if ($query->rowCount() > 0) {
	  											foreach ($query->fetchAll() as $row) {
	  												extract($row);

	  									?>
	  										<tr>
	  											
	  											<td><?php echo $expense_name ?></td>
	  											<td><?php echo date("d M,Y", strtotime($expense_date)) ?></td>
	  											<td><?php echo $currency;?> <?php echo number_format($expense_amount, 2) ?></td>
	  											<td>
	  												<div class="btn-group">
	  													<a href="" data-id="<?php echo $id?>" class="editExpense btn-sm btn btn-primary"><i class="bi bi-pencil-square"></i></a>
														<a href="" data-id="<?php echo $id?>" class="deleteExpense btn-sm btn btn-danger"><i class="bi bi-trash"></i></a>
	  												</div>
	  											</td>
	  										</tr>
	  									<?php			
	  											}
	  										}else{

	  										}

	  									?>
	  								</tbody>
	  								<?php
	  								$query = $connect->prepare("SELECT *, SUM(expense_amount) AS total_expenses FROM expenses WHERE parent_id = ? ORDER BY expense_date ");
	  								$query->execute(array( $parent_id));
	  								$rows = $query->fetch();
	  								if ($rows) {
	  									$total_expenses = $rows['total_expenses'];
	  									$currency = $rows['currency'];	
	  								}
	  								?>
	  								<tfoot>
	  									<tr>
	  										<th>Total Expenses</th>
	  										<th></th>
	  										<th><?php echo $currency;?> <?php echo number_format($total_expenses, 2)?></th>
	  										<th></th>
	  									</tr>
	  								</tfoot>
	  							</table>
	  						</div>
	  					</div>
  					</div>
				</div>
			</div>
			<script>
				$("#expensesTable").DataTable();
		 		$("#incomeTable").DataTable();
			</script>
		<?php
		}
	}
?>