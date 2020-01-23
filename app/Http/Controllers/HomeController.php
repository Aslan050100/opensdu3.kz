<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggest;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function actOnChirp(Request $request, $id)
    {
        $action = $request->get('action');
       
        switch ($action) {
            case 'Like':
                Suggest::where('id', $id)->increment('like');
                break;
            case 'Unlike':
                Suggest::where('id', $id)->decrement('like');
                break;
        }
        return '';
    }
}
