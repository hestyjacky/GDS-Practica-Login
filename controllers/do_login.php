<?php

require "../config/config.php";
require_once APP_PATH . "data_access/db.php";
require_once APP_PATH . "controllers\login_helper.php";

session_start();

// Obtenemos los datos que se enviaron por la petición POST en el form
$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");

// De los parámetros de username y password los validamos, obtendremos los datos
// del usuario si el login es correcto.
$datosUsuario = autentificar($username, $password);

if ($datosUsuario){
    // Establecemos variables de sesión con los datos del usuario.
    $_SESSION['Usuario_Id'] = $datosUsuario['id'];
    $_SESSION['Usuario_Username'] = $datosUsuario['username'];
    $_SESSION['Usuario_Nombre'] = $datosUsuario['nombre'];
    $_SESSION['Usuario_Apellidos'] = $datosUsuario['apellidos'];
    $_SESSION["Usuario_EsAdmin"] = $datosUsuario["es_admin"];

    // Redirigimos al home, esto es solo para usuarios validados.
    header("Location: " . "../index.php"); // Redirigimos al index, esto es solo para usuarios

} else { // Si no obtuvimos datos, regresamos al login
    header("Location: " . "../login.php"); // Redirigimos al login, esto es solo para usuarios no validados.
    echo "Correo o contraseña ingresados incorrectamente"; // Mensaje de error
}
