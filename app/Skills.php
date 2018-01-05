<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use \Conner\Tagging\Taggable;

    protected $fillable = [ 'user_id', 'skills' => 'array'];


    public function user (){

    	return $this->belongsTo('App\User');
    }

}
