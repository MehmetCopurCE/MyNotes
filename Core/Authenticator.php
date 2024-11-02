<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $errors = [];
        $db = App::resolve(Database::class);
        $user = $db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $this->login($user);
            return true;
        }
        return false;
    }


    function login($user) {
        $_SESSION['user'] = [
            'id' => $user['user_id'],
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    function logout() {
        Session::destroy();
    }

}