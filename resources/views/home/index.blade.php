@php
    use Illuminate\Support\Str;
    $uuid = Str::uuid()->toString();
   
@endphp

@extends('layout.homeLayout')
@section('menuoption')
<section id="home" class="page overlay">
    <div class="container">
        <div class=" content cover text-center align-content-around ">
            <br class="d-none d-lg-block d-xl-block">
            <br class="d-none d-lg-block d-xl-block">
            <br class="d-none d-lg-block d-xl-block">
            <br class="d-none d-lg-block d-xl-block">
            <br class="d-none d-lg-block d-xl-block">
            <div  class="row">
                    <div class=" option  col-sm-12 offset-lg-1 col-lg-3 col-md-3">
                        <div class="col-lg-12">
                            <br><br>
                            <a data-toggle="modal" data-target="#add_leave"  role="button"><img class="rounded-circle" src="{{asset('home/img/menuoption/brainstormingsouscription.png')}} " alt="Generic placeholder image" width="200" height="200"></a>
                            <h2 style="font-family: 'Nexa', sans-serif;">Souscription</h2>
                          </div>   
                    </div>
                
                <!-- second card-->
                <div  class=" option col-sm-12 col-lg-3 col-md-3 align-items-center">
                    <div class="col-lg-12">
                        <br><br>
                        <a  href="{{route('souscriptionDossier')}} " role="button"><img class="rounded-circle" src="{{asset('home/img/menuoption/dossier.png')}} " alt="Generic placeholder image" width="200" height="200">
                         {{-- {{route('decisionFinancement')}} --}}
                        </a>
                        <h2  style="font-family: 'Nexa', sans-serif;">Dossier</h2>
                      </div>  
                </div>
                
                <!-- end second card-->
                <div class=" option col-sm-12 col-lg-3 col-md-3 align-items-center">
                    <div class="col-lg-12">
                        <br><br>
                        <a  href="#" role="button"> <img class="rounded-circle" src="https://i0.wp.com/www.financialafrik.com/wp-content/uploads/2020/12/franccfa.jpg?fit=838%2C476&ssl=1&resize=1280%2C720 " alt="brainstorming agence d'affaire finnancement" width="200" height="200">
                         {{-- {{route('decisionFinancement')}} --}}
                        </a>
                        <h2 style="font-family: 'Nexa', sans-serif;" >Financement</h2>
                      </div>    
                </div>
                <!-- end third-->
            </div>
        </div>
    </div>
