@extends('layouts.app')

@section('content')
@include('noty::message')
	<div class="container">
        @if(Session::has('success'))
<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> {{Session::get('success')}}.
  </div>
@endif

                      
                        <h4  id="contactLabel"><span class="fa fa-envelope-o"></span> Send canidate Offer.</h4>
                
                    <form action="{{route('send.offer')}}" method="post" accept-charset="utf-8">

                       {{csrf_field()}}
                    <div class="modal-body" style="padding: 5px;">
                          <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="company" placeholder="Company/Recruiter" type="text" required autofocus />
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                                    <input class="form-control" name="salary" placeholder="Offer eg 20k-30k" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                    <input class="form-control" name="position" placeholder="position" type="text" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="message" required></textarea>
                                </div>
                            </div>
                              <input class="form-control" name="user_id_to" value="{{$id}}" type="hidden"  />
                        </div>  
                       
                            <input type="submit" class="btn btn-success" value="Send"/>
                                <!--<span class="glyphicon glyphicon-ok"></span>-->
                            <input type="reset" class="btn btn-danger" value="Clear" />
                                <!--<span class="glyphicon glyphicon-remove"></span>-->
                         
                        </form>

</div>
@stop