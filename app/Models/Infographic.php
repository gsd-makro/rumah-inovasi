<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Infographic extends Model
{
    protected $guarded = [];

    public function indicators()
    {
        return $this->belongsToMany(Indicator::class, 'pivot_infographics_indicators');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
