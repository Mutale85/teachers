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
		            <h1>MY TCZ VERIFICATION</h1>
		        </div>
	            <fieldset>
	                <div class="form-group mb-5">
	                    <label class="col-md-12 control-label" for="nrc">
	                        Your NRC
	                    </label>
	                    <div class="input-group">
	                        <input id="nrc" name="nrc" type="text" autocomplete="off" placeholder="Enter your NRC" class="form-control" required>
	                        <button type="submit" id="submitBtn" class="btn btn-secondary">
	                        Verify
	                    	</button> 
	                    </div>
	                </div>
	                
	            </fieldset>
	        </form>   
	    </div>
	</div>
    <?php include("incs/footer.php")?>
    <script>
    	let state = false;
		let password = document.getElementById("password");
		

		password.addEventListener("keyup", function(){
		    let pass = document.getElementById("password").value;
		    checkStrength(pass);
		});

		function toggle(){
		    if(state){
		        document.getElementById("password").setAttribute("type","password");
		        state = false;
		    }else{
		        document.getElementById("password").setAttribute("type","text")
		        state = true;
		    }
		}

		function myFunction(show){
		    show.classList.toggle("bi-eye-slash");
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