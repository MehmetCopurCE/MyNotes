<?php

use Core\Validator;

//Get email and password
$email = $_POST['email'];
$password = $_POST['password'];

//Validation for form inputs
$errors = [];

if(! Validator::email($email)){
    $errors['email'] = 'Please provide a valid email.';
}

if(! Validator::string($password, 1, 7)){
    $errors['password'] = 'Password should be min 1 character and max 7 character.';
}

if (!empty($errors)){
    view('/registration/create.view.php', [
        'errors' => $errors
    ]);

    return;
}

$db = \Core\App::resolve(\Core\Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->fetch();

//check user from db
if ($user){

    $_SESSION['user'] = $user;
    //if user exist, inform user and direct to dash as login
    header('Location: /');

    exit();
}else{
    // if user does not exist, create user and direct to dash as login
    $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $_SESSION['user'] = $db->query('SELECT * FROM users WHERE email = :email', [
        'email' => $email
    ])->fetch();

    header('Location: /');

    exit();
}