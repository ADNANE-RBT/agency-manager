<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
class AuthController extends Controller
{

    public function me(Request $request)
    {
        return $request->user();
    }

    function login(Request $request){
        $validator = $request->validate([
            'email'=>['required','string','email'],
            'password'=>['required','string'],
        ]);

        $user = Agency::where('email',$validator['email'])->first();
        $type = "agency";
        if(!$user || Hash::check($validator['email'], $user->password) ){

            $user = Staff::where('email',$validator['email'])->first();
            $type = "staff";
            if(!$user || Hash::check($validator['email'], $user->password) ){
                   return response('Bad Credits', 422);
            }
        }
        $token =$user->createToken('blablabla',[''])->plainTextToken;
        $response = [
            'user'=>$user,
            'token'=>$token,
            'role'=>$type,
        ];
        return response($response, 200);
    }


    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = Agency::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

}
