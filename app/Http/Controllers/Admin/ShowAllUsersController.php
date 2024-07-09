<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ShowAllUsersController extends Controller
{
    public function show() {
        $users = User::orderBy('created_at', 'desc')->get();
        
        return view('users', compact('users'));
    }

     public function destroy(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer'
        ]);

        $userId = $request->input('user_id');
        $user = Songs::find($userId);

        if ($user) {
            $user->delete();
            return redirect()->back()->with('status', 'User Successfully Deleted');
        } else {
            return redirect()->back()->with('error', 'User Not Found');
        }
    }
}
