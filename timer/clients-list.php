<?php 
  	require ("../includes/db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Master Billing</title>
	<?php include ("main_header.php"); ?>
	<link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include ("nav_bar.php"); ?>
	<div class="container-fluid">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-12">
      				<h2 class="mb-4 text-center">Clients List</h2>
      				<div id="getallClients"></div>
      			</div>
      			<div class="col-md-12">
      				<a href="" class="btn btn-secondary addNewClient"><i class="bi bi-plus"></i> Add new client</a>
      				<!-- New Client -->
					<div class="modal fade" id="clientModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  	<div class="modal-dialog modal-lg modal-dialog-scrollable">
					    	<div class="modal-content">
					      		<div class="modal-header border-bottom">
					        		<h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
					        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closeModal()"></button>
					      		</div>
					      		<div class="modal-body">
					      			<form method="post" id="clientsForm">
							         	<div class="p-2 sbg-warning" id="tab">
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
							         	<div class="p-2 sbg-light" id="tab">
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
							         	<div class="p-2 sbg-warning" id="tab">
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
					        		<button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
					      		</div>
					    	</div>
					  	</div>
					</div>
      			</div>
      		</div>
      	</div>
    </div>
    <script>
    	function getallClients(){
	    	var parent_id = '<?php echo $_SESSION['user_id']?>';
	    	$.ajax({
				url:'parsers/getallClients',
				method:'POST',
				data:{'action':'getallClients', parent_id:parent_id},
				success:function(data){
					$("#getallClients").html(data);
				}
			});
	    }
	    getallClients();

	    // ============ CLIENTS =================
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
					// $("#clientsForm")[0].reset();
					getallClients();
				}
			})
		});

		$(document).on("click", ".editClient", function(e){
			e.preventDefault();
			var clientID = $(this).attr("href");
			// alert(clientID);
			$.ajax({
				url:'parsers/edits',
				method:'POST',
				data:{clientID:clientID},
				dataType: 'JSON',
				success:function(data){

					$("#client_id").val(data.client_id);
					$("#company_name").val(data.company_name);
					$("#client_email").val(data.email);
					$("#client_name").val(data.client_name);
					$("#client_phone").val(data.phone);
					$("#phonenumber").val(data.phone);
					$("#client_city").val(data.city);
					$("#client_country").val(data.country);
					$("#client_address").val(data.address);
					$("#client_website").val(data.website);
					$("#client_business").val(data.business_type);
					$("#clientModal").modal('show');
				}
			});
		})

		$(document).on("click", ".deleteClient", function(e){
			e.preventDefault();
			var clientID_delete = $(this).attr("href");
			if(confirm("You wish delete your client's records")){
				$.ajax({
					url:'parsers/edits',
					method:'POST',
					data:{clientID_delete:clientID_delete},
					
					success:function(data){
						errorNow(data);
						getallClients();
					}
				})
			}else{
				return false;
			}
		})	
    </script>
</body>
</html>