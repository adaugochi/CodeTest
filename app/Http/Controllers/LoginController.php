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
 * Class LoginController
 * @package App\Http\Controllers
 * @author Adaa Mgbede <adaamgbede@gmail.com>
 */
class LoginController extends Controller
{
    /**
     *
     * If the user credential are valid, a success response and API token is sent to the service making the API call.
     * If it is not a valid user, it returns a failed response with a status code of 401
     *
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     *
     * @response {
     *  "status": "success",
     *  "access_token": "eyJ0eXAiOiJKV1Qi..."
     * }
     *
     * @response  401 {
     *  "status": "failed",
     *  "message": "Incorrect login credentials"
     * }
     *
     * @response  500 {
     *  "status": "failed",
     *  "message": "This account does not exist"
     * }
     *
     * @bodyParam  email email required The email of the user. Example: abc@example.com
     * @bodyParam  password required The password of the user. Example: 111111
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return response()->json(
                ['status' => 'failed', 'message' => 'This user does not exist'], 500
            );
        }
        if(Hash::check($request->input('password'), $user->password)){
            $token = $user->createToken('Lumen Password Grant Client')->accessToken;
            return response()->json(['status' => 'success', 'access_token' => $token], 200);
        }
        return response()->json(
            ['status' => 'failed', 'message' => 'Incorrect login credential'],401
        );
    }
}
