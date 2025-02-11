<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function manageUsers() {
        $users = User::all();
        return view('admin.manage-users', compact('users'));
    }

    public function updateRole(Request $request, User $user) {
        $request->validate([
            'role' => 'required|in:admin,manager,user,inactive',
        ]);
    
        $user->update(['role' => $request->role]);
    
        return redirect()->route('admin.users')->with('success', 'User role updated successfully.');
    }    
}
