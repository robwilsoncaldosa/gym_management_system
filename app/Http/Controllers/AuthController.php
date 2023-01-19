<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function login(Request $request){

    //     $validatedData = $request->validate([
    //         'email'=>'required|email',
    //         'password'=>'required|min:8'
    //     ]);

    //     $user =User::where('email',$validatedData['email'])->first();

    //     if($user && Hash::check($validatedData['password'],$user->password)){
    //         $token =$user->createToken('api',['create']);
    //     return[
    //         'token'=>$token->plainTextToken
    //     ];
    //     }
    //     else {
    //         return[
    //             'error'=>'Invalid Credentials'
    //         ];
    //     }


    // }


    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('api')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
        }
        return [
            'message' => 'Logged out'
        ];
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Check email
        $user = User::where('email', $fields['email'])->first();

        //Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid Credentials'
            ], 401);
        }
        $token = $user->createToken('api')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
}
