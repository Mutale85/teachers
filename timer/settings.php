<?php 
  	require ("../includes/db.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Business Identity</title>
	<?php include("main_header.php") ?>
	
	<link rel="stylesheet" type="text/css" href="../dist/css/cropper.css">
	<script type="text/javascript" src="../dist/js/cropperjs.js"></script>
	<link href="../dist/css/jquery.signature.css" rel="stylesheet">
	
	<style>
		.title {
			padding: 5px;
		}
		.title:hover {
			background-color: yellow;
			border:.5px dashed #ccc;
		}
		.logoDiv {
			border:1px dashed #ccc;
			height: auto;
			padding: .5em;
			cursor: pointer;
		}
		
		.logoDiv:hover {
			border:3px dashed #ccc;
		}

		#signature-pad {
			border:1px dashed #ccc;
		}
		.preview {
  			overflow: hidden;
  			width: 160px; 
  			height: 160px;
  			margin: 10px;
  			border: 1px solid red;
		}

		.image_area {
		  	position: relative;
		}

		img#sample_image {
		  	display: block;
		  	width: 100%;
		}
		.overlay {
			position: absolute;
			bottom: 10px;
			left: 0;
			right: 0;
			background-color: rgba(255, 255, 255, 0.5);
			overflow: hidden;
			height: 100px;
			transition: .5s ease;
			width: 100%;
		}

		.image_area:hover .overlay {
		  	height: 50%;
		  	cursor: pointer;
		}
		
	</style>
