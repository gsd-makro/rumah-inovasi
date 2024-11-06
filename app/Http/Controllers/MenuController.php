<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$menus = Menu::whereNull('parent_id')->with(['children' => function($query) {
			$query->orderBy('order')->with(['children' => function($query) {
				$query->orderBy('order');
			}]);
		}])->orderBy('order')->get();
		return view('dashboard.menus.index', ['menus' => $menus]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('dashboard.menus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		try {
			$validated = $request->validate([
				'name' => 'required|string',
				'url' => 'nullable|string',
				'title' => 'required|string',
				'parent_id' => 'nullable|exists:menus,id',
			]);
			
			$validated['slug'] = Str::slug($validated['name']);
			if ($validated['parent_id'] !== null) {
				$parent = Menu::find($validated['parent_id']);
				$validated['order'] = $parent->children->count() + 1;
			} else {
				$validated['order'] = Menu::whereNull('parent_id')->count() + 1;
			}
			$validated['is_active'] = true;
			Menu::create($validated);
			return redirect()->route('menus.index')->with('success', 'Menu created successfully');
		} catch (Exception $e) {
			return back()->with('error', 'Failed to create menu');
		}
	}

	public function update(Request $request, string $id)
	{
		try {
			$validated = $request->validate([
				'name' => 'required|string',
				'url' => 'nullable|string',
				'order' => 'required|integer',
				'is_active' => 'nullable',
				'parent_id' => 'nullable|exists:menus,id'
			]);

			$validated['is_active'] = $request->has('is_active') == 'on' ? true : false;
			$validated['slug'] = Str::slug($validated['name']);
			$menu = Menu::find($id);
			if (!$menu) {
				return back()->with('error', 'Menu not found');
			}
			if ($validated['order'] !== $menu->order) {
				$parentId = $menu->parent_id;

				$menuWithNewOrder = Menu::where('parent_id', $parentId)
						->where('order', $validated['order'])
						->first();

				if ($menuWithNewOrder) {
					$menuWithNewOrder->update(['order' => $menu->order]);
				}
			}
			$menu->update($validated);
			return redirect()->route('menus.index')->with('success', 'Menu updated successfully');
		} catch (Exception $e) {
			return back()->with('error', 'Failed to update menu');
		}
	}

	public function destroy(string $id)
	{
		try {
			$menu = Menu::find($id);

			if ($menu) {
				if ($menu->parent_id === null) {
					$this->deleteChildren($menu);
				}
				$menu->delete();
			}

			return redirect()->route('menus.index')->with('success', 'Menu deleted successfully');
		} catch (Exception $e) {
			return back()->with('error', 'Failed to delete menu');
		}
	}

	private function deleteChildren($menu)
	{
		foreach ($menu->children as $child) {
			$this->deleteChildren($child);
			$child->delete();
		}
	}
}
