<?php $__env->startSection('pagecontent'); ?>
<br>
 <h1 style="text-align: center" >Retour Analyste</h1>
<br>
<div class="row staff-grid-row" style="padding-left:10px; ">
    <?php $__currentLoopData = $pmeDossiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Pme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="#" class="avatar"><img src="#" alt=""></a>
            </div>
            <div class="dropdown profile-action">
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="#"><?php echo e($Pme->nom); ?> </a></h4>
            <div class="small text-muted">Observation:<?php echo e($Pme->Observation); ?> </div>
            <div class="small text-muted">Score:<?php echo e($Pme->score); ?> </div>
            <div class="small text-muted">Analyste:<?php echo e($Pme->name); ?> </div>
            <div class="small text-muted">Date:<?php echo e($Pme->created_at); ?> </div>


            <div class="submit-section">
                <a href="<?php echo e(route('rAnalyste',['iddossier'=>$Pme->id])); ?> " class="btn btn-primary submit-btn" >Voir le dossier</a>
            </div>
            
            <form action="" method="post">
                <div class="submit-section">
                    <Button type="submit" class="btn btn-primary submit-btn" >Envoie Banque</Button>
                </div>
            </form>
            <form action="" method="post">
                <div class="submit-section">
                    <Button type="submit" class="btn btn-primary submit-btn" >Retourner</Button>
                </div>
            </form>
            <form action="" method="post">
                <div class="submit-section">
                    <Button type="submit" class="btn btn-primary submit-btn">Rejeté</Button>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/dashboard/retourAnalyste.blade.php ENDPATH**/ ?>