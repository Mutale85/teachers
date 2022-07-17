<?php
	include '../../includes/db.php';
    $query = $connect->prepare("SELECT * FROM `organisations` WHERE parent_id = ? ");
    $query->execute(array($_SESSION['parent_id']));
    if ($query->rowCount() > 0) {
      $row = $query->fetch();
      if ($row) {
      	extract($row);
        if(file_exists("uploads/".$org_logo)){
            $img = "uploads/".$org_logo;
        }else{
            $img = "uploads/".$org_logo;
        }
        if ($website != '') {
        	$website = '<p>Website: '. url_to_clickable_link($website).'</p>';
        }else{
        	$website = '';
        }
        if ($background_color == '') {
        	$background_color = '';
        }else{
        	$background_color = $background_color;
        }

        if ($text_color == '') {
        	$text_color = '';
        }else{
        	$text_color = $text_color;
        }

      ?>
      	<div class="parent">
			<div class="img">
				<img src="<?php echo $img?>" alt="<?php echo $row['org_logo']?>" id="logo_image" class="img-fluid img-responsive mb-2" style="width: 80px; height: 80px; border-radius: 50%;">
			</div>
			<div class="address">
				<h3><?php echo $row['organisation_name'] ?></h3>
				<address>
				  	<?php echo nl2br($row['hq_address']) ?>
				</address>
				<p>Phone: <?php echo $row['hq_phone']?> | Email: <?php echo $row['admin_email']?></p>
				<?php echo $website ?>
			</div>
			<a href="" class="editData addressPhone rounded-pill" data-id="<?php echo $row['id'];?>">Edit Details</a>
		</div>
		<style type="text/css">
			div.parent { 
			    border  : solid #ccc 1px;
			    display : table;
			    padding : .5em; 
			    width   : 100%;
			    margin   :.5em 0;
			    background-color: <?php echo $background_color; ?>
			  }
			div.address { 
			    vertical-align : middle;
			    display        : table-cell;
			    text-align     : center;
			    color: <?php echo $text_color; ?>;
			}
			div.parent .img {
			    vertical-align   : middle;
			    display          : table-cell;
			    padding-right    : 1em;
			    width            : 100px; /* you can change width */
			}
			div.img img { 
			    width           : 100%;
			    /* you can change height */
			    vertical-align   : middle;
			}
			@media screen and (max-width: 992px) {
			  	.parent {
			    	width:100%;
			  	}
			}

			/* On screens that are 600px or less, set the background color to olive */
			@media screen and (max-width: 600px) {
			  	.parent {
			    	width:100%;
			  	}
			}

		</style>
    <?php }
    }else{?>
    	<div class="col-md-6">
	      	<div class="card">
	      		<div class="card-header">
	      			<h4 class="card-title">Organisation Details</h4>
	      		</div>
	      		<div class="card-body">
	      			<img src="images/icon2.png" id="newlogo_image" class="img-fluid mb-3" style="border:1px solid #ccc; width: 80px; height: 80px; border-radius: 50%;"><br>
	            	<a href="" class="btn btn-info btn-sm rounded-pill add_logo" id="add_logo">Change Logo</a><br><br>
	          		<form method="post" id="orgForm" enctype="multipart/form-data">
					
							<input type="file" name="org_logo" id="org_logo" class="form-controls" accept="image/png, image/jpg, image/jpeg" onchange="document.getElementById('newlogo_image').src = window.URL.createObjectURL(this.files[0])" style="display: none;">
	  					<div class="form-group">
	                      	<label>Organization Name</label>
	                      	<input type="text" name="organisation_name" id="organisation_name" class="form-control">
	                      	<input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_SESSION['parent_id']?>">
	                      	<input type="hidden" name="ID" id="ID" value="">
	                	</div>
	                    <div class="form-group">
	                      	<label>Contact Email</label>
	                      	<input type="text" name="admin_email" id="admin_email" class="form-control" value="<?php echo $_SESSION['email']?>" required>
	                    </div>
	                    <div class="form-group">
	                      	<label>Contact Phone</label>
	                      	<input type="text" name="hq_phone" id="hq_phone" class="form-control" value="" required>
	                    </div>
	                    <div class="form-group">
	                      	<label>Contact Address</label>
	                      	<textarea name="hq_address" id="hq_address" class="form-control" rows="2" required></textarea>
	                    </div>
	                    <div class="form-group">
                          	<label>Website</label>
                          	<input type="url" name="website" id="website" class="form-control" value="">
                        </div>
						<button class="btn btn-info shadow" type="submit" id="submit">Submit</button>
					</form>
	      		</div>
	      	</div>
      	</div>
<?php
    }
  ?>