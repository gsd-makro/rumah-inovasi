<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = [];

    public function indicators()
    {
        return $this->hasMany(Indicator::class);
    }
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
