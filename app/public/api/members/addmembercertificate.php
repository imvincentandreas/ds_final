<?php

require 'common.php';

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'INSERT INTO user_certification (memberID, certificationID, earn, expiration)
  VALUES (?, ?, ?, ?)'
);

$stmt->execute([
  $_POST['memberID'],
  $_POST['certificationID'],
  $_POST['earn'],
  $_POST['expiration']
]);

$userCertID = $db->lastInsertID();

header('HTTP/1.1 303 See Other');

header('Location: ../members/');
?>
