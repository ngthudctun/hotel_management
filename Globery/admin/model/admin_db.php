<!--Admin:  ./mvc/model/products.php -->
<?php

class Admin
{
    private $conn;

    function __construct()
    {
        $this->conn = new DB;
    }

    function getHotel()
    {
        $sql = 'select * from hotel';
        return $this->conn->getAll($sql);
    }

    function count($name)
    {
        $sql = "select count(*) as cnt from $name";
        return $this->conn->getAll($sql);
    }
    function getCustomer()
    {
        $sql = 'select * from customer';
        return $this->conn->getAll($sql);
    }
    function search($table, $name)
    {
        $sql = "SELECT * FROM $table WHERE name LIKE '%$name%'";
        return $this->conn->getAll($sql);
    }




}
