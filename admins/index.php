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
                       
                    </div>            
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 card p-3">
                                <div class="card-header">Our Clients
                                    <div class="btn-actions-pane-right">
                                        <div role="group" class="btn-group-sm btn-group">
                                            <a href="add-clients" class="btn btn-focus">New Client</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    
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
		$(function(){
		
		    $("#service_personnel_table").DataTable();
			$(document).on("change",  "#defaulted", function(e){
				var value = $(this).val();
				if (value === "1") {
					$("#one, #two").show();
				}else{
					$("#one, #two").hide();
				}
			})

			$("#clientsForm").submit(function(e){
				e.preventDefault();
				var clientsForm = document.getElementById('clientsForm');
				var data = new FormData(clientsForm);
				var url = 'includes/customerSubmit';
				$.ajax({
					url:url+'?<?php echo time()?>',
					method:"post",
					data:data,
					cache : false,
					processData: false,
					contentType: false,
					beforeSend:function(){
						$("#submit_customer").html("<i class='fa fa-spinner fa-spin'></i>");
					},
					success:function(data){
						errorNow(data);
						callListedClients("<?php echo $_SESSION['parent_id']?>");
						$("#submit_customer").html("Submit changes");
					}
				})
			})
		})
		

		$(document).on("click", ".editCustomer", function(e){
			e.preventDefault();
			var getCustomerId = $(this).attr("href");
			$("#exampleModal").modal("show");
			$.ajax({
				url:"includes/editCustomerData",
				method:"post",
				data:{getCustomerId:getCustomerId},
				dataType:"JSON",
				success:function(data){
					$("#ID").val(data.id);
					$("#firstname").val(data.firstname);
					$("#lastname").val(data.lastname);
					$("#customer_id").val(data.customer_id);
					$("#licence").val(data.licence);
					$("#defaulted").val(data.defaulted);
					$("#date_defaulted").val(data.date_defaulted);
					getD();
					$("#currency").val(data.currency);
					$("#amount_defaulted").val(data.amount_defaulted);
					$("#remarks").val(data.remarks);
				}
			})
		})

		function getD(){
			var get = $("#defaulted").val();
			if(get == 1) {
				$("#one, #two").show();
			}else{
				$("#one, #two").hide();
			}
		}

		$(document).on("click", ".deletePersonnel", function(e){
			e.preventDefault();
			var service_number = $(this).attr("href");
			if(confirm("Once deleted, all details cannot be recovered")){
				$.ajax({
					url:"includes/removePersonnel",
					method:"post",
					data:{'action':'delete_service_personnel', service_number:service_number},
					success:function(data){
						successNow(data);
						fetchSevicePersonnels("<?php echo $_SESSION['parent_id']?>");
					}
				})
			}else{
				return false;
			}
		})

		$(document).on("click", ".deleteCivilian", function(e){
			e.preventDefault();
			var service_number = $(this).attr("href");
			if(confirm("Once deleted, all details cannot be recovered")){
				$.ajax({
					url:"includes/removeCivilian",
					method:"post",
					data:{'action':'delete_service_personnel', service_number:service_number},
					success:function(data){
						successNow(data);
						fetchCivilians("<?php echo $_SESSION['parent_id']?>");
					}
				})
			}else{
				return false;
			}
		})

		

		
		// ================================= DISPLAYS ======================================
		function fetchSevicePersonnels(parent_id){
			var unit_id = parent_id;
			$.ajax({
				url:"includes/fetchSevicePersonnel",
				method:"post",
				data:{unit_id:unit_id},
				success:function(data){
					$("#service_personnel_data").html(data);
				}
			})
		}
		fetchSevicePersonnels("<?php echo $_SESSION['parent_id']?>");
		function fetchCivilians(parent_id){
			var unit_id = parent_id;
			$.ajax({
				url:"includes/fetchCivilians",
				method:"post",
				data:{unit_id:unit_id},
				success:function(data){
					$("#civilian_personnel_data").html(data);
				}
			})
		}
		fetchCivilians("<?php echo $_SESSION['parent_id']?>");

		function successNow(msg){
			toastr.success(msg);
	      	toastr.options.progressBar = true;
	      	toastr.options.positionClass = "toast-top-center";
	      	toastr.options.showDuration = 1000;
	    }

		function errorNow(msg){
			toastr.error(msg);
	      	toastr.options.progressBar = true;
	      	toastr.options.positionClass = "toast-top-center";
	      	toastr.options.showDuration = 1000;
	    }
	</script>
</body>
</html>
