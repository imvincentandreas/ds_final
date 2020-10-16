<?php

require 'common.php';

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'INSERT INTO member (fname, mname, lname, street, city, state, zip, phone, email, position, stationID, radio_num, status)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, "Active")'
);

$stmt->execute([
  $_POST['fname'],
  $_POST['mname'],
  $_POST['lname'],
  $_POST['street'],
  $_POST['city'],
  $_POST['state'],
  $_POST['zip'],
  $_POST['phone'],
  $_POST['email'],
  $_POST['position'],
  $_POST['station'],
  $_POST['radio_num']
]);

$memberId = $db->lastInsertID();

header('HTTP/1.1 303 See Other');

header('Location: ../members/');
?>
