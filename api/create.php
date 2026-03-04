<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");

include_once '../config/Database.php';
include_once '../models/Buku.php';

$database = new Database();
$db = $database->getConnection();

$buku = new Buku($db);

$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->judul) &&
    !empty($data->penulis) &&
    !empty($data->tahun_terbit) &&
    !empty($data->stok)
){
    $buku->judul = $data->judul;
    $buku->penulis = $data->penulis;
    $buku->tahun_terbit = $data->tahun_terbit;
    $buku->stok = $data->stok;

    if($buku->create()){
        http_response_code(201);
        echo json_encode(["message" => "Buku berhasil ditambahkan"]);
    } else {
        http_response_code(503);
        echo json_encode(["message" => "Gagal menambahkan buku"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Data tidak lengkap"]);
}
?>