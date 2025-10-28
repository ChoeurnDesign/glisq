<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminUserController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => User::with('roles:id,name')
                ->latest('id')->paginate(15)
                ->through(fn($u) => [
                    'id' => $u->id,
                    'name' => $u->name,
                    'email' => $u->email,
                    'roles' => $u->roles->pluck('name'),
                ])
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required','in:admin,user']
        ]);

        $user->syncRoles([$request->role]);
        return back()->with('success','Role updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success','User removed.');
    }
}