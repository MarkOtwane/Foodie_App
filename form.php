<?php
session_start();
require_once 'Database.php';

// Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $itemId = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Assuming user is logged in (you'd implement proper authentication)
    $userId = $_SESSION['user_id'] ?? null;

    if ($userId) {
        $db = new Database();
        $result = $db->addToCart($userId, $itemId, $quantity);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Item added to cart']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to add item']);
        }
    }
    exit;
}
