<?php
include_once "conexion/Database.php";


$db = database::getInstance();
$conn = $db->getConnection();

$sql = "SELECT * FROM maestros";
$result = $db->get_data($sql);

echo json_encode($result);

