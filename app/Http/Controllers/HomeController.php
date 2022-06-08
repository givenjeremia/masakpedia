<?php

namespace App\Http\Controllers;

use App\Resep;
use App\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reseps = Resep::all();
        $artikels = Artikel::all(); 
        $leaderbord = Resep::orderBy('sukai', 'DESC')->take(3)->get();
        return view('frontend.index',compact('reseps','artikels','leaderbord'));
    }
}
