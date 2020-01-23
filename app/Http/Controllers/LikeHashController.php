<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class LikeHashController extends Controller
{
    //

    function addLikeHash($id){
    	$suggest = DB::table('suggest')->where('id',$id)->first();
    	DB::table('suggest')->where('id',$id)->update(['like' => $suggest->like + 1]);
    	return redirect()->route('glav.get_hashtag');
    }
}
