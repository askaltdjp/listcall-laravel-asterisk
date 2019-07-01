<?php

namespace App\Http\Controllers\Services\File; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\HstList;
use Redirect;

class Put extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public static function index($request)
    {
        
       /*
        * Update
        */ 
        $update = HstList::where(['id' => Input::get('listid')])->update(['name' => Input::get('customer'), 'phonenumber' => Input::get('phone'), 'callagain' => Input::get('callagain'), 'hangup' => Input::get('hangup'), 'dontcall' => Input::get('dontcall'), 'succes' => Input::get('succes'), 'optional' => Input::get('text')]);  
 
        /**
         * Return
         */  
        return Redirect::back()->with('success', 'The list item has been updated');    
                
    }

}
