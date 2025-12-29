<?php

header('Content-Type: application/json');

$file = $_FILES['vehicles'];

$typeFolder = array_key_first($_FILES);

$folderName = $_POST['idUser'];

$fileName = $file['name'];

if($typeFolder === 'vehicles'){
    mkdir('../data/vehicles/'.$folderName);
    
}


$fileNamePath = __DIR__.'/../data/'.$typeFolder.'/'.$folderName.'/'.$fileName;


$tmpFile = $file['tmp_name'];

if(move_uploaded_file($tmpFile, $fileNamePath)){
    echo json_encode('File Uploaded');
}
