<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Navbar extends Component
{
	/**
	 * Create a new component instance.
	 */

	public $menus;

	public function __construct()
	{
		$this->menus = Cache::remember('menus', 60, function () {
			return Menu::where('parent_id', null)
				->where('is_active', true)
				->with(['children' => function ($query) {
					$query->where('is_active', true)->orderBy('order');
				}])
				->orderBy('order')
				->get();
		});
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.navbar');
	}
}
