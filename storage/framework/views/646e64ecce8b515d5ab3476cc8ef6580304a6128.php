<?php $__env->startSection('pagecontent'); ?>
<div class="content container-fluid">	
    <div class="row">
        <div class="col-sm-12">
            <div class="file-wrap">
                <div class="file-sidebar">
                    <div class="file-header justify-content-center">
                        <span>PME A ANALYSER</span>
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
                                  <?php if(Auth::user()->hasrole('AS')): ?>
                                      <?php if($item->id==$currentPme): ?>
                                      <li>
                                          <a href="<?php echo e(route('rAnalyste',['iddossier'=>$item->id])); ?> "><?php echo e($item->nom); ?></a>
                                      </li>
                                      <?php endif; ?>
                                  <?php else: ?>
                                    <?php if(Auth::user()->hasrole('AG')||Auth::user()->hasrole('RAN') ): ?>
                                    <li>
                                        <a href="<?php echo e(route('rAnalyste',['iddossier'=>$item->id])); ?> "><?php echo e($item->nom); ?></a>
                                    </li>
                                    <?php endif; ?>
                                      
                                  <?php endif; ?>
                                
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
                                <?php if(Auth::user()->hasrole('RAN')): ?>
                                <button data-toggle="modal" data-target="#deleguer"  class="btn btn-primary submit-btn">Deleguer</button>
                                <?php endif; ?>
                                <?php if(Auth::user()->hasrole('RAN')||Auth::user()->hasrole('AS')): ?>
                                <button  data-toggle="modal" data-target="#scoring" class="btn btn-success submit-btn">Scorer</button>
                                <?php endif; ?>
                                <button style="color: white" data-toggle="modal" data-target="#addFile" class="btn btn-warning submit-btn">Ajouter un fichier</button>
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
                                                            <a target="_blank" href="<?php echo e(url($files->docPath)); ?>" class="dropdown-item">View Details</a>
                                                            
                                                            
                                                            <?php if(Auth::user()->hasrole('RAN') ||Auth::user()->hasrole('AS')): ?>
                                                              <form  action="<?php echo e(route('dossierFileDel')); ?>" method="POST">
                                                                  <?php echo csrf_field(); ?>
                                                                  <input required type="hidden" name="docId" value="<?php echo e($files->id); ?>">
                                                                  <button style="background: none!important;border: none;padding: 0!important;" type="submit">Delete</button>
                                                              </form>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a  target="_blank" href="<?php echo e(url($files->docPath)); ?>"><?php echo e($files->nomFichier); ?> </a></h6>
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

<!-- Add file -->
<div id="addFile" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un fichier au dossier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('dossierAddFile')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Chargez les fichiers <span class="text-danger">*</span></label>
                        <input type="file"  name="filenames[]" multiple  class="form-control">
                    </div>
                    <input type="hidden"  name="pmeId" value="<?php echo e($currentPme); ?>" class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add file -->


<!-- Deleguer Modal -->
<div id="deleguer" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deleguer le scoring</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('transfertDossierAnalyste')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Analyste <span class="text-danger">*</span></label>
                        <select name="analysteId" class="select">
                            <option>Sélectionner un collaborateur</option>
                            <?php $__currentLoopData = $ListeAnalyste; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?> "><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Laissez une observation <span class="text-danger">*</span></label>
                        <input type="text"  name="observation"   class="form-control">
                    </div>
                    <input type="hidden"  name="pmeId" value="<?php echo e($currentPme); ?> "   class="form-control">
                    <input type="hidden"  name="ranalysteId" value="<?php echo e(Auth::user()->id); ?> "   class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Transferer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Deleguer Modal -->

<!-- scoring Modal -->
<div id="scoring" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Scorer le dossier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('scoring')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Mention <span class="text-danger">*</span></label>
                        <select name="score" class="select">
                            <option>Sélectionner une mention</option>
                            <option value="Excellent">Excellent</option>
                            <option value="Acceptable">Acceptable</option>
                            <option value="Mauvais">Mauvais</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Laissez une observation <span class="text-danger">*</span></label>
                        <input type="text"  name="observation"   class="form-control">
                    </div>
                    <input type="hidden"  name="pmeId" value="<?php echo e($currentPme); ?> "   class="form-control">
                    <input type="hidden"  name="analysteId" value="<?php echo e(Auth::user()->id); ?> " class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /scoring Modal -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/dashboard/rAnalyste.blade.php ENDPATH**/ ?>