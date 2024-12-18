<?php
// Incluye la clase Database
include_once "conexion/Database.php";

// Captura los datos enviados mediante POST
$id_alumno = $_POST['id_alumno'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$carrera = $_POST['carrera'];
$semestre = $_POST['semestre'];
$materia = $_POST['materia'];
$carrera = $_POST['carrera'];

// Verifica que los campos obligatorios no estén vacíos
if (!empty($id_alumno) && !empty($nombres) && !empty($apellidos) && !empty($carrera) && !empty($semestre) && !empty($materia)) {
    // Obtener la conexión usando el patrón Singleton
    $db = Database::getInstance();
    $conn = $db->getConnection();

    // Consulta para insertar los datos
    $sql = "INSERT INTO solicitud (id_alumno, nombres, apellidos, carrera, semestre, materia) 
            VALUES ('$id_alumno', '$nombres', '$apellidos', '$carrera', '$semestre', '$materia')";

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
