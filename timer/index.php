<?php 
  	require ("../includes/db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Master Billing</title>
	<?php include ("main_header.php"); ?>
</head>
<body>
	<?php include ("nav_bar.php"); ?>
	<div class="container-fluid">
      	<div class="container">
  			<div class="row">
  				
				<div class="col-md-12">
					<center>
						<div id="todayDate" class="mb-4"></div>
					</center>
				</div>
				<div class="col-md-12 mt-5">
					<div class="card">
						<div class="card-header">
							<div class="d-flex justify-content-between">
								<div><h4 class="card-title">Time In - Time Out Billing System</h4></div>
								<div>
									<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#timerModal">New Session</button>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div id="fetchTimer"></div>
						</div>
					</div>
				</div>
			</div>
  		</div>
  		<!-- Button trigger modal -->
		
      		<!-- Timer Modal -->
      		<div class="modal fade" id="timerModal"  aria-hidden="true">
			  	<div class="modal-dialog modal-lg">
			    	<div class="modal-content">
			      		<div class="modal-header border-bottom">
			        		<h5 class="modal-title" id="exampleModalLabel">Start New Timer</h5>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal1()"></button>
			      		</div>
			      		<div class="modal-body">
			      			<form method="post" id="timerForm">
			      				<div class="form-group mb-3">
									<label class="mb-2">Select Client</label>
									<div class="form-group mb-3">
					               		<div class="input-group">
						               		<select class="form-control" name="client_names" id="client_names" required></select>
						               		<span class="input-group-prepend"><a href="" class="btn btn-secondary addNewClient"><i class="bi bi-plus"></i></a></span>
						               	</div>
					               	</div>
								</div>
								<div class="form-group mb-3">
									<label class="mb-2">Start Date</label>
									<input type="text" name="start_date" id="start_date" class="form-control" readonly>
								</div>
								<div class="form-group mb-3">
									<label class="mb-2">Amount/Hour  - Currency</label>
									<div class="input-group">
										<input type="number" name="amount_per_hour" id="amount_per_hour" class="form-control" step="any" min="1">
										<select class="form-control" name="currency" id="currency">
											<?php 
												$query = $connect->prepare("SELECT * FROM currencies");
												$query->execute();
												foreach ($query->fetchAll() as $row) {
													extract($row);
												
											?>
												<option value="<?php echo $code?>"> <?php echo $code?> - <?php echo $country?></option>
												
											<?php }?>
										</select>
									</div>
								</div>
								<input type="hidden" name="timer_id" id="timer_id">
								<input type="hidden" name="client_id" id="client_id">
								<input type="hidden" name="parent_id" id="parent_id" class="form-control" value="<?php echo $_SESSION['parent_id']?>">
								
								<div class="form-group mb-3">
									<label class="mb-2">Description</label>
									<div>
									<div class="form-group mb-3">
										<textarea type="text" name="description" id="description" class="form-control"></textarea>
										</div>
									</div>
									
								</div>
								<div class="form-group">
									<button id="start_btn" class="btn btn-outline-primary" type="submit">Submit</button>
								</div>
							</form>
			      		</div>
			      	</div>
			    </div>
			</div>
      		<!-- End of timer model -->
      		<!-- New Client -->
			<div class="modal fade" id="clientModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog">
			    	<div class="modal-content">
			      		<div class="modal-header border-bottom">
			        		<h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
			      		</div>
			      		<div class="modal-body">
			      			<form method="post" id="clientsForm">
					         	<div class="p-4 bg-warning" id="tab">
					         		<h4 class="mb-4 border-bottom pb-2">General Info</h4>
					               	<div class="">
					               		<div class="form-group mb-3">
				               				<label class="mb-2">Company Name</label>
				               				<input type="text" name="company_name" id="company_name" class="form-control">
				               				<input type="hidden" name="client_id" id="client_id" class="form-control">
				               			</div>
				               			<div class="form-group mb-3">
				               				<label class="mb-2">Client Email</label>
				               				<input type="email" name="client_email" id="client_email" class="form-control" required>
				               			</div>
				               			<div class="form-group mb-3">
				               				<label class="mb-2">Client Name</label>
				               				<input type="text" name="client_name" id="client_name" class="form-control" required>
				               				<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_SESSION['parent_id']?>">
				               			</div>
					               	</div>
					         	</div>
					         	<div class="p-4 bg-light" id="tab">
					         		<h4 class="mb-4 border-bottom pb-2">Contact Info</h4>
					               	<div class="">
					               		<div class="form-group mb-3">
				               				<label class="mb-2">Contact Phone</label><br>
				               				<input type="text" name="client_phone" id="client_phone" class="form-control" required onkeyup="completePhone(this.value)">
				               				<input type="hidden" name="phonenumber" id="phonenumber" readonly>
				               			</div>
				               			
					               		<div class="form-group mb-3">
				               				<label class="mb-2">City</label>
				               				<input type="text" name="client_city" id="client_city" class="form-control" required>
				               			</div>
				               			<div class="form-group mb-3">
				               				<label class="mb-2">Country</label>
				               				<select  name="client_country" id="client_country" class="form-control" required>
				               					<?php
				               						$query = $connect->prepare("SELECT * FROM countries");
				               						$query->execute();
				               						foreach ($query->fetchAll() as $row) {?>
				               							<option value="<?php echo $row['country_name']?>"><?php echo $row['country_name']?></option>	
				               					<?php	
				               						}
				               					?>
				               				</select>
				               				
				               			</div>
				               			<div class="form-group mb-3">
				               				<label class="mb-2">Address</label>
				               				<textarea type="text" name="client_address" id="client_address" class="form-control" required></textarea>
				               			</div>
					               	</div>
					         	</div>
					         	<div class="p-4 bg-warning" id="tab">
					               	<h4 class="mb-4 border-bottom pb-2">Business Type</h4>
					               	<div class="form-group mb-3">
			               				<label>Website </label>
			               				<input type="url" name="client_website" id="client_website" class="form-control">
			               			</div>
			               			<div class="form-group mb-3">
				                		<label>Business Type </label>
				                		<select class="form-control" name="client_business" id="client_business">
				                			<option value="">Select Category</option>
			                        		<option value="Accounts">Accounts</option>
			                        		<option value="Agriculture">Agriculture</option>
			                        		<option value="Banking">Banking</option>
			                        		<option value="IT Services">IT Services</option>
			                        		<option value="Construction">Construction</option>
			                        		<option value="Education">Education</option>
			                        		<option value="Engineering">Engineering</option>
			                        		<option value="Finance">Finance</option>
			                        		<option value="Health">Health</option>
			                        		<option value="Hospitality">Hospitality</option>
			                        		<option value="Legal">Legal</option>
			                        		<option value="Manufaturing">Manufaturing</option>
			                        		<option value="Marketing">Marketing</option>
			                        		<option value="Transport">Transport</option>
			                        		<option value="Other">Other</option>
			                        		<option value="Sales">Sales</option>
				                		</select>
				                	</div>
				                	<button class="btn btn-secondary bg-dark mt-5" type="submit" id="submit_client"> Save Details</button>
					         	</div>
							</form>

			      		</div>
			      		<div class="modal-footer">
			        		<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal()">Close</button>
			      		</div>
			    	</div>
			  	</div>
			</div>
      	</div>
    </div>
    <!-- IdolImage -->
	
	<script>
		function closeModal(){
			$("#clientModal").modal('hide');
		}

		function closeModal1(){
			$("#timerModal").modal('hide');
		}

		function clientsFetch(){
	    	var parent_id = '<?php echo $_SESSION['user_id']?>';
	    	$.ajax({
				url:'parsers/fetch_client',
				method:'POST',
				data:{'action':'fetch_client', parent_id:parent_id},
				success:function(data){
					$("#client_names").html(data);
				}
			});
	    }
	    clientsFetch();
	    function fetchTimer(){
	    	var parent_id = '<?php echo $_SESSION['user_id']?>';
	    	$.ajax({
				url:'parsers/fetch_timer',
				method:'POST',
				data:{'action':'fetch_timer', parent_id:parent_id},
				success:function(data){
					$("#fetchTimer").html(data);
				}
			});
	    }
	    fetchTimer();

	    $("#client_names").change(function(){
	    	var client_id =  $(this).find(':selected').data('id');
	    	document.getElementById('client_id').value = client_id;
	    })
	    


	    $(document).on('click', ".addNewClient", function(e){
			e.preventDefault();
    		$("#clientModal").modal('show');
		})

	    var input = document.querySelector("#client_phone");
     	var iti = intlTelInput(input, {
	        autoHideDialCode: true,
	        autoPlaceholder: true,
	        separateDialCode: true,
	        nationalMode: true,
	        allowDropdown: true,
	        autoPlaceholder: "polite",
	        dropdownContainer: document.body,
	        geoIpLookup: function(callback) {
	            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
	              var countryCode = (resp && resp.country) ? resp.country : "";
	              callback(countryCode);
	            });
	        },
          	nationalMode: false,
          	placeholderNumberType: "MOBILE",
          	preferredCountries: ['zm'],
          	separateDialCode: true,
        	utilsScript: "../int17/build/js/utils.js",
	    });
	    function completePhone(phone){
			var number = iti.getNumber(intlTelInputUtils.numberFormat.E164);
			var isValid = iti.isValidNumber();
			result = document.querySelector("#result");
			phonenumber = document.getElementById("phonenumber");
			if (phone == "") {
				
				return false;
			}
			if (isValid === true) {
			  	
			  	phonenumber.value = number;
			}else if(isValid === false){
			  	phonenumber.value = number;
			}
		}

	    $("#clientsForm").submit(function(e){
			e.preventDefault();
			var clientsForm = document.getElementById('clientsForm');
			
			var data = new FormData(clientsForm);
			var url = 'parsers/insertClient';
			$.ajax({
				url:url+'?<?php echo time()?>',
				method:"post",
				data:data,
				cache : false,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$("#submit_client").html("<i class='spinner-border'></i> Processing...");
				},
				success:function(data){
					successNow(data);
					$("#submit_client").html("Submit Client");
					$("#clientsForm")[0].reset();
					clientsFetch();
				}
			})
		});		

		function timeNow(){
			const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
			
			var today = new Date();
			let name = month[today.getMonth()];
			var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			// var date = today.getFullYear()+'-'+name+'-'+today.getDate();
			var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
			var dateTime = date;

			return dateTime;
		}

		document.getElementById('start_date').value = timeNow();

		$("#start_date").datepicker();

		function displayC(){
			var refresh = 1000;
			myTime = setTimeout('displayTime()', refresh);
		}

		function displayTime(){
			var x = new Date();
			document.getElementById('todayDate').innerHTML = x;
			displayC();
		}
		displayTime();
		
		$(document).on('click', '.editRow', function(e){
			e.preventDefault();
			$("#timerModal").modal("show");
			var timer_id = $(this).attr('href');
			var parent_id = $(this).data('parent_id');
			var branch_id = $(this).data('branch_id');
			var action    = 'editRow';
			$.ajax({
				url:'parsers/updateTime',
				method:"post",
				data:{action:action, timer_id:timer_id},
				dataType:'json',	
				success:function(data){
					$("#start_date").val(data.date_added);
					$("#timer_id").val(data.timer_id);
					$("#description").val(data.description);
					$("#amount_per_hour").val(data.amount_per_hour);
					$("#currency").val(data.currency);
					$("#client_names").val(data.client_names);
				}
			})
		})

		$(document).on('click', '.deleteRow', function(e){
			e.preventDefault();
			var timer_id = $(this).attr('href');
			var parent_id = $(this).data('parent_id');
			var action    = 'deleteRow';
			if(!confirm("You wish to delete the record")){
				return false;
			}else{
				$.ajax({
					url:'parsers/updateTime',
					method:"post",
					data:{action:action, timer_id:timer_id},	
					success:function(data){
						fetchTimer();
					}
				})
			}
		})


	    //============== SUBMIT FORM
	    $('#start_btn').click(function(e){
			e.preventDefault();

		    var timerForm = document.getElementById('timerForm');
			
			var data = new FormData(timerForm);
			var url = 'insertTime';
			$.ajax({
				url:url+'?<?php echo time()?>',
				method:"post",
				data:data,
				cache : false,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$("#start_btn").html("<i class='spinner-border'></i> Processing...");
				},
				success:function(data){
					successNow(data);
					$("#start_btn").html("Submit Client");
					$("#clientsForm")[0].reset();
					fetchTimer();
					closeModal1();
				}
			})

		});

	</script>

</body>
</html>
