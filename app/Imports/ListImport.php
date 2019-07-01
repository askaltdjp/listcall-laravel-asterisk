<?php

namespace App\Imports;

use App\Models\HstList;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon; 

class ListImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {

        /**
         * Check
         */
        $check = HstList::where(['phonenumber' => $row[1]])->count();

        /**
         * If not exists
         */
        if ($check == 0) {

            /**
             * Insert
             */
            $insert = HstList::insert(['name' => $row[0], 'phonenumber' => $row[1], 'created_at' => Carbon::now()]);

        }

    }
}