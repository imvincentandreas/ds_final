<?php
  require "common.php";
  $db = DbConnection::getConnection();
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  $sql="SELECT DISTINCT * FROM account WHERE email = ? AND password = ?";

  $stmt = $db->prepare($sql);
  $stmt->execute([
      $email,
      password_hash($password, PASSWORD_BCRYPT)
  ]);
  $user = $stmt->fetchAll();
?>
