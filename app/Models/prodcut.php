<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prodcut extends Model
{
    protected $guarded = [];  // to add any column in table wituout write name with filable

    public function section()
    {
        return $this->belongsTo('App\Models\section');
    }
}
