<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
    }
}
