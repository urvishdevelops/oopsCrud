<?php
include 'dbConfig.php';

class crud extends dbConfig
{
public $name = "yyeyey";
    public function __construct()
    {
        parent::__construct();
    }
    public function getData($query)
    {
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = [];

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }


        return $rows;
    }


    public function execute($query)
    {
        // echo '<pre>';
        // print_r($query);
        // die;
        $result = $this->connection->query($query);

        if ($result == False) {
            return False;
        } else {
            return True;
        }
    }

    public function delete($table, $id)
    {
        $query = "DELETE FROM $table WHERE id=$id";

        $result = $this->connection->query($query);


        if ($result == False) {
            echo "Cannot delete the $id in the given $table";
            return False;
        } else {
            return True;
        }
    }


    public function escape_string($value)
    {
        return $this->connection->real_escape_string($value);
    }
}



?>