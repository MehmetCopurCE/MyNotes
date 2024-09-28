<?php

class Database
{
    public $dbConnection;
    public $statement;
    public function __construct($config) //Function that runs when the class is instantiated
    {

        // MySql Connection
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->dbConnection = new PDO($dsn, $config['user'], $config['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]); //php data objects
    }

    public function query($query, $params = []){
        $this->statement = $this->dbConnection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function findOrAbort(){
        $result = $this->statement->fetch();
        if(! $result){
            abort(404);
        }
        return $result;
    }

    public function fetch(){
        return $this->statement->fetch();
    }

    public function fetchAll(){
        return $this->statement->fetchAll();
    }

}