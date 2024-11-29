<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Menu extends Model
{
	protected $guarded = [];

	public function children()
	{
		return $this->hasMany(Menu::class, 'parent_id')->with('children');
	}

	protected static function booted()
	{
		static::saved(function () {
			Cache::forget('menus');
		});

		static::deleted(function () {
			Cache::forget('menus');
		});
	}


	public function document()
	{
		return $this->hasMany(Document::class);
	}
}
