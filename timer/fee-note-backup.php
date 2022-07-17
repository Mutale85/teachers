<base href="http://localhost/bazity.com/timer/">
<?php 
	require ("../includes/db.php");
	$timer_id = basename($_SERVER['REQUEST_URI']);
  	$query = $connect->prepare("SELECT * FROM `time_counter` WHERE timer_id = ?");
  	$query->execute(array($timer_id));
  	$row = $query->fetch();
  	if($row){
  		extract($row);
	}

	function clientAddress($connect, $client_id, $parent_id){
  		$output = '';
  		$sql = $connect->prepare("SELECT * FROM clients_details WHERE client_id = ? AND parent_id = ? ");
  		$sql->execute(array($client_id, $parent_id));
  		$row = $sql->fetch();
  		extract($row);
  		$output = '
  			<h4>'.$client_name.'</h4>
  			<address>
  				'.$company_name.'<br>
				'.$address.', '.$city.', '.$country.'<br>
				'.$phone.' <br>
				 <a href="mailto:'.$email.'">'.$email.'</a><br>
				'.url_to_clickable_link($website).'		    								
			</address>
  		';

  		return $output;	
  	}

  	function clientName($connect, $client_id, $parent_id){
  		$output = '';
  		$sql = $connect->prepare("SELECT * FROM clients_details WHERE client_id = ? AND parent_id = ? ");
  		$sql->execute(array($client_id, $parent_id));
  		$row = $sql->fetch();
  		extract($row);
  		$output = $client_name;

  		return $output;	
  	}

  	function clientEmail($connect, $client_id, $parent_id){
  		$output = '';
  		$sql = $connect->prepare("SELECT * FROM clients_details WHERE client_id = ? AND parent_id = ? ");
  		$sql->execute(array($client_id, $parent_id));
  		$row = $sql->fetch();
  		extract($row);
  		$output = $email;
  		return $output;	
  	} 
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo  getClientsNamesById($connect, $client_id, $parent_id)?> Fee Note</title>
	<?php 
		include("main_header.php");
	?>

	<style>
		.invoice-head td {
			padding: 0 8px;
		}
		.container {
			padding-top:30px;
		}
		.invoice-body{
			background-color:transparent;
		}
		.invoice-thank{
			margin-top: 60px;
			padding: 5px;
		}
		address{
			margin-top:15px;
		}
		.border-less {
			border: none !important;
		}
	</style>
