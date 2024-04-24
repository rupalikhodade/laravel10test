<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $error['success']    = false;
            $error['code']    = 400;
            $error['message'] = 'Missing or invalid Parameter';
            $error['errors'] = $validator->errors();
            return response()->json($error); 
        }

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            $error['success'] = false;
            $error['code']    = 400;
            $error['message'] = 'Invalid credentials';
            $error['errors']  = [];
            return response()->json($error);
        }

       
        $user = $request->user();
        
        $data['id']    = $user->id;
        $data['token'] = $user->createToken('paradiso')->accessToken;;
        $data['name']  = $user->name;

        $success['success']    = true;
        $success['code']       = 200;
        $success['message']    = 'Logged in successfully.';
        $success['data']       = $data;
        
        return response()->json($success);
    }
}
