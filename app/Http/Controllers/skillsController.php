<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skills;
use Auth;
use Session;

class skillsController extends Controller
{
    //  public function index()
    // {
    // 	$articles = Article::all();
    //     return view('skills',compact('articles'));
    // }

   public function edit()

    {
    	
    	$tag = Skills::where('user_id',Auth::user()->id)->pluck('skills')->Toarray();
 		
 		
        $tags = implode(',', $tag);
       //dd($tags);
        

    	return view('profiles.skills.edit')->with('skills',$tags);

    }

    public function update(Request $request)
    {
    		
    		$tags = $request->tags;
    		$id = Auth::user()->id;
    		$tags = implode(',', $tags);
           
    			//dd($tags);
    	Skills::where('user_id', $id) ->update(['skills' => $tags]);
           

        

      
    	

    	 Session::flash('success','Skills added successfully.');
    	 return redirect()->back();

       
    }
}
