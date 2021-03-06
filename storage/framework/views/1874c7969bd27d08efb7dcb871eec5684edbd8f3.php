<?php
    use Illuminate\Support\Str;
    $uuid = Str::uuid()->toString();
   
?>


<?php $__env->startSection('menuoption'); ?>
<section id="home" class="page">
    <div class="container">
        <br><br>
        <center>
            <div class="row">
                <div class="col">
                    <button  style="padding-left: 20px;padding-right:20px;" type="button" class="btn btn-outline-danger">Conseils</button>
                </div>
                <div class="col">
                    <button style="padding-left: 20px;padding-right:20px;" type="button" class="btn btn-outline-danger">Dossiers</button>
                </div>
                <div class="col">
                    <button style="padding-left: 20px;padding-right:20px;" type="button" class="btn btn-outline-danger">Financement</button>
                </div>
            </div>
        </center>
    </div>
</section>

 
<div class="option container">
    <div  class="row">
        <div class="col-sm-12  col-lg-4 col-md-4">
            <div class="heading">
                <h3 style="font-family: 'Century Gothic', sans-serif; ">Prendre Rendez-vous</h3>
            </div>
            <center>
                <div class="corps col-lg-12">
                    <a data-toggle="modal" data-target="#add_leave"  role="button"><img class="" src="<?php echo e(asset('home/img/menuoption/rdv.png')); ?> " alt="Generic placeholder image" width="200" height="200"></a>
                </div> 
            </center>  
        </div>
    
    <!-- second card-->
   
    <div class="col-sm-12  col-lg-4 col-md-4">
        <div class="heading">
            <h3  style="font-family: 'Century Gothic', sans-serif;">Deposer votre dossier</h3>
        </div>
        <center>
            <div class="corps col-lg-12">
                <a data-toggle="modal" data-target="#add_dossier" href="#" role="button"><img class="" src="<?php echo e(asset('home/img/menuoption/depotdossier_2.png')); ?> " alt="Generic placeholder image" width="200" height="200">
                    
                    </a>
            </div> 
        </center>  
    </div>
    <!-- end second card-->
    
    <div class="col-sm-12  col-lg-4 col-md-4">
        <div class="heading">
            <h3 style="font-family: 'Century Gothic', sans-serif;" >Suivre votre financement</h3>
        </div>
        <center>
            <div class="corps col-lg-12">
                <a  href="#" role="button"> <img class="" src="<?php echo e(asset('home/img/menuoption/financement.png')); ?> " alt="brainstorming agence d'affaire finnancement" width="200" height="200">
                    
                    </a>
            </div> 
        </center>  
    </div>
    <!-- end third-->
</div>  
    
    

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Prendre un Rendez-vous</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="container">
            <div class="row  align-items-center">
                <div class="col-6 align-items-center">
                    <a  data-dismiss="modal" data-toggle="modal" data-target="#add_leave" href="#" role="button"><img class="rounded-circle" src="" alt="Generic placeholder image" width="100" height="100">
                    </a>
                    <h3>Entreprise</h3>
                </div> 
                <div class="col-6 align-items-center">
                    <a  data-dismiss="modal" data-toggle="modal" data-target="#personal" href="#" role="button"><img class="rounded-circle" src="" alt="Generic placeholder image" width="100" height="100">
                    </a>
                    <h3>Personnel</h3>
                </div> 
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>

