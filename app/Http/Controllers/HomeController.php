<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
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
        if (Gate::denies('home_access')){
            return view('home');
        }
        else{
            return redirect()->route('login');
        }

    }

    public function success(){
        return view('web.success');
    }
}
