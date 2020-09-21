<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function generateApiToken()
    {
        return base64_encode(Str::random(64));
    }


}