<!-- Add entreprise Modal -->
<div id="add_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Soucription/Prendre Rdv</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('takeApoint')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Type PME <span class="text-danger">*</span></label>
                        <select required name="typePme" id='typepme' class="select">
                            <option>S??lectionner un type</option>
                            <?php $__currentLoopData = $pmeTypeList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?> "><?php echo e($item->nom); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nom Pme <span class="text-danger">*</span></label>
                        <input required name="nom" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Nom propri??taire <span class="text-danger">*</span></label>
                        <input required name="nomProprietaire" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email propri??taire <span class="text-danger">*</span></label>
                        <input required  name="emailProprietaire" class="form-control" type="email">
                    </div>
                    <div class="form-group">
                        <label>Num??ro de t??l??phone propri??taire <span class="text-danger">*</span></label>
                        <input required name="numeroProprietaire" class="form-control"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Nom G??rant <span class="text-danger">*</span></label>
                        <input required name="nomGerant" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email G??rant <span class="text-danger">*</span></label>
                        <input required name="emailGerant" class="form-control" type="email">
                    </div>
                    <div class="form-group">
                        <label>Num??ro de t??l??phone g??rant <span class="text-danger">*</span></label>
                        <input required  name="numeroGerant" class="form-control"  type="text">
                    </div>
                   
                    <div class="form-group second" >
                        <label>Activit?? <span class="text-danger">*</span></label>
                        <input required name="activite" class="form-control"  type="text">
                    </div>
                    <div class="form-group second">
                        <label>Date cr??ation <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input required name="dateCreation" type="date" class="form-control datetimepicker"  type="text">
                        </div>    
                    </div>
                    <div class="form-group second" >
                        <label>Besoin de financement(million de fcfa) <span class="text-danger">*</span></label>
                        <label><span class="text-danger" id='alertbesoin'></span></label>
                        <input required name="besoinFinancement" id='besoin' class="form-control" type="text">

                    </div>
                    <div class="form-group second" >
                        <label>Localisation <span class="text-danger">*</span></label>
                        <input required name="localisation" class="form-control"  type="text">
                    </div>
                    <div class="form-group second">
                        <label>Date de votre rendez-vous <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input id='daterdv' required name="dateRdv" type="date" class="form-control"  type="text"><br>
                            <p  id="check" class="btn btn-primary">Choisissez votre heure<p>
                        </div>    
                    </div>
                    
                    <div id='plageFather'  class="form-group" style="display: none">
                        <label>Plage horaire disponible <span class="text-danger">*</span></label>
                        <select id='plage' name="plageHoraire" class="select" required>
                            <option>S??lectionner une plage horaire</option>
                            
                        </select>
                    </div>
                    <input name="filledUserId" type="hidden" class="form-control datetimepicker" value="0"  type="text">
                    <input name="codePme" type="hidden" class="form-control datetimepicker" value="<?php echo e($uuid); ?> "  type="text">
                    <div id="validateBtn" class="submit-section" style="display: none">
                        <button type="submit" class="btn btn-primary submit-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add personnal Modal -->
<div id="personal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Diplom?? & Chommeurs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('particuliertakeApoint')); ?> ">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>Nom Prenom <span class="text-danger">*</span></label>
                        <input required name="nom" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Age <span class="text-danger">*</span></label>
                        <input required name="age" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Num??ro de t??l??phone  <span class="text-danger">*</span></label>
                        <input required name="numerotel" class="form-control"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Num??ro de t??l??phone  <span class="text-danger">*</span></label>
                        <input required name="numerotel2" class="form-control"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Niveaux et diplomes <span class="text-danger">*</span></label>
                        <input required name="niveau" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Ecole du dernier dipl??me <span class="text-danger">*</span></label>
                        <input required name="ecole" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Lieu d'habitation <span class="text-danger">*</span></label>
                        <input required  name="localisation" class="form-control"  type="text">
                    </div>
                   
                    <div class="form-group second" >
                        <label>Activit?? <span class="text-danger">*</span></label>
                        <input required name="activite" class="form-control"  type="text">
                    </div>
                    D??j?? particip?? ?? un programme brainstorming? 
                    <div class="form-group second" >
                        <label>Si oui le quel? <span class="text-danger"></span></label>
                        <input  name="ancienNouveau" class="form-control"  type="text">
                    </div>
                    <div class="form-group second" >
                        <label>Pr??cisez la p??riode<span class="text-danger"></span></label>
                        <input  name="periode" class="form-control"  type="text">
                    </div>
                    <div class="form-group second">
                        <label>Date de votre rendez-vous <span class="text-danger">*</span></label>
                        <div class="cal-icon">
                            <input id='daterdv1' required name="dateRdv1" type="date" class="form-control"  type="text"><br>
                            <p  id="check1" class="btn btn-primary">Choisissez votre heure<p>
                        </div>    
                    </div>
                    
                    <div id='plageFather1'  class="form-group" style="display: none">
                        <label>Plage horaire disponible <span class="text-danger">*</span></label>
                        <select id='plage1' name="plageHoraire" class="select" required>
                            <option>S??lectionner une plage horaire</option>
                            
                        </select>
                    </div>

                    <input name="filledUserId" type="hidden" class="form-control datetimepicker" value="0"  type="text">
                    <input name="codePme" type="hidden" class="form-control datetimepicker" value="<?php echo e($uuid); ?> "  type="text">
                    <div id="validateBtn1" class="submit-section" style="display: none">
                        <button type="submit" class="btn btn-primary submit-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
                        <label>Code PME <span class="text-danger">*</span></label>
                        <input required name="Pme" type="text" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Chargez les fichiers <span class="text-danger">*</span></label>
                        <input required type="file"  name="filenames[]" multiple  class="form-control">
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

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
<?php if(session()->has('succes')): ?>
<script>
   $(document).ready(function () {
    alert("<?php echo e(session()->get('succes')); ?>");
   });
</script>     
<?php endif; ?>

<?php if(session()->has('error')): ?>
<script>
 $(document).ready(function () {
    alert("<?php echo e(session()->get('error')); ?>");
 });
