<?php

use Core\Session;
use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    if ((new Authenticator())->attempt($email, $password)) {
        redirect('/');
    }

    $form->addError('email', 'Email or password is incorrect.');
}

Session::flash('errors', $form->getErrors());
Session::flash('old', [
    'email' => $email
]);

redirect('/login');
