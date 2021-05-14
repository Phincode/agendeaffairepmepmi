@php
    use Illuminate\Support\Str;
    $uuid = Str::uuid()->toString();
    //dd(session()->get('error'));
   
@endphp
@extends('layout.homeLayout')

@section('menuoption')
<section id="home" class="page overlay">
    <div class="container-fluid">
        <div class=" content cover text-center">
            <br class="d-none d-lg-block d-xl-block">
            <br class="d-none d-lg-block d-xl-block">
            <br class="d-none d-lg-block d-xl-block">
            <br class="d-none d-lg-block d-xl-block">
            <br class="d-none d-lg-block d-xl-block">
                @if (session()->has('succes'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Succes:</strong>  {{session()->get('succes')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Désolé:</strong>  {{session()->get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
            <div class="row align-items-center ">
                {{-- <div class="option col-sm-12 col-lg-4 col-md-4">
                    <div class="col-lg-12">
                        <a  data-toggle="modal" data-target="#add_leave"  href="#" role="button"><img class="rounded-circle" src="https://afriquedirect.com/wp-content/uploads/2019/05/Dossiers1.jpg" alt="Generic placeholder image" width="200" height="200">
                        </a>
                        <h2>Souscription</h2>
                    </div>   
                </div> --}}
                <!-- second card-->
                <div class=" offset-xl-3 option col-sm-12 col-lg-3 col-md-3 align-items-center">
                    <div class="col-lg-12">
                        <br>
                        <br>
                        <a data-toggle="modal" data-target="#add_dossier"  href="#" role="button">
                            <img class="rounded-circle" src="{{asset('home/img/menuoption/depotdossier.png')}} " alt="Generic placeholder image" width="200" height="200">
                        </a>
                        <h2 style="font-family: 'Nexa', sans-serif;">Dépôt dossier</h2>
                      </div>    
                </div>
                <!-- end second card-->
                <div  class="option  col-sm-12 col-lg-3 col-md-3 align-items-center">
                    <div class="col-lg-12">
                        <br>
                        <br>
                        <a  href="#" role="button">
                            <img class="rounded-circle" src="{{asset('home/img/menuoption/dossierplateforme.png')}} " alt="Generic placeholder image" width="200" height="200">
                        </a>
                        <h2 style="font-family: 'Nexa', sans-serif;">Platefome dossier</h2>
                      </div>     
                </div>
                <!-- end third-->
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</section>


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
                <form method="POST" action="{{route('adDossier')}}" enctype="multipart/form-data">
                    @csrf
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
@endsection