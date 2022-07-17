<!DOCTYPE html>
<html>
<head>
	<?php include("incs/header.php");?>
    <link rel="stylesheet" type="text/css" href="dist/css/forms.css">
</head>

<body>
	<?php include 'incs/nav.php';?>
	<div class="container-fluid">
	    <div class="containerForm">
	        <form class="form-horizontal" id="validateForm" method="post">
	        	<div class="text-center">
		        	<p><a href="./"><img src="images/logo_white.jpeg" class="img-fluid" width="100"></a></p>
		            <h1>SUBSCRIBE / CHANGE PASSWORD</h1>
		        </div>
	            <fieldset>
	                <div class="form-group">
	                    <label class="col-md-12 control-label" for="email">
	                        TCZ Number
	                    </label>
	                    <div class="col-md-12">
	                        <input id="text" name="email" type="text" autocomplete="off" class="form-control input-md" required>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-12 control-label" for="email">
	                        NRC Number (Passport Number if Foreign)
	                    </label>
	                    <div class="col-md-12">
	                        <input id="text" name="email" type="text" autocomplete="off" class="form-control input-md" required>
	                    </div>
	                </div>
	                
	                <!-- Password input-->
	                <div class="form-group">
	                    <label class="col-md-12 control-label" for="passwordinput">
	                        New Password
	                    </label>
	                    <div class="col-md-12">
	                    	<div class="input-group">
	                        	<input id="password" class="form-control input-md" name="password" type="password" placeholder="Your password" required>

		                        <span class="input-group-text show-pass" id="showpass" onclick="toggle()">
		                            <i class="bi bi-eye" id="eye"></i>
		                        </span>
		                    </div>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-md-12 control-label" for="passwordinput">
	                        Retype Password
	                    </label>
	                    <div class="col-md-12">
	                    	<div class="input-group">
	                        	<input id="retypepassword" class="form-control input-md" name="password" type="password" placeholder="Your password" required>

		                        <span class="input-group-text show-pass" id="showpass2" onclick="toggle2()">
		                            <i class="bi bi-eye" id="eye"></i>
		                        </span>
		                    </div>
	                    </div>
	                </div>
	                <div class="form-group mt-4">
	                    <button type="submit" id="submitBtn" class="btn btn-success">
	                        Sign In
	                    </button>    
	                </div>
	                <p>Forgot Password? <a href="applicantResetPassword">Click Here</a></p>
	            </fieldset>
	        </form>   
	    </div>
	</div>
    <?php include 'incs/footer.php';?>
    <script>
    	let state = false;
		let password = document.getElementById("password");
		
		var showpass = document.getElementById('showpass');
		
		function toggle(){
			var password = document.getElementById('password');
		    if(password.type == 'password') {
		        password.type = 'text';
		        showpass.innerHTML = '<i class="bi bi-eye-slash"></i>';
		    }else {
		        password.type = 'password';
		        showpass.innerHTML = '<i class="bi bi-eye"></i>';
		    }
		}

		var showpass2 = document.getElementById('showpass2');
		
		function toggle2(){
			var password = document.getElementById('retypepassword');
		    if(password.type == 'password') {
		        password.type = 'text';
		        showpass2.innerHTML = '<i class="bi bi-eye-slash"></i>';
		    }else {
		        password.type = 'password';
		        showpass2.innerHTML = '<i class="bi bi-eye"></i>';
		    }
		}
		

		// signin 

		$(function(){
			$("#validateForm").submit(function(e){
				e.preventDefault();
				var data = $(this).serialize();
				$.ajax({
					url:"includes/loginMember",
					method:"POST",
					data:data,
					beforeSend:function(){
						$("#submitBtn").html("<span class='spinner-border'></span> Processing...");
					},
					success:function(data){
						errorNow(data);
						setTimeout(function(){
							location.reload();
						}, 1000);
						// if(data === 'Redirecting you in 1 Second'){

						// }
						
						$("#validateForm")[0].reset();
					}

				})

			})
		})
    </script>
</body>