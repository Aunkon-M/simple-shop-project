<?php
include "db.php";

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['description'];

$sql = "UPDATE products SET name='$name', price='$price', description='$desc' WHERE id='$id'";
if ($conn->query($sql)) {
  echo "✅ Product updated successfully!";
} else {
  echo "❌ Error: " . $conn->error;
}
?>
