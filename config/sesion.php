<?php

// Para iniciar una nueva sesión o recuperar una sesión existente.
session_start();

// Aquí estarán los datos generales del usuario que obtendremos de la sesión
$USUARIO_AUTENTICADO = false;
$USUARIO_ID = NULL;
$USUARIO_NOMBRE = NULL;
$USUARIO_APELLIDOS = NULL;
$USUARIO_NOMBRE_COMPLETO = NULL;
$USUARIO_ES_ADMIN = false;

// Si el usuario ya está autenticado
if (isset($_SESSION["Usuario_Id"])) {
    $USUARIO_AUTENTICADO = true;
    $USUARIO_ID = $_SESSION['Usuario_Id'];
    $USUARIO_USERNAME = $_SESSION['Usuario_Username'];
    $USUARIO_NOMBRE = $_SESSION['Usuario_Nombre'];
    $USUARIO_APELLIDOS = $_SESSION['Usuario_Apellidos'];
    $USUARIO_NOMBRE_COMPLETO = $USUARIO_APELLIDOS ? 
            "$USUARIO_NOMBRE $USUARIO_APELLIDOS" : $USUARIO_NOMBRE;
    $USUARIO_ES_ADMIN = $_SESSION["Usuario_EsAdmin"];
}
