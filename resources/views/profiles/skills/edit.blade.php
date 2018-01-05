@extends('layouts.app')

@section('content')
	<div class="container">
<form class="form-horizontal" method="POST" action="{{route('skills.update')}}">
	{{csrf_field()}}
<fieldset>

<!-- Form Name -->
<legend>Skills Edit</legend>

@if($skills != '')
                      @foreach (explode(',',$skills) as $object)
                        <label class="label label-info">{{ strtoupper($object) }}</label>
                      @endforeach
                   
                    @else
                    <h3>No skills added</h3> 
                     @endif

<div class="form-group">
      <label>Skills:</label>
      <br/>
      <input data-role="tagsinput" type="text" name="tags[]" >
      @if ($errors->has('tags'))
                <span class="text-danger">{{ $errors->first('tags') }}</span>
            @endif
    </div>    


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