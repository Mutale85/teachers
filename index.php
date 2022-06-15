<?php
	include 'includes/db.php';
	if (isset($_SESSION['user_email_axis'])){
		header("location:admins/");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="language" content="English">
	<meta name="author" content="Mutale Mulenga">

	<!-- Graphical Meta Tags -->
		<!-- Primary Meta Tags -->
	<title>Axis Physiotherapy Center Ltd - Mobility and Beyond</title>
	<meta name="title" content="Axis Physiotherapy Center Ltd - Mobility and Beyond">
	<meta name="description" content="To improve health and reduce illness through patient / client centered treatment with experienced professionals in a seamless and comprehensive environment that is cost friendly and focused on making sure that they achieve the best health result">

	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://axisphysiotherapycenter.tk/">
	<meta property="og:title" content="Axis Physiotherapy Center Ltd - Mobility and Beyond">
	<meta property="og:description" content="To improve health and reduce illness through patient / client centered treatment with experienced professionals in a seamless and comprehensive environment that is cost friendly and focused on making sure that they achieve the best health result">
	<meta property="og:image" content="gallery/metatag.jpeg">

	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="https://axisphysiotherapycenter.tk/">
	<meta property="twitter:title" content="Axis Physiotherapy Center Ltd - Mobility and Beyond">
	<meta property="twitter:description" content="To improve health and reduce illness through patient / client centered treatment with experienced professionals in a seamless and comprehensive environment that is cost friendly and focused on making sure that they achieve the best health result">
	<meta property="twitter:image" content="gallery/metatag.jpeg">

	<!--  -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="js/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="images/logo.png" href="images/logo.png">
	<link rel="stylesheet" type="text/css" href="css/gallery.css">
	<link rel="stylesheet" href="int17/build/css/intlTelInput.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/toastr.min.js"></script>
	<script src="int17/build/js/intlTelInput.js"></script>
</head>
<body>
	<div class="main_container">
		<div class="navbar_">
			<img src="images/logo.png" class="logo">
			<nav class="fixed">
				<ul id="menuList">
					<li><a href="#aboutus">About Us</a></li>
					<li><a href="#testmonials">Testimonials</a></li>
					<li><a href="#contactus">Contact Us</a></li>
				</ul>
			</nav>
			<i class="bi bi-list menu" id="menu" onclick="toggleMenu()"></i>
		</div>
		<div class="rows">
			<div class="cols-1">
				<h1>Axis Physiotherapy Center</h1>
				<h4 class="mb-4">Mobility & Beyond</h4>
				<button type="button" class="booking_btn" data-bs-toggle="modal" data-bs-target="#sessionModal">Book An Appointment <i class="bi bi-arrow-right"></i></button>
			</div>
			<div class="cols-2">
				<img src="images/undraw_medical_research_qg4d.svg" alt="physiotherapy-7069919.svg" class="physiotherapy">
				<div class="color-box"></div>
			</div>
		</div>
	</div>
	<div class="container-fluid bglight" id="bglight">
		<div class="container">
			<div class="row">
				
				<div class="col-md-12 mb-5 mt-5">
					<h2 class="text-center mb-4 text-white">REHABILITATION SERVICES</h2>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body">
							<h3 class="text-center mb-4 border-bottom pb-2"><i class="bi bi-circle text-info"></i><br> Orthopedic Rehabilitation</h3>
							<ul>
								<li>Back Pain</li>
								<li>Neck Pain</li>
								<li>Post Trauma</li>
								<li>Post Fracture</li>
								<li>Arthritis</li>
								<li>Muscular / Ligament Injury</li>
								<li>Sports Injury</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body">
							<h3 class="text-center mb-4 border-bottom pb-2"><i class="bi bi-circle text-info"></i><br> Women's Health Rehab</h3>
							<ul>
								<li>Antenatal Care</li>
								<li>Post Natal Care</li>
								<li>Geriatric Care</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body">
							<h3 class="text-center mb-4 border-bottom pb-2"><i class="bi bi-circle text-info"></i><br> Pediatric Rehabilitation</h3>
							<ul>
								<li>Cerebral Palsy</li>
								<li>Down Syndrome</li>
								<li>Torticolis</li>
								<li>Developmental milestone</li>
								<li>Hydrocephalus</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body">
							<h3 class="text-center mb-4 border-bottom pb-2"><i class="bi bi-circle text-info"></i><br> Neurological Rehabilitation</h3>
							<ul>
								<li>Stroke</li>
								<li>Parkinson's Disease</li>
								<li>Dystrophies</li>
								<li>Facial Palsy</li>
								<li>Nerve Injuries</li>
								<li>Spinal Cord Injuries</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body">
							<h3 class="text-center mb-4 border-bottom pb-2"><i class="bi bi-circle text-info"></i><br> Cardiopulmonary Rehabilitation</h3>
							<ul>
								<li>Asthma</li>
								<li>COPD</li>
								<li>Tuberculosis</li>
								<li>Post CABG</li>
								<li>Post Heart / Lung Surgery</li>
								<li>Post COVID / Long COVID</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 mb-4">
					<div class="card">
						<div class="card-body">
							<h3 class="text-center mb-4 border-bottom pb-2"><i class="bi bi-circle text-info"></i><br> Sports Rehabilitation</h3>
							<ul>
								<li>Sprains</li>
								<li>Strain</li>
								<li>Post Operation</li>
								<li>Post Fracture</li>
								<li>Fitness</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid aboutUs mb-5">
		<div class="container">
			<div class="row abt">
				<div class="col-md-7">
					<img src="images/leg.jpeg" alt="leg" class="leg img-fluid shadow">
				</div>
				<div class="col-md-5 mb-5">
					<h3 class="text-center mb-4 pb-2" id="aboutus"><i class="bi bi-circle text-info"></i><br> About Us</h3>
					<hr>
					<p class="fs-5">We are a private physiotherapy facility that is helping our clients to achieve "MOBILITY and BEYOND". We believe in a holistic approach to their physiotherapy</p>
				</div>
				<div class="col-md-5 mt-5">
					<h3 class="text-center mb-4 pb-2"><i class="bi bi-circle text-info"></i><br> Our Mission</h3>
					<hr>
					<p class="fs-5">
						To improve health and reduce illness through patient / client centered treatment with experienced professionals in a seamless and comprehensive environment that is cost friendly and focused on making sure that they achieve the best health result
					</p>
				</div>
				<div class="col-md-7">
					<img src="images/back.png" alt="leg" class="leg img-fluid shadow">
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-light session">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mb-5">
					<h4 class="mb-4" id="contactus">Book a Session</h4>

					<form class="" method="post">
						<div class="form-group mb-2">
							<label class="mb-2">First name</label>
							<input type="text" name="firstname" id="firstname" class="form-control" required>
						</div>
						<div class="form-group mb-2">
							<label class="mb-2">Last name</label>
							<input type="text" name="lastname" id="lastname" class="form-control" required>
						</div>
						<div class="form-group mb-2">
							<label class="mb-2">Email</label>
							<input type="email" name="email" id="email" class="form-control" required>
						</div>
						<div class="form-group mb-2">
							<label class="mb-2">Phone number</label>
							<input type="text" name="clients_phone" id="clients_phone" class="form-control" required onkeyup="completePhone(this.value)">
							<input type="hidden" name="phonenumber" id="phonenumber" class="form-control">
						</div>
						<div class="form-group mb-2">
							<label class="mb-2">Your Message </label>
							<textarea name="message" id="message" class="form-control" rows="5"></textarea>
						</div>
						<button type="submit" id="submit" class="booking_btn">Submit</button>
					</form>
				</div>
				<div class="col-md-6 mb-5">
					<h4 class="mb-4 text-center">Our Location</h4>
					
					<div id="googleMap" style="width:100%;height:400px;"></div>

					<script>
						function myMap() {
							var myLatlng = new google.maps.LatLng(-15.398337921928835, 28.303287455133855);
							var mapOptions = {
							  zoom: 4,
							  center: myLatlng
							}
							var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

							var marker = new google.maps.Marker({
							    position: myLatlng,
							    title:"Hello World!"
							});

							// To add the marker to the map, call setMap();
							marker.setMap(map);

						}
						window.initMap = myMap;
						
					</script>

					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvcT9sg02JnCt4JqBpA0oHNjZHeJntkt8&callback=myMap"></script>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		
		<div class="container">
			<h2 class="text-center mb-4">Our Gallery</h2>
			<p>
                <section class="img-gallery-magnific">
		            <?php 
		                $query = $connect->prepare("SELECT * FROM gallery");
		                $query->execute(array());
		                $count = $query->rowCount();
		                if ($count > 0) {
		                    foreach ($query->fetchAll() as $row) {
		            ?>      

		                        <div class="magnific-img">
		                            <a class="image-popup-vertical-fit" href="uploads/<?php echo $row['image']?>" title="<?php echo $row['image']?>">
		                                <img src="uploads/<?php echo $row['image']?>" alt="<?php echo $row['image']?>" class="shadow img-thumbnail mb-1">
		                            </a>
		                        </div>
		                    
		            <?php
		                    }
		                }else{
		            ?>
		                <h4>Login in to </h4>   
		            <?php        
		                }
		            ?>
                </section>
            </p>
		</div>
	</div>
	<div class="container-fluid mt-5 Testimonials">
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-12 text-center">
					<h4 class="" id="testmonials">Testimonials</h4>
					<img src="images/testimonials.png" class="img-fluid " alt="Testimonials">
				</div>
			</div>
		</div>
	</div>
	
	<?php include 'footer.php';?>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Login In</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      	<div class="modal-body">
		    	<form id="loginForm" method="post">
					<div class="form-group mb-2">
						<input type="email" name="email" id="login_email" class="form-control" placeholder="Email" required autocomplete="off">
					</div>
					<div class="form-group mb-2">
						<div class="input-group">
							<input type="password" name="password" id="password2" data-pass="password" class="form-control" placeholder="Password" required autocomplete="off">
							<span class="input-group-text" id="showpass_text2" onclick="passReveal()"><i class="bi bi-eye"></i></span>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<button id="loginBtn" type="submit" class="btn btn-dark">Login</button>
						<a href="forgot-password" title="password" class="text-dark text-decoration-none">Forgot Password</a>
					</div>
				</form>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
	      	</div>
	    </div>
	  </div>
	</div>


	<div class="modal fade" id="sessionModal" tabindex="-1" aria-labelledby="sessionModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">Book a Session</h5>
		        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      	</div>
	      		<div class="modal-body">
		    		<form class="" method="post">
						<div class="form-group mb-2">
							<label class="mb-2">First name</label>
							<input type="text" name="firstname" id="firstname" class="form-control" required>
						</div>
						<div class="form-group mb-2">
							<label class="mb-2">Last name</label>
							<input type="text" name="lastname" id="lastname" class="form-control" required>
						</div>
						<div class="form-group mb-2">
							<label class="mb-2">Email</label>
							<input type="email" name="email" id="email" class="form-control" required>
						</div>
						<div class="form-group mb-2">
							<label class="mb-2">Phone number</label>
							<input type="text" name="clients_phone" id="clients_phone" class="form-control" required onkeyup="completePhone(this.value)">
							<input type="hidden" name="phonenumber" id="phonenumber" class="form-control">
						</div>
						<div class="form-group mb-2">
							<label class="mb-2">Your Message </label>
							<textarea name="message" id="message" class="form-control" rows="5"></textarea>
						</div>
						<button type="submit" id="submit" class="booking_btn">Submit</button>
					</form>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	  	</div>
	</div>

	<script>
		var menuList = document.getElementById('menuList');
		var menu = document.getElementById('menu');
		menuList.style.maxHeight = '0px';
		function toggleMenu() {
			if (menuList.style.maxHeight == '0px') {
				menuList.style.maxHeight = '130px';
				menu.classList.add("bi-x-circle");
				menu.classList.remove("bi-list");
			}else{
				menuList.style.maxHeight = '0px';
				menu.classList.remove("bi-x-circle");
				menu.classList.add("bi-list");
			}
		}

		$('a[href*="#"]')
		  // Remove links that don't actually link to anything
		  .not('[href="#"]')
		  .not('[href="#0"]')
		  .click(function(event) {
		    // On-page links
		    if (
		      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		      && 
		      location.hostname == this.hostname
		    ) {
		      // Figure out element to scroll to
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		      // Does a scroll target exist?
		      if (target.length) {
		        // Only prevent default if animation is actually gonna happen
		        event.preventDefault();
		        $('html, body').animate({
		          scrollTop: target.offset().top
		        }, 1000, function() {
		          // Callback after animation
		          // Must change focus!
		          var $target = $(target);
		          $target.focus();
		          if ($target.is(":focus")) { // Checking if the target was focused
		            return false;
		          } else {
		            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
		            $target.focus(); // Set focus again
		          };
		        });
		      }
		    }
		  });

		// login
		var showpass2 = document.getElementById('showpass_text2');
		function passReveal(){
			var password2 = document.getElementById('password2');
		    if(password2.type == 'password') {
		        password2.type = 'text';
		        showpass2.innerHTML = '<i class="bi bi-eye-slash"></i>';
		    }else {
		        password2.type = 'password';
		        showpass2.innerHTML = '<i class="bi bi-eye"></i>';
		    }
		}

		var sign_in = document.getElementById('loginBtn');
		var LoginFormNow = document.getElementById('loginForm');
		var email = document.getElementById('login_email');
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

		// image gallery

        $(document).ready(function(){
            $('.image-popup-vertical-fit').magnificPopup({
                type: 'image',
              mainClass: 'mfp-with-zoom', 
              gallery:{
                        enabled:true
                    },

              zoom: {
                enabled: true, 

                duration: 300, // duration of the effect, in milliseconds
                easing: 'ease-in-out', // CSS transition easing function

                opener: function(openerElement) {

                  return openerElement.is('img') ? openerElement : openerElement.find('img');
              }
            }

            });

        });

        // submit booking

        var input = document.querySelector("#clients_phone");
     	var iti = intlTelInput(input, {
	        autoHideDialCode: true,
	        autoPlaceholder: true,
	        separateDialCode: true,
	        nationalMode: true,
	        allowDropdown: true,
	        autoPlaceholder: "polite",
	        dropdownContainer: document.body,
	          geoIpLookup: function(callback) {
	            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
	              var countryCode = (resp && resp.country) ? resp.country : "";
	              callback(countryCode);
	            });
	          },
	          nationalMode: false,
	          placeholderNumberType: "MOBILE",
	          preferredCountries: ['zm'],
	          separateDialCode: true,
	        utilsScript: "intl.17/build/js/utils.js",
	    });
	    function completePhone(phone){
			var number = iti.getNumber(intlTelInputUtils.numberFormat.E164);
			var isValid = iti.isValidNumber();
			result = document.querySelector("#result");
			phonenumber = document.getElementById("phonenumber");
			if (phone == "") {
				
				return false;
			}
			if (isValid === true) {
			  	
			  	phonenumber.value = number;
			}else if(isValid === false){
			  	phonenumber.value = number;
			}
		}
	</script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
</body>
</html>






