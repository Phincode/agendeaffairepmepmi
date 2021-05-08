<div id="navbar-top">
    <nav class="navbar navbar-expand-md navbar-light bg-white fixed">
        <div class="container">
            <a class="navbar-brand nav-external" href=" {{route('home')}} "> <img style="height: 70px;" src="{{asset('home/img/logo.png')}} "> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="nav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="https://facebook.com" class="nav-link icon-button whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                    </li> 
                    
                    <li class="nav-item">
                        <a href="https://facebook.com" class="nav-link icon-button facebook"><i class="icon-facebook"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="https://twitter.com/minimalmonkey" class="nav-link icon-button"><i class="fa fa-phone" aria-hidden="true"></i></a>
                    </li>
                       
                        {{-- <a href="https://plus.google.com" class="icon-button google-plus"><i class="icon-google-plus"></i><span></span></a> --}}
                    
                        @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboardView')}}">Dashboard</a>
                         </li>
                        @else
                           <li class="nav-item">
                              <a class="nav-link" href="{{route('loginview')}} ">Connexion</a>
                           </li> 
                        @endif
                        
                    <li class="nav-item">
                        <a class="nav-link" href="#">Apropos de nous</a>
                    </li>
                </ul>
                
            </div>
        </div>
    </nav>
</div>