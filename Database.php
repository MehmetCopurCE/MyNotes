<?php

class Database
{
    public $dbConnection;

    public function __construct() //Function that runs when the class is instantiated
    {
        // MySql Connection
        $dsn = "mysql:host=localhost;dbname=PhpDemo"; // database source name
        $this->dbConnection = new PDO($dsn, "root", "MCopur123"); //php data objects
    }

    public function query($query){
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement;
    }

}