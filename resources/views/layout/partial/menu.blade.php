<div id="navbar-top">
    <nav class="navbar navbar-expand-md navbar-light bg-white fixed">
        <div class="container">
            <a class="navbar-brand nav-external" href=" {{route('home')}} "> <img style="height:70px;" src="{{asset('home/img/logo.png')}} " alt="Brainstorming agence d'affaire logo"> <span class="offset-xl-2 d-none d-lg-inline d-xl-inline" style="font-weight:normal; text-align: center;color:red"> Agence d'Affaires PME-PMI</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a target="_blank" href="https://api.whatsapp.com/send?phone=2250788823753" class="nav-link icon-button whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </li> 
                    
                    <li class="nav-item">
                        <a target="_blank" href="https://www.facebook.com/Agence-daffaires-pme-pmi-107162248224913" class="nav-link icon-button facebook"><i class="icon-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a target="_blank" href="tel:+2250788823753" class="nav-link icon-button"><i class="fa fa-phone" aria-hidden="true"></i></a>
                    </li>
                       
                        {{-- <a href="https://plus.google.com" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a> --}}
                    
                        @if (Auth::check())
                        <li class="nav-item navbar-brand">
                            <a class="nav-link" href="{{route('dashboardView')}}" style="font-weight:normal; margin-top:5px; text-transform:none; text-align: center;color:grey">Dashboard</a>
                         </li>
                        @else
                           <li class="nav-item navbar-brand">
                              <a class="nav-link" href="{{route('loginview')}}" style=" font-weight:normal; margin-top:5px; text-transform:none; text-align: center;color:grey">Connexion</a>
                           </li> 
                        @endif
                        
                    <li class="nav-item navbar-brand">
                        <a class="nav-link" href="#" style="font-weight:normal; margin-top:5px; text-transform:none; text-align: center;color:grey">Apropos de nous</a>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
</div>
<div style="color: white" class="container-fluid align-items-center   brand">
    <div class="row">
        <div class="col-12  text-center ">
            <div class="center-div">
                <p  >« …Connecting Minds For Development …  »</p>
            </div>

        </div>
    </div>
</div>