<?php

$uploadDir = "uploads/";

if (!isset($_FILES["video"])) {
    exit("No file");
}

$file = $_FILES["video"];

$filename = time() . "_" . basename($file["name"]);
$targetPath = $uploadDir . $filename;

if (move_uploaded_file($file["tmp_name"], $targetPath)) {
    echo json_encode([
        "success" => true,
        "file" => $filename
    ]);
} else {
    echo json_encode([
        "success" => false
    ]);
}
