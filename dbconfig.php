<?php

class dbConfig
{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "angellist";


    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)) {
            $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);


            if (!$this->connection) {
                echo "cannot connected to database server";
                exit;
            }
        }

        return $this->connection;
    }


}





?>