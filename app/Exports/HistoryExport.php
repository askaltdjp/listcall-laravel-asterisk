<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Excel; 
use App\Exports\Sheets\History;

class HistoryExport implements WithMultipleSheets
{

    use Exportable;

    public function sheets(): array
    {

        /*
        * Create begin of the sheet
        */
        $sheets = [];
 
        /*
        * Set the tabs with right information
        */
        $sheets[] = new History();
     
        /*
        * Return Sheet for download
        */
        return $sheets;

    }

}
