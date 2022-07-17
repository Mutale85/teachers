<?php
	include "../../includes/db.php";

	if (isset($_POST['action'])) {
		$action 	= $_POST['action'];
		$parent_id	= $_POST['parent_id'];
		$branch_id 	= $_POST['branch_id'];

		if ($action == 'fetchTimer') {?>
			<div class="table table-responsive">
				<table class="table table-bordered" id="timerTable">
					<thead>
						<tr>
							<th>Date</th>
							<th>Client Details</th>
							<th>Description</th>
							<th>Working Details</th>
						</tr>
					</thead>
					<tbody id="divBody">
		<?php
			$i = 1;
			$worked = "";
			$query = $connect->prepare("SELECT * FROM time_counter WHERE parent_id = ? AND branch_id = ?");
			$query->execute(array($parent_id, $branch_id));
			if ($query->rowCount() > 0) {

				foreach ($query->fetchAll() as $row) {
					extract($row);
					if ($hours == '' AND $minutes == '' AND $seconds == '') {
						$worked = '00:00:00';
					}elseif($hours == '0'){
						$worked = $hours.':'.$minutes.':'.$seconds;
					}else{
						$worked = $hours.':'.$minutes.':'.$seconds;
					}

					if ($total_amount == '') {
						$amount = '';
					}else{
						$amount = $currency . ' '.number_format($total_amount, 2);
					}

					if ($start_time == null) {
						$start_time = '00:00:00';
					}else{
						$start_time = date("H:m:s", strtotime($start_time));
					}

					if ($stop_time == null) {
						$stop_time = '00:00:00';
					}else{
						$stop_time = date("H:m:s", strtotime($stop_time));
					}

		?>
					<tr>
						<td><?php echo date("j M, Y", strtotime($date_added)) ;?></td>
						<td><?php echo getClientsNamesById($connect, $client_id, $parent_id)?></td>
						<td><?php echo $description;?></td>
						<td>
							
							<table class="table table-bordered">
								<tr>
									<th>Timer</th>
									<td>
										<?php 
											if($total_amount == ''){
										?>
											<a class="btn btn-primary btnStartElement__<?php echo $timer_id?>" href="<?php echo $timer_id?>" id="btnStartElement_<?php echo $timer_id?>" data-parent_id="<?php echo $parent_id?>" data-branch_id="<?php echo $branch_id?>">Start Timer <i class="bi bi-alarm"></i></a>
											<a class="btn btn-danger btnStopElement__<?php echo $timer_id?>" href="<?php echo $timer_id?>" id="btnStopElement_<?php echo $timer_id?>" style="display: none;" data-parent_id="<?php echo $parent_id?>" data-branch_id="<?php echo $branch_id?>">Stop Timer<i class="bi bi-alarm"></i></a>
										<?php }else{?>
											<a class="btn btn-secondary fee_note_<?php echo $timer_id?>" href="legal/fee_note/<?php echo $timer_id?>" id="fee_note_<?php echo $timer_id?>" data-parent_id="<?php echo $parent_id?>" data-branch_id="<?php echo $branch_id?>">Fee Note <i class="bi bi-file-earmark-pdf"></i></a>
										<?php }?>
									</td>
								</tr>
								<tr>
									<th>Rate per Hour (<?php echo $currency;?>)</th>
									<td><?php echo $amount_per_hour;?></td>
								</tr>
								<tr>
									<th>Time Started</th>
									<td><?php echo $start_time;?></td>
								</tr>
								<tr>
									<th>Time Stopped</th>
									<td><?php echo $stop_time;?></td>
								</tr>
								<tr>
									<th>Clock Tick</th>
									<td><span id="hours_new_<?php echo $timer_id?>">00</span>:<span id="minutes_new_<?php echo $timer_id?>">00</span>:<span id="seconds_new_<?php echo $timer_id?>">00</span></td>
								</tr>
								<tr>
									<th>Time Worked</th>
									<td id="fulltime_<?php echo $timer_id?>"><?php echo $worked ?></td>
								</tr>
								<tr>
									<th>Accrued Amount</th>
									<th id="totalAmount"><?php echo $amount?></th>
								</tr>
								
								<tr>
									<th>Actions</th>
									<td>
										<?php 
											if($total_amount == ''){
										?>
										<div class="btn-group">
											<a class="btn btn-info btn-sm editRow" href="<?php echo $timer_id?>" id="<?php echo $timer_id?>" data-parent_id="<?php echo $parent_id?>" data-branch_id="<?php echo $branch_id?>"> Amend <i class="bi bi-pencil-square"></i></a>
											<a class="btn btn-danger btn-sm deleteRow" href="<?php echo $timer_id?>" id="<?php echo $timer_id?>" data-parent_id="<?php echo $parent_id?>" data-branch_id="<?php echo $branch_id?>"> Trash <i class="bi bi-trash"></i></a>
										</div>
										<?php }else{?>
											<a class="btn btn-danger deleteRow" href="<?php echo $timer_id?>" id="<?php echo $timer_id?>" data-parent_id="<?php echo $parent_id?>" data-branch_id="<?php echo $branch_id?>"> Delete<i class="bi bi-trash"></i></a>
										<?php }?>
									</td>
								</tr>
							</table>
						</td>
						
						
						<input type="hidden" name="hours_worked" id="hours_worked_<?php echo $timer_id?>">
						<input type="hidden" name="minutes_worked" id="minutes_worked_<?php echo $timer_id?>">
						<input type="hidden" name="seconds_worked" id="seconds_worked_<?php echo $timer_id?>">
						<input type="hidden" name="amount_per_hour" id="amount_per_hour_<?php echo $timer_id?>" value="<?php echo $amount_per_hour;?>">
					</tr>

					<script>
						var currentTimeandDate_<?php echo $timer_id?> = ()=>{
							const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
							
							var today = new Date();
							let name = month[today.getMonth()];
							var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
							var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
							var dateTime = date+' '+time;

							return dateTime;
						}
						
					    var uid = '<?php echo $timer_id?>';
					    var sec_uid_<?php echo $timer_id?> = 0;
						tmpSec_<?php echo $timer_id?> = localStorage.getItem('secs_<?php echo $timer_id?>')
							if (tmpSec_<?php echo $timer_id?> != null) {
							sec_uid_<?php echo $timer_id?> = parseInt(tmpSec_<?php echo $timer_id?>,10);
						}

				      	function pad ( val ) { 
				      		return val > 9 ? val : "0" + val; 
				      	}

						var interval_uid_<?php echo $timer_id?>;
						var hours_new_<?php echo $timer_id?> = document.getElementById('hours_new_<?php echo $timer_id?>');
						var minutes_new_<?php echo $timer_id?> = document.getElementById('minutes_new_<?php echo $timer_id?>');
						var seconds_new_<?php echo $timer_id?> = document.getElementById('seconds_new_<?php echo $timer_id?>');

					    var start_<?php echo $timer_id?> = () => {
						  	isRunning_<?php echo $timer_id?> = true;
						  	interval_uid_<?php echo $timer_id?> = setInterval(incrementTimer_<?php echo $timer_id?>, 1000);
						  	localStorage.setItem('WatchTime_<?php echo $timer_id?>', 'Watch');
						  	
						}


						var stop_<?php echo $timer_id?> = () => {
						  	isRunning_<?php echo $timer_id?> = false;
						  	clearInterval(interval_uid_<?php echo $timer_id?>);
						  	localStorage.removeItem('WatchTime_<?php echo $timer_id?>');
						  	var totalTime_<?php echo $timer_id?> = hours_new_<?php echo $timer_id?>.innerText +':'+minutes_new_<?php echo $timer_id?>.innerText+':'+seconds_new_<?php echo $timer_id?>.innerText;

						  	localStorage.removeItem('WatchTime_<?php echo $timer_id?>');
						  	document.getElementById('fulltime_<?php echo $timer_id?>').innerHTML = totalTime_<?php echo $timer_id?>;
						  	localStorage.setItem('secs_<?php echo $timer_id?>', '0');
						  	document.getElementById('hours_worked_<?php echo $timer_id?>').value = hours_new_<?php echo $timer_id?>.innerText;
						  	document.getElementById('minutes_worked_<?php echo $timer_id?>').value = minutes_new_<?php echo $timer_id?>.innerText;
						  	document.getElementById('seconds_worked_<?php echo $timer_id?>').value = seconds_new_<?php echo $timer_id?>.innerText;
						  	
						  	hours_new_<?php echo $timer_id?>.innerText = '00';
						  	minutes_new_<?php echo $timer_id?>.innerText = '00';
						  	seconds_new_<?php echo $timer_id?>.innerText = '00';
						}


						$(document).on('click', '.btnStartElement__<?php echo $timer_id?>', function(e){
							e.preventDefault();
							var timeID = $(this).attr("href");
							start_<?php echo $timer_id?>();
							$(this).hide();
							$("#btnStopElement_<?php echo $timer_id?>").show();

							// Update Database\
							var start_time = currentTimeandDate_<?php echo $timer_id?>;
							var parent_id = $(this).data('parent_id');
							var branch_id = $(this).data('branch_id'); 
							$.ajax({
								url:'legal/updateTime',
								method:'POST',
								data:{start_time:start_time, timeID:timeID, parent_id:parent_id, branch_id:branch_id},
								success:function(data){
									alert(data);
									setTimeout(function(){
										location.reload();
									}, 2000);
									// $("#divBody").load(" #divBody");
									// location.reload();
								}
							});
						})

						$(document).on('click', '.btnStopElement__<?php echo $timer_id?>', function(e){
							e.preventDefault();
							var timeID = $(this).attr("href");
							stop_<?php echo $timer_id?>();
							$(this).hide();
							$("#btnStartElement_<?php echo $timer_id?>").show();
							var totalTime = hours_new_<?php echo $timer_id?>.innerText +':'+minutes_new_<?php echo $timer_id?>.innerText+':'+seconds_new_<?php echo $timer_id?>.innerText;
							var hours = document.getElementById('hours_worked_<?php echo $timer_id?>').value;
							var minutes = document.getElementById('minutes_worked_<?php echo $timer_id?>').value;
							var seconds = document.getElementById('seconds_worked_<?php echo $timer_id?>').value;
							var stop_time = currentTimeandDate_<?php echo $timer_id?>;
							var parent_id = $(this).data('parent_id');
							var branch_id = $(this).data('branch_id');
							var amount_per_hour  = document.getElementById('amount_per_hour_<?php echo $timer_id?>').value;
							$.ajax({
								url:'legal/updateTime',
								method:'POST',
								data:{stop_time:stop_time, timeID:timeID, parent_id:parent_id, branch_id:branch_id, hours:hours, minutes:minutes, seconds:seconds,amount_per_hour:amount_per_hour},
								success:function(data){
									alert(data);
									setTimeout(function(){
										location.reload();
									}, 2000);
									// location.reload();
									// time worked = rate * time
									//if hours = 0, minute/60, 
									//if hours and minutues = 0, seconds/3600

								}
							});
						})
						

						var incrementTimer_<?php echo $timer_id?> = () => {
							++sec_uid_<?php echo $timer_id?>;
					        localStorage.setItem('secs_<?php echo $timer_id?>', sec_uid_<?php echo $timer_id?>)
					        document.getElementById("seconds_new_<?php echo $timer_id?>").innerHTML=pad(sec_uid_<?php echo $timer_id?>%60);
					        document.getElementById("minutes_new_<?php echo $timer_id?>").innerHTML=pad(parseInt(sec_uid_<?php echo $timer_id?>/60%60,10));
					        document.getElementById("hours_new_<?php echo $timer_id?>").innerHTML=pad(parseInt(sec_uid_<?php echo $timer_id?>/3600%60,10));
					        document.title = pad(parseInt(sec_uid_<?php echo $timer_id?>/3600%60,10))+':'+pad(parseInt(sec_uid_<?php echo $timer_id?>/60%60,10))+':'+pad(sec_uid_<?php echo $timer_id?>%60);
						}

					    if (localStorage.getItem('WatchTime_<?php echo $timer_id?>') !== null) {
					    	start_<?php echo $timer_id?>();
					    	$("#btnStopElement_<?php echo $timer_id?>").show();
					    	$("#btnStartElement_<?php echo $timer_id?>").hide();
					    }else{
					    	$("#btnStartElement_<?php echo $timer_id?>").show();
					    }

					</script>
		<?php

				}

			}
		?>	
				</tbody>
			</table>
		</div>
		<script>
			$("#timerTable").DataTable();
			function currentTimeandDate(){
				const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
				
				var today = new Date();
				let name = month[today.getMonth()];
				var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
				// var date = today.getFullYear()+'-'+name+'-'+today.getDate();
				var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
				var dateTime = date+' '+time;

				return dateTime;
			}
		</script>
		<?php
		}
	}
?>