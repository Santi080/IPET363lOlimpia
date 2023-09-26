<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Verificar si se ha enviado el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_paciente = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $fecha = $_POST['fecha'];
    $sintomas = $_POST['sintomas'];
    $enfermero = $_POST['enfermero'];
    $ubicacion = $_POST['ubicacion'];

    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "id21311202_blastex"; // Reemplaza con tu nombre de usuario de MySQL
    $password = "Olimpiadas2023@"; // Reemplaza con tu contraseña de MySQL
    $database = "id21311202_bd_olimpiadas";

    // Crear una conexión
    $conex = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    // Preparar la consulta SQL para actualizar los datos del paciente
    $sql = "UPDATE pacientes SET nombre='$nombre', apellido='$apellido', edad=$edad, fecha='$fecha', sintomas='$sintomas', enfermero='$enfermero', ubicacion='$ubicacion' WHERE id = $id_paciente";

    // Ejecutar la consulta y verificar si se realizó correctamente
    if ($conex->query($sql) === TRUE) {
        header("Location: principal.php");
    } else {
        echo "Error al actualizar los datos del paciente: " . $conex->error;
    }

    // Cerrar la conexión
    $conex->close();
} else {
    echo "No se han recibido datos para actualizar.";
}
?>

</body>
</html>