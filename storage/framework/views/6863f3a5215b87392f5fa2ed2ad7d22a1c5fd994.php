<?php
    use Illuminate\Support\Str;
    $uuid = Str::uuid()->toString();
?>




























<?php $__env->startSection('pagecontent'); ?>
<div class="content container-fluid">	
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome <?php echo e(auth()->user()->name); ?> </h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->


</div>

<!-- toast-->
 

  <?php if(session()->has('succes')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>  <?php echo e(session()->get('succes')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
   <?php endif; ?>

   <?php if($errors->has('files')): ?>
            <?php $__currentLoopData = $errors->get('files'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($error); ?></strong>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php endif; ?>

<!-- Add entreprise Modal -->
<div id="add_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter une PME</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('addPME')); ?> ">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Type PME <span class="text-danger">*</span></label>
                        <select name="typePme" class="select">
                            <option>S??lectionner un type</option>
                            <?php $__currentLoopData = $pmeTypeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?> "><?php echo e($item->nom); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nom Pme <span class="text-danger">*</span></label>
                        <input name="nom" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Nom propri??taire <span class="text-danger">*</span></label>
                        <input name="nomProprietaire" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email propri??taire <span class="text-danger">*</span></label>
                        <input name="emailProprietaire" class="form-control" type="email">
                    </div>
                    <div class="form-group">
                        <label>Num??ro de t??l??phone propri??taire <span class="text-danger">*</span></label>
                        <input name="numeroProprietaire" class="form-control"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Nom G??rant <span class="text-danger">*</span></label>
                        <input name="nomGerant" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email G??rant <span class="text-danger">*</span></label>
                        <input name="emailGerant" class="form-control" type="email">
                    </div>
                    <div class="form-group">
                        <label>Num??ro de t??l??phone g??rant <span class="text-danger">*</span></label>
                        <input name="numeroGerant" class="form-control"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Activit?? <span class="text-danger">*</span></label>
                        <input name="activite" class="form-control"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Date cr??ation <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input name="dateCreation" type="date" class="form-control datetimepicker"  type="text">
                        </div>    
                    </div>
                    <div class="form-group">
                        <label>Besoin <span class="text-danger">*</span></label>
                        <input name="besoin" type="text" class="form-control "  type="text">
    
                    </div>
                    <div class="form-group">
                        <label>Localisation <span class="text-danger">*</span></label>
                        <input name="localisation" type="text" class="form-control "  type="text">
    
                    </div>
                    <input name="filledUserId" type="hidden" class="form-control datetimepicker" value="<?php echo e(Auth::user()->id); ?> "  type="text">
                    <input name="codePme" type="hidden" class="form-control datetimepicker" value="<?php echo e($uuid); ?> "  type="text">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add entreprise Modal -->

<!-- Add dossier Modal -->
<div id="add_dossier" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Soumettre un dossier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('adDossier')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>PME <span class="text-danger">*</span></label>
                        <select name="Pme" class="select">
                            <option>S??lectionner une PME</option>
                            <?php $__currentLoopData = $pmeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?> "><?php echo e($item->nom); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chargez les fichiers <span class="text-danger">*</span></label>
                        <input type="file"  name="filenames[]" multiple  class="form-control">
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add entreprise dossier Modal -->

<!-- Add dossier Modal by analyste -->
<div id="add_dossierAn" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Soumettre un dossier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('adDossierAn')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Nom dossier <span class="text-danger">*</span></label>
                        <input type="text"  name="nomDossier" multiple  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Observation<span class="text-danger">*</span></label>
                        <input type="text"  name="observations" multiple  class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Chargez les fichiers <span class="text-danger">*</span></label>
                        <input type="file"  name="filenames[]" multiple  class="form-control">
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add entreprise dossier Modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/dashboard/dashb.blade.php ENDPATH**/ ?>