<?php
header("Content-Type: application/json");

include_once '../config/Database.php';
include_once '../models/Buku.php';

$database = new Database();
$db = $database->getConnection();

$buku = new Buku($db);
$stmt = $buku->read();

$data = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>