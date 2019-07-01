<?php

namespace App\Http\Controllers; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Services\File\Get;
use App\Http\Controllers\Services\File\Post;
use App\Http\Controllers\Services\File\Put; 
use App\Models\HstList;
use Auth; 
use Redirect;

class FileController extends Controller
{

    /**
     * get
     *
     * @return void
     */
    public function get()
    {
        
        /*
        * Get function
        */
        $next = get::index(); 

        /*
        * Return function
        */
        return $next;  
 
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {

        /*
        * Return function
        */
        return view('create'); 

    }

    /**
     * post
     *
     * @param  mixed $request
     *
     * @return void
     */
    public function post(Request $request)
    {

        /* 
        * validate fields
        */ 
        $this->validate($request, [
            'fileupload'           =>    'required|mimes:csv,txt', 
        ]);

        /*
        * Get function
        */
        $next = Post::index($request); 

        /*
        * Return function
        */
        return $next; 

    }

    /**
     * update
     *
     * @param  mixed $listId
     *
     * @return void
     */
    public function update($listId)
    {

        /*
        * Get List
        */ 
        $getItem = HstList::where(['id' => $listId])->firstOrFail();    

        /*
        * Return function
        */
        return view('update', compact('getItem')); 

    }

    /**
     * put
     *
     * @param  mixed $request
     *
     * @return void
     */
    public function put(Request $request)
    {

        /* 
        * validate fields
        */ 
        $this->validate($request, [
            'customer'       =>    'required',
            'phone'          =>    'required',
        ]);

        /*
        * Get function
        */ 
        $next = Put::index($request); 

        /*
        * Return function
        */
        return $next; 

    }
    
}
