<?php
include_once "conexion/Database.php";


// Captura los datos enviados mediante POST
$id_alumno = $_POST['id_alumno'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$carrera = $_POST['carrera'];
$semestre = $_POST['semestre'];
$materia = $_POST['materia'];

// Verifica que los campos obligatorios no estén vacíos
if (!empty($id_alumno) && !empty($nombres) && !empty($apellidos) && !empty($carrera) && !empty($semestre) && !empty($materia)) {
    // Obtener la conexión usando el patrón Singleton
    $db = Database::getInstance();
    $conn = $db->getConnection(); // Obtener la conexión correcta

    // Consulta para actualizar los datos del alumno
    $sql = "UPDATE solicitud SET nombres = ?, apellidos = ?, carrera = ?, semestre = ?, materia = ? WHERE id_alumno = ?";

    // Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // Vincular los parámetros a la consulta
        $stmt->bind_param("sssssss", $nombres, $apellidos, $carrera, $semestre, $materia, $id_alumno);

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
