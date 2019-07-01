<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HstList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hst_list';
    
    /**
     * Set Timestamps
     */
    public $timestamps = true;

    /**
     * Fillable items
     */
    protected $fillable = [
        'name',
        'phonenumber',
        'callagain',
        'hangup',
        'dontcall',
        'succes',
        'optional',
    ]; 
}
