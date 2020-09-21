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
 * Class UserController
 * @package App\Http\Controllers
 * @author Adaa Mgbede <adaa@cottacush.com>
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['status' => 'success', 'result' => $user]);
    }
}