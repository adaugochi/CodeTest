<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * @group  User Authentication
 *
 * APIs for managing users
 *
 * Class RegisterController
 * @package App\Http\Controllers
 * @author Adaa Mgbede <adaamgbede@gmail.com>
 */
class RegisterController extends Controller
{
    /**
     * User Registration
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     *
     * @response {"status": "success","access_token": "eyJ0eXAiOiJKV1Qi..."}
     * @response  422 {"errors": "failed validation"}
     *
     * @bodyParam  first_name string required The first name of the user. Example: John
     * @bodyParam  last_name string required The last name of the user. Example: Doe
     * @bodyParam  email email required The email of the user. Example: abc@example.com
     * @bodyParam  password required The password of the user. Example: 111111
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
        $user = User::create([
            'email' => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'password' => Hash::make($request->input('password')),
            'last_name' => $request->input('last_name')
        ]);
        $token = $user->createToken('Lumen Password Grant Client')->accessToken;
        return response()->json(['status' => 'success', 'token' => $token], 200);
    }

}