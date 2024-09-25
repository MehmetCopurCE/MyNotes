<?php

class Database
{
    public $dbConnection;

    public function __construct($config) //Function that runs when the class is instantiated
    {

        // MySql Connection
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->dbConnection = new PDO($dsn, $config['user'], $config['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]); //php data objects
    }

    public function query($query){
        $statement = $this->dbConnection->prepare($query);
        $statement->execute();
        return $statement;
    }

}