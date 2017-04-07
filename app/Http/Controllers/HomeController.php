<?php

namespace App\Http\Controllers;

use App\User;
use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Resource;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function majorModules($id){
        //$id =  $request->get('id');
        echo $id;
        //$majormodule = MajorModule::where('major_id', '=', "$id")->paginate($perPage);
        $modules = Major::where('id', '=', "$id")->paginate(10);
        foreach ($modules as $module){
            echo $module->modules;
        }
    }
}
