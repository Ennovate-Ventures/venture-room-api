<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
           return response()->json('The provided credentials are incorrect.', 400);
        }
     
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('1234')->plainTextToken
        ]);
    }

    public function logout($id){
        $u = User::find($id);
        $u->tokens()->delete();
        return response()->json('Logout complete', 200);
    }
}