</script>     
<?php endif; ?>
<script>

    $(function () {
          //file besoin according to type PME
          var besoin1=0;

          $('#typepme').change(function(){
            $('#retirer').remove();
              if($('#typepme').val()==1){
                $('#alertbesoin').append("<p id='retirer'>Votre besoin de financement doit etre compris entre 10 - 100 millions de FCFA</p>");
                 besoin1=50000000;
              }
              if($('#typepme').val()==2){
                //$('#besoin').val('50-100');
                $('#alertbesoin').append("<p id='retirer' >Votre besoin de financement peut etre compris entre 100 - 500 millions de FCFA</p>");
                besoin1=100000000;
              }
              if($('#typepme').val()==3){
                //$('#besoin').val('100+');
                $('#alertbesoin').append("<p id='retirer' >Votre besoin de financement peut etre de plus de 500 millions FCFA</p>");
                besoin1=100000000;


              }
              if($('#typepme').val()==4){
                //$('#besoin').val('5-10');
                $('#alertbesoin').append("<p id='retirer'>Votre besoin de financement peut etre compris entre 5 et 10 millions  FCFA</p>");
                besoin1=10000000;

            }
          })

           $('#check').click(function(){
                var d=$('#daterdv').val();
                if(d==''){
                    alert('choissez une date svp!');
                    return;
                }
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    type: "POST",
                    url: "<?php echo e(route('checkT')); ?>",
                    data: {
                        'date':d,
                    },
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                        if(response['error']==false){
                            $plage=response['data'];
                            $el=$('#plage');
                            var tampon=1;
                            $('#plage option').each(function(){
                                if($.inArray($(this).val(),[1,2,3,4])){
                                    $(this).remove();
                                }
                            })
                            $plage.forEach(element => {
                                if(element==0){
                                    tampon=0;
                                }
                                if(element==1){
                                   $el.append('<option value=1>08h-10h</option>');
                                }
                                if(element==2){
                                    $el.append('<option value=2>10h-12h</option>');
                                }
                                if(element==3){
                                    $el.append('<option value=3>14h-16h</option>');
                                }
                                if(element==4){
                                    $el.append('<option value=4>16h-18h</option>');
                                }
                                if(element==0){
                                    alert("Cette date n'est plus disponible. Merci de choisir une autre date");    
                                }
                            });

                            if(tampon==1){
                                $('#plageFather').css('display','block');
                                $('#validateBtn').css('display','block');
                                //$('#check').css('display','none');
                                $('#check2').css('display','block');
                            }

                        }else{
                            alert('Invalide Request to server! retry');
                        }
                    }
                });
                
           });
           $('#check2').click(function(){
            $('#plageFather').css('display','none');
            $('#validateBtn').css('display','none');
            $('#plage').remove();
            $('#check').css('display','block');
            $('#check2').css('display','none');
           })
    });
</script>
<script>
    $(function () {
           $('#check1').click(function(){
                var d=$('#daterdv1').val();
                console.log(d);
                if(d==''){
                    alert('choissez une date svp!');
                    return;
                }
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    type: "POST",
                    url: "<?php echo e(route('checkT')); ?>",
                    data: {
                        'date':d,
                    },
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                        if(response['error']==false){
                            $plage=response['data'];
                            $el=$('#plage1');
                            var tampon=1;
                            $('#plage1 option').each(function(){
                                if($.inArray($(this).val(),[1,2,3,4])){
                                    $(this).remove();
                                }
                            })
                            $plage.forEach(element => {
                                console.log(element);
                                if(element==0){
                                    tampon=0;
                                }
                                if(element==1){
                                   $el.append('<option value=1>08h-10h</option>');
                                }
                                if(element==2){
                                    $el.append('<option value=2>10h-12h</option>');
                                }
                                if(element==3){
                                    $el.append('<option value=3>14h-16h</option>');
                                }
                                if(element==4){
                                    $el.append('<option value=4>16h-18h</option>');
                                }
                                if(element==0){
                                    alert("Cette date n'est plus disponible. Merci de choisir une autre date");    
                                }
                            });

                            if(tampon==1){
                                $('#plageFather1').css('display','block');
                                $('#validateBtn1').css('display','block');
                                //$('#check1').css('display','none');
                                $('#check3').css('display','block');
                            }

                        }else{
                            alert('Invalide Request to server! retry');
                        }
                    }
                });
                
           });
           $('#check3').click(function(){
            $('#plage1').remove();
            $('#plageFather1').css('display','none');
            $('#validateBtn1').css('display','none');
            $('#check1').css('display','block');
            $('#check3').css('display','none');
           })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.homeLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/Ampps/www/agendeaffairepmepmi/resources/views/home/index.blade.php ENDPATH**/ ?>