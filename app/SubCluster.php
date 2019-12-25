<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCluster extends Model
{
    // Table name
    protected $table = 'sub_cluster';
    // Primary Key
    public $primarykey = 'id';
    //Timestamps
    public $timestamps = false;

    public function owner()
    {
        return $this->belongsTo(Respondent::class, 'respondent_id');
    }
}
