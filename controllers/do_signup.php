<?php

require "../config/config.php";
require_once APP_PATH . "data_access/db.php";

$nombre = trim($_POST["nombre"]);
$apellidos = trim($_POST["apellidos"]);
$genero = $_POST["genero"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$username = trim($_POST["username"]); // Correo electronico
$password = $_POST["password"]; // primera passwords
$password2 = $_POST["password2"]; // confirmacion

// Validacion de contraseñas
if ($password !== $password2) {
    header("Location: " . APP_ROOT . "registro.php"); 
    return false;
}

// Sentencia SQL para mandar datos a la base de datos.
$sqlCmd = "INSERT INTO usuarios (username, password_encrypted, password_salt, nombre, apellidos, genero, fecha_nacimiento, fecha_hora_registro, activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Encriptacion por Salt y Hash512 a las passwords:
$passwordSalt = strtoupper(bin2hex(random_bytes(32)));
$passwordMasSalt = $password . $passwordSalt;
$passwordEncrypted = strtoupper(hash("sha512", $passwordMasSalt));

// Parámetros a enviar en la sentencia SQL.
$sqlParams = [
    $username,
    $passwordEncrypted,
    $passwordSalt,
    $nombre,
    $apellidos,
    $genero,
    $fecha_nacimiento,
    date("Y-m-d H:i:s"),
    1 // activo
];

// Ejecución de la sentencia SQL.
$db = getDbConnection();
$stmt = $db->prepare($sqlCmd);
$stmt->execute($sqlParams);

// Redireccionamiento a la página de inicio.
header("Location: " . APP_ROOT);