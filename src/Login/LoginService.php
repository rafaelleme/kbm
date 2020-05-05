<?php

namespace App\Login;

use App\Service;

class LoginService extends Service
{
    public function login(): array
    {
        $email = $_SERVER['PHP_AUTH_USER'];
        $pass = $_SERVER['PHP_AUTH_PW'];

        $login = new Login($email, $pass);

        $login->validate();

        $login->execute();

        $token = $login->generateToken();

        return ['token' => $login->generateToken()];
    }
}
