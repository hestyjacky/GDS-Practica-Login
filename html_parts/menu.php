<?php require_once APP_PATH . "config\sesion.php"; ?>

<link href="<?=APP_ROOT?>css/estilos.css" rel="stylesheet" type="text/css" /> 

<div class="topDiv">
    <?php if ($USUARIO_AUTENTICADO): ?>
        <a href="<?=APP_ROOT?>" title="Página principal">Home</a>
        <span style="margin: 0 25px;">&nbsp;</span> <!-- Espacio -->
        <a href="<?=APP_ROOT?>/logout.php" title="Cerrar sesión">X</a>
    <?php else: ?>
        <a href="<?=APP_ROOT?>/login.php" title="Abrir cuenta del usuario registrado">Inicio de sesión</a>
        <span style="margin: 0 20px;">&nbsp;</span> <!-- Espacio -->
        <a href="<?=APP_ROOT?>/registro.php" title="Crear una cuenta en la web">Registrarse</a>
    <?php endif; ?>
</div>
