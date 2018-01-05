<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable =['contact','bio','user_id','linkedin_link','git_link','avatar','position','company','location','salary'];



    public function user (){

    	return $this->belongsTo('App\User');
    }



}
