<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CPP_Mark_Adt extends Model
{
    // Table name
    protected $table = 'cpp_mark_adt';
    // Primary Key
    public $primarykey = 'id';
    //Timestamps
    public $timestamps = false;

    public function owner()
    {
        return $this->belongsTo(Respondent::class, 'respondent_id');
    }
}
