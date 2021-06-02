<!DOCTYPE html>
<html lang="fr-FR">

<head>
   <?php echo $__env->make('layout.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <div class="loader">
        <div class="loading"></div>
    </div>
    <?php echo $__env->make('layout.partial.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('menuoption'); ?>
   
    <div id="footer2" class="container-fluid align-items-center brand" style=" margin-top:10px;background-color: rgb(160, 9, 9)">
        <div class="row">
            <div class="col-12 text-center ">
                <div class="center-div">
                    Plus de 20 ans d’expériences au service du Financement des PME-PMI en Côte d’Ivoire 
                    <br>
                </div>
                <br>
            </div>
        </div>
   </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.4/isotope.pkgd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.3/imagesloaded.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-one-page-nav/3.0.0/jquery.nav.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.appear/0.3.3/jquery.appear.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.8.2/venobox.min.js"></script>
    <script src=" <?php echo e(asset('home/js/script.js?v=1.0')); ?>"></script>
    <!-- jQuery -->
		
<!-- Bootstrap Core JS -->
<script src="<?php echo e(asset('dashboard/js/popper.min.js')); ?> "></script>
<script src="<?php echo e(asset('dashboard/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('dashboard/js/select2.min.js')); ?>"></script>

<!-- Slimscroll JS -->
<script src="<?php echo e(asset('dashboard/js/jquery.slimscroll.min.js')); ?>"></script>

<!-- Chart JS -->
<script src="<?php echo e(asset('dashboard/plugins/morris/morris.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/plugins/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/chart.js')); ?> "></script>

<!-- Custom JS -->
<script src="<?php echo e(asset('dashboard/js/app.js')); ?>"></script>
    <!-- Google Analytics: change UA-25089888-9 to be your site's ID. -->
    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
// function myFunction() {
//   document.getElementById("myDropdown").classList.toggle("show");
// }

// // Close the dropdown if the user clicks outside of it
// window.onclick = function(e) {
//   if (!e.target.matches('.dropbtn')) {
//   var myDropdown = document.getElementById("myDropdown");
//     if (myDropdown.classList.contains('show')) {
//       myDropdown.classList.remove('show');
//     }
//   }
// }

</script>
</body>

</html>
<?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/layout/homeLayout.blade.php ENDPATH**/ ?>