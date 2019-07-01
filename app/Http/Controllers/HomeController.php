<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HstList;

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

        /*
        * Get List
        */ 
        $getList = HStList::paginate(10);    

        /*
        * Get List
        */ 
        $getCall = HstList::where(['callagain' => '1'])->paginate(10);    

        /*
        * return view
        */ 
        return view('home', compact('getList', 'getCall'));

    }
}
