<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Configura la conexión a la base de datos
    $servername = "localhost"; // Cambia a la dirección de tu servidor MySQL
    $username = "id21311202_blastex"; // Cambia a tu nombre de usuario de MySQL
    $password_db = "Olimpiadas2023@"; // Cambia a tu contraseña de MySQL
    $database = "id21311202_bd_olimpiadas"; // Cambia al nombre de tu base de datos

    // Crea una conexión
    $conex = new mysqli($servername, $username, $password_db, $database);

    // Verifica la conexión
    if ($conex->connect_error) {
        die("Error de conexión: " . $conex->connect_error);
    }

    // Consulta SQL para insertar datos en la tabla de usuarios (ajusta el nombre de la tabla según tu estructura)
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

    // Ejecuta la consulta y verifica si se realizó correctamente
    if ($conex->query($sql) === TRUE) {
        echo "Registro exitoso. Ahora puedes <a href='login.php'>iniciar sesión</a>.";//cambiar el herf por la pagina que quieras
    } else {
        echo "Error al registrar usuario: " . $conex->error;
    }

    // Cierra la conexión
    $conex->close();
}
?>
