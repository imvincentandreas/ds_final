<?php

require 'common.php';

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'UPDATE certification
  SET name = ?, validity = ?
  WHERE certificationID = ?'
);

$stmt->execute([
  $_POST['name'],
  $_POST['validity'],
  $_POST['certificationID']
]);

header('HTTP/1.1 303 See Other');

header('Location: ../certificates/');
?>
