<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar Paciente</title>
</head>
<body>
    <h2>Editar Paciente</h2>

    <?php
    // Verificar si se ha recibido el ID del paciente a editar a través de la URL
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

        // Preparar la consulta SQL para recuperar los datos del paciente a editar
        $sql = "SELECT * FROM pacientes WHERE id = $id_paciente";

        // Ejecutar la consulta
        $result = $conex->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Aquí puedes crear un formulario prellenado con los datos actuales del paciente
            // para permitir al usuario editarlos y enviar el formulario para actualizarlos.
            // Por ejemplo:

            echo "<form action='actualizar_paciente.php' method='POST'>";
            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
            echo "Nombre: <input type='text' name='nombre' value='" . $row["nombre"] . "'><br>";
            echo "Apellido: <input type='text' name='apellido' value='" . $row["apellido"] . "'><br>";
            echo "Edad: <input type='text' name='edad' value='" . $row["edad"] . "'><br>";
            echo "Fecha: <input type='text' name='fecha' value='" . $row["fecha"] . "'><br>";
            echo "Síntomas: <input type='text' name='sintomas' value='" . $row["sintomas"] . "'><br>";
            echo "Enfermero: <input type='text' name='enfermero' value='" . $row["enfermero"] . "'><br>";
            echo "Ubicación: <input type='text' name='ubicacion' value='" . $row["ubicacion"] . "'><br>";
            echo "<input type='submit' value='Actualizar'>";
            echo "</form>";
        } else {
            echo "Paciente no encontrado.";
        }

        // Cerrar la conexión
        $conex->close();
    } else {
        echo "ID de paciente no proporcionado.";
    }
    ?>
</body>
</html>
