<?php

class User {

    private $conn;
    private $table_name = "user";

    public $username_db;
    public $email;
    public $role;
    public $pass;


    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT 
                    *
                 FROM
                    ". $this->table_name ."
                 ";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function create($username, $email, $pass, $role) {
        $query = "INSERT INTO
                " .$this->table_name . " (username,email,pass,role)
                VALUES ('$username','$email','$pass','$role')";

        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function search($where, $parameter) {
        $query = "SELECT 
                    *
                 FROM
                    ". $this->table_name ."
                 WHERE 
                    ". $where . "='". $parameter ."'  
                 ";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    function update($pass, $username){
        $query="UPDATE user SET pass='$pass' where username='$username'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

}
