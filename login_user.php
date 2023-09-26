<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos (actualiza los datos de conexión)
    $servername = "localhost";
    $username = "id21311202_blastex";
    $password = "Olimpiadas2023@";
    $database = "id21311202_bd_olimpiadas";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT id, nombre FROM usuarios WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso, almacenar datos del usuario en la sesión
        $row = $result->fetch_assoc();
        $_SESSION["usuario_id"] = $row["id"];
        $_SESSION["usuario_nombre"] = $row["nombre"];
        
        header("Location: principal.php"); // Redirigir a la página de inicio
    } else {
        // Credenciales incorrectas, mostrar mensaje de error
        echo "Credenciales incorrectas. <a href='login.html'>Volver a intentar</a>";
    }

    $conn->close();
}
?>
