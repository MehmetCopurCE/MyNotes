<?php

require "functions.php";

//require "router.php";

// MySql Connection
$dsn = "mysql:host=localhost;dbname=PhpDemo"; // database source name
$pdo = new PDO($dsn, "root", "MCopur123"); //php data objects

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}