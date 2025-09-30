<?php

class User
{
    protected $conn;
    public function __construct($pdo)
    {
        $this->conn = $pdo;
    }
    public function create($name, $username, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(name,username,email,password) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute([$name, $username, $email, $hashed_password])) {
            $_SESSION['user_id'] = $this->conn->lastInsertId();
            return true;
        } else {
            return false;
        }
    }
    public function login($username, $password)
    {

        $sql = "SELECT id, password FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);

        // Uzmi usera kao asocijativni array
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            return true;
        }

        return false;
    }
    public function is_logged()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
