<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreasEnfoque;

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
        $user = auth()->user();
        $data=AreasEnfoque::all(['id','nombre']);
        return view('home')->with(["role" => $user->role,"data"=>$data]);
    }
}