</head>
<body>
	<?php include ("nav_bar.php"); ?>
	<div class="container">
        <div class="row">
            
            <div class="col-md-6 mb-4">
              	<div class="card card-infos">
                	<div class="card-header">
                  		<h4 class="card-title">Business Details</h4>
                	</div>
                	<div class="card-body">
                  		<div id="companyLogo"></div>
                	</div>
              	</div>
            </div>
				
            <!-- Signature -->

            <div class="col-md-6 mb-4" style="display: nones;">
            	<div class="card">
            		<div class="card-header">
            			<h4 class="card-title">Create Your Signature</h4>
            		</div>
            		<div class="card-body">
            			<div id="result"></div>
            			<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add Signature</button>
						<button type="button" class="btn btn-secondary btn-sm Resize" data-bs-toggle="myModal" data-bs-target="#myModal"> Resize Signature</button>
            		</div>
            	</div>
            </div>
        </div>
    </div>
	<div class="modal fade" id="BusinessModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
	  	<div class="modal-dialog modal-lg">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h4 class="modal-title" id="myModalLabel">Address and Phone Contacts</h4>
	        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
	      		</div>
	      		<div class="modal-body">
	      			<img src="images/icon2.png" id="newlogo_image2" class="img-fluid mb-3" style="border:1px solid #ccc; width: 80px; height: 80px; border-radius: 50%;"><br>
                    <a href="" class="btn btn-info btn-sm rounded-pill add_logo" id="add_logo">Change Logo</a><br><br>
	      			<hr>
	      			<form method="post" id="orgForm" enctype="multipart/form-data">
	      				<div class="row">
	   						<input type="file" name="org_logo" id="org_logo2" class="form-controls" accept="image/png, image/jpg, image/jpeg" onchange="document.getElementById('newlogo_image2').src = window.URL.createObjectURL(this.files[0])" style="display: none;">
		      				<div class="form-group col-md-6">
		                          <label>Business Name</label>
		                          <input type="text" name="organisation_name" id="organisation_name" class="form-control">
		                          <input type="hidden" name="parent_id" id="parent_id" value="<?php echo $_SESSION['parent_id']?>">
		                          <input type="hidden" name="ID" id="ID" value="">
	                        </div>
	                        <div class="form-group col-md-6">
		                		<label>Type of Organisation</label>
		                		<select class="form-control" name="organisation_type" id="organisation_type">
		                			<option value="">Select Category</option>
	                        		<option value="Accounts">Accounts</option>
	                        		<option value="Agriculture">Agriculture</option>
	                        		<option value="Banking">Banking</option>
	                        		<option value="IT Services">IT Services</option>
	                        		<option value="Construction">Construction</option>
	                        		<option value="Education">Education</option>
	                        		<option value="Engineering">Engineering</option>
	                        		<option value="Finance">Finance</option>
	                        		<option value="Health">Health</option>
	                        		<option value="Hospitality">Hospitality</option>
	                        		<option value="Legal">Legal</option>
	                        		<option value="Manufaturing">Manufaturing</option>
	                        		<option value="Marketing">Marketing</option>
	                        		<option value="Transport">Transport</option>
	                        		<option value="Other">Other</option>
	                        		<option value="Sales">Sales</option>
		                		</select>
		                	</div>
	                        <div class="form-group col-md-6">
	                          	<label>Contact Email</label>
	                          	<input type="text" name="admin_email" id="admin_email" class="form-control" value="<?php echo $_SESSION['user_mail_bazity']?>" required>
	                        </div>
	                        <div class="form-group col-md-6">
	                          	<label>Contact Phone</label>
	                          	<input type="text" name="hq_phone" id="hq_phone" class="form-control" value="" required>
	                        </div>
	                        <div class="form-group col-md-6">
	                          	<label>Contact Address</label>
	                          	<textarea name="hq_address" id="hq_address" class="form-control" rows="2" required></textarea>
	                        </div>
	                        <div class="form-group col-md-6">
	                          	<label>Website</label>
	                          	<input type="url" name="website" id="website" class="form-control" value="" required>
	                        </div>
	                        <div class="form-group col-md-6">
	                        	<label>Change Background Color</label>
	                        	<input type="color" name="bg_color" id="bg_color" class="form-control">
	                        </div>
	                        <div class="form-group col-md-6">
	                        	<label>Change text Color</label>
	                        	<input type="color" name="text_color" id="text_color" class="form-control">
	                        </div>
							<button class="btn btn-info shadow" type="submit" id="submit">Submit</button>
						</div>
					</form>
	      		</div>
				<div class="modal-footer">
			        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
			    </div>
	      	</div>
	    </div>
	</div>
 
		<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLabel">Sign in the Box</h5>
	        		<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
	      		</div>
	      		<div class="modal-body">
                    <div id="signatureContainer"></div>
                    <form id="signatureForm">
                        
                        <input type="hidden" class="form-control" id="inputSignatureName" name="signatureName">
                        <input type="hidden" id="inputSignatureID" name="signatureID">
                        <input type="hidden" id="action" name="action">
                    </form>
                    <p class="btn btn-group">
                        <button class="btn btn-outline-danger" id="clear">Clear</button>
                        <button class="btn btn-outline-success" id="svg">Save Signature</button>
                    </p>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
		<!-- Crop Image Modal Before Saving -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title">Crop Image Before Upload</h5>
	        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
	          			
	        		</button>
	      		</div>
	      		<div class="modal-body">
	        		<div class="img-container">
	            		<div class="row">
	                		<div class="col-md-8">
	                    		<img src="" id="sample_image" class="mb-5">
	                    		<input type="hidden" name="image_name" id="image_name" class="form-control mt-4" placeholder="Save As: Enter Name" required>
	                		</div>
	                		<div class="col-md-4">
	                    		<div class="preview"></div>
	                		</div>
	            		</div>
	        		</div>
	      		</div>
	      		<div class="modal-footer">
	      			<button type="button" id="crop" class="btn btn-primary">Crop</button>
	        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="../dist/js/jquery.signature.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
	<script>
		$(function(){
			$(document).on('click', '#add_logo', function(event){
				event.preventDefault();
				$("#org_logo").click();
			})
		
			$(document).on("submit", "#orgForm", function(e){
			      e.preventDefault();
			      var data = document.getElementById('orgForm');
			      var formData = new FormData(data);
			      $.ajax({
			        url:"parsers/submitOrgData",
			        method:'POST',
			        data: formData,
			        cache : false,
			        processData: false,
			        contentType: false,
			        beforeSend:function(){
			          $("#submit").html('<i class="fa fa-spinner fa-spin"></i>');
			        },
			        success:function(data){
			          	successNow(data);
			          	callLogo();
			          	$("#submit").html('Submit');
			        }
			      })
			})

	    	$(document).on("click", ".editData", function(e){
	      		e.preventDefault();
	      		$("#BusinessModal").modal("show");
	      		var organisation_id = $(this).data("id");
		      	$.ajax({
			        url:"parsers/edits",
			        method:"post",
			        data:{organisation_id:organisation_id},
			        dataType:"JSON",
		        	success:function(data){
		        		preview_logo(data.org_logo);
						// $("#org_logo").val(data.org_logo);
						$("#organisation_name").val(data.organisation_name);
						$("#organisation_type").val(data.organisation_type);
						$("#admin_email").val(data.admin_email);
						$("#hq_phone").val(data.hq_phone);
						$("#hq_address").val(data.hq_address);
						$("#website").val(data.website);
						$("#bg_color").val(data.background_color);
						$("#text_color").val(data.text_color);
						$("#ID").val(data.id);
		        	}
	      		})
	    	})
	    })

	    function preview_logo(img) {
			var output = document.getElementById('newlogo_image2');
			output.src = 'uploads/'+img;
		}

    	function successNow(msg){
	      	toastr.success(msg);
	        toastr.options.progressBar = true;
	        toastr.options.positionClass = "toast-top-center";
	        toastr.options.showDuration = 1000;
	    }

	    function errorNow(msg){
	    	toastr.error(msg);
	        toastr.options.progressBar = true;
	        toastr.options.positionClass = "toast-top-center";
	        toastr.options.showDuration = 1000;
	    }

	    function callLogo(){
			var data = "companyLogo = logo";
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "parsers/fetchOrgData", true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.onreadystatechange = function(){
				if (this.readyState === XMLHttpRequest.DONE && this.status === 200){
					var result = xhr.responseText;
					document.getElementById("companyLogo").innerHTML = result;
				}
			}
			xhr.send(data);
		}
		// callLogo();
    </script>
    <script>
        $(function() {
            var b4sign = {
                dataTable:null,
                signBar: $('#signatureContainer').signature({ color: '#0080FF' }),
                // myModal : $('#myModal').modal("show"),

                checkContainer:function(){
                    if (this.signBar.signature('isEmpty')) {
                         alert("Signature Canvas Is Empty");
                         return true;
                    }
                    return false;
                },
                svgSave:function(){
                    if (this.checkContainer()) return;
                    
                    $.ajax({
                        url: "signage/save-signature",
                        method: 'POST',
                        data: {
                            action: "saveSVG",
                            inputSignatureName: inputSignatureName.value,
                            signature: this.signBar.signature('toSVG'),

                        },
                        dataType: 'json',
                        success: function(data) {
                            successNow(data.msg);
                            b4sign.signBar.signature('clear');
                            b4sign.getSignanture();
                            b4sign.getSignantureForCroping();
                            // exampleModal: $("#exampleModal").modal("hide");
                            myModal : $('#myModal').modal("show");
                        }
                    });
                },
                
                getSignanture:function(){
                    $.ajax({
                        url: "signage/fetch-signature",
                        method: 'POST',
                        data: {
                            action: "getSignanture",
                            "parent_id": '<?php echo $_SESSION['parent_id']?>',
                            "email"	   : '<?php echo $_SESSION['user_mail_bazity']?>',
                        },
                        
                        success: function(data) {
                            $('#result').html(data);
                        }
                    });
                },
               getSignantureForCroping:function(){
                    $.ajax({
                        url: "signage/fetch-signature",
                        method: 'POST',
                        data: {
                            action: "getSignantureForCroping",
                            "parent_id": '<?php echo $_SESSION['parent_id']?>',
                            "email"	   : '<?php echo $_SESSION['user_mail_bazity']?>',
                        },
                        success: function(data) {
                            // $('#preview').html(data);
                            var image_name = $("#image_name").val(data);
                            // myModal : $('#myModal').modal("show");
                            var image = document.getElementById('sample_image');
                            image.src = data;

                        }
                    });
                },

                Resize:function(){

                }
            };
            // b4sign.initializeDatatable();
            b4sign.getSignanture();
            b4sign.getSignantureForCroping();
            b4sign.signBar;
            
            $('#clear').click(function() {
                b4sign.signBar.signature('clear');
            });
           
            $('#svg').click(function() {
                b4sign.svgSave();
            });
        });
    </script>
    <script>

    	function getSignature(){
    		$.ajax({
                url: "signage/fetch-signature",
                method: 'POST',
                data: {
                    action: "getSignanture",
                    "parent_id": '<?php echo $_SESSION['parent_id']?>',
                    "email"	   : '<?php echo $_SESSION['user_mail_bazity']?>',
                },
                
                success: function(data) {
                    $('#result').html(data);
                }
            });
    	}

		$(document).ready(function(){

			var $modal = $('#myModal');

			var image = document.getElementById('sample_image');

			var cropper;

		
			$(".Resize").on('click', function(){
				$modal.modal('show');
			})

			$modal.on('shown.bs.modal', function() {
				cropper = new Cropper(image, {
					// aspectRatio: 1,
					viewMode: 3,
					preview:'.preview'
				});
			}).on('hidden.bs.modal', function(){
				cropper.destroy();
		   		cropper = null;
			});

			$('#crop').click(function(){
				canvas = cropper.getCroppedCanvas({
					// width:400,
					// height:400
				});

				canvas.toBlob(function(blob){
					url = URL.createObjectURL(blob);
					var reader = new FileReader();
					reader.readAsDataURL(blob);
					reader.onloadend = function(){
						var base64data = reader.result;
						
						var image_name = $("#image_name").val()
						$.ajax({
							url:'signage/upload',
							method:'POST',
							data:{image:base64data, image_name:image_name},
							success:function(data){
								successNow(data);
								getSignature();
								
							}
						});
					};
				});
			});
			
		});

	</script>
</body>
</html>