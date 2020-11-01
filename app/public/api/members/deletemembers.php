<?php

require 'common.php';

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'DELETE FROM member WHERE memberID = ?'
);

$stmt->execute([
  $_POST['memberID']
]);

header('HTTP/1.1 303 See Other');

header('Location: ../members/');
?>
