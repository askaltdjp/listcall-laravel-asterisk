<?php

namespace App\Http\Controllers\Services\File; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\HistoryExport;  
use Redirect;
use Excel;

class get extends Controller
{

    /**
     * index
     *
     * @return void
     */
    public static function index()
    { 
        
        /*
        * Get the sheet and return it to the user
        */
        return Excel::download(new HistoryExport, 'history.xlsx'); 	        
                
    }

}
