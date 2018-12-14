<?php
//Importamos los datos de usuario con el nombre y la contraseña.
require_once 'datos_usuarios.php';
//Verifica si la petición viene por POST, osea si el usuario envió el formulario.
$por_post = ($_SERVER['REQUEST_METHOD'] == 'POST');
if ($por_post) {
    //Recupera los valores de los datos enviados por el usuario.
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    //Verica si los datos ingresados corresponden al nombre de usuario y la contraseña.
    if ($usuario == USUARIO and $contrasena == CONTRASENA) {
        $login_correcto = true;
    } else {
        $login_correcto = false;
    }
}
?>
<!DOCTYPE>
<html>
    <head>
        <title> Inicio se sesión </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php if ($por_post and $login_correcto): //Verifica si el usuario envió el formulario y el login es correcto. ?>
            <div> Bienvenido/a. </div>
            <?php else: ?>
            <form method="post" action="index.php">
                <label> Nombre de usuario: </label>
                <br />
                <input type="text" name="usuario" required="required" />
                <br />
                <label> Contraseña: </label>
                <br />
                <input type="password" name="contrasena" required="required" />
                <br />
                <input type="submit" value="Ingresar" />
                <?php if ($por_post and !$login_correcto): //Verifica si el usuario envió el formulario y el login es incorrecto. ?>
                    <div> El usuario o la contraseña son incorrectos. </div>
                <?php endif; ?>
            </form>
        <?php endif; ?>
    </body>
</html>