<?php
/**
 * Created by PhpStorm.
 * User: Ada
 * Date: 9/21/2020
 * Time: 9:02 PM
 */

namespace App\Http\Controllers;

use App\User;

/**
 * @group  User Authentication
 *
 * APIs for managing users
 * @authenticated
 *
 * Class UserController
 * @package App\Http\Controllers
 * @author Adaa Mgbede <adaamgbede@gmail.com>
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('client');
    }

    /**
     * Fetch authorize user data
     *
     * @urlParam  id required The ID of the user.
     * @responseFile responses/user.get.json
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author Adaa Mgbede <adaa@cottacush.com>
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['status' => 'success', 'result' => $user]);
    }
}