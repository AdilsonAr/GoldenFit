<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class GraphicGendersController extends Controller
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
        if($user->role!="admin"){
            abort(403);
        }
        $total = DB::table('clientes')->count();
        $masculino = Cliente::where('sexo', 'masculino')->get();
        $male = $masculino->count();

        return view('home')->with('data', ["male" => $male,"female" => $total-$male]);
    }
}
