<?php

require 'common.php';

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'INSERT INTO certification (name,validity)
  VALUES (?, ?)'
);

$stmt->execute([
  $_POST['name'],
  $_POST['validity']
]);

$memberId = $db->lastInsertID();

header('HTTP/1.1 303 See Other');

header('Location: ../certificates/');
?>
