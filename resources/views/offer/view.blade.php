@extends('layouts.app')

@section('content')
@include('noty::message')
<div class="container">
  <div class="row">
    @if(Session::has('success'))
<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> {{Session::get('success')}}.
  </div>
@endif
     @if(Auth::user()->role == '1')
    @if($offers != '')
    @foreach($offers as $offer)
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          <div class="thumbnailS">
              <div class="caption">
                <div class='col-lg-12'>
                   <!--  <a><span class=' fa fa-info-circle' style="font-size: 20px; padding: 4px;"></span></a> -->
                    <!-- <a><span class="fa fa-trash-o" style="font-size: 20px; padding: 4px;"></span></a> -->
                </div>
                <div class='col-lg-12 well well-add-card' id="well">
                    <h4>{{$offer->company}}</h4>
                </div>
                <div class='col-lg-12'>
                    <p>Postion: {{$offer->position}}</p>
                    <p >Salary: {{$offer->salary}}</p>
                </div>
                <hr>
                <div class='col-lg-12'>
                    <p>{{$offer->message}}</p>
         
                </div>
                <a href="{{route('respond',['id' => $offer->id, 'res' => 'accepted'])}}" class="btn btn-primary btn-xs btn-update btn-add-card">Contact me</a>
                <a href="{{route('respond',['id' => $offer->id, 'res' => 'rejected'])}}" class="btn btn-danger btn-xs btn-update btn-add-card">Reject</a>
                
            </div>
          </div>
        </div>  
        @endforeach
        @else
        <h1 align="center">You currently have no offers</h1>
        @endif
        @endif


         @if(Auth::user()->role == '0')
            @if($res != '')
           @foreach($res as $offer)
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="thumbnailS">
                    <div class="caption">
                      <div class='col-lg-12'>
                          <!-- <a><span class=' fa fa-info-circle' style="font-size: 20px; padding: 4px;"></span></a> -->
                           <a href="{{route('respond',['id' => $offer->id, 'res' => 'delete'])}}"><span class="fa fa-trash-o" style="font-size: 20px; padding: 4px;"></span></a>
                      </div>
                      <div class='col-lg-12'>
                          <p>Postion: {{$offer->position}}</p>
                           <p >Company: {{$offer->company}}</p> 
                      </div>
                      <div class='col-lg-12'>
                        
                      </div>
                      @if($offer->response == 'accepted')
                        <button class="btn btn-primary btn-xs btn-update btn-add-card">Contact me</button>
                      @elseif($offer->response == 'rejected')
                        <button  class="btn btn-danger btn-xs btn-update btn-add-card">Rejected</button>
                      @else
                        <button  class="btn btn-warning btn-xs btn-update btn-add-card">pending</button>
                      @endif
                  </div>
                </div>
              </div>  
              @endforeach
              @else
              <h1 align="center">You currently have no responses</h1>
              @endif

        @endif

      </div>
</div>





@endsection
