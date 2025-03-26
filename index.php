<?php
// database.php - Include this at the top of your main PHP file
require_once 'Database.php';

// Create database connection
$db = new Database();

// Fetch menu items
$menuItems = $db->getMenuItems();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie App</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>

<body>
    <div class="app-container">
        <div class="menu-screen" id="menuScreen">
            <div class="menu-items">
                <?php foreach ($menuItems as $item): ?>
                    <div class="menu-card" data-category="<?php echo $item['category']; ?>">
                        <img src="<?php echo $item['image_url']; ?>" alt="<?php echo $item['name']; ?>">
                        <h3><?php echo $item['name']; ?></h3>
                        <p><?php echo $item['description']; ?></p>
                        <div class="card-footer">
                            <span class="price">$<?php echo number_format($item['price'], 2); ?> USD</span>
                            <button class="add-to-cart" data-item-id="<?php echo $item['id']; ?>">🛒</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>