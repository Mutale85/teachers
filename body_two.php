<nav class="navbar navbar-expand-lg navbar-light bg-light">
  	<div class="container-fluid">
	    <a class="navbar-brand" href="#">RecoAsk</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	      	<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		        <li class="nav-item dropdown">
		          	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		            	What's for Today?  
		          	</a>
		          	<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
		            	<li><a class="dropdown-item select_state" href="Recommending">Recommend</a></li>
		            	<li><a class="dropdown-item select_state" href="Asking">Post a Question</a></li>
		            	<li><hr class="dropdown-divider"></li>
		            	<li><a class="dropdown-item" href="logout">Sign Out</a></li>
		         	</ul>
		        </li>
	      	</ul>
	      	
      		<form class="d-flex">
        		<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        		<button class="btn btn-outline-success" type="submit">Search</button>
      		</form>
    	</div>
  	</div>
</nav>
<style>
	/*#region presentation purpose */
.credits {
	font-family: sans-serif;
	font-size: 13px;
	position: relative;
	top: .3em;
	left: 0px;
}

.credits .code-credits {
	background-color: #fff
	border-radius: 4px;
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
	color: rgba(255, 255, 255, .9);
	display: block;
	max-width: 300px;
	padding: 8px;
}

.credits .code-credits::after {
	content: "";
	display: block;
	clear: both;
}

.credits .code-credits img {
	border-radius: 4px;
	float: left;
	margin-right: 12px;
	width: 64px;
}

.credits .code-credits > div {
	float: left;
}

.credits .code-credits .cc-name {
	font-weight: bold;
	font-size: 16px;
}

.credits .code-credits .cc-follow {
	display: block;
	margin-top: 2px;
}

.credits .code-credits .cc-follow a:last-child {
	margin-left: 4px;
}

