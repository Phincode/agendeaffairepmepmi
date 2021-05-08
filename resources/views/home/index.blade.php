@extends('layout.homeLayout')
@section('menuoption')
<section id="home" class="page overlay">
    <div class="container-fluid">
        <div class=" content cover text-center">
            <div class="row">
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <div class="col-lg-12">
                        <a href="{{route('souscriptionDossier')}} " role="button"><img class="rounded-circle" src="https://afriquedirect.com/wp-content/uploads/2019/05/Dossiers1.jpg" alt="Generic placeholder image" width="200" height="200"></a>
                        <h2>Souscription/Dossier</h2>
                      </div>   
                </div>
                <!-- second card-->
                <div class="col-sm-12 col-lg-4 col-md-4 align-items-center">
                    <div class="col-lg-12">
                        <a  href="{{route('decisionFinancement')}}" role="button"> <img class="rounded-circle" src="https://www.ebony.com/wp-content/uploads/2016/12/Black-Dollars-Caro.jpg" alt="Generic placeholder image" width="200" height="200">
                        </a>
                        <h2>Décision de financement</h2>
                      </div>    
                </div>
                <!-- end second card-->
                <div  class="col-sm-12 col-lg-4 col-md-4 align-items-center">
                    <div class="col-lg-12">
                        <a  href="{{route('decisionFinancement')}}" role="button"><img class="rounded-circle" src="https://relaisentrepreneuriaux.files.wordpress.com/2012/07/opportunite-logo.jpg" alt="Generic placeholder image" width="200" height="200">
                        </a>
                        <h2>Opportunités</h2>
                      </div>  
                </div>
                <!-- end third-->
            </div>
        </div>
    </div>
</section>
@endsection
