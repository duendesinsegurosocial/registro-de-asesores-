<?php
include_once "conexion/Database.php";

$id_alumno = $_POST['id_alumno'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$facultad = $_POST['facultad'];
$carrera = $_POST['carrera'];

if (!empty($id_alumno) && !empty($nombre) && !empty($apellido) && !empty($telefono) && !empty($correo) && !empty($facultad) && !empty($carrera)) {
    $db = Database::getInstance();
    $conn = $db->getConnection();

    $sql = "INSERT INTO alumnos (id_alumno, nombre, apellido, telefono, correo, facultad, carrera) 
            VALUES ('$id_alumno', '$nombre', '$apellido', '$telefono', '$correo', '$facultad', '$carrera')";

    $result = $db->exec($sql);

    if ($result['STATUS'] === "OK") {
        echo "Registro guardado correctamente.";
    } else {
        echo "Error al guardar el registro: " . $result['ERROR'];
    }
} else {
    echo "Por favor, completa todos los campos.";
}
?>
