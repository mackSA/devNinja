@extends('layouts.app')


@section('content')
@include('noty::message')
  <div class="container">    
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >User Profile</h4></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="uploads/avatars/{{$avatar->avatar}}" id="profile-image1" height="250px" width="250px;" style="border-radius: 50%" class="img-circle img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2>{{$user->first_name}} {{$user->last_name}}</h2>
                            <p>Profile</p>
                          
                              @if(Auth::user()->role == '1')
                          </div>
                           <hr>
                            <ul class="list-unstyled" style="text-decoration: none;" >
                            <li><p><span><i class="fa fa-linkedin"></i></span>  {{Auth::user()->profile->linkedin_link}}</p></li>
                            <li><p><span><i class="fa fa-github"></i></span>   {{Auth::user()->profile->git_link}}</p></li>
                          </ul>
                    
                      @endif
                     <hr>
                  
                         <ul  class="list-unstyled" style="text-decoration: none;" >
                          <li><p><span><i class="   fa fa-address-book"></i></span> {{Auth::user()->profile->contact}}</p></li>
                            <li><p><span><i class=" fa fa-envelope-o"></i></span> {{ Auth::user()->email}}</p></li>
                          </ul>
                       
                          <hr>
                          <div class="col-sm-5 col-xs-6 tital text-center" >
                            <a href="{{route('profile.edit',Auth::user()->id )}}" class="btn btn-info">Edit Profile</a>
                          </div>
                      </div>
                </div>
            </div>
            </div>
               @if(Auth::user()->role == '1')
            <div class="row">
              <div class="panel panel-default">
                <div class="panel-heading">  <h4 >Skills</h4></div>
                  <div class="panel-body">
                    @if($tags != '')
                      @foreach (explode(',',$tags) as $object)
                        <span class="tags">{{ strtoupper($object) }}</span>
                      @endforeach
                   
                    @else
                    <h3>No skills added</h3> 
                     @endif
                        <hr>
                          <div class="col-sm-5 col-xs-6 tital text-center" >
                            <a href="{{route('skills.edit')}}" class="btn btn-info">Edit skills</a>
                          </div>
                  </div>
              </div>
          </div>
          @endif


@stop