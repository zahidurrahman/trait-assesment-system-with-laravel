<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assesment extends Model
{
    protected $table = 'assesment';
    protected $fillable = [
        'title',
    ];
}
