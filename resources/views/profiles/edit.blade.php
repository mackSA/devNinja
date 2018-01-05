@extends('layouts.app')

@section('content')
@include('noty::message')
	<div class="container">
<form class="form-horizontal" method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
	{{csrf_field()}}
<fieldset>

<!-- Form Name -->
<legend>My Profile Edit</legend>
@if(Session::has('success'))
<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> {{Session::get('success')}}.
  </div>
@endif
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">profile image</label>  
  <div class="col-md-4">
  <input id="textinput" name="avatar" type="file" class="form-control "  accept="image/*" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input id="textinput" name="Email" type="Email" placeholder="" class="form-control input-md" value="{{ Auth::user()->email}}" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Contact</label>  
  <div class="col-md-4">
  <input id="textinput" name="contact" type="text" placeholder="" class="form-control input-md" value="{{$profile->contact}}" required>
    
  </div>
</div>
   @if(Auth::user()->role == '1')

   <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Location</label>  
  <div class="col-md-4">
  <input id="textinput" name="location" type="text" placeholder="" class="form-control input-md" value="{{$profile->location}}" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Current Position</label>  
  <div class="col-md-4">
  <input id="textinput" name="position" type="text" placeholder="e.g PHP Developer" class="form-control input-md" value="{{$profile->position}}" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Current Company</label>  
  <div class="col-md-4">
  <input id="textinput" name="company" type="text" placeholder="e.g Hello group" class="form-control input-md" value="{{$profile->company}}" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Salary Expectation</label>  
  <div class="col-md-4">
  <input id="textinput" name="salary" type="text" placeholder="e.g 20k-30k" class="form-control input-md" value="{{$profile->salary}}" required>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Git Hub link</label>  
  <div class="col-md-4">
  <input id="textinput" name="git" type="text" placeholder="" class="form-control input-md" value="{{$profile->git_link}}" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Linkedin</label>  
  <div class="col-md-4">
  <input id="textinput" name="Linkedin" type="text" placeholder="" class="form-control input-md" value="{{$profile->linkedin_link}}" required>
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Bio</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="bio" required>{{$profile->bio}}</textarea>
  </div>
</div>
@endif


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button  type="submit" class="btn btn-primary">Update</button>
  </div>
</div>

</fieldset>
</form>

</div>
@stop