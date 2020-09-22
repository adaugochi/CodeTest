<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Checking the validity of the API token send in the header
         */
        $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
                $apiToken = explode(' ', $request->header('Authorization'));
                $user = User::where('api_token', $apiToken[1])->first();
                if (!empty($user)) {
                    $request->request->add(['userid' => $user->id]);
                }
                return $user;
            }
        });
    }
}
