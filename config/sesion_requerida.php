<?php

// Para cargar las variables de sesión
require_once APP_PATH . "config\sesion.php";

// Validamos que el usuario esté autenticado, si no lo está, hacemos un redirect al login
if (!$USUARIO_AUTENTICADO) {
    header('Location: ' . APP_ROOT . "login.php");
    exit();
}