</head>
<body>

	<?php include ("nav_bar.php"); ?>
	<div class="container-fluid">
      	<section class="container">
			<div class="row">
				<div class="col-md-12">
					<center>
						<div id="todayDate" class="mb-4"></div>
					</center>
				</div>
				<div class="col-md-12 mt-5">
					<div class="card">
						<div class="card-header">
							<div><h4 class="card-title">Fee note</h4></div>
						</div>
						<div class="card-body">
							<div class="">
						    	<div class="row">
						    		<div class="col-md-8">
						    			<?php echo getOrganisationLogo($connect, $parent_id)?>
						    			<address>
									        <strong><?php echo getOrganisationName($connect, $parent_id)?></strong><br>
						                 	<?php echo getOrganisationAddressDetailsForPDF($connect, $parent_id)?>
								    	</address>
						    		</div>
						    		<div class="col-md-4 well ">
						    			<table class="invoice-head p-3">
						    				<tbody>
						    					
						    					<tr>
						    						<td class="pull-right"></td>
						    						<td>
						    							<?php echo clientAddress($connect, $client_id, $parent_id) ?>
						    						</td>
						    					</tr>
						    					<tr>
						    						<td class="pull-right"></td>
						    						<td><em> <?php echo date("j F, Y", strtotime($date_added)); ?></em></td>
						    					</tr>
						    					
						    				</tbody>
						    			</table>
						    		</div>
						    	</div>
						    	<div class="row">
						    		<div class="col-md-12 mb-4">
						    			<h2></h2>
						    		</div>
						    	</div>
						    	<div class="row">
								  	<div class="col-md-12 well invoice-body">
								  		<div class="table table-responsive">
									  		<table class="table table-borderless">
												<thead>
													<tr>
							                          	<th>Date</th>
														<th>Description</th>
							                          	<th>Timed Worked</th>
														<th>Amount</th>
													</tr>
												</thead>
												<tbody>
													<tr class="border-less">
														<td><?php echo date("j F, Y", strtotime($date_added)); ?></td>
														<td><?php echo $description; ?></td>
														<td>
															<?php

																echo $worked = $hours.'h:'.$minutes.'m:'.$seconds.'s';
																
															?>
														</td>
								                      	<td><?php echo $amount = $currency . ' '.number_format($total_amount, 2);?></td>
													</tr>
								            		<tr class="border-less"><td colspan="4"></td></tr>
													<tr class="border-lesss">
														<td colspan="2">&nbsp;</td>
														<td><strong>Total</strong></td>
														<td><strong><?php echo $amount = $currency . ' '.number_format($total_amount, 2);?></strong></td>
													</tr>
												</tbody>
											</table>
										</div>
								  	</div>
						  		</div>
						  		<div class="d-flex justify-content-between">
						  			<div class="">
						  				<p>Thank you for working with us</p>
						  			</div>
						  	    	<div class="btn-group">
						  	    		<a href="<?php echo clientEmail($connect, $client_id, $parent_id)?>" data-link="http://localhost/bazity.com/feeNoteDoc/<?php echo base64_encode($timer_id)?>" data-sender_name='<?php echo $_SESSION['firstname']?>' data-receiver_name='<?php echo clientName($connect, $client_id, $parent_id) ?>' class="btn btn-outline-secondary send_email">Email fee note</a>
						  	    		<a href="print_fee_note/<?php echo $timer_id?>" target="_blank" class="btn btn-outline-primary">Print Fee Note <i class="bi bi-printer"></i></a>
						  	    	</div>
						  		</div>
						    </div>
						</div>
					</div>
				</div>
				
			</div>
      	</section>
      		<div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			  	<div class="modal-dialog modal-dialog-centered">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title" id="myModalLabel">Send Fee Note Link </h5>
			        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
			      		</div>
			      		<div class="modal-body">
			      			<form method="post" id="emailForm">
			      				<div class="form-group m-4">
				      				<div class="input-group">
					      				<input type="text" name="receiver_name" id="receiver_name" class="form-control" readonly="">
					      				<input type="text" name="client_email" id="client_email" class="form-control">
					      			</div>
				      				<input type="hidden" name="link" id="link" class="form-control">
				      				<input type="hidden" name="sender_name" id="sender_name">
				      				<button class="btn btn-primary mt-4" id="sendEmailBtn" type="submit">Send</button>
				      			</div>
				      			
			      			</form>
			      		</div>
			      	</div>
			    </div>
			</div>
      	</div>
    </div>
    <!-- IdolImage -->
    <script>
    	$(function(){
			$(document).on('click', '.send_email', function(e){
				e.preventDefault();
				$("#emailModal").modal("show");
				// var id = $(this).attr('id');
				var email = $(this).attr('href');
				var parent_id = $(this).data('parent_id');
				var link = $(this).data('link');
				var receiver_name = $(this).data('receiver_name');
				var sender_name = $(this).data('sender_name');
				document.getElementById('client_email').value = email;
				document.getElementById('link').value = link;
				document.getElementById('sender_name').value = sender_name;
				document.getElementById('receiver_name').value = receiver_name;
			});

			$("#emailForm").submit(function(e){
			      e.preventDefault();
			      var data = document.getElementById('emailForm');
			      var formData = new FormData(data);
			      $.ajax({
			        url:"legal/sendLink",
			        method:'POST',
			        data: formData,
			        cache : false,
			        processData: false,
			        contentType: false,
			        beforeSend:function(){
			          $("#sendEmailBtn").html('<i class="spinner-border"></i> Please Wait');
			        },
			        success:function(data){
			          	successNow(data);
			          	$("#sendEmailBtn").html('Submit');
			        }
			    })
			})
		})
    </script>
</body>
</html>
