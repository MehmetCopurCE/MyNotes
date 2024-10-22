<?php

use Core\Authenticator;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
$db = \Core\App::resolve(\Core\Database::class);

$form = new LoginForm();
if ($form->validate($email, $password)) {
    if ((new Authenticator())->attempt($email, $password)) {
        redirect('/');
    }

    $form->addError('email', 'Email or password is incorrect.');
}

return view('/registration/create.view.php', [
    'errors' => $form->getErrors()
]);

