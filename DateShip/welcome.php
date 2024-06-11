<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: index.html");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to DateShip</title>
  <style>
    body {
      background-color: #F8E0E0;
      font-family: sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #FFFFFF;
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      position: relative; 
    }

    h1 {
      color: #D90429;
      font-size: 2.5em;
      margin-bottom: 20px;
    }

    .image-container {
      position: absolute; 
      top: -130px; 
      left: 50%;
      transform: translateX(-50%);
      width: 150px; 
      height: 150px; 
      border-radius: 50%; 
      overflow: hidden; 
    }

    .image-container img {
      width: 100%; 
      height: 100%; 
      object-fit: cover; 
    }

    .welcome {
      font-size: 2em;
      color: #D90429;
    }

    .logout-button {
      background-color: #D90429;
      color: #FFFFFF;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1em;
      transition: background-color 0.3s;
      margin-top: 20px;
    }

    .logout-button:hover {
      background-color: #B3001B;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="image-container">
      <img src="./img/apple-icon.png" alt="DateShip Logo"> </div> 
    <h1 class="welcome">Welcome to DateShip, <?php echo $_SESSION['user_name']; ?>!</h1>
    <a href="logout.php" class="logout-button">Log Out</a>
  </div>
</body>
</html>