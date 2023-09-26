<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <title>Pacientes</title>
</head>
<header>
        <h1>Hospital de Tucuman</h1>
        <nav>
            <ul>
                <li><a href="principal.php">Inicio</a></li>
                <li><a href="especialidad_medica.php">Especialidades</a></li>
                <li><a href="formullam.php">Contacto</a></li>
                <li><a href="llamada.php">Paciente</a></li>

            </ul>
        </nav>
</header>

<body>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Fichas De Pacientes</h3>
            <a href="descargar.php?search=<?php echo urlencode($filter); ?>" class="btn btn-primary" download>Descargar Resultados</a>
        </div>
    </div>


    <!-- Barra de búsqueda de datos -->
    <div id="search-container">
        <label for="search-box">Buscar:</label>
        <input type="text" id="search-box" onkeyup="searchFunction()" placeholder="Ingrese término de búsqueda">
    </div>

    <!-- Resultados de la búsqueda -->
    <div id="search-results">
        <!-- Aquí se mostrarán los resultados de la búsqueda -->
    </div>

    <!-- Resto de tu contenido HTML -->
    <script>
function searchFunction() {
    // Obtenemos el valor ingresado en la barra de búsqueda
    var input = document.getElementById("search-box");
    var filter = input.value.toLowerCase();

    // Obtenemos la tabla donde se muestran los datos (ajusta el ID según tu estructura)
    var table = document.getElementsByTagName("table")[0];

    // Obtenemos todas las filas de la tabla (excepto la primera que es la cabecera)
    var rows = table.getElementsByTagName("tr");

    // Recorremos las filas y ocultamos aquellas que no coincidan con la búsqueda
    for (var i = 1; i < rows.length; i++) { // Empezamos desde 1 para omitir la cabecera
        var row = rows[i];
        var dataCells = row.getElementsByTagName("td");
        var found = false;

        // Recorremos las celdas de datos en cada fila
        for (var j = 0; j < dataCells.length; j++) {
            var cell = dataCells[j];
            if (cell) {
                var text = cell.textContent || cell.innerText;
                if (text.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    break; // Si se encuentra el término de búsqueda en esta celda, no es necesario verificar las demás
                }
            }
        }

        // Mostramos u ocultamos la fila según si se encontró el término de búsqueda
        if (found) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}
</script>

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

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $fecha = $_POST['fecha'];
    $sintomas = $_POST['sintomas'];
    $enfermero = $_POST['enfermero'];
    $ubicacion = $_POST['ubicacion'];

    // Preparar la consulta SQL para insertar datos
    $sql = "INSERT INTO pacientes (nombre, apellido, edad, fecha, sintomas, enfermero, ubicacion)
            VALUES ('$nombre', '$apellido', $edad, '$fecha', '$sintomas', '$enfermero', '$ubicacion')";

    // Ejecutar la consulta y verificar si se realizó correctamente
    if ($conex->query($sql) === TRUE) {
        echo "Datos ingresados correctamente.";
    } else {
        echo "Error al ingresar datos: " . $conex->error;
    }
}

// Realizar la consulta para recuperar los datos ingresados
$sql = "SELECT * FROM pacientes"; // Consulta para seleccionar todos los registros de la tabla pacientes

$result = $conex->query($sql); // Ejecutar la consulta

// Mostrar los datos en una tabla
if ($result->num_rows > 0) {
    echo "<table style='width: 100%; border-collapse: collapse; margin-top: 20px;'> ";
    echo "<tr><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>ID</th><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>Nombre</th><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>Apellido</th><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>Edad</th><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>Fecha</th><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>Síntomas</th><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>Enfermero</th><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>Ubicación</th><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>Editar</th><th style='background-color: #007bff; color: white; padding: 8px; text-align: left;'>Eliminar</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'>" . $row["id"] . "</td>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'>" . $row["nombre"] . "</td>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'>" . $row["apellido"] . "</td>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'>" . $row["edad"] . "</td>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'>" . $row["fecha"] . "</td>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'>" . $row["sintomas"] . "</td>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'>" . $row["enfermero"] . "</td>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'>" . $row["ubicacion"] . "</td>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'><a href='editar_paciente.php?id=" . $row["id"] . "'>Editar</a></td>";
        echo "<td style='border: 1px solid #ccc; padding: 8px; text-align: left;'><a href='eliminar_paciente.php?id=" . $row["id"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este paciente?\")'>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay registros.";
}

// Cerrar la conexión
$conex->close();

?>
    <!-- Footer de la pagina -->
    <section id="footer">

        <footer>
            <div class="pie">
                <p>&copy; Provincia de Tucuman</p>

            </div>
        </footer>
    </section>

</body>

</html>

