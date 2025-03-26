<?php
class Database {
    private $host = 'localhost';
    private $username = 'your_username';
    private $password = 'your_password';
    private $database = 'foodie_app';
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getMenuItems($category = null) {
        $sql = "SELECT * FROM menu_items";
        if ($category) {
            $sql .= " WHERE category = '$category'";
        }
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addToCart($userId, $itemId, $quantity) {
        $sql = "INSERT INTO cart (user_id, item_id, quantity) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $userId, $itemId, $quantity);
        return $stmt->execute();
    }

    public function __destruct() {
        $this->conn->close();
    }
}

// Example usage
$db = new Database();
$menuItems = $db->getMenuItems('burger');
?>