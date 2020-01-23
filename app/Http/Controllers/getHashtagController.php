<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Suggest;
use App\Hashtag;

class getHashtagController extends Controller
{
    //
    function getIndex($hashtag_id){
    	 $suggests = Suggest::where('hashtag_id',$hashtag_id)->orderBy('like','desc')->paginate(5);
    	 $suggest_hashtag = Hashtag::where('id',$hashtag_id)->first('hash_title');
    	 
    	 return view('hashtag.getHash',['suggests'=>$suggests,'suggest_hashtag'=>$suggest_hashtag]);
    	

    }
}
