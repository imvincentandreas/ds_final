<?php

require 'common.php';

$db = DbConnection::getConnection();

$sql = 'SELECT * from station as s, member as m where s.stationID=m.stationID';

$stmt = $db->prepare($sql);

$stmt->execute();

$member = $stmt->fetchAll();

$json = json_encode($member, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;
