<?php
// Configuración de la conexión a la base de datos (reutiliza tu código existente si es necesario)
$servername = "localhost";
$username = "id21311202_blastex";
$password = "Olimpiadas2023@";
$database = "id21311202_bd_olimpiadas";

$conex = new mysqli($servername, $username, $password, $database);

if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// Consulta para recuperar los datos que deseas descargar (ajusta según tus necesidades)
$sql = "SELECT * FROM pacientes";

$result = $conex->query($sql);

// Crea un archivo CSV para la descarga
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="pacientes.csv"');

$output = fopen('php://output', 'w');

// Escribe las cabeceras en el archivo CSV
fputcsv($output, array('ID', 'Nombre', 'Apellido', 'Edad', 'Fecha', 'Síntomas', 'Enfermero', 'Ubicación'));

// Escribe los datos en el archivo CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}

fclose($output);

// Cierra la conexión a la base de datos
$conex->close();
?>
