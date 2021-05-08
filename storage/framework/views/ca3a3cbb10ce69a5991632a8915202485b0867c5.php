<div id="navbar-top">
    <nav class="navbar navbar-expand-md navbar-light bg-white fixed">
        <div class="container">
            <a class="navbar-brand nav-external" href=" <?php echo e(route('home')); ?> "> <img style="height: 70px;" src="<?php echo e(asset('home/img/logo.png')); ?> "> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="https://facebook.com" class="nav-link icon-button whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </li> 
                    
                    <li class="nav-item">
                        <a href="https://facebook.com" class="nav-link icon-button facebook"><i class="icon-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/minimalmonkey" class="nav-link icon-button"><i class="fa fa-phone" aria-hidden="true"></i></a>
                    </li>
                       
                        
                    
                        <?php if(Auth::check()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('dashboardView')); ?>">Dashboard</a>
                         </li>
                        <?php else: ?>
                           <li class="nav-item">
                              <a class="nav-link" href="<?php echo e(route('loginview')); ?> ">Connexion</a>
                           </li> 
                        <?php endif; ?>
                        
                    <li class="nav-item">
                        <a class="nav-link" href="#">Apropos de nous</a>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
</div><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/layout/partial/menu.blade.php ENDPATH**/ ?>