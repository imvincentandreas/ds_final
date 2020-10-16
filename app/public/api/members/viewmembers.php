<?php

require 'common.php';

$db = DbConnection::getConnection();

$stmt = $db->prepare (
  "SELECT * FROM member AS m"
);

$stmt->execute();

$member = $stmt->fetchAll();

$json = json_encode($member, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;

?>
