<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    // Table name
    protected $table = 'respondent';
    // Primary Key
    public $primarykey = 'id';
    //Timestamps
    public $timestamps = false;
}
