<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
            'level' => 'required|in:admin,bidan,member'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect('/dashboard/users')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'level' => 'required|in:admin,bidan,member'
        ];

        if ($request->username !== $user->username) {
            $rules['username'] = 'required|min:3|max:255|unique:users';
        }

        if ($request->email !== $user->email) {
            $rules['email'] = 'required|email|unique:users';
        }

        $validated = $request->validate($rules);

        if ($request->filled('password')) {
            $request->validate(['password' => 'min:5|max:255']);
            $validated['password'] = Hash::make($request->password);
        }

        $validated['username'] = $request->username;
        $validated['email'] = $request->email;

        User::where('id', $user->id)->update($validated);

        return redirect('/dashboard/users')->with('success', 'User berhasil diupdate!');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        // Prevent deleting self
        if (auth()->user()->id === $user->id) {
            return redirect('/dashboard/users')->with('error', 'Tidak bisa menghapus akun sendiri!');
        }

        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'User berhasil dihapus!');
    }
}
