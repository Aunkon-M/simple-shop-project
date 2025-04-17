<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $cart = json_decode($_POST['cart'], true);

    if (empty($cart)) {
        die("Cart is empty. Please add items to your cart.");
    }

    // Filter out invalid items (items without 'id')
    $cart = array_filter($cart, function ($item) {
        return isset($item['id']);
    });

    if (empty($cart)) {
        die("Error: No valid items in the cart.");
    }

    // Insert order into the orders table
    $total = array_reduce($cart, function ($sum, $item) {
        return $sum + ($item['price'] * $item['qty']);
    }, 0);

    $stmt = $conn->prepare("INSERT INTO orders (fullname, address, email, total) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $fullname, $address, $email, $total);

    if ($stmt->execute()) {
        $order_id = $stmt->insert_id;

        // Insert each valid cart item into the order_items table
        $itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        foreach ($cart as $item) {
            $itemStmt->bind_param("iiid", $order_id, $item['id'], $item['qty'], $item['price']);
            $itemStmt->execute();
        }
        $itemStmt->close();

        echo "✅ Order placed successfully! Your order ID is: " . $order_id;

        // Clear the cart in the browser
        echo "<script>localStorage.removeItem('cart');</script>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>