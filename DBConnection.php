<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','posts_and_articles_factory');

class DBConnection
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if($this->connection->connect_error)
        {
            die ("Database Connection Failed");
        }
    }

    public function __get($connection)
    {
        return $this->$connection;
    }
}

?>