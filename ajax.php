<?php 

$_TURKEY = json_decode(file_get_contents("Turkey.json"),true);
$il = $_POST["il"];
$out = $_TURKEY[$il]["ilceleri"];
echo json_encode($out); 
?> 