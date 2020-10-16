<?php

require 'common.php';

$db = DbConnection::getConnection();

$sql = 'SELECT * FROM member';

$stmt = $db->prepare($sql);

$stmt->execute();

$member = $stmt->fetchAll();

$json = json_encode($member, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
