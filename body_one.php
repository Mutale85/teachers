<div class="container">
	<section class="intro">
	    <div class="row">
	      	<div class="col-lg-6 col-sm-12 left">
	      		<form id="signupForm" method="post" class="mt-5">
					<h2 class="mb-4 border-bottom pb-2">Create your account</h2>
					<div class="form-group mb-2">
						<input type="text" name="username" placeholder="User name" class="form-control" required="">
					</div>
					<div class="form-group mb-2">

						<input type="email" name="email" placeholder="Email" class="form-control" required="">
					</div>
					<div class="form-group mb-2">
						<div class="input-group">
							<input type="password" name="password" id="password" placeholder="Should be more than 8 characters" class="form-control" required="">
							<span class="input-group-text" id="showpass_text" onclick="passReveal()"><i class="bi bi-eye"></i></span>
						</div>
					</div>
					<button class="btn btn-dark" id="submitBtn" type="submit">Sign up</button>
				</form>
	      	</div>
	      	<div class="col-lg-6 col-sm-12 right">
	        	<form id="loginForm" method="post" class="mt-5">
					<h2 class="mb-4 border-bottom pb-2">Login</h2>
					<div class="form-group mb-2">
						<input type="email" name="email" id="email" class="form-control" placeholder="Email" required autocomplete="off">
					</div>
					<div class="form-group mb-2">
						<div class="input-group">
							<input type="password" name="password" id="password2" data-pass="password" class="form-control" placeholder="Password" required autocomplete="off">
							<span class="input-group-text" id="showpass_text2" onclick="showReveal()"><i class="bi bi-eye"></i></span>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<button id="loginBtn" type="submit" class="btn btn-dark">Login</button>
						<a href="forgot-password" title="password" class="text-dark text-decoration-none">Forgot Password</a>
					</div>
				</form>
	      	</div>
	    </div>    
	</section>
</div>
<script>
	var showpass = document.getElementById('showpass_text');
	var password = document.getElementById('password');
	var showpass2 = document.getElementById('showpass_text2');
	function passReveal(){
		var password = document.getElementById('password');
	    if(password.type == 'password') {
	        password.type = 'text';
	        showpass.innerHTML = '<i class="bi bi-eye-slash"></i>';
	    }else {
	        password.type = 'password';
	        showpass.innerHTML = '<i class="bi bi-eye"></i>';
	    }
	}
	function showReveal(){
		var password2 = document.getElementById('password2');
	    if(password2.type == 'password') {
	        password2.type = 'text';
	        showpass2.innerHTML = '<i class="bi bi-eye-slash"></i>';
	    }else {
	        password2.type = 'password';
	        showpass2.innerHTML = '<i class="bi bi-eye"></i>';
	    }
	}

	$(function(){
		$(".signupDiv").click(function(){
			$(".signup").show('slow');
			$(".login").hide('slow');
		});

		$(".loginDiv").click(function(){
			$(".login").show('slow');
			$(".signup").hide('slow');
		})
	})

	var sign_in = document.getElementById('loginBtn');
	var LoginFormNow = document.getElementById('loginForm');
	var email = document.getElementById('email');
	var password = document.getElementById('password2');

	var url = 'includes/loginMember';
	var xhr = new XMLHttpRequest();

	LoginFormNow.addEventListener('submit', (event) => {
		event.preventDefault();
		if(email.value == ""){
			alert("email is required");
			email.focus();
			return false;
		}
		if(password.value == ""){
			alert("password is required");
			password.focus();
			return false;
		}
		
		var data = new FormData(LoginFormNow);
		xhr.open('POST', url, true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200) {
				r = xhr.responseText;
				
	            	errorNow(r);
	            	setTimeout(function(){
						location.reload();
					}, 1000);
				sign_in.innerHTML = 'Sign In';
			}else{

			}
		}
		sign_in.innerHTML = '<div class="spinner-border text-primary"></div> Processing';
		xhr.send(data);
	})
	function loginsuccessNow(msg){
	    toastr.warning(msg);
	    toastr.options.progressBar = false;
	    toastr.options.positionClass = "toast-top-right";
	}
	function errorNow(msg){
	    toastr.error(msg);
	    toastr.options.progressBar = true;
	    toastr.options.positionClass = "toast-top-center";
	    toastr.options.showDuration = 1000;
	}
</script>