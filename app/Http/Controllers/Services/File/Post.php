<?php

namespace App\Http\Controllers\Services\File; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Models\HstFile;
use App\Imports\ListImport;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;

class Post extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public static function index($request) 
    {

        /**
         * Import csv
         */ 
        Excel::import(new ListImport, Input::file('fileupload'));

        /**
         * Return
         */  
        return Redirect::back()->with('success', 'Import has been done');             

    }

}
