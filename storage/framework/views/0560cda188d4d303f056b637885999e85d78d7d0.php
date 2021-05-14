<?php
    use Illuminate\Contracts\Encryption\DecryptException;
    use Illuminate\Support\Facades\Crypt;
?>



<?php $__env->startSection('pagecontent'); ?>
<div class="container " style="padding: 30px; ">

<h3>List des PME à contacter</h3><br><br>
<!-- Search Filter -->
<div class="row filter-row">
    
 </div>
 <!-- /Search Filter -->
 
 <div class="row" style="overflow-y: scroll;">
     <div class="col-md-12">
         <div class="table-responsive">
             <table class="table table-striped custom-table first mb-0 ">
                 <thead>
                     <tr style="background-color:yellow">
                         <th>Nom</th>
                         <th>Contact</th>
                         <th>Mail</th>
                         <th>Besoin Financement</th>
                         <th>Date rdv</th>
                         <th>Plage horaire</th>
                         
                         <th class="text-right">Actions</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $__currentLoopData = $listrdv[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr style="height:80px; ">
                        <td>
                            <h2 class="table-avatar">
                                
                                <a href="#"><?php echo e($rdv->nom); ?> <span>Mr/Mme <?php echo e($rdv->nomProprietaire); ?></span></a>
                            </h2>
                        </td>
                        <td><?php echo e($rdv->numeroProprietaire); ?></td>
                        <td><?php echo e($rdv->emailProprietaire); ?></td>
                        <td><?php echo e($rdv->besoinenfinancement); ?> FCFA</td>
                        <td><?php echo e($rdv->dateRdv); ?> </td>
                        <?php if($rdv->horaire==1): ?>
                            <td>08h-10h</td>
                        <?php endif; ?>
                        <?php if($rdv->horaire==2): ?>
                         <td>10h-12h</td>
                        <?php endif; ?>
                        <?php if($rdv->horaire==3): ?>
                          <td>14h-16h</td>
                        <?php endif; ?>
                        <?php if($rdv->horaire==4): ?>
                         <td>16h-18h</td>
                        <?php endif; ?>
                        
                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div onclick="getId(<?php echo e($rdv->id); ?>)" class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i>Déplacer</a>
                                    <a class="dropdown-item" href="<?php echo e(route('rdvstate',['id'=>Crypt::encryptString($rdv->id),'state'=>Crypt::encryptString('PNI')])); ?>"><i class="fa fa-pencil m-r-5"></i>Présent non interessé</a>
                                    <a class="dropdown-item" href="<?php echo e(route('rdvstate',['id'=>Crypt::encryptString($rdv->id),'state'=>Crypt::encryptString('PI')])); ?>"><i class="fa fa-pencil m-r-5"></i>Présent interessé</a>
                                    <a class="dropdown-item" href="<?php echo e(route('rdvstate',['id'=>Crypt::encryptString($rdv->id),'state'=>Crypt::encryptString('ABS')])); ?>"><i class="fa fa-pencil m-r-5"></i>Absent</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                     
                 </tbody>
             </table>
             <br>
             <?php echo e($listrdv[1]->links()); ?>

         </div>
     </div>
 </div>
</div>
<!-- /Page Content -->

<div class="container" style="padding: 30px;">
    <h3>List des Personnes individuelle à contacter</h3><br><br>
    <!-- Search Filter -->
    <div class="row filter-row">
        
     </div>
     <!-- /Search Filter -->
     
     <div class="row" style="overflow-y: scroll;">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table class="table table-striped custom-table second mb-0 ">
                     <thead >
                         <tr style="background-color: coral">
                             <th>Nom</th>
                             <th>Contact</th>
                             <th>Niveaux</th>
                             <th>Localisation</th>
                             <th>Première fois?</th>
                             <th>Date rdv</th>
                             <th>Plage horaire</th>
                             
                             <th class="text-right">Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $__currentLoopData = $listrdv[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr style="height:80px; ">
                            <td>
                                <h2 class="table-avatar">
                                    
                                    <a href="#"><?php echo e($rdv->nomPrenom); ?></a>
                                </h2>
                            </td>
                            <td><?php echo e($rdv->tel1); ?>/<?php echo e($rdv->tel2); ?></td>
                            <td><?php echo e($rdv->niveauDiplome); ?></td>
                            <td><?php echo e($rdv->localisation); ?></td>
                            <td><?php echo e($rdv->ancienNouveau); ?> </td>
                            <td><?php echo e($rdv->dateRdv); ?></td>
                            <?php if($rdv->horaire==1): ?>
                                <td>08h-10h</td>
                            <?php endif; ?>
                            <?php if($rdv->horaire==2): ?>
                             <td>10h-12h</td>
                            <?php endif; ?>
                            <?php if($rdv->horaire==3): ?>
                              <td>14h-16h</td>
                            <?php endif; ?>
                            <?php if($rdv->horaire==4): ?>
                             <td>16h-18h</td>
                            <?php endif; ?>
                            
                            
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div onclick="getId(<?php echo e($rdv->id); ?>)"  class="dropdown-menu dropdown-menu-right">
                                     <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i>Déplacer</a>
                                    <a class="dropdown-item" href="<?php echo e(route('rdvstate',['id'=>Crypt::encryptString($rdv->id),'state'=>Crypt::encryptString('PNI')])); ?>"><i class="fa fa-pencil m-r-5"></i>Présent non interessé</a>
                                    <a class="dropdown-item" href="<?php echo e(route('rdvstate',['id'=>Crypt::encryptString($rdv->id),'state'=>Crypt::encryptString('PI')])); ?>"><i class="fa fa-pencil m-r-5"></i>Présent interessé</a>
                                    <a class="dropdown-item" href="<?php echo e(route('rdvstate',['id'=>Crypt::encryptString($rdv->id),'state'=>Crypt::encryptString('ABS')])); ?>"><i class="fa fa-pencil m-r-5"></i>Absent</a>
    
                                    </div>
                                </div>
                            </td>
                        </tr>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                         
                     </tbody>
                 </table>
             </div>
             <?php echo e($listrdv[0]->links()); ?>

         </div>
     </div>
    </div>
    <!-- /Page Content -->
</div>




<!-- Add Leave Modal -->

<!-- /Add Leave Modal -->

<!-- Edit Leave Modal -->
<div id="edit_leave" class="modal custom-modal fade" role="dialog">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title">Déplacer un rdv</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form method="POST" action="<?php echo e(route('shedule')); ?> ">
                <?php echo csrf_field(); ?>
                 <div class="form-group">
                     <label>Nouvelle date <span class="text-danger">*</span></label>
                     <div class="">
                         <input name='date' required class="form-control"  type="date">
                     </div>
                 </div>
                 <input   id='rdvId'  name='id' required class="form-control"  type="hidden">
                 <div class="form-group">
                    <label>Plage Horaire <span class="text-danger">*</span></label>
                    <select required name="plageHoraire" class="select">
                        <option>Sélectionner une plage horaire</option>
                        <option value="1">08h-10h</option>
                        <option value="2">10h-12h</option>
                        <option value="3">14h-16h</option>
                        <option value="4">16h-18h</option>
                    </select>
                </div>
                 <div class="submit-section">
                     <button type="submit" class="btn btn-primary submit-btn">Valider</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
</div>
<!-- /Edit Leave Modal -->

<!-- Approve Leave Modal -->
<div class="modal custom-modal fade" id="approve_leave" role="dialog">
 <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
         <div class="modal-body">
             <div class="form-header">
                 <h3>Leave Approve</h3>
                 <p>Are you sure want to approve for this leave?</p>
             </div>
             <div class="modal-btn delete-action">
                 <div class="row">
                     <div class="col-6">
                         <a href="javascript:void(0);" class="btn btn-primary continue-btn">Approve</a>
                     </div>
                     <div class="col-6">
                         <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Decline</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
<!-- /Approve Leave Modal -->

<!-- Delete Leave Modal -->
<div class="modal custom-modal fade" id="delete_approve" role="dialog">
 <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
         <div class="modal-body">
             <div class="form-header">
                 <h3>Delete Leave</h3>
                 <p>Are you sure want to delete this leave?</p>
             </div>
             <div class="modal-btn delete-action">
                 <div class="row">
                     <div class="col-6">
                         <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                     </div>
                     <div class="col-6">
                         <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
<!-- /Delete Leave Modal -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
   function getId(id){
            console.log(id);
             $('#rdvId').val(id);
            }
    $(document).ready(function () {
      $('.first').DataTable({
        "bPaginate": false,
      });
      $('.second').DataTable({
        "bPaginate": false, 
      })           
          
     });

          
</script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.dashboard.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/dashboard/rdvList.blade.php ENDPATH**/ ?>