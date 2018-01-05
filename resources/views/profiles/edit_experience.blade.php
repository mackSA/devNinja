@extends('layouts.app')

@section('content')
@include('noty::message')
	<div class="container">
<form  class="form-horizontal" action="{{route('experience.update')}}" method="POST">
        {{csrf_field()}}
        <fieldset>
             <legend>Edit Experience</legend>
      @if(Session::has('success'))
<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> {{Session::get('success')}}.
  </div>
@endif


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Start</label>  
  <div class="col-md-6">
  <input id="textinput" name="Start" type="text" placeholder="e.g 2009" class="form-control input-md" value="{{$experience->start}}"  required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">End</label>  
  <div class="col-md-6">
  <input id="textinput" name="End" type="text" placeholder="e.g 2018" class="form-control input-md" value="{{$experience->end}}" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Company</label>  
  <div class="col-md-6">
  <input id="textinput" name="company" type="text" placeholder="e.g Hello group" class="form-control input-md" value="{{$experience->company}}" required>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Position</label>  
  <div class="col-md-6">
  <input id="textinput" name="position" type="text" placeholder="e.g java developr team lead" class="form-control input-md" value="{{$experience->position}}"  required>
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">Role Description</label>
  <div class="col-md-6">                     
    <textarea class="form-control" id="textarea" name="Role" required >{{$experience->role}}</textarea>
  </div>
</div>

 <input id="textinput" name="id" type="hidden" placeholder="e.g java developr team lead" class="form-control input-md" value="{{$experience->id}}"  required>
             
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
@stop