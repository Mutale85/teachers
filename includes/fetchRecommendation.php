<?php
	include "db.php";

	if (isset($_POST['fetchRecommendation'])) {
		
		$query = $connect->prepare("SELECT * FROM recommendation ");
		$query->execute();
		foreach ($query->fetchAll() as $row) {
			extract($row);
			$rec_id = $id;
?>
		<div class="col-md-3 mt-5">
			<div class="card borderless" style="min-height: 250px;">
				<div class="card-header">
					<p><?php echo $recommendation ?></p>
				</div>
				<div class="card-body">
					<?php
						$query = $connect->prepare("SELECT * FROM recommendation_options WHERE rec_id = ? ");
						$query->execute(array($rec_id));
						
						foreach ($query->fetchAll() as $rows) {
							extract($rows);
					?>
							<div class="form-group mb-2">
								<label><input type="checkbox" class="form-check-input" name="option" id="option" value="Shopright"> <?php echo $rec_options;?></label>
							</div>
					<?php }?>
				</div>
			</div>
		</div>
<?php
		}

	}
?>

