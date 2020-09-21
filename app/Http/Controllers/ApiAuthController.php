<?php
/**
 * Created by PhpStorm.
 * User: Ada
 * Date: 9/21/2020
 * Time: 9:00 PM
 */


namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Class ApiAuthController
 * @package App\Http\Controllers
 * @author Adaa Mgbede <adaamgbede@gmail.com>
 */
class ApiAuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @author Adaa Mgbede <adaamgbede@gmail.com>
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }
        $apiToken = $this->generateApiToken();
        $user = DB::table('users')->insert([
            'email' => $request->input('email'),
            'full_name' => $request->input('full_name'),
            'password' => Hash::make($request->input('password')),
            'api_token' => $apiToken,
            'created_at' => Carbon::now()
        ]);
        if (!$user) {
            return response()->json(['status' => 'failed'], 500);
        }
        return response()->json(['status' => 'success', 'token' => $apiToken], 200);
    }

    /**
     * Authenticate the user. If the user is enter a valid credential, a success response and API token
     * is sent to the service making the API call. If it is not a valid user, it returns a failed response
     * with a status code of 401
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @author Adaa Mgbede <adaamgbede@gmail.com>
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
            $apiToken = $this->generateApiToken();
            $user->api_token = $apiToken;
            $user->save();
            return response()->json(['status' => 'success', 'api_token' => $apiToken], 20);
        }
        return response()->json(['status' => 'failed'],401);
    }
}