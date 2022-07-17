<base href="http://localhost/bazity.com/timer/">
<?php 
  	require ("../includes/db.php");
  	$timer_id = basename($_SERVER['REQUEST_URI']);
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

  	$query = $connect->prepare("SELECT * FROM `time_counter` WHERE timer_id = ?");
  	$query->execute(array($timer_id));
  	$row = $query->fetch();
  	if ($row) {
  		extract($row);
  	}
  	
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo  getClientsNamesById($connect, $client_id, $parent_id)?> Fee Note</title>
	<?php include("main_header.php") ?>

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
		a:active, a:link {
			text-decoration: none;
		}
		.border-less {
			border: none !important;
		}
		@media print {

		  	html, body {
			    height:100%; 
			    margin: 0 !important; 
			    padding: 0 !important;
			    overflow: hidden;
		  	}
		  	a:active, a:link {
				text-decoration: none;
			}
			/*@page {
			   size: landscape;
			}*/

		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 mt-5">
				<div class="card">
					<div class="card-header">
						<div><h4 class="card-title"> <?php echo getClientsNamesById($connect, $client_id, $parent_id)?> Fee note </h4></div>
					</div>
					<div class="card-body">
							
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
				    		<div class="col-md-12 mb-4 border-bottom">
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
					                          	<th>Time</th>
												<th>Amount</th>
											</tr>
										</thead>
										<tbody>
											<tr class="border-less">
												<td><?php echo date("j F, Y", strtotime($date_added)); ?></td>
												<td><?php echo $description; ?></td>
												<td>
													<?php echo $worked = $hours.'h:'.$minutes.'m:'.$seconds.'s';?>
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
						  	<div class="d-flex justify-content-between">
						  		<p class="float-start">Thank you for working with us</p>
						  		<p class="float-end">Signed</p>
						  	</div>
				  		</div>
					</div>
				</div>
			</div>			
      	</div>
    </div>
    <!-- IdolImage -->
    <script type="text/javascript">
    	window.addEventListener('load', window.print());

    	(function () {

        // var beforePrint = function () {
        //     alert('Functionality to run before printing.');
        // };

        var afterPrint = function () {
            window.location = "./";
        };

        if (window.matchMedia) {
            var mediaQueryList = window.matchMedia('print');

            mediaQueryList.addListener(function (mql) {
                //alert($(mediaQueryList).html());
                if (mql.matches) {
                    // beforePrint();
                } else {
                    afterPrint();
                }
            });
        }

        // window.onbeforeprint = beforePrint;
        window.onafterprint = afterPrint;

    }());
    </script>
</body>
</html>
