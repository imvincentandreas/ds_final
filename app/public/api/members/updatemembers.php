<?php

require 'common.php';

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'UPDATE member
  SET fname = ?, mname = ?, lname = ?, street = ?, city = ?, state = ?, zip = ?, phone = ?, email = ?, position = ?, stationID = ?, radio_num = ?, status = ?
  WHERE memberID = ?'
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
  $_POST['stationID'],
  $_POST['radio_num'],
  $_POST['status'],
  $_POST['memberID']
]);

header('HTTP/1.1 303 See Other');

header('Location: ../members/');
?>
