<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggest;
use App\Hashtag;
use DB;
class EditController extends Controller
{
    //
    function index($id){
    	 $suggest = Suggest::where('id',$id)->first();
    	return view('admin.edit',['suggest'=>$suggest]);
    }

    function edit(Request $request,$id){
    	 $suggest = Suggest::where('id',$id)->first();
    	$title = $request->input('title');
    	$text = $request->input('text');
    	$hashtag = $request->input('hashtag');
    	$hashtag_id = Hashtag::where('hash_title',$hashtag)->first();
    	DB::update('update suggest set title=?, text=?, hashtag_id=? where id = ?',[$title,$text,$hashtag_id->id,$id]);
    	
    	return redirect()->route('admin.index',['suggest'=>$suggest]);
    }
}
