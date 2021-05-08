<?php $__env->startSection('pagecontent'); ?>
<div class="content container-fluid">	
    <div class="row">
        <div class="col-sm-12">
            <div class="file-wrap">
                <div class="file-sidebar">
                    <div class="file-header justify-content-center">
                        <span>DOSSIER RETOURNE</span>
                        <a href="javascript:void(0);" class="file-side-close"><i class="fa fa-times"></i></a>
                    </div>
                    <form class="file-search">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="fa fa-search"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                    <div class="file-pro-list">
                        <div class="file-scroll">
                            <ul class="file-menu">
                                <?php $__currentLoopData = $listDossier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('dossierGeneral',['iddossier'=>$item->id])); ?> "><?php echo e($item->nom); ?></a>
                                </li>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="file-cont-wrap">
                    <div class="file-cont-inner">
                        <div class="file-cont-header">
                            <div class="file-options">
                                <a href="javascript:void(0)" id="file_sidebar_toggle" class="file-sidebar-toggle">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div>
                            <div class="row">
                               <div class="col-12">
                                <span>Plateforme Dossier</span>
                               </div>
                            </div>
                        </div>
                        <div class="file-content">
                            <?php if($currentDossier!=0): ?>
                            <br>
                            <div class="">
                                <button  data-toggle="modal" data-target="#scoring" class="btn btn-success submit-btn">Transferer</button>
                            </div>
                            <?php endif; ?>
                            
                            <div class="file-body">
                                <div class="file-scroll">
                                    <div class="file-content-inner">
                                        <h4>Fichiers</h4>
                                        <div class="row row-sm">
                                            <?php $__currentLoopData = $dossierFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $files): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="<?php echo e(url($files->pathFichier)); ?>" class="dropdown-item">View Details</a>
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="<?php echo e(url($files->pathFichier)); ?> "><?php echo e($files->nomFichier); ?> </a></h6>
                                                        <span>...</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="d-none d-sm-inline">Last Modified: </span><?php echo e($files->updated_at); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            

                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Deleguer Modal -->
<div id="scoring" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transfert Dossier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('transfertDossierGeneral')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Laissez une observation <span class="text-danger">*</span></label>
                        <input type="text"  name="observations"   class="form-control">
                    </div>
                    <input type="hidden"  name="idDossier" value="<?php echo e($currentDossier); ?> " class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Transferer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Deleguer Modal -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/dashboard/dossierRetourner.blade.php ENDPATH**/ ?>