</section>
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
                    <a  data-dismiss="modal" data-toggle="modal" data-target="#add_leave" href="#" role="button"><img class="rounded-circle" src="https://freepikpsd.com/wp-content/uploads/2019/10/entreprise-icon-png-1-Transparent-Images.png" alt="Generic placeholder image" width="100" height="100">
                    </a>
                    <h3>Entreprise</h3>
                </div> 
                <div class="col-6 align-items-center">
                    <a  data-dismiss="modal" data-toggle="modal" data-target="#personal" href="#" role="button"><img class="rounded-circle" src="https://www.wiomsa.org/wp-content/uploads/2019/08/personnel-icon.png" alt="Generic placeholder image" width="100" height="100">
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
                <form method="POST" action="{{route('takeApoint')}}">
                    @csrf
                    <div class="form-group">
                        <label>Type PME <span class="text-danger">*</span></label>
                        <select required name="typePme" id='typepme' class="select">
                            <option>Sélectionner un type</option>
                            @foreach ($pmeTypeList as $item)
                            <option value="{{$item->id}} ">{{$item->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nom Pme <span class="text-danger">*</span></label>
                        <input required name="nom" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Nom propriétaire <span class="text-danger">*</span></label>
                        <input required name="nomProprietaire" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email propriétaire <span class="text-danger">*</span></label>
                        <input required  name="emailProprietaire" class="form-control" type="email">
                    </div>
                    <div class="form-group">
                        <label>Numéro de téléphone propriétaire <span class="text-danger">*</span></label>
                        <input required name="numeroProprietaire" class="form-control"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Nom Gérant <span class="text-danger">*</span></label>
                        <input required name="nomGerant" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email Gérant <span class="text-danger">*</span></label>
                        <input required name="emailGerant" class="form-control" type="email">
                    </div>
                    <div class="form-group">
                        <label>Numéro de téléphone gérant <span class="text-danger">*</span></label>
                        <input required  name="numeroGerant" class="form-control"  type="text">
                    </div>
                   
                    <div class="form-group second" >
                        <label>Activité <span class="text-danger">*</span></label>
                        <input required name="activite" class="form-control"  type="text">
                    </div>
                    <div class="form-group second">
                        <label>Date création <span class="text-danger">*</span></label>
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
                            <option>Sélectionner une plage horaire</option>
                            {{-- @foreach ($pmeTypeList as $item)
                            <option value="{{$item->id}} ">{{$item->nom}}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <input name="filledUserId" type="hidden" class="form-control datetimepicker" value="0"  type="text">
                    <input name="codePme" type="hidden" class="form-control datetimepicker" value="{{$uuid}} "  type="text">
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
                <h5 class="modal-title">Diplomé & Chommeurs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('particuliertakeApoint')}} ">
                    @csrf
                    <div class="form-group">
                        <label>Nom Prenom <span class="text-danger">*</span></label>
                        <input required name="nom" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Age <span class="text-danger">*</span></label>
                        <input required name="age" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Numéro de téléphone  <span class="text-danger">*</span></label>
                        <input required name="numerotel" class="form-control"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Numéro de téléphone  <span class="text-danger">*</span></label>
                        <input required name="numerotel2" class="form-control"  type="text">
                    </div>
                    <div class="form-group">
                        <label>Niveaux et diplomes <span class="text-danger">*</span></label>
                        <input required name="niveau" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Ecole du dernier diplôme <span class="text-danger">*</span></label>
                        <input required name="ecole" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label>Lieu d'habitation <span class="text-danger">*</span></label>
                        <input required  name="localisation" class="form-control"  type="text">
                    </div>
                   
                    <div class="form-group second" >
                        <label>Activité <span class="text-danger">*</span></label>
                        <input required name="activite" class="form-control"  type="text">
                    </div>
                    Déjà participé à un programme brainstorming? 
                    <div class="form-group second" >
                        <label>Si oui le quel? <span class="text-danger"></span></label>
                        <input  name="ancienNouveau" class="form-control"  type="text">
                    </div>
                    <div class="form-group second" >
                        <label>Précisez la période<span class="text-danger"></span></label>
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
                            <option>Sélectionner une plage horaire</option>
                            {{-- @foreach ($pmeTypeList as $item)
                            <option value="{{$item->id}} ">{{$item->nom}}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <input name="filledUserId" type="hidden" class="form-control datetimepicker" value="0"  type="text">
                    <input name="codePme" type="hidden" class="form-control datetimepicker" value="{{$uuid}} "  type="text">
                    <div id="validateBtn1" class="submit-section" style="display: none">
                        <button type="submit" class="btn btn-primary submit-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
@if(session()->has('succes'))
<script>
   $(document).ready(function () {
    alert("{{session()->get('succes')}}");
   });
</script>     
@endif

@if (session()->has('error'))
<script>
 $(document).ready(function () {
    alert("{{session()->get('error')}}");
 });
</script>     
@endif
<script>

    $(function () {
          //file besoin according to type PME
          var besoin1=0;

          $('#typepme').change(function(){
            $('#retirer').remove();
              if($('#typepme').val()==1){
                $('#alertbesoin').append("<p id='retirer'>Votre besoin de financement doit etre compris entre 10 - 50 million de FCFA</p>");
                 besoin1=50000000;
              }
              if($('#typepme').val()==2){
                //$('#besoin').val('50-100');
                $('#alertbesoin').append("<p id='retirer' >Votre besoin de financement peut etre compris entre 50 - 100 million de FCFA</p>");
                besoin1=100000000;
              }
              if($('#typepme').val()==3){
                //$('#besoin').val('100+');
                $('#alertbesoin').append("<p id='retirer' >Votre besoin de financement peut etre de plus de 100 000000 FCFA</p>");
                besoin1=100000000;


              }
              if($('#typepme').val()==4){
                //$('#besoin').val('5-10');
                $('#alertbesoin').append("<p id='retirer'>Votre besoin de financement peut etre compris entre 5 et 10 million  FCFA</p>");
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
                    url: "{{route('checkT')}}",
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
                    url: "{{route('checkT')}}",
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
@endsection
