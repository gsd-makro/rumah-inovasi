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
        $menus = Menu::whereNull('parent_id')->with('children')->get();
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
                'url' => 'required|string',
                'order' => 'required|integer',
                'is_active' => 'required|boolean',
                'parent_id' => 'nullable|exists:menus,id'
            ]);
            $validated['slug'] = Str::slug($validated['name']);
            Menu::create($validated);
            return redirect()->route('menus.index')->with('success', 'Menu created successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to create menu');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::with('children')->find($id);
        return view('dashboard.menus.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::find($id);
        return view('dashboard.menus.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'url' => 'required|string',
                'order' => 'required|integer',
                'is_active' => 'required|boolean',
                'parent_id' => 'nullable|exists:menus,id'
            ]);
            $validated['slug'] = Str::slug($validated['name']);
            Menu::find($id)->update($validated);
            return redirect()->route('menus.index')->with('success', 'Menu updated successfully');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to update menu');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
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