.credits .code-credits .cc-follow a:link,
.credits .code-credits .cc-follow a:visited {
	background-color: #eff3f6;
	background-image: linear-gradient(-180deg, #fafbfc, #eff3f6 90%);
	border: 1px solid #d6d6d6;
	border-radius: 4px;
	color: #24292e;
	font-weight: bold;
	letter-spacing: -0.3px;
	padding: 4px 10px;
	text-decoration: none;
}

.credits .code-credits .cc-follow a:hover,
.credits .code-credits .cc-follow a:active {
	color: #fff;
	background-color: #3072b3;
	background-image: -webkit-linear-gradient(#599bdc, #3072b3);
	background-image: -moz-linear-gradient(#599bdc, #3072b3);
	background-image: -ms-linear-gradient(#599bdc, #3072b3);
	background-image: linear-gradient(#599bdc, #3072b3);
	border-color: #518cc6 #518cc6 #2a65a0;
	text-decoration: none;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}

.credits .code-credits .cc-follow a:first-child:hover,
.credits .code-credits .cc-follow a:first-child:active {
	color: #fff;
	background-color: #000;
	background-image: -webkit-linear-gradient(#555, #000);
	background-image: -moz-linear-gradient(#555, #000);
	background-image: -ms-linear-gradient(#555, #000);
	background-image: linear-gradient(#555, #000);
	border-color: #555 #555 #000;
	text-decoration: none;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
</style>
<div class="container">
	<div class="credits">
		<!-- code -->
		<div class="code-credits">
			<img src="<?php echo get_gravatar($_SESSION['user_email'])?>" class="img-fluid rounded-circle shadow">
			<div>
				<span class="cc-made-by text-secondary"><span class="text-center" id="greetings"></span></span>
				<div class="cc-name text-secondary"> </div>
				<div class="cc-follow">
					<a href="Recommending" class="select_state" title="Follow me on Github">
						Recommend
					</a>
					<a href="Asking" class="select_state" title="Follow me on CodePen">
						Post Question
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mt-4 mb-2 text-center">
			<h3 class="text-center"> Daily Questions and Recommendations</h3>
		</div>
		<div class="col-md-12 mt-5">
			<!-- Recommendation -->
			<div class="modal fade" id="textareaModal" tabindex="-1" aria-labelledby="textareaModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
					  	<div class="modal-header">
					    	<h5 class="modal-title" id="exampleModalLabel">My Recommendations</h5>
					    	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  	</div>
					  	<form method="post" id="recommendingForm">
						  	<div class="modal-body">
						    	<div>
						    		<div class="form-group mb-2">
						    			<label class="mb-2">What are you recommending?</label>
						    			<textarea placeholder="" name="recommendation" id="recommendation" class="form-control" maxlength="300" placeholder="Start Typin..." autofocus required></textarea>
						    			<div id="the-count">
											<span id="current">0</span>
											<span id="maximum">/ 300</span>
										</div>
						    		</div>
						    		<!-- <div class="border-bottom"></div> -->
	                                <div id="newPvt">
	                                	<div class="form-group mb-2">
	                                		<label class="mb-2">Option 1</label>
	                                   		<div class="input-group">
				                    			<input type="text" name="choices[]" id="choices" class="form-control" placeholder="Enter Option">
				                    			<button type="button" id="addnewPvt" class="btn btn-success"><i class="bi bi-plus-circle"></i></button>
				                    		</div>
				                    	</div> 
	                                </div>
		                        </div>
						  	</div>
						  	<div class="modal-footer">
						    	<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						    	<button type="submit" class="btn btn-primary" id="submit_btn">Submit </button>
						  	</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Question -->
			<div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
					  	<div class="modal-header">
					    	<h5 class="modal-title" id="exampleModalLabel"> My Question </h5>
					    	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  	</div>
					  	<form method="post" id="questionForm">
						  	<div class="modal-body">
						    	<div>
						    		<div class="form-group mb-2">
						    			<label class="mb-2 text-secondary"> Start your question with Why or What or How</label>
						    			<textarea placeholder="" name="question" id="question" class="form-control" maxlength="300" placeholder="Start Typin..." autofocus required></textarea>
						    			<div id="the-count2">
											<span id="current2">0</span>
											<span id="maximum2">/ 300</span>
										</div>
						    		</div>
		                        </div>
						  	</div>
						  	<div class="modal-footer">
						    	<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
						    	<button class="btn btn-primary" type="submit">Submit Question</button>
						  	</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End of Question -->
		</div>
		<div class="col-md-12">
			<h4>Recommendations</h4>
		</div>
		<div id="fetchRecommendation" class="row"></div>
		

		<div class="col-md-12 mt-5">
			<h4>Questions</h4>
		</div>
	</div>
</div>

<script>

	$(".select_state").click(function(e){
		e.preventDefault();
		var data = $(this).attr("href");
		
		if (data == "Recommending") {
			$("#questionModal").modal("hide");
			$("#textareaModal").modal("show");
		}else if (data === 'Asking') {
			$("#questionModal").modal("show");
			$("#textareaModal").modal("hide");
		}else{
			$("#questionModal").modal("hide");
			$("#textareaModal").modal("hide");
		}
	})
	

	var thevalue = 1;
	var maxField = 4;
	var x = 1;
	$("#addnewPvt").click(function(){
        var html =
        	'<div class="" id="newEmployee">'+
    			'<div class="form-group mb-2">'+
                	'<label class="mb-2">Option </label>'+
                	'<div class="input-group">'+
                		'<input type="text" name="choices[]" id="choices" class="form-control" placeholder="Enter Option">'+
                			'<button type="button"  id="removeRow" class="btn btn-danger btn-sm" ><i class="bi bi-trash"></i></button>'+
                		
                	'</div>'+
                '<div>'+
            '</div>';
            if(x < maxField){ 
        		x++;
            	$("div#newPvt").append(html);
        	}else{
        		alert("Only 4 Options are allowed");
        	}
    })

    $(document).on('click', '#removeRow', function () {
        $(this).closest('#newEmployee').remove();
        x--;
    });

    
    $(function(){
        $('#question').keyup(function() {
    
			var characterCount = $(this).val().length,
			  	current = $('#current2'),
			  	maximum = $('#maximum2'),
			  	theCount = $('#the-count2');

			current.text(characterCount);
			/*This isn't entirely necessary, just playin around*/
			if (characterCount < 70) {
				current.css('color', '#666');
			}
			if (characterCount > 70 && characterCount < 90) {
			current.css('color', '#6d5555');
			}
			if (characterCount > 90 && characterCount < 100) {
			current.css('color', '#793535');
			}
			if (characterCount > 100 && characterCount < 120) {
			current.css('color', '#841c1c');
			}
			if (characterCount > 120 && characterCount < 139) {
			current.css('color', '#8f0001');
			}

			if (characterCount >= 140) {
				maximum.css('color', '#8f0001');
				current.css('color', '#8f0001');
				theCount.css('font-weight','bold');
				} else {
				maximum.css('color','#666');
				theCount.css('font-weight','normal');
			}	  
		});

		$('#recommendation').keyup(function() {
    
			var characterCount = $(this).val().length,
			  	current = $('#current'),
			  	maximum = $('#maximum'),
			  	theCount = $('#the-count');

			current.text(characterCount);
			/*This isn't entirely necessary, just playin around*/
			if (characterCount < 70) {
				current.css('color', '#666');
			}
			if (characterCount > 70 && characterCount < 90) {
			current.css('color', '#6d5555');
			}
			if (characterCount > 90 && characterCount < 100) {
			current.css('color', '#793535');
			}
			if (characterCount > 100 && characterCount < 120) {
			current.css('color', '#841c1c');
			}
			if (characterCount > 120 && characterCount < 139) {
			current.css('color', '#8f0001');
			}

			if (characterCount >= 140) {
				maximum.css('color', '#8f0001');
				current.css('color', '#8f0001');
				theCount.css('font-weight','bold');
				} else {
				maximum.css('color','#666');
				theCount.css('font-weight','normal');
			}	  
		});
	})

	var myDate = new Date();
	var hrs = myDate.getHours();

	var greet;

	if (hrs < 12)
	  greet = 'Good Morning';
	else if (hrs >= 12 && hrs <= 17)
	  greet = 'Good Afternoon';
	else if (hrs >= 17 && hrs <= 24)
	  greet = 'Good Evening';

	document.getElementById('greetings').innerHTML ='<b>' + greet + ', <?php echo $_SESSION['fullnames'] ?></b>';

	$(function(){
		// Recommend 
		$("#recommendingForm").submit(function(e){
			e.preventDefault();
			var recommendingForm = document.getElementById('recommendingForm');
			var data = new FormData(recommendingForm);
			var url = 'includes/postRecommendation';
			$.ajax({
				url:url+'?<?php echo time()?>',
				method:"post",
				data:data,
				cache : false,
				processData: false,
				contentType: false,
				beforeSend:function(){
					$("#submit_btn").html("<i class='spinner-border'></i> Processing...");
				},
				success:function(data){
					errorNow(data);
					
					fetchRecommendation();
					$("#recommendingForm")[0].reset();
					$("#submit_btn").html("Submit changes");
				}
			})
		})
	})

	function fetchRecommendation(){
		var data = "fetchRecommendation";
		$.ajax({
			url:'includes/fetchRecommendation',
			method:"post",
			data:data,
			success:function(data){
				
				$("#fetchRecommendation").html(data);
			}
		})
	}

	fetchRecommendation();

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