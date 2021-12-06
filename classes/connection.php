<?php

class Database
{
    // Connection variables
    private string $host;
    private string $dbName = "commercedb";
    private string $username;
    private string $password;

    private PDO $db;

    private bool $error;
    private string $msgerror;

    public function __construct(string $InHost, string $InUser, string $InPassword)
    {
        $this->host = $InHost; //Ejemplo "mysql:host=localhost;dbname=$dbname"; o "mysql:host=localhost"
        $this->username = $InUser;
        $this->password = $InPassword;
        $this->error = false;
        $this->msgerror = "";
        $this->Open();
    }

    private function Open()
    {
        try {
            $this->db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
        } catch (PDOException $e) {
            $this->error = true;
            echo $this->error;
            $this->msgerror = $e->getMessage();
            echo  $e->getMessage();
        }
    }


    public function getAllFromTable($table)
    {
        $query = "SELECT * FROM " . $table;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt; //->fetchAll();
    }

    public function getRowfromValues($data, $table)
    {

        $query = "SELECT * FROM customer where 1 ";
        $bindArray = array();
        foreach ($data as $key => $value) {
            $query .= " and $key = ? ";
            array_push($bindArray,$value);
        }
        $stmt = $this->db->prepare($query);
        $stmt->execute($bindArray);
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data, $table)
    {
        try {
            $query = "INSERT INTO " .  $table;
            $fields = " (";
            $values = " (";
            foreach ($data as $key => $value) {
                $fields .= " $key,";
                $values .= " :$key,";
            }
            $fields = substr($fields, 0, -1) . ")";
            $values = substr($values, 0, -1) . ")";
            $query .= "$fields VALUES $values";
            $stmt = $this->db->prepare($query);
            $stmt->execute($data);
            return $stmt;
        } catch (PDOException $e) {
            return  $stmt;
        }
    }
}
