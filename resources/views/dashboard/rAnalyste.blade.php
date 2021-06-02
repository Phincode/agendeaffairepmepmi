@extends('layout.dashboard.dash')

@section('pagecontent')
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
                                @foreach ($listPmetoScore as $item)
                                  @if (Auth::user()->hasrole('AS'))
                                      @if ($item->id==$currentPme)
                                      <li>
                                          <a href="{{route('rAnalyste',['iddossier'=>$item->id])}} ">{{$item->nom}}</a>
                                      </li>
                                      @endif
                                  @else
                                    @if (Auth::user()->hasrole('AG')||Auth::user()->hasrole('RAN') )
                                    <li>
                                        <a href="{{route('rAnalyste',['iddossier'=>$item->id])}} ">{{$item->nom}}</a>
                                    </li>
                                    @endif
                                      
                                  @endif
                                
                                @endforeach
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
                                <span>Dossier PME {{$currentPmeName}} </span>
                               </div>
                            </div>
                        </div>
                        <div class="file-content">
                            @if ($currentPme!=0)
                            <br>
                            <div class="">
                                @if (Auth::user()->hasrole('RAN'))
                                <button data-toggle="modal" data-target="#deleguer"  class="btn btn-primary submit-btn">Deleguer</button>
                                @endif
                                @if (Auth::user()->hasrole('RAN')||Auth::user()->hasrole('AS'))
                                <button  data-toggle="modal" data-target="#scoring" class="btn btn-success submit-btn">Scorer</button>
                                @endif
                                <button style="color: white" data-toggle="modal" data-target="#addFile" class="btn btn-warning submit-btn">Ajouter un fichier</button>
                            </div>
                            @endif
                            
                            <div class="file-body">
                                <div class="file-scroll">
                                    <div class="file-content-inner">
                                        <h4>Fichiers</h4>
                                        <div class="row row-sm">
                                            @foreach ($pmeFiles as $files)
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a target="_blank" href="{{url($files->docPath)}}" class="dropdown-item">View Details</a>
                                                            {{-- <a href="#" class="dropdown-item">Download</a> --}}
                                                            {{-- <a href="#" class="dropdown-item">Rename</a> --}}
                                                            @if (Auth::user()->hasrole('RAN') ||Auth::user()->hasrole('AS'))
                                                              <form  action="{{route('dossierFileDel')}}" method="POST">
                                                                  @csrf
                                                                  <input required type="hidden" name="docId" value="{{$files->id}}">
                                                                  <button style="background: none!important;border: none;padding: 0!important;" type="submit">Delete</button>
                                                              </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a  target="_blank" href="{{url($files->docPath)}}">{{$files->nomFichier}} </a></h6>
                                                        <span>...</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="d-none d-sm-inline">Last Modified: </span>{{$files->updated_at}}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            {{-- <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-word-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Document.docx</a></h6>
                                                        <span>22.67kb</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="d-none d-sm-inline">Last Modified: </span>30 mins ago
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-image-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">icon.png</a></h6>
                                                        <span>12.47kb</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="d-none d-sm-inline">Last Modified: </span>1 hour ago
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-excel-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Users.xls</a></h6>
                                                        <span>35.11kb</span>
                                                    </div>
                                                    <div class="card-footer">23 Jul 6:30 PM</div>
                                                </div>
                                            </div> --}}

                                        </div>

                                        {{-- <h4>Files</h4>
                                        <div class="row row-sm">
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-word-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Updates.docx</a></h6>
                                                        <span>12mb</span>
                                                    </div>
                                                    <div class="card-footer">9 Aug 1:17 PM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-powerpoint-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Vision.ppt</a></h6>
                                                        <span>72.50kb</span>
                                                    </div>
                                                    <div class="card-footer">6 Aug 11:42 AM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-audio-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Voice.mp3</a></h6>
                                                        <span>2.17mb</span>
                                                    </div>
                                                    <div class="card-footer">
                                                        <span class="d-none d-sm-inline">Last Modified: </span>30 Jul 9:00 PM
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-pdf-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Tutorials.pdf</a></h6>
                                                        <span>8.2mb</span>
                                                    </div>
                                                    <div class="card-footer">21 Jul 10:45 PM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-excel-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Tasks.xls</a></h6>
                                                        <span>92.82kb</span>
                                                    </div>
                                                    <div class="card-footer">16 Jun 4:59 PM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-image-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Page.psd</a></h6>
                                                        <span>118.71mb</span>
                                                    </div>
                                                    <div class="card-footer">14 Jun 9:00 AM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">License.txt</a></h6>
                                                        <span>18.7kb</span>
                                                    </div>
                                                    <div class="card-footer">5 May 8:21 PM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-word-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Expenses.docx</a></h6>
                                                        <span>66.2kb</span>
                                                    </div>
                                                    <div class="card-footer">24 Apr 7:50 PM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-audio-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Music.mp3</a></h6>
                                                        <span>3.6mb</span>
                                                    </div>
                                                    <div class="card-footer">13 Mar 2:00 PM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-text-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Installation.txt</a></h6>
                                                        <span>43.9kb</span>
                                                    </div>
                                                    <div class="card-footer">26 Feb 5:01 PM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-video-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">Workflow.mp4</a></h6>
                                                        <span>47.65mb</span>
                                                    </div>
                                                    <div class="card-footer">3 Jan 11:35 AM</div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3">
                                                <div class="card card-file">
                                                    <div class="dropdown-file">
                                                        <a href="#" class="dropdown-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">View Details</a>
                                                            <a href="#" class="dropdown-item">Share</a>
                                                            <a href="#" class="dropdown-item">Download</a>
                                                            <a href="#" class="dropdown-item">Rename</a>
                                                            <a href="#" class="dropdown-item">Delete</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-file-thumb">
                                                        <i class="fa fa-file-code-o"></i>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6><a href="#">index.html</a></h6>
                                                        <span>23.7kb</span>
                                                    </div>
                                                    <div class="card-footer">1 Jan 8:55 AM</div>
                                                </div>
                                            </div>

                                        </div> --}}
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
                <form method="POST" action="{{route('dossierAddFile')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Chargez les fichiers <span class="text-danger">*</span></label>
                        <input type="file"  name="filenames[]" multiple  class="form-control">
                    </div>
                    <input type="hidden"  name="pmeId" value="{{$currentPme}}" class="form-control">
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
                <form method="POST" action="{{route('transfertDossierAnalyste')}}">
                    @csrf
                    <div class="form-group">
                        <label>Analyste <span class="text-danger">*</span></label>
                        <select name="analysteId" class="select">
                            <option>Sélectionner un collaborateur</option>
                            @foreach ($ListeAnalyste as $item)
                            <option value="{{$item->id}} ">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Laissez une observation <span class="text-danger">*</span></label>
                        <input type="text"  name="observation"   class="form-control">
                    </div>
                    <input type="hidden"  name="pmeId" value="{{$currentPme}} "   class="form-control">
                    <input type="hidden"  name="ranalysteId" value="{{Auth::user()->id}} "   class="form-control">
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
                <form method="POST" action="{{route('scoring')}}">
                    @csrf
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
                    <input type="hidden"  name="pmeId" value="{{$currentPme}} "   class="form-control">
                    <input type="hidden"  name="analysteId" value="{{Auth::user()->id}} " class="form-control">
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /scoring Modal -->


@endsection