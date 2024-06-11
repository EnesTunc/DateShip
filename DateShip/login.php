<?php
session_start(); 

require_once 'config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection Error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_name'] = $row['nickname'];
      echo "success";
    } else {
      echo "Wrong Password.";
    }
  } else {
    echo "You are not registered in the system. Please create a new user.";
  }

  $conn->close();
}
?>