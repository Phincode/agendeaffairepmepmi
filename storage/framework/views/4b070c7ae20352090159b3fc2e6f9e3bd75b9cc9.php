<!DOCTYPE html>
<html lang="fr">
    
<head>
      <?php echo $__env->make('layout.dashboard.partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
	
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<?php echo $__env->make('layout.dashboard.partial.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			
			<!-- Sidebar -->
            <?php echo $__env->make('layout.dashboard.partial.sidesection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                 <?php echo $__env->yieldContent('pagecontent'); ?>
				<!-- /Page Content -->

            </div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
		<?php echo $__env->make('layout.dashboard.partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/orange/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 May 2020 09:59:18 GMT -->
</html><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/layout/dashboard/dash.blade.php ENDPATH**/ ?>