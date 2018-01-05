@extends('layouts.app')

@section('content')
@include('noty::message')
<div class="container-fluid">
    <div class="row">
      @if(Session::has('success'))
<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> {{Session::get('success')}}.
  </div>
@endif
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
              

                <div class="panel-body">
                   
                         <center>
                    <img src="uploads/avatars/{{Auth::user()->profile->avatar}}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    @if(Auth::user()->role == '1')
                    <h3 class="media-heading">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
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
                            <li><p><span><i class="fa fa-linkedin"></i></span>  {{Auth::user()->profile->linkedin_link}}</p></li>
                            <li><p><span><i class="fa fa-github"></i></span>  {{Auth::user()->profile->git_link}}</p></li>
                          </ul>
                    
                   @endif
                     <hr>
                  
                         <ul  class="list-unstyled" style="text-decoration: none;" >
                            <li><p><span><i class="   fa fa-address-book"></i></span> {{Auth::user()->profile->contact}}</p></li>
                            <li><p><span><i class=" fa fa-envelope-o"></i></span> {{ Auth::user()->email}}</p></li>
                          </ul>
                    
                    <hr>
                       @if(Auth::user()->role == '1')
                    <center>

                    <p class="text-left"><strong>Bio: </strong><br>
                       <textarea class="form-control" rows="6" style="height:100% !important;" disabled>{{Auth::user()->profile->bio}}</textarea>.</p>
                    <br>
                    </center>
                    @endif
                     <center>
                          <div class="col-sm-5 col-xs-6 tital text-center" >
                            <a href="{{ route('profile',Auth::user()->id) }}" class="btn btn-info">Edit Profile</a>
                          </div>
                      </center>     
                </div>
            </div>
        </div>
           <ul  class="list-unstyled" style="text-decoration: none;">
         @if(Auth::user()->role == '1')
       

                            <li><a href="{{route('view.offer')}}" class="btn btn-info">Offers <span class="badge">{{$count}}</span></a><br></li>
                            @else
                            <li><a href="{{route('view.offer')}}" class="btn btn-info">Responses <span class="badge">{{$res_count}}</span></a><br></li>
                          
                        @endif   
                        </ul> 
         @if(Auth::user()->role == '1')
        <div class="col-md-6 col-md-offset-1">
            <div class="page-header">
        <h1 id="timeline">Experience</h1><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">ADD</button>
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
              <h5>Role:</h5>
              <p><textarea class="form-control" rows="6" style="height:auto !important;" disabled>{{$experience->role}}</textarea></p>
            </div><br>
              <a href="{{route('experience.edit',$experience->id)}}" class="btn btn-xs btn-default"><i class="fa fa-user-o"></i>Edit</a>
          </div>
        </li>
        @endforeach
        @else
        <h2>GRADUATE/INTERN</h2>
        </div>
        @endif
         @endif




          @if(Auth::user()->role == '0')
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
            <div class="page-header">
        <h1 id="timeline" align="center">Canidates</h1>
    </div>
        </div>
       
  

               @foreach($users as $user)
    <div class="col-md-2 col-md-offset-1">
         
            <div class="well well-sm">
                <div class="media">
                    <a class="thumbnail pull-left" href="#">
                        <img class="media-object"  src="uploads/avatars/{{$user->profile->avatar}}">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$user->first_name}}  {{$user->last_name}}</h4>
                    <!-- <p><strong>Skills: </strong>
                        <span class="tags">Java</span>
                        <span class="tags">PHP</span>
                        <span class="tags">CSS</span>
                        <span class="tags">HTML</span>
                        <span class="tags">IONIC</span>
                        <p> -->

                          <p><strong>Current postion: </strong>{{$user->profile->position}}</p>
                          <p><strong>Current Company: </strong> {{$user->profile->company}}</p>
                          <p><strong>Location: </strong> {{$user->profile->location}}</p>
                          <hr>
                      
                    <p class="text-left"><strong>Bio: </strong> </p>
                         <textarea class="form-control" rows="6" style="height:auto !important;" disabled> {{$user->profile->bio}}.</textarea></p>
                  
                    <hr>
                            <a href="{{route('message',$user->id) }}" class="btn btn btn-default"><i class="fa fa-paper-plane-o"></i> Send offer</a>
                              <a href="{{route('view',$user->id) }}" class="btn btn btn-default"><i class="fa fa-user-o"></i> View profile</a>
                            
                       
                    </div>
                </div>
            </div>
          
        </div>
          @endforeach

          {{ $users->links() }}
        </div>
  @endif




<!--  modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h3 class="modal-title" id="lineModalLabel">My Modal</h3>
    </div>
    <div class="modal-body">
      
            <!-- content goes here -->
      <form  class="form-horizontal" action="{{route('experience.add')}}" method="POST">
        {{csrf_field()}}
        <fieldset>
             <legend>Edit Experience</legend>
      


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Start</label>  
  <div class="col-md-6">
  <input id="textinput" name="Start" type="text" placeholder="e.g 2009" class="form-control input-md"  required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">End</label>  
  <div class="col-md-6">
  <input id="textinput" name="End" type="text" placeholder="e.g 2018" class="form-control input-md"  >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Company</label>  
  <div class="col-md-6">
  <input id="textinput" name="company" type="text" placeholder="e.g Hello group" class="form-control input-md"  required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Position</label>  
  <div class="col-md-6">
  <input id="textinput" name="position" type="text" placeholder="e.g java developr team lead" class="form-control input-md"  required>
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Role Description</label>
  <div class="col-md-6">                     
    <textarea class="form-control" id="textarea" name="Role" required></textarea>
  </div>
</div>
             
             <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-6">
    <button  type="submit" class="btn btn-primary btn-block">Add</button>
  </div>
</div>
</fieldset>
</form>

    </div>
    <div class="modal-footer">
      <div class="btn-group btn-group-justified" role="group" aria-label="group button">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>


<!-- send message modal -->







@endsection
