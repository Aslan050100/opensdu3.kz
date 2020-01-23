<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;


use App\Suggest;
use App\Hashtag;

use Illuminate\Support\Facades\DB;

class GlavController extends Controller
{
    //
    // function getIndex(){
    // 	return view('glav.index');
    // }

    function getPost(Request $request){
        
    	 $suggests = Suggest::where('check','1')->orderBy('like','desc')->paginate(5);
         
        $hashtag_titles = DB::table('hashtag')->get();
    	// $clientIP = $request->getClientIp();
    	// dd($clientIP);
            return view("glav.index",['suggests'=>$suggests,'hashtag_titles' => $hashtag_titles]);

    }

    function addPost(Request $request){
        $title = $request->input('title');
        $text = $request->input('text');
        $hash = $request->input('hash');
        $img = $request->file('img');
       $hashtag = DB::table('hashtag')->where('hash_title', $hash)->value('id');
        if($img != null){
            $img1 = $img->getClientOriginalName();
            $filename = $img1;
            Image::make($img)->resize(300, 300)->save(public_path('assets/img/' . $filename));
            $data=array('title'=>$title,'text'=>$text,'hashtag_id'=>$hashtag,'img'=>$img1);
            DB::table('suggest')->insert($data);
            return redirect()->route('glav.get_post');
        }
        else{
            // $data=array('title'=>$title,'text'=>$text,'hashtag_id'=>$hashtag);
            // DB::table('suggest')->insert($data);
            return redirect()->route('glav.get_post');
        }
        
    }
}
