@extends('layout.dashboard.dash')

@section('pagecontent')
<br>
 <h1 style="text-align: center" >Retour Analyste</h1>
<br>
<div class="row staff-grid-row" style="padding-left:10px; ">
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
            <div class="small text-muted">Score:{{$Pme->score}} </div>
            <div class="small text-muted">Analyste:{{$Pme->name}} </div>
            <div class="small text-muted">Date:{{$Pme->created_at}} </div>


            <div class="submit-section">
                <a href="{{route('rAnalyste',['iddossier'=>$Pme->pmeId])}} " class="btn btn-primary" >Voir le dossier</a>
            </div>
                <div class="submit-section">
                    <Button onclick="getpmeId({{$Pme->pmeId}})" data-toggle="modal" data-target="#partenaire" id="envoieBank" class="btn btn-primary" >Envoie Banque</Button>
                </div>
            
            <form action="{{route('transfertdossierRanalyste')}}" method="post">
                @csrf
                <div class="submit-section">
                    <input type="hidden"  name="pmeId" value="{{$Pme->pmeId}} "   class="form-control">
                    <Button type="submit" class="btn btn-primary" >Retourner</Button>
                </div>
            </form>

            <form action="{{route('dossierDel')}} " method="POST">
                @csrf
                <div class="submit-section">
                    <input type="hidden"  name="pmeId" value="{{$Pme->pmeId}} "   class="form-control">
                    <Button type="submit" class="btn btn-primary">Rejeté</Button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    
</div>

<!-- partenanire Modal -->
<div id="partenaire" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choisir le partenanaire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('sendTobank')}}">
                    @csrf
                    <div class="form-group">
                        <label>Banque <span class="text-danger">*</span></label>
                        <select name="bankid" class="select">
                            <option>Sélectionner un partenanire financié</option>
                            @foreach ($Banks as $item)
                              <option value="{{$item->id}} ">{{$item->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Laissez une observation <span class="text-danger">*</span></label>
                        <input type="text"  name="observation"   class="form-control">
                    </div>
                    <input type="hidden" id="pmId" name="pmId" value="" class="form-control">
                    <input type="hidden"  name="from" value="{{Auth::user()->id}} "   class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /partenaire Modal -->

<script>
     function getpmeId(id){
        $('#pmId').val(id.toString());
        console.log(id);
    }   
</script>
@endsection