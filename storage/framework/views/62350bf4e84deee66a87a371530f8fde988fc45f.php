<!-- Header -->
<div class="header">
			
    <!-- Logo -->
    <div class="header-left">
        <a href="<?php echo e(route('home')); ?> " class="logo">
            <img style="height:50px;width:100px" src="<?php echo e(asset('home/img/logo.png')); ?>" alt="Brainstorming agence d'affaire logo">
        </a>
    </div>
    <!-- /Logo -->
    
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
     <!-- Header Title -->
     <div class="page-title-box">
        <a href="<?php echo e(route('dashboardView')); ?>"><h3>AGENCE D'AFFAIRE</h3></a>
    </div>
    <!-- /Header Title -->
   
    
    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    
    <!-- Header Menu -->
    <ul class="nav user-menu">
    
        <!-- Search -->
        
        <!-- /Search -->
    
        <!-- Flag -->
        
        <!-- /Flag -->
    
        <!-- Notifications -->
        
        <!-- /Notifications -->
        
        <!-- Message Notifications -->
        
        <!-- /Message Notifications -->

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img src="assets/img/profiles/avatar-21.jpg" alt="">
                <span class="status online"></span></span>
                <span><?php echo e(Auth::user()->name); ?> </span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo e(route('logout')); ?> ">Logout</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->
    
    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="#">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
    
</div>
<!-- /Header --><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/layout/dashboard/partial/menu.blade.php ENDPATH**/ ?>