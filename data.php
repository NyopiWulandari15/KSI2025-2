<?php
header('Content-Type: application/json');
$data = file_get_contents("mahasiswa.json");
echo $data;
?>
