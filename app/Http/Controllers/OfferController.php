<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;
use Auth;
use Session;

class OfferController extends Controller
{
   public function index($id)
   {
   		return view('offer.message')->with('id',$id);
   }


  public function send(Request $request)
    {

         $offer =  Offer::create([
            'company' => $request->company,
            'salary' => $request->salary,
            'company' => $request->company,
            'position' => $request->position,
            'message' => $request->message,
            'user_id_from' => Auth::user()->id,
            'user_id_to' =>$request->user_id_to, 
        ]);

          Session::flash('success','offer sent');
        

        return redirect()->back();

        // dd($request->user_id_to);

    }


    public function view()
   {

    $offers = Offer::where(['id' => Auth::user()->id,'response'=> null])->orWhereNull('response')->get();
    $res = Offer::where(['id' => Auth::user()->id,])->orWhereNotNull('response')->get();

       return view('offer.view')->with(['offers'=> $offers,'res' => $res]);

      //dd($offers);
   }

   public function respond($res,$id )
   {

        if($res = 'accept')
        {

          $offer=  Offer::where(['user_id_to'=> Auth::user()->id,'id'=> $id])->update([

            'response' => 'accepted'
        ]);

            $message = 'Action';

        }

        if($res = 'reject'){

          $offer =   Offer::where(['user_id_to'=> Auth::user()->id,'id'=> $id])->update([

            'response' => 'rejected'
        ]);

          $message = 'Action';


         }

         if($res = 'delete'){

          $offer = Offer::where(['user_id_from'=> Auth::user()->id,'id'=> $id])->delete();
          

            $message = 'Action';


         }

         
         Session::flash('success',$message);

        return redirect()->back();

          

   }
}
