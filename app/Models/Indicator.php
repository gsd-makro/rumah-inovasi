<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{

    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
