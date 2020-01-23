<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    //
    function report($id){
    	$suggest = DB::table('suggest')->where('id',$id)->first();
    	DB::table('suggest')->where('id',$id)->update(['report' => $suggest->report + 1]);
    	return redirect()->to('/');
    }
}
