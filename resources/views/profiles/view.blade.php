@extends('layouts.app')

@section('content')
@include('noty::message')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
              

                <div class="panel-body">
                   
                         <center>
                    <img src="{{ Storage::url($profile->avatar)}}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                  
                    <h3 class="media-heading">{{$user->first_name}} {{$user->last_name}}</h3>
                      <p><strong>Skills: </strong>
                        @if($skills != '')
                      @foreach (explode(',',$skills) as $object)
                        <span class="tags">{{ strtoupper($object) }}</span>
                      @endforeach
                   
                    @else
                    <h3>No skills added</h3> 
                     @endif
                    </p>
                    </center>
                    <hr>
                      
                         <ul class="list-unstyled" style="text-decoration: none;" >
                            <li><p><span><i class="fa fa-linkedin"></i></span>  {{$profile->linkedin_link}}</p></li>
                            <li><p><span><i class="fa fa-github"></i></span>  {{$profile->git_link}}</p></li>
                          </ul>
                    
                 
                     <hr>
                  
                         <ul  class="list-unstyled" style="text-decoration: none;" >
                            <li><p><span><i class="   fa fa-address-book"></i></span> {{$profile->contact}}</p></li>
                            <li><p><span><i class=" fa fa-envelope-o"></i></span> {{$user->email}}</p></li>
                          </ul>
                    
                    <hr>
                      
                    <center>
                    <p class="text-left"><strong>Bio: </strong><br>
                         <textarea class="form-control" rows="6" style="height:auto !important;" disabled>{{$user->profile->bio}}.</textarea></p>
                    <br>
                    </center>
                   
                       
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-md-offset-1">
            <div class="page-header">
        <h1 id="timeline">Experience</h1>
    </div>
    <ul class="timeline">
    @if($experience != '')  
      @foreach($experience as $experience)
        <li>
          <div class="timeline-badge">{{$experience->start}}</div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h2 class="timeline-title">{{$experience->position}}</h2>
              <h4>Company: {{$experience->company}}</h4>
              <p><small class="text-muted"> <i class="fa fa-hourglass-o"></i> Duration: {{$experience->start}} - {{$experience->end}}  </small></p>
            </div>
            <div class="timeline-body">
             
             <p> <span> <h5>Role:</h5></span> <textarea class="form-control" rows="6" style="height:100% !important;" disabled>{{$experience->role}}</textarea></p>
            </div>
             
          </div>
        </li>
        @endforeach
        @else
        <h2>GRADUATE/INTERN</h2>
        </div>
        @endif
         




       
        </div>





@endsection
