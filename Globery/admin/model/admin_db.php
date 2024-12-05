<!--Admin:  ./mvc/model/products.php -->
<?php

class Admin
{
    private $conn;

    function __construct()
    {
        $this->conn = new DB;
    }


    function checkDate($start_date,$end_date)
    {
        $start_date = new DateTime( $start_date );
        $end_date = new DateTime( $end_date );

        // Lấy thời gian hiện tại
        $current_date = new DateTime();

        if ($current_date < $start_date) {
            return "coming soon";
        } elseif ($current_date >= $start_date && $current_date <= $end_date) {
            return "active";
        } else {
            return "finished";
        }
    }
    function formatDate($datetime)
    {
        $date = new DateTime($datetime);
        $day = $date->format('d');
        $month = $date->format('m');
        $year = $date->format('Y');
        return $day . '/' . $month . '/' . $year;
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

    function selectAll($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->conn->getAll($sql);
    }

    function sortedByTime(){
        $sql = "SELECT *, customer.name, customer.id_customer FROM booking 
        join customer on booking.id_customer = customer.id_customer
        ORDER BY 
    CASE 
        WHEN start_date > CURDATE() THEN 0 
        WHEN start_date <= CURDATE() AND end_date >= CURDATE() THEN 1  
        ELSE 2  
    END,
    start_date DESC";
        return $this->conn->getAll($sql);
        
    }
}
