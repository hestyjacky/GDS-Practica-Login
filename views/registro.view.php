<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?=APP_ROOT?>css/estilos.css" rel="stylesheet" type="text/css" /> 
    <title>Sistema 1</title>
    <script src="<?=APP_ROOT?>js/config.js"></script>
</head>
<body>

    <?php require APP_PATH . "html_parts/menu.php"; ?>

    <div class="container">
        <div class="elemento1">         
            <h1>Registrar una cuenta</h1>
        </div>

        <div class="elemento2">

            <form action="<?=APP_ROOT?>controllers\do_signup.php" method="POST" >
                <td><input type="text" name="nombre" id="txt-nombre" placeholder="Nombre(s)" required /></td>
                <br><br>
                <td><input type="text" name="apellidos" id="txt-apellido" placeholder="Apellido(s)" required /></td>
                <br><br>
                <select name="genero" id="txt-genero">
                    <option value="">Seleccione género...</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="X">Prefiero no decir</option>
                </select>
                <br><br>
                <input type="date" name="fecha_nacimiento" id="txt-fecha_nacimiento" placeholder="Nacimiento" required max="2017-01-01"/>
                <br><br>
                <td><input type="email" name="username" id="txt-username" placeholder="Correo" required /></td>
                <br><br>
                <td><input type="password" name="password" id="txt-password" placeholder="Contraseña" required /></td>
                <br><br>
                <td><input type="password" name="password2" id="txt-password2" placeholder="Confirmar Contraseña" required /></td>
                <br><br>
                <input type="submit" value="Registrarse" onclick="validarFormulario()"/>
                <br>
                <h5>¿Ya tienes cuenta? <a class="registrarse" href="<?=APP_ROOT?>login.php">Inicia Sesión</a>.</h5>

                </form>
        </div>   
    </div>

    <?php require APP_PATH . "html_parts/final.php"; ?>

    <script>
        function validarFormulario() {
            let nombre = document.getElementById("txt-nombre").value.trim();
            let apellidos = document.getElementById("txt-apellido").value.trim();
            let username = document.getElementById("txt-username").value.trim();
            let genero = document.getElementById("txt-genero").value;
            let fecha_nacimiento = document.getElementById("txt-fecha_nacimiento").value;
            let password = document.getElementById("txt-password").value.trim();
            let password2 = document.getElementById("txt-password2").value.trim();

            // Validación de formato de email.
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(username)) {
                alert("El username debe ser un correo electrónico válido.");
                return false;
            }

            // Validación de contraseñas
            if(password !== password2) {
                alert("Las contraseñas no coinciden.");
                return false;
            }

            let obj = {
                nombre: nombre,
                apellidos: apellidos,
                username: username,
                genero: genero,
                fecha_nacimiento: fecha_nacimiento,
                password: password,
                password2: password2
            };
            alert(JSON.stringify(obj));
            // Campos validados procede a enviar el formulario.
            return true;
        }
    </script>
</body>
</html>
