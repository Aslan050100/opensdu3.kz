<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class LikeController extends Controller
{
    //
    
   

    function addLike($id){
    	
    	$suggest = DB::table('suggest')->where('id',$id)->first();
    	DB::table('suggest')->where('id',$id)->update(['like' => $suggest->like + 1]);
    	return redirect()->to('/');
    }
}
