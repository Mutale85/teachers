<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="language" content="English">
<meta name="author" content="Mutale Mulenga">

<!-- Graphical Meta Tags -->
	<!-- Primary Meta Tags -->
<title>The TCZ Portal</title>
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
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link rel="stylesheet" type="text/css" href="dist/css/links.css">
<link rel="icon" type="images/logo_white" href="images/logo_white.jpeg">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function(){
        $(".hamburger").click(function(){
            $(this).toggleClass("is-active");
        });
    });

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
    $(function () {
        $(document).scroll(function () {
            var $nav = $(".fixed-top");
            $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        });
    });
</script>
<style>
    .fixed-top.scrolled {
        /*background-color: #fff !important;*/
        transition: background-color 200ms linear;
        border-bottom: 1px solid orange;
    }
</style>