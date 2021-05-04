<?php $__env->startSection('pagecontent'); ?>
<br>
<div class="row staff-grid-row">
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
            <div class="submit-section">
                <a href="<?php echo e(route('rAnalyste',['iddossier'=>$Pme->id])); ?> " class="btn btn-primary submit-btn" >Ouvrir</a>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/dashboard/analyste.blade.php ENDPATH**/ ?>