<?php
// ... Configuración de la conexión a la base de datos ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST['search'];

    // Escapar el término de búsqueda para evitar inyección SQL (mejora la seguridad)
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm);

    // Consulta SQL para buscar resultados que coincidan con el término de búsqueda
    $sql = "SELECT * FROM pacientes WHERE nombre LIKE '%$searchTerm%' OR apellido LIKE '%$searchTerm%' OR sintomas LIKE '%$searchTerm%'";

    $result = $conex->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Crear una tabla HTML para mostrar los resultados
        echo "<table>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nombre"] . "</td>";
            // ... Mostrar otros campos de datos ...
            echo "</tr>";
        }
        echo "</table>";

        // Ahora, para permitir la descarga de estos resultados, puedes agregar un enlace a tu página
        echo "<a href='descargar.php?search=" . urlencode($searchTerm) . "'>Descargar Resultados</a>";
    } else {
        echo "No se encontraron resultados.";
    }
}

// ... Cerrar la conexión a la base de datos ...
?>
