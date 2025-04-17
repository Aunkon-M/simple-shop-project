<?php
session_start();

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "aunkon";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'] ?? '';
$pass  = $_POST['password'] ?? '';

// Use a prepared statement to avoid SQL injection
$stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
  // Check hashed password
  if (password_verify($pass, $row['password'])) {
    // Store session data
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];

    // Show success message and redirect to home page
    echo "<script>
            alert('Login successful!');
            window.location.href = 'index.html';
          </script>";
    exit;
  } else {
    echo "Invalid credentials. <a href='login.html'>Try again</a>";
  }
} else {
  echo "User not found. <a href='register.html'>Register instead</a>";
}

$stmt->close();
$conn->close();
?>