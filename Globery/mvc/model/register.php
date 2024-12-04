<?php

class Register
{
    private $conn;

    function __construct()
    {
        $this->conn = new DB;
    }

    //insert 
    function register($data)
    {
        $sql = "insert into customer(name, username, password, email, tel) values(?,?,?,?,?)";
        $params = [$data['name'], $data['username'], $data['password'], $data['email'], $data['tel']];
        return $this->conn->query($sql, $params);
    }

}