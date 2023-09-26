<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style8.css">
    <title>Especialidades y Médicos</title>
</head>
<body>
    <header>
        <h1>Hospital de Tucuman</h1>
        <nav>
            <ul>
			    <li><a href="principal.php">Inicio</a></li>
                <li><a href="pacientes_admin.php">Citas</a></li>
                <li><a href="llamada.php">Paciente</a></li>

            </ul>
        </nav>
</header>
    <h1>Especialidades Médicas</h1>

    <?php
    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "id21311202_blastex"; 
    $password = "Olimpiadas2023@"; 
    $database = "id21311202_bd_olimpiadas";

    // Crear una conexión
    $conex = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    // Consultar las especialidades médicas
    $especialidades_query = "SELECT * FROM especialidades";
    $especialidades_result = $conex->query($especialidades_query);

    if ($especialidades_result->num_rows > 0) {
        while ($especialidad = $especialidades_result->fetch_assoc()) {
            echo "<h2>" . $especialidad["nombre"] . "</h2>";

            // Consultar los médicos de esta especialidad
            $medicos_query = "SELECT * FROM medicos WHERE id_especialidad = " . $especialidad["id"];
            $medicos_result = $conex->query($medicos_query);

            if ($medicos_result->num_rows > 0) {
                echo "<ul>";
                while ($medico = $medicos_result->fetch_assoc()) {
                    echo "<li>";
                    echo "<img src='" . $medico["foto"] . "' alt='Foto de " . $medico["nombre"] . " " . $medico["apellido"] . "' width='150' height='150'>";
                    echo "Nombre: " . $medico["nombre"] . " " . $medico["apellido"] . "<br>";
                    echo "DNI: " . $medico["dni"] . "<br>";
                    echo "edad: " . $medico["edad"] . "<br>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "No hay médicos disponibles en esta especialidad.";
            }
        }
    } else {
        echo "No hay especialidades médicas registradas.";
    }

    // Cerrar la conexión
    $conex->close();
    ?>

</body>
</html>
