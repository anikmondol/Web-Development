<?php

session_start();

class Database
{

    private $server_name;
    private $user_name;
    private $password;
    private $dbname;

    protected function connect()
    {
        $this->server_name = "localhost";
        $this->user_name = "root";
        $this->password = "";
        $this->dbname = "phptutorial";

        $conn = new mysqli($this->server_name, $this->user_name, $this->password, $this->dbname);

        return $conn;
    }
}


## class to perform to sql queries

class Query extends Database
{


    // function to get all data
    public function getDate($table, $fields)
    {
        $sql = "SELECT $fields FROM $table";
        $result = $this->connect()->query($sql);
        return $result;
    }



    // function to insert date
    public function insertDate($table, $param)
    {

        $fields = array();
        $values = array();

        foreach ($param as $key => $value) {
            $fields[] = $key;
            $values[] = $value;
        }

        $fields = implode(",", $fields);
        $values = implode("','", $values);
        $values = "'" . $values . "'";

        $sql = "INSERT INTO $table ($fields) VALUES ($values)";

        $result = $this->connect()->query($sql);
        return $result;
    }

    // function to delete data
    public function deleteDate($table, $fields, $id)
    {
        $sql = "DELETE FROM $table WHERE $fields = $id";
        $result = $this->connect()->query($sql);
        return $result;
    }


    // function to get all data
    public function getDateById($table, $fields, $where_filed, $id)
    {
        $sql = "SELECT $fields FROM $table WHERE $where_filed = $id";

        $result = $this->connect()->query($sql);
        return $result;
    }

    // function to update date
    public function UpdateDate($table, $param, $where_filed, $id)
    {

        $sql = "UPDATE $table SET ";

        $length = count($param);
        $i = 1;

        foreach ($param as $key => $value) {
            if ($i == $length) {
                $sql .= " $key='$value'";
            } else {
                $sql .= " $key='$value' , ";
            }

            $i++;
        }

        $sql .= " where $where_filed = $id";

        $result = $this->connect()->query($sql);
        return $result;
    }
}
