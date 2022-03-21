<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\{Validator};

class UserController extends BaseController
{
    public function register(Request $request)
    {
        $dataValidated=$request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $dataValidated['password']=Hash::make($request->password);

        $user = User::create($dataValidated);

        $token = $user->createToken('pokeapi')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request){
        dd($request);

        $dataValidated=$request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        $dataValidated['password']=Hash::make($request->password);

        $user = User::create($dataValidated);

        $token = $user->createToken('AppNAME')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
