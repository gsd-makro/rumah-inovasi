<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|string|in:admin,superadmin',
            ]);
            User::create($validated);
            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to create user');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('dashboard.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('dashboard.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'required|string|min:8',
                'role' => 'required|string|in:admin,superadmin',
            ]);
            $user = User::find($id);
            $user->update($validated);
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to update user');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::destroy($id);
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to delete user');
        }
    }
}
