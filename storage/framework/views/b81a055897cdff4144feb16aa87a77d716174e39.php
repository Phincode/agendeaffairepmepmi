<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Que souhaitez-vous?</span>
                </li>
                 <?php if(Auth::user()->hasrole('AG')|| Auth::user()->hasrole('AAD') ): ?>
                 <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span>Dossiers</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="" data-toggle="modal" data-target="#add_leave" href="#">Ajouter une pme</a></li>
                        <li><a data-toggle="modal" data-target="#add_dossier" href="#">Soumettre un dossier</a></li>
                        <li><a href="<?php echo e(route('newdossier')); ?> ">Nouveau dossier pme</a></li>
                        <li><a href="<?php echo e(route('retourAnalyste')); ?> ">Retour Analyste</a></li>
                        <li><a href="<?php echo e(route('retourAccordBanque')); ?> ">Retour Financement</a></li>
                        <li><a href="<?php echo e(route('retourBanqueRejet')); ?> ">Dossier rejetés</a></li>
                    </ul>
                 </li>
                 <?php endif; ?>
                
                 <?php if(Auth::user()->hasrole('AAD')||Auth::user()->hasrole('AG')||Auth::user()->hasrole('RAN')||Auth::user()->hasrole('AS')): ?>
                 <li class="menu-title"> 
                    <span>Analystes</span>
                </li>
                <?php if(Auth::user()->hasrole('AAD') || Auth::user()->hasrole('AG')|| Auth::user()->hasrole('RAN')): ?>
                <li class="submenu">
                    <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Chef Analyste</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?php echo e(route('rAnalyste')); ?>">Dossiers</a></li>
                        
                        
                    </ul>
                </li>
                <?php endif; ?>
                  <?php if(Auth::user()->hasrole('AAD')||Auth::user()->hasrole('AG')||Auth::user()->hasrole('RAN')||Auth::user()->hasrole('AS')): ?>
                  <li class="submenu">
                    <a href="#" class="noti-dot"><i class="la la-user"></i> <span>Analyste</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?php echo e(route('analyste')); ?> ">Dossiers</a></li>
                        
                        <li><a data-toggle="modal" data-target="#add_dossierAn" href="#">Soumettre un dossier</a></li>
                        <li><a href="<?php echo e(route('dossierGeneral')); ?> ">Dossiers retournés</a></li>
                    </ul>
                   
                 </li>
                  <?php endif; ?>
                 <?php endif; ?>
                
                
                <?php if(Auth::user()->hasrole('AG')||Auth::user()->hasrole('SC') ): ?>
                <li class="submenu">
                    <a href=""><i class="la la-files-o"></i> <span>Demandeur</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?php echo e(route('rdvlist')); ?>">Voir la liste</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                
                
                
        </div>
    </div>
</div><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/layout/dashboard/partial/sidesection.blade.php ENDPATH**/ ?>