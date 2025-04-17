<?php
include "db.php";

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id='$id'";
if ($conn->query($sql)) {
  echo "🗑️ Product deleted successfully!";
} else {
  echo "❌ Error: " . $conn->error;
}
?>
