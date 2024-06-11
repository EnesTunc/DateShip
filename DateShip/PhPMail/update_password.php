<?php
// Veritabanı bağlantı bilgilerini içe aktar
require_once("db_config.php"); 

// Yeni şifreyi al
$newPassword = $_POST["newPassword"];
$code = $_POST["code"];

// Şifreyi hash'leyin
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Şifreyi veritabanında güncelleyin
$sql = "UPDATE users SET password = '$hashedPassword' WHERE verification_code = '$code'"; 

if ($conn->query($sql) === TRUE) {
  echo "true"; // Şifre güncelleme başarılı
} else {
  echo "false"; // Şifre güncelleme hatası
}

$conn->close();
?>