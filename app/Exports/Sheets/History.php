<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\HstList;

class History implements FromView, WithTitle
{

    /**
     * view
     *
     * @return View
     */
    public function view(): View
    {       
        /**
         * Get list data
         */
        $getList = HstList::where(['succes' => '1'])->get();
        
        /*
        * Return the view
        */
        return view('exports.list', compact('getList'));

    }

    /**
     * title
     *
     * @return string
     */
    public function title(): string
    {

        /*
        * Return Tab Title
        */
        return 'List';
        
    }

}
