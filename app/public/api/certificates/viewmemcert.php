<?php

require 'common.php';

$db = DbConnection::getConnection();

$stmt = $db->prepare (
  "SELECT * FROM member AS m, certification AS c, user_certification AS uc WHERE m.memberID = uc.memberID AND c.certificationID = uc.certificationID AND expiration > NOW()"
);

$stmt->execute();

$memberCertificate = $stmt->fetchAll();

$json = json_encode($memberCertificate, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $json;

?>
