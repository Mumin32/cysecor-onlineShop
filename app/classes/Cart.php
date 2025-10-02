<?php
class Cart
{

    protected $conn;

    public function __construct($pdo)
    {
        $this->conn = $pdo;
    }
    public function add_to_cart($product_id, $user_id, $quantity)
    {
        $stmt = $this->conn->prepare("INSERT INTO cart (user_id,product_id,quantity) VALUES (?,?,?)");
        $stmt->execute([$user_id, $product_id, $quantity]);
    }
    public function  get_cart_items()
    {
        $stmt = $this->conn->prepare("SELECT p.product_id, p.name, p.price, p.size, p.image, c.quantity
            FROM cart c
            INNER JOIN products p  ON c.product_id = p.product_id
            WHERE c.user_id =?");

        $stmt->execute([$_SESSION['user_id']]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
