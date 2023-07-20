<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);
 
        if ($validator->fails()) {
            return response()->json('Error',400);
        }

        $user = User::create([
            'username' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => 1
        ]);

        $mailController = new MailController();
        $mailController->welcomeRegisteredUser(null, $user->email);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('1234')->plainTextToken
        ]);
    }

    public function getUser(Request $request){
        $user = User::where('id', $request->user()->id)->first();
        return $user;
    }

    public function logout(Request $request){
        $u =  User::where('id', $request->user()->id)->first();
        $u->tokens()->delete();
        return response()->json('Logout complete', 200);
    }
}
