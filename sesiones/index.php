<?php
    session_start();
    $usuarios = array(
        array('nombre' => 'roberto', 'contrasena' => '1234'),
        array('nombre' => 'jorge', 'contrasena' => '1234'),
        array('nombre' => 'toni', 'contrasena' => '1234')
    );
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        //Creamos una variable para verificar si el usuario con ese nombre y contraseña existe.
        $usuario_encontrado = false;
        foreach($usuarios as $item){
            //Si encuentra al usuario con ese nombre y contraseña sete la variable $usuario_encontrado a true y rompe el bucle para no seguir buscando.
            if($nombre == $item['nombre'] and $contrasena == $item['contrasena']){
                $usuario_encontrado = true;
                break;
            }
        }
        //Verifica si dentro del bucle se ha encontrado el usuario.
        if($usuario_encontrado){
            $_SESSION['logueado'] = true;
            $_SESSION['nombre'] = $nombre;
            header('Location: usuario.php');
            exit;
        }else{
            $error_login = true;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> Logueo </title>
    </head>
    <body>
        <?php if(isset($error_login)): ?>
            <span style="color: #f00;"> El usuario o la contraseña son incorrectos. </span>
        <?php endif; ?>
        <form method="post" action="index.php">
            <label for="nombre"> Nombre </label>
            <input type="text" name="nombre" id="nombre" required="required" />
            <label for="contrasena"> Contraseña </label>
            <input type="password" name="contrasena" id="contrasena" required="required" />
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>