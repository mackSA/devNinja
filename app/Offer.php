<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
     protected $fillable =['user_id_to','position','company','message','user_id_from','salary'];
}
