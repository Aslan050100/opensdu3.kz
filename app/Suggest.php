<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    //

	protected $table = 'suggest';
	
	public function hashtag(){
		return $this->belongsTo('App\Hashtag');
	}
	public function comments(){
		return $this->hasMany('App\Comment');
	}

}
