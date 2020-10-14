<?php

require 'common.php';

$db = DbConnection::getConnection();

// Step 2: Create & run the query
// Note the use of parameterized statements to avoid injection
$stmt = $db->prepare(
  'INSERT INTO member (fname, mname, lname, street, city, state, zip, phone, email, position, station, radio_num, status)
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

if ($stmt) {
    echo "<script>
    alert('User Added. Redirecting to Members Page');
    window.location.href='members.html';
    </script>";
} else {
    echo "<script>
    alert('Error: User was not added.');
    window.location.href='addmembers.html';
    </script>";
}
?>