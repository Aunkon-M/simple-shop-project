<?php
include "db.php";

$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['description'];

$sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$desc')";
if ($conn->query($sql)) {
  echo "✅ Product added successfully!";
} else {
  echo "❌ Error: " . $conn->error;
}
?>
