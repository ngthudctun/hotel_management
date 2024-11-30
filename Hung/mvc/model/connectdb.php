<!-- //connect database 
    ./mvc/model/connectdb.php
-->
<?php
class DB
{
    private $dsn = 'mysql:host=localhost;dbname=englishvocabularydb;charset=UTF8';
    private $username = 'root';
    private $password = '';
    private $conn;

    function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //    echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }

    function query($sql, $params = [])
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    function getAll($sql)
    {
        $stmt = $this->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getOne($sql)
    {
        $stmt = $this->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

$conn = new DB();
