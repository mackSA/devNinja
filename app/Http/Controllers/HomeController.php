<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\User;
use App\Skills;
use App\experience;
use App\Offer;
use Auth;
use paginate;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $tag = Skills::where('user_id',Auth::user()->id)->pluck('skills')->Toarray();
         $tags = implode(',', $tag);

        $experience = Experience::where('user_id',Auth::user()->id)->get();
        $user = User::where('role',1)->paginate(2);

        $profile = Profile::where('user_id',Auth::user()->id)->first();

        $offers = Offer::where(['id' => Auth::user()->id,'response' => null])->orWhereNull('response')->count();
        $res = Offer::where(['id' => Auth::user()->id,])->orWhereNotNull('response')->count();
            
       
        return view('home')->with(['skills'=>$tags,'experience' => $experience,'users'=>$user,'profile' => $profile,'count'=> $offers,'res_count'=> $res]);
    }


     public function view($id)

    {
        $tag = Skills::where('user_id',$id)->pluck('skills')->Toarray();
         $tags = implode(',', $tag);

        $experience = Experience::where('user_id',$id)->get();
        $user = User::where('id',$id)->first();
         $profile = Profile::where('user_id',$id)->first();
            
         
       
        return view('profiles.view')->with(['skills'=>$tags,'experience' => $experience,'user'=> $user,'profile' => $profile,]);
    }


   
}
