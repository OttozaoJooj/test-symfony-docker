<?php

include 'idGenerator.php';

header('Content-Type: application/json');

$file = $_FILES[array_key_first($_FILES)];

$tmpPath = $file['tmp_name'];

$idUser = $_POST['idUser'];

$typeFile = array_key_first($_FILES);

mkdir('../data/'.$typeFile.'/'.$idUser);

$id = getRandomID();

$fileNamePath = __DIR__.'/../data/'.$typeFile.'/'.$idUser.'/'.$id.'.pdf';

if(move_uploaded_file($tmpPath, $fileNamePath)){
    http_response_code(200);
    echo json_encode(['message' => 'File Uploaded', 'idFile' => $id]);
} else{
    http_response_code(500);
    echo json_encode(['message' => 'Server Error']);

}
