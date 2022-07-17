<?php 
  	require ("../includes/db.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("main_header.php") ?>
	
</head>
<body>
	<?php include ("nav_bar.php"); ?>
	<div class="container">
        <div class="row">
            <div class="col-md-6 mb-5">
            	<form method="post" class="ClientRegisterForm" id="ClientRegisterForm" autocomplete="off">
		       		<h4 class="text-secondary mb-5"><?php echo $_SESSION['firstname']?></h4>
		       		<div class="">
			       		<div class="form-group col-md-6 mb-3">
			       			<label class="mb-1">First name</label>
							<input type="text" name="firstname" id="firstname" class="form-control" required value="<?php echo $_SESSION['firstname']?>" >
			       		</div>
			       		<div class="form-group col-md-6 mb-3">
			       			<label class="mb-1">Last name</label>
							<input type="text" name="lastname" id="lastname" class="form-control" required value="<?php echo $_SESSION['lastname']?>" >
		       			</div>
		       			
			       		<div class="form-group col-md-6 mb-3">
			       			<label class="mb-1" for="email">Email</label>
			   				<input type="email" name="email" id="email" class="form-control" required value="<?php echo $_SESSION['user_mail_bazity']?>">
			   				<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']?>">
			       		</div>
			       		
				       	
			       		<div class="mt-4">
				       		<div><button class="btn btn-outline-secondary">Update Data</button></div>
				       	</div>
				    </div>
				</form>
            </div>
            <div class="col-md-6 ">
            	
            	<!-- <form method="post" id="changePassword">
            		<div class="form-group col-md-6 mb-3">
		       			<label class="mb-1" for="password"> Old Password </label>
		       			<div class="input-group">
		       				<input type="password" name="password" id="password" class="form-control" required  autocomplete="off">
		       				<span class="input-group-text" id="showpass_text" onclick="passReveal()"><i class="bi bi-eye"></i></span>
		       			</div>
		       		</div>
		       		<div class="form-group col-md-6 mb-3">
		       			<label class="mb-1" for="password"> New Password </label>
		       			<div class="input-group">
		       				<input type="password" name="password" id="password" class="form-control" required  autocomplete="off">
		       				<span class="input-group-text" id="showpass_text" onclick="passReveal()"><i class="bi bi-eye"></i></span>
		       			</div>
		       		</div>
		       		<div class="form-group col-md-6 mb-3">
		       			<label class="mb-1" for="password"> Retype Password </label>
		       			<div class="input-group">
		       				<input type="password" name="password" id="password" class="form-control" required  autocomplete="off">
		       				<span class="input-group-text" id="showpass_text" onclick="passReveal()"><i class="bi bi-eye"></i></span>
		       			</div>
		       		</div>
		       		<button class="btn btn-outline-danger">Change Password</button>
            	</form> -->
            </div>
        </div>
    </div>
</body>
</html>