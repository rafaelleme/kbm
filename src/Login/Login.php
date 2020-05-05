<?php

namespace App\Login;

use App\User\User;
use Exception;

class Login
{
    private ?string $email;

    private ?string $password;

    public function __construct(?string $email, ?string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function validate(): void
    {
        if (empty($this->email)) {
            throw new Exception('E-mail is required to login.', 401);
        }

        if (empty($this->password)) {
            throw new Exception('Password is required to login.', 401);
        }
    }

    public function execute(): void
    {
        $user = User::findByEmail($this->email);

        if (password_verify($this->password, $user->password) === false) {
            throw new Exception('E-mail or password is invalid', 401);
        }
    }

    public function generateToken(): string
    {
        $token = [
            'expiration_date' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . '+ 1 day')),
            'email' => $this->email
        ];

        return base64_encode(json_encode($token,true));
    }

    public static function decodeToken(string $token): ?array
    {
        return json_decode(base64_decode($token), true);
    }

    public static function tokenIsValid(string $token): bool
    {
        $data = self::decodeToken($token);

        if (empty($data)) {
            return false;
        }

        if (strtotime($data['expiration_date']) >= strtotime(date('Y-m-d H:i:s'))) {
            return true;
        }

        return false;
    }

    public static function released($token): bool
    {
        $data = str_replace('Basic ', '', $token);

        if (!$data) {
            throw new Exception('Token is missing', 401);
        }

        return self::tokenIsValid($data) ;
    }
}
