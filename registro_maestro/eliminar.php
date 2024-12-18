<?php
include_once "conexion/Database.php";


// Captura el id del maestro que se va a eliminar
$id_maestros = $_POST['id_maestro'];

// Verifica que el id del maestro no esté vacío
if (!empty($id_maestros)) {
    // Obtener la conexión usando el patrón Singleton
    $db = Database::getInstance();
    $conn = $db->getConnection(); // Obtener la conexión correcta

    // Consulta para eliminar el maestro
    $sql = "DELETE FROM maestros WHERE id_maestro = ?";

    // Preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // Vincular el parámetro
        $stmt->bind_param("s", $id_maestro); // "s" indica que el parámetro es una cadena (string)

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "Error al eliminar el registro: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
} else {
    echo "Por favor, proporciona el ID del alumno.";
}

