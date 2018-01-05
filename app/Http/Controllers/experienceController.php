<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\experience;
use Auth;
use Session;

class experienceController extends Controller
{


     public function index($id){
       
        $experience = Experience::where('id',$id)->first();
      // dd($experience);
        return view('profiles.edit_experience')->with(['experience' => $experience,]);
    }



    public function add(Request $input){

    	 $experience =  experience::create([
            'start' => $input->Start,
            'end' => $input->End,
            'company' => $input->company,
            'position' => $input->position,
            'role' => $input->Role,
            'user_id' => Auth::user()->id,
        ]);

    	  Session::flash('success','experience added');
    	

        return redirect()->back();

        //dd($input->Role);

    }



    public function update(Request $input)
    {
        

        
        $experience =  experience::where('id',$input->id)->update([

             'start' => $input->Start,
            'end' => $input->End,
            'company' => $input->company,
            'position' => $input->position,
            'role' => $input->Role,

        ]);

         Session::flash('success','experience updated');
        

        return redirect()->back();
    }



}
