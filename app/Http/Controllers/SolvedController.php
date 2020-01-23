<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggest;
class SolvedController extends Controller
{
    //
    function index(){
    	 $suggests = Suggest::where('check','1')->orderBy('like','desc')->where('solve','solved')->paginate(5);
         
    	return view('glav.solved',['suggests'=>$suggests]);
    }
}
