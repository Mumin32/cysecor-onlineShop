<?php
class Order extends Cart
{
    protected $conn;

    public function __construct($pdo)
    {
        $this->conn = $pdo;
    }
    public function create()
    {
        var_dump($this->get_cart_items());
    }
}
