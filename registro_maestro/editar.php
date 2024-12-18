<?php
include_once "conexion/Database.php";


// Captura los datos enviados mediante POST
$id_maestro = $_POST['id_maestro'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$materia = $_POST['materia'];
$carrera = $_POST['carrera'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

// Verifica que los campos obligatorios no estén vacíos
if (!empty($id_maestro) && !empty($nombres) && !empty($apellidos) && !empty($materia) && !empty($carrera) && !empty($telefono) && !empty($correo)) {
    // Obtener la conexión usando el patrón Singleton
    $db = Database::getInstance();
    $conn = $db->getConnection(); // Obtener la conexión correcta

    // Consulta para actualizar los datos del alumno
    $sql = "UPDATE maestros SET nombres = ?, apellidos = ?, materia = ?, carrera = ?, telefono = ?, correo = ? WHERE id_maestro = ?";

    // Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros a la consulta
        $stmt->bind_param("sssssss", $nombres, $apellidos, $materia, $carrera, $telefono, $correo, $id_maestro);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Registro actualizado correctamente.";
        } else {
            echo "Error al actualizar el registro: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
} else {
    echo "Por favor, completa todos los campos.";
}
?>
