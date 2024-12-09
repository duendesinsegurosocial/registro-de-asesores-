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
    $conn = $db->getConnection(); // Obtener la conexión correcta

    $sql = "UPDATE alumnos SET nombre = ?, apellido = ?, telefono = ?, correo = ?, facultad = ?, carrera = ? WHERE id_alumno = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssss", $nombre, $apellido, $telefono, $correo, $facultad, $carrera, $id_alumno);

        if ($stmt->execute()) {
            echo "Registro actualizado correctamente.";
        } else {
            echo "Error al actualizar el registro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
} else {
    echo "Por favor, completa todos los campos.";
}
?>
