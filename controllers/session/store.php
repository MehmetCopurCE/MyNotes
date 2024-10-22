<?php

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
$db = \Core\App::resolve(\Core\Database::class);

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->fetch();


if ($user && password_verify($password, $user['password'])){
    login($user);
    header('Location: /');
    exit();
}else{
    $errors['email'] = 'Email or password is incorrect.';
    view('/registration/create.view.php', [
        'errors' => $errors
    ]);
    return;
}