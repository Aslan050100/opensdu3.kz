<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function suggest(){
		return $this->belongsTo('App\Suggest');
	}
}
