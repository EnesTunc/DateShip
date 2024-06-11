<?php


require_once 'config.php';


function connectToDatabase() {
  global $servername, $username, $password, $dbname;
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
  }
  return $conn;
}


function isNicknameAvailable($conn, $nickname) {
  $sql = "SELECT * FROM users WHERE nickname = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $nickname);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result->num_rows == 0;
}


function registerUser($conn, $fullname, $nickname, $email, $password, $date_of_birth, $gender) {
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (fullname, nickname, email, password, date_of_birth, gender) 
          VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssss", $fullname, $nickname, $email, $hashedPassword, $date_of_birth, $gender);

  if ($stmt->execute()) {
    return true;
  } else {
    return false;
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $conn = connectToDatabase();

  $fullname = $_POST["fullname"];
  $nickname = $_POST["nickname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $day = $_POST["day"];
  $month = $_POST["month"];
  $year = $_POST["year"];
  $gender = $_POST["gender"];
  
  $date_of_birth = $year . "-" . $month . "-" . $day;

  if (isNicknameAvailable($conn, $nickname)) {
    if (registerUser($conn, $fullname, $nickname, $email, $password, $date_of_birth, $gender)) {
  
      header("Location: index.html");
      exit; 
    } else {
      echo "An error occurred. Please try again later.";
    }
  } else {
    echo "This nickname is already taken.";
  }

  $conn->close();
}

?>