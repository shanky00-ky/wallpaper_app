<?php
session_start();
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($query);
$user = $result->fetch_assoc();

echo "<h1>" . $user['username'] . "'s Profile</h1>";
echo "<p>Email: " . $user['email'] . "</p>";
?>
