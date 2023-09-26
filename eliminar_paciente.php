<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Verificar si se ha recibido el ID del paciente a eliminar a través de la URL
if (isset($_GET['id'])) {
    // Obtener el ID del paciente desde la URL
    $id_paciente = $_GET['id'];

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

    // Preparar la consulta SQL para eliminar el paciente
    $sql = "DELETE FROM pacientes WHERE id = $id_paciente";

    // Ejecutar la consulta y verificar si se realizó correctamente
    if ($conex->query($sql) === TRUE) {
        header("Location: principal.php");
    } else {
        echo "Error al eliminar el paciente: " . $conex->error;
    }

    // Cerrar la conexión
    $conex->close();
} else {
    echo "ID de paciente no proporcionado.";
}
?>
</body>
</html>