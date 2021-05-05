<?php $__env->startSection('pagecontent'); ?>
<div class="content container-fluid">	
    <div class="row">
        <div class="col-sm-12">
            <div class="file-wrap">
                <div class="file-sidebar">
                    <div class="file-header justify-content-center">
                        <span>PME A FINANCER</span>
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
                                      <a href="<?php echo e(route('dashboardBank',['iddossier'=>$item->id])); ?> "><?php echo e($item->nom); ?></a>
                                      <div class="">
                                          Observation:<?php echo e($item->Observation); ?>

                                      </div>
                                   </li>
                                   <hr>
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
                            <div class="" style="padding-left: 10px;">
                                <?php if(Auth::user()->hasrole('Banque')||Auth::user()->hasrole('RAN') ): ?>
                                <button  data-toggle="modal" data-target="#Verdicte"  class="btn btn-success submit-btn">Verdicte</button>
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
                                                            <a href="#" class="dropdown-item">Delete</a>
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

<!-- verdicte Modal -->
<div id="Verdicte" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Donner votre verdicte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('transfertDossierAnalyste')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Mention <span class="text-danger">*</span></label>
                        <select name="analysteId" class="select">
                            <option>Sélectionner une mention</option>
                            <option value="0">ACCORD</option>
                            <option value="0">REFUS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Laissez une observation <span class="text-danger">*</span></label>
                        <input type="text"  name="observation"   class="form-control">
                    </div>
                    <input type="hidden"  name="pmeId" value="<?php echo e($currentPme); ?> "   class="form-control">
                    <input type="hidden"  name="partenaireId" value="<?php echo e(Auth::user()->id); ?> "   class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Deleguer Modal -->

<!-- /scoring Modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/dashboard/banqueAnalyse.blade.php ENDPATH**/ ?>