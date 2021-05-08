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
                <a href="<?php echo e(route('rAnalyste',['iddossier'=>$Pme->pmeId])); ?> " class="btn btn-primary" >Voir le dossier</a>
            </div>
                <div class="submit-section">
                    <Button onclick="getpmeId(<?php echo e($Pme->pmeId); ?>)" data-toggle="modal" data-target="#partenaire" id="envoieBank" class="btn btn-primary" >Envoie Banque</Button>
                </div>
            
            <form action="" method="post">
                <div class="submit-section">
                    <Button type="submit" class="btn btn-primary" >Retourner</Button>
                </div>
            </form>
            <form action="" method="post">
                <div class="submit-section">
                    <Button type="submit" class="btn btn-primary">Rejeté</Button>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div>

<!-- partenanire Modal -->
<div id="partenaire" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choisir le partenanaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('sendTobank')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Banque <span class="text-danger">*</span></label>
                        <select name="bankid" class="select">
                            <option>Sélectionner un partenanire financié</option>
                            <?php $__currentLoopData = $Banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($item->id); ?> "><?php echo e($item->name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Laissez une observation <span class="text-danger">*</span></label>
                        <input type="text"  name="observation"   class="form-control">
                    </div>
                    <input type="hidden" id="pmId" name="pmId" value="" class="form-control">
                    <input type="hidden"  name="from" value="<?php echo e(Auth::user()->id); ?> "   class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /partenaire Modal -->

<script>
     function getpmeId(id){
        $('#pmId').val(id.toString());
        console.log(id);
    }   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/dashboard/retourAnalyste.blade.php ENDPATH**/ ?>