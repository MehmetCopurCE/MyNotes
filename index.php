<?php

$header = "Dashboard";

function dd($data) {
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';

    die();
}

require 'views/index.view.php';

