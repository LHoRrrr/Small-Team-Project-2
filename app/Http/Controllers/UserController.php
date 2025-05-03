<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::all(); // Fetch all users from the database
        return response()->json([
            'status' => 'success',
            'data' => $users
        ]);
    }
    public function store(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return response()->json(['message' => 'Email already taken'], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => $request->isAdmin ?? 0,  // Default to 0 if not provided
        ]);
    
        return response()->json($user, 201);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Optionally, you can add additional checks to ensure that only the user who created the account can update it
        if (!Auth::user()->isAdmin) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Optionally, you can add additional checks to ensure that only the user who created the account can delete it
        if (!Auth::user()->isAdmin){
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }

}
