<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggest;
use Auth;
use DB;
class AdminController extends Controller
{
    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
    function getIndex(){
    	 $suggests = Suggest::orderBy('like','desc')->get();
    	
    	return view('admin.editPost',['suggests'=>$suggests]);
    }
    function delete($id){
        DB::table('suggest')->where('id',$id)->delete();
        return redirect()->back()->withErrors('Successfully deleted!');
    }

    function solve($id){
        DB::table('suggest')->where('id',$id)->update(['solve'=>'solved']);
        return redirect()->back()->withErrors('Successfully solved!');
    }
    function partialSolve($id){
        DB::table('suggest')->where('id',$id)->update(['solve'=>'partial solved']);
        return redirect()->back()->withErrors('Successfully solved!');
    }
    function post($id){
        DB::table('suggest')->where('id',$id)->update(['check'=>'1']);
        return redirect()->back()->withErrors('Successfully solved!');
    }
}
