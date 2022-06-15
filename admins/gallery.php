<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("header.php");?>
    <link rel="stylesheet" type="text/css" href="../css/gallery.css">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?php include("logo.php");?>      
        <div class="app-main">
        	<!-- include navigation -->
            <?php include 'nav.php'; ?>
            <!-- end of nav -->
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                    </div>            

                    <div class="card mb-3 card p-3">
                        <div class="card-header">Gallery
                            <div class="btn-actions-pane-right">
                                <div role="group" class="btn-group-sm btn-group">
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Images</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gallery cf" id="gallery">
                                <p>
                                    <section class="img-gallery-magnific">
                                <?php 
                                    $query = $connect->prepare("SELECT * FROM gallery WHERE user_email = ?");
                                    $query->execute(array($_SESSION['user_email_axis']));
                                    $count = $query->rowCount();
                                    if ($count > 0) {
                                        foreach ($query->fetchAll() as $row) {
                                ?>      

                                            <div class="magnific-img">
                                                <a class="image-popup-vertical-fit" href="../uploads/<?php echo $row['image']?>" title="<?php echo $row['image']?>">
                                                    <img src="../uploads/<?php echo $row['image']?>" alt="<?php echo $row['image']?>" class="shadow img-thumbnail mb-1">
                                                    <p class="mt-2 mb-2"><a href="<?php echo $row['id']?>" class="removeImage text-danger"><i class="bi bi-trash" aria-hidden="true"></i></a></p>
                                                </a>
                                            </div>
                                        
                                <?php
                                        }
                                    }else{
                                ?>
                                    <h4>Zero Images Loaded</h4>   
                                <?php        
                                    }
                                ?>
                                    </section>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FOOTER -->
                <?php include 'footer.php'; ?> 
                <!-- FOOTER END -->    
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>

        // ================== SAVE FORM FOUR =====================

        $(function(){
            $("#galleryForm").submit(function(e){
                e.preventDefault();
                var galleryForm = document.getElementById('galleryForm');
                var data = new FormData(galleryForm);
                var url = 'processing/submitGallery';
                $.ajax({
                    url:url+'?<?php echo time()?>',
                    method:"post",
                    data:data,
                    cache : false,
                    processData: false,
                    contentType: false,
                    beforeSend:function(){
                        $("#saveImages").html("<i class='spinner-border'></i>");
                    },
                    success:function(data){
                        errorNow(data);
                        setTimeout(function(){
                            location.reload();
                        }, 1500);
                    }
                })
            })
        })

        function successNow(msg){
            toastr.success(msg);
            toastr.options.progressBar = true;
            toastr.options.positionClass = "toast-top-center";
        }

        function errorNow(msg){
            toastr.error(msg);
            toastr.options.progressBar = true;
            toastr.options.positionClass = "toast-top-center";
        }

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
        $(document).on("click", ".removeImage", function(e){
            e.preventDefault();
            var imageID = $(this).attr("href");
            if (confirm("You wish to remove this image?")) {
                $.ajax({
                    url:'processing/deleteImage',
                    method:'post',
                    data:{imageID:imageID},
                    success:function(data){
                        successNow(data);
                        setTimeout(function(){
                            location.reload();
                        }, 1500);
                        
                    }
                })
            }
        })
    </script>
</body>
</html>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Images</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x"></i></button>
                </div>
                <div class="modal-body">
                    <form id="galleryForm" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label>Select Images</label>
                            <input type="file" name="images[]" id="images" class="form" required accept="image/*" multiple>
                        </div>
                        <button class="btn btn-outline-success" id="saveImages">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>