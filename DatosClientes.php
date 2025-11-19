<?php
// 1. FORZAMOS A PHP A MOSTRAR ERRORES
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("Conexion.php");

// 2. VERIFICAMOS LA CONEXIÓN
if (!$conn || $conn->connect_error) {
    die("Falló la conexión (revisa Conexion.php): " . $conn->connect_error);
}

if(isset($_POST['Enviar'])){
    if(
        strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['mensaje']) >= 1 
    ) {
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $mensaje = trim($_POST['mensaje']);

        $consulta = "INSERT INTO buzon (nombre, email, mensaje)
                    VALUE ('$nombre','$email','$mensaje')";

        // 3. ESTA ES LA PARTE MÁS IMPORTANTE
        $resultado = mysqli_query($conn, $consulta);

    }
}
?>