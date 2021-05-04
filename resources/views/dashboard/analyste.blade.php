@extends('layout.dashboard.dash')

@section('pagecontent')
<br>
<div class="row staff-grid-row">
    @foreach ($pmeDossiers as $Pme)
    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div class="profile-widget">
            <div class="profile-img">
                <a href="#" class="avatar"><img src="#" alt=""></a>
            </div>
            <div class="dropdown profile-action">
            </div>
            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="#">{{$Pme->nom}} </a></h4>
            <div class="small text-muted">Observation:{{$Pme->Observation}} </div>
            <div class="submit-section">
                <a href="{{route('rAnalyste',['iddossier'=>$Pme->id])}} " class="btn btn-primary submit-btn" >Ouvrir</a>
            </div>
        </div>
    </div>
    @endforeach
    
</div>

{{-- <!-- scoring Modal -->
<div id="deleguer" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Scorer le dossier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('transfertDossierAnalyste')}}">
                    @csrf
                    <div class="form-group">
                        <label>Analyste <span class="text-danger">*</span></label>
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
                    <input type="hidden"  name="pmeId" value="{{$currentPme}} "   class="form-control">
                    <input type="hidden"  name="analysteId" value="{{Auth::user()->id}} "   class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /scoring Modal --> --}}
@endsection