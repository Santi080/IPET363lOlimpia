<?php
include('conex');
// Realiza la conexión a la base de datos (asegúrate de proporcionar las credenciales adecuadas)
$mysqli = new mysqli("localhost", "id21311202_blastex", "Olimpiadas2023@", "id21311202_bd_olimpiadas");

// Verifica si hay errores en la conexión
if ($mysqli->connect_error) {
    die("Error en la conexión a la base de datos: " . $mysqli->connect_error);
}

// Realiza una consulta para seleccionar todos los registros
$sql = "SELECT * FROM llamados";
$result = $mysqli->query($sql);

// Cierra la conexión a la base de datos
$mysqli->close();
?>
