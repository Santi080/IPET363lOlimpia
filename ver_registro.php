<?php
session_start();

// Inicializa un arreglo para almacenar los datos de llamadas en la sesión
if (!isset($_SESSION['llamadas'])) {
    $_SESSION['llamadas'] = array();
}

// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $tipoLlamada = $_POST["tipo"];
    $tiempoRespuesta = $_POST["respuesta"];
    $duracion = $_POST["duracion"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    // Agregar los datos a la sesión de llamadas
    $_SESSION['llamadas'][] = [
        'Tipo de llamada' => $tipoLlamada,
        'Tiempo de respuesta' => $tiempoRespuesta,
        'Duración' => $duracion,
        'Fecha' => $fecha,
        'Hora' => $hora
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="paratodo.css"> <!-- Agrega el enlace al archivo CSS -->
    <title>Tabla de Llamadas</title>
</head>
<body>
    <!-- Botón "Volver al Inicio" -->
    <a href="principal.php" class="back-button">Volver al Inicio</a>

    <h1>Tabla de Llamadas</h1>

    <?php
    if (!empty($_SESSION['llamadas'])) {
        echo "<table class='styled-table'>"; // Agrega la clase 'styled-table' para aplicar los estilos
        echo "<tr>
                <th>Tipo de llamada</th>
                <th>Tiempo de respuesta</th>
                <th>Duración</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>";

        foreach ($_SESSION['llamadas'] as $llamada) {
            echo "<tr>";
            echo "<td>" . $llamada['Tipo de llamada'] . "</td>";
            echo "<td>" . $llamada['Tiempo de respuesta'] . "</td>";
            echo "<td>" . $llamada['Duración'] . "</td>";
            echo "<td>" . $llamada['Fecha'] . "</td>";
            echo "<td>" . $llamada['Hora'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>
</body>
</html>
