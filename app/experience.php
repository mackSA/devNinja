<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class experience extends Model
{
    protected $fillable =['start','end','company','position','user_id','role',];



    public function user (){

    	return $this->belongsTo('App\User');
    }

}
