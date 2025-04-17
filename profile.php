<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>My Profile</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  <section class="profile-container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
    <p><strong>User ID:</strong> <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
  </section>
</body>
</html>