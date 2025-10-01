<?php
class Product
{
    protected $conn;

    public function __construct($pdo)
    {
        $this->conn = $pdo;
    }
    public function fetchAllProducts()
    {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function read($product_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE product_id=?");
        $stmt->execute([$product_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
