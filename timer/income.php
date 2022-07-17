<?php 
  	require ("../includes/db.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Income Details</title>
	<?php include("main_header.php") ?>
	<style>
		@media screen and (max-width: 992px) {
			th, td {
				font-size: 13px;
				color: red;
			}
		}

		@media screen and (max-width: 600px) {
	  		th, td {
				font-size: 13px;
				color: blue;
			}
		}
	</style>
</head>
<body>
	<?php include ("nav_bar.php"); ?>
	<div class="container-fluid">
		
		<div class="container">
			<section class="row">
      			<div class="col-md-12">
      				<button class="btn btn-outline-success mb-3" type="button"  data-bs-toggle="modal" data-bs-target="#modalIncome"><i class="bi bi-coin"></i> Add Income</button>
      				<button class="btn btn-outline-danger mb-3" type="button"  data-bs-toggle="modal" data-bs-target="#modalExpenses"><i class="bi bi-wallet2"></i> Add Expenses</button>
      				<div class="row">
      					<div class="col-md-12" id="chart_display"></div>

      					<div class="col-md-12" id="tables_display"></div>
      					
      				</div>
      			</div>

      			<!-- Modal Income Form -->
      			<div class="modal fade" id="modalIncome">
					<div class="modal-dialog">
						<div class="modal-content">
							<form  method="post" id="incomeForm" enctype="multipart/form-data">
								<div class="modal-header">
									<h4 class="modal-title">New Income Record</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label for="">Name</label>
										<div class="input-group">
											<span class="input-group-text"><i class="bi bi-wallet"></i></span>
											<input type="text" name="name" id="name" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label>Date</label>
										<div class="input-group">
											<span class="input-group-text"><i class="bi bi-calendar"></i></span>
											<input type="date" name="date" id="date" class="form-control" autocomplete="off">
										</div>
									</div>
									<div class="form-group">
										<label>Amount</label>
										<div class="input-group">
											<select class="form-control" name="currency" id="currency" required>
												<option value="">Select Currency</option>
												<option value="USD">USD</option>
												<option value="ZMW">ZMW</option>
												<option value="RAND">RAND</option>
												<option value="BPD">BPD</option>
											</select>
											<input type="number" name="amount" id="amount" step="any" class="form-control">
										</div>
										
									</div>
								</div>
								<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_SESSION['parent_id']?>">
								<input type="hidden" name="ID" id="ID">
								<div class="modal-footer justify-content-between">
									<button class="btn btn-outline-primary " type="submit" id="incomeBtn">Submit Income</button>
									<button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Modal for Expenses -->
				<div class="modal fade" id="modalExpenses">
					<div class="modal-dialog">
						<div class="modal-content">
							<form  method="post" id="expenseForm" enctype="multipart/form-data">
								<div class="modal-header">
									<h4 class="modal-title">New Expense Record</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
										
									</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label for="">Name</label>
										<div class="input-group">
											<span class="input-group-text"><i class="bi bi-wallet"></i></span>
											<input type="text" name="name" id="_name" class="form-control">
										</div>
									</div>
									<div class="form-group">
										<label>Date</label>
										<div class="input-group">
											<span class="input-group-text"><i class="bi bi-calendar"></i></span>
											<input type="date" name="date" id="_date" class="form-control" autocomplete="off">
										</div>
									</div>
									<div class="form-group">
										<label>Amount</label>
										<div class="input-group">
											<select class="form-control" name="currency" id="currency" required>
												<option value="">Select Currency</option>
												<option value="USD">USD</option>
												<option value="ZMW">ZMW</option>
												<option value="RAND">RAND</option>
												<option value="BPD">BPD</option>
											</select>
											<input type="number" name="amount" id="_amount" step="any" class="form-control">
										</div>
										
									</div>
								</div>
								<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_SESSION['parent_id']?>">
								<input type="hidden" name="ID" id="_ID">
								<div class="modal-footer justify-content-between">
									<button class="btn btn-outline-primary " type="submit" id="expenseBtn">Submit Expense</button>
									<button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
								</div>
							</form>
						</div>
					</div>
				</div>
      		</section>
      	</div>
      
    </div>
	<script src="../dist/chart.js/Chart.min.js"></script>

	<script>
		$("#date, #_date").datepicker({
			format: 'yyyy-mm-dd',
			autoclose:true,
			startDate: '-3d',
			defaultViewDate: 'today',
			getDate:true
		});
		

		
		// ============================== ADD ADMINS ==========================================

		$(function(){
			$("#incomeForm").submit(function(e){
				e.preventDefault();
				var name = document.getElementById('name');
				var amount = document.getElementById('amount');
				var incomeForm = document.getElementById('incomeForm');
				var data = new FormData(incomeForm);
				var url = 'incomes/submit_income';
				$.ajax({
					url:url+'?<?php echo time()?>',
					method:"post",
					data:data,
					cache : false,
					processData: false,
					contentType: false,
					beforeSend:function(){
						$("#incomeBtn").html("<span class='spinner-border spinner-border-sm text-success'></span> Loading...");
					},
					success:function(data){
						successNow(data);
						displayIncomeExpense();
						displayIncomeExpenseTables();
						$("#incomeBtn").html("Submit Income");
					}
				})
			})

			$("#expenseForm").submit(function(e){
				e.preventDefault();
				var name = document.getElementById('name');
				var amount = document.getElementById('amount');
				var expenseForm = document.getElementById('expenseForm');
				var data = new FormData(expenseForm);
				var url = 'incomes/submit_expense';
				$.ajax({
					url:url+'?<?php echo time()?>',
					method:"post",
					data:data,
					cache : false,
					processData: false,
					contentType: false,
					beforeSend:function(){
						$("#expenseBtn").html("<span class='spinner-border spinner-border-sm text-danger'></span> Loading...");
					},
					success:function(data){
						successNow(data);
						displayIncomeExpense();
						displayIncomeExpenseTables();
						$("#expenseBtn").html("Submit Expense");
					}
				})
			})
	

		// ============= EDIT AND DELETE EXPENSE 
			$(document).on("click",".editExpense", function(e){
				e.preventDefault();
				$("#modalExpenses").modal("show");
				var expense_id = $(this).data("id");
				// alert(id);
				$.ajax({
					url:"incomes/editExpense",
					method:"post",
					data:{expense_id:expense_id},
					dataType:"JSON",
					success:function(data){
						$('#_ID').val(data.id);
						$('#_name').val(data.expense_name);
						$('#_amount').val(data.expense_amount);
						$('#_date').val(data.expense_date);
					}
				})
			})

		//=========== income ======== editIncome

			$(document).on("click",".editIncome", function(e){
				e.preventDefault();
				$("#modalIncome").modal("show");
				var income_id = $(this).data("id");
				$.ajax({
					url:"incomes/editExpense",
					method:"post",
					data:{income_id:income_id},
					dataType:"JSON",
					success:function(data){
						$('#ID').val(data.id);
						$('#name').val(data.income_name);
						$('#amount').val(data.income_amount);
						$('#date').val(data.income_date);
					}
				})
			})

		
		
		//========== DELETE INCOME =====================

			$(document).on("click",".deleteIncome", function(e){
				e.preventDefault();
				var income_id_delete = $(this).data("id");
				if (!confirm("You wish to remove this Income? It cannot be undone")) {
					return false;
				}else{
					$.ajax({
						url:"incomes/editExpense",
						method:"post",
						data:{income_id_delete:income_id_delete},
						success:function(data){
							errorNow(data);
							displayIncomeExpense();
							displayIncomeExpenseTables();
						}
					})
				}
			})

			//============ DELETE EXPENSE ========= deleteExpense
			$(document).on("click",".deleteExpense", function(e){
				e.preventDefault();
				var expense_id_delete = $(this).data("id");
				// alert(investor_id_delete);
				if (!confirm("You wish to remove this expense? It cannot be undone")) {
					return false;
				}else{
					$.ajax({
						url:"incomes/editExpense",
						method:"post",
						data:{expense_id_delete:expense_id_delete},
						success:function(data){
							errorNow(data);
							displayIncomeExpense();
							displayIncomeExpenseTables();
						}
					})
				}
			})
		})

		function displayIncomeExpense(){
			var action = 'chart_display';
			$.ajax({
				url:"incomes/fetchData",
				method:"post",
				data:{
					action:action,
					'parent_id': '<?php echo $_SESSION['parent_id']?>',
				},
				success:function(data){
					$("#chart_display").html(data);
				}
			})
		}
		displayIncomeExpense();

		function displayIncomeExpenseTables(){
			var action = 'tables_display';
			$.ajax({
				url:"incomes/fetchData",
				method:"post",
				data:{
					action:action,
					'parent_id': '<?php echo $_SESSION['parent_id']?>',
				},
				success:function(data){
					$("#tables_display").html(data);
				}
			})
		}
		displayIncomeExpenseTables();

	</script>
</body>
</html>
