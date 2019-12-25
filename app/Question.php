<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'assesment_id','question_name','cluster','adt','sub_cluster','trait_type','reverse',
    ];
}
