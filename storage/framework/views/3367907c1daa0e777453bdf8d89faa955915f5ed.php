<?php $__env->startSection('pagecontent'); ?>
<div class="content container-fluid">	
    <div class="row">
        <div class="col-sm-12">
            <div class="file-wrap">
                <div class="file-sidebar">
                    <div class="file-header justify-content-center">
                        <span>Nouveau Dossier</span>
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
                                <?php $__currentLoopData = $listPmetoScore; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e(route('newdossier',['iddossier'=>$item->id])); ?> "><?php echo e($item->nom); ?></a>
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
                                <span>Dossier PME <?php echo e($currentPmeName); ?> </span>
                               </div>
                            </div>
                        </div>
                        <div class="file-content">
                            <?php if($currentPme!=0): ?>
                            <br>
                            <div class="">
                                <?php if(Auth::user()->hasrole('AG')): ?>
                                <button data-toggle="modal" data-target="#deleguer"  class="btn btn-primary submit-btn">Transmettre pour analyse</button>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            
                            <div class="file-body">
                                <div class="file-scroll">
                                    <div class="file-content-inner">
                                        <h4>Fichiers</h4>
                                        <div class="row row-sm">
                                            <?php $__currentLoopData = $pmeFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $files): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="<?php echo e(url($files->docPath)); ?>" class="dropdown-item">View Details</a>
                                                            
                                                            
                                                            <?php if(Auth::user()->hasrole('AG')): ?>
                                                            <a data-toggle="modal" data-target="#del" href="#" class="dropdown-item">Delete</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="<?php echo e(url($files->docPath)); ?> "><?php echo e($files->nomFichier); ?> </a></h6>
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
<div id="deleguer" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Souhaitez vous transmettre?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('transfertdossierRanalyste')); ?>">
                    <?php echo csrf_field(); ?>
                    
                    
                    <input type="hidden"  name="pmeId" value="<?php echo e($currentPme); ?> "   class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Transferer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Deleguer Modal -->

<!-- del Modal -->
<div id="del" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Souhaitez vraiment supprimer?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('dossierDel')); ?>">
                    <?php echo csrf_field(); ?>
                    
                    
                    <input type="hidden"  name="pmeId" value="<?php echo e($currentPme); ?> "   class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /del Modal -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/dashboard/nouveauDossier.blade.php ENDPATH**/ ?>