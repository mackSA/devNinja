<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skills;
use App\profile;
use Auth;
use Session;



class profileController extends Controller
{

    public function index($id)
    {
    		$user = User::where('id' ,$id)->first();
            $tag = Skills::where('user_id',Auth::user()->id)->pluck('skills')->Toarray();
            $profile = Profile::where('id' ,$id)->first();
        
        $tags = implode(',', $tag);

    	 return view('profiles.profile')->with(['user'=> $user,'tags' =>$tags,'avatar'=> $profile,]);

            // dd($user);

    }


     public function edit($id)
    {
    	
    	return view('profiles.edit')->with('profile',Auth::user()->profile);

    }


     public function update(Request $request)
    {
    	

    	
        Auth::user()->profile->update([

            'contact' => $request->contact,
            'bio' => $request->bio,
            'location' => $request->location,
            'position' => $request->position,
            'company' => $request->company,
            'git_link' => $request->git,
            'salary' => $request->salary,
            'linkedin_link' => $request->Linkedin,

        ]);

         if($request->hasFile('avatar')){
          $avatar = $request->file('avatar');
            $filename = Auth::user()->id. '.'. $avatar->getClientOriginalExtension();
            
            \Image::make($avatar)->resize(250 ,250)->save('uploads/avatars/'.$filename);
            
            Auth::user()->profile->update([

                'avatar' => $filename,
            ]);
        }

            Session::flash('success','Profile updated');
        

        return redirect()->back();
    }
}
