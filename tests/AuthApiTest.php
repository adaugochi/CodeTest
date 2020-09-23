<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AuthApiTest extends TestCase
{
    use \League\OAuth2\Server\Entities\Traits\RefreshTokenTrait;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_create_user()
    {
        $postData = [
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "abc@example.com",
            "password" => "111111"
        ];
        $this->json('POST', route('api.register'), $postData)->assertResponseStatus(200);
    }

    public function test_can_login_user()
    {
        $postData = [
            "email" => "abc@example.com",
            "password" => "111111"
        ];
        $this->json('POST', route('api.login'), $postData)->assertResponseStatus(200);
    }
}
