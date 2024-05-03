<?php

function autentificar($username, $password) {
    
    // Si no nos han enviado los parámetros, regresamos false.
    if (!$username || !$password) return false;

    $sqlCmd =   // SQL Command SELECT para consultar el usuario por el username.
        "SELECT id, username, password_encrypted, password_salt, " .
        "    nombre, apellidos " .
        "  FROM usuarios WHERE username = ? ORDER BY id DESC";
    $sqlParams = [$username];  // Parámetros a enviar en la consulta.
    
    $db = getDbConnection();  // Obtenemos la conexión a la base de datos (objeto PDO).
    $stmt = $db->prepare($sqlCmd);  // Obtenemos el Statement de la sentencia SQL.
    $stmt->execute($sqlParams);  // Ejecutamos el Statment con los parámetros (solo username)
    $r = $stmt->fetchAll();  // Obtenemos un array de assoc array de los registros encontrados.

    // Si no se regresó ninguna coincidencia (consultando por el username) 
    // se regresa un false.
    if (!$r) return false;

    // Obtenemos el registro del usuario de los resultados de la consulta.
    // Si el usuario no está activo, regresamos false.
    $usuario = $r[0];
//    if (!$usuario['activo']) return false;

    // Se obtiene el hash que representa el password junto con el salt
    $passwordMasSalt = $password . $usuario["password_salt"];
    $passwordEncrypted = strtoupper(hash("sha512", $passwordMasSalt));

    // Si el hash (con el salt) del password proporcionado es diferente al que está 
    // en la base de datos, se regresa un false.
    if ($usuario["password_encrypted"] != $passwordEncrypted) return false;

    // Se regresa un assoc array con los datos el usuario.
    return [
        "id" => $usuario['id'] , 
        "username" => $usuario["username"], 
        "nombre" => $usuario["nombre"], 
        "apellidos" => $usuario["apellidos"],
        "es_admin" => $usuario["es_admin"]
    ];
}
