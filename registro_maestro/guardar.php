<?php
// Incluye la clase Database
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
    $conn = $db->getConnection();

    // Consulta para insertar los datos
    $sql = "INSERT INTO maestros (id_maestro, nombres, apellidos, materia, carrera, telefono, correo) 
            VALUES ('$id_maestro', '$nombres', '$apellidos', '$materia', '$carrera', '$telefono', '$correo')";

    // Ejecuta la consulta y verifica el resultado
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
