<?php
//Definimos la codificación de la cabecera.
header('Content-Type: text/html; charset=utf-8');
//Importamos el archivo con las validaciones.
require_once 'funciones/validaciones.php';
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado el formulario, sino se guardará null.
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$edad = isset($_POST['edad']) ? $_POST['edad'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
//Este array guardará los errores de validación que surjan.
$errores = array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Valida que el campo nombre no esté vacío.
    if (!validaRequerido($nombre)) {
        $errores[] = 'El campo nombre es incorrecto.';
    }
    //Valida la edad con un rango de 3 a 130 años.
    $opciones_edad = array(
        'options' => array(
            //Definimos el rango de edad entre 3 a 130.
            'min_range' => 3,
            'max_range' => 130
        )
    );
    if (!validarEntero($edad, $opciones_edad)) {
        $errores[] = 'El campo edad es incorrecto.';
    }
    //Valida que el campo email sea correcto.
    if (!validaEmail($email)) {
        $errores[] = 'El campo email es incorrecto.';
    }
    //Verifica si ha encontrado errores y de no haber redirige a la página con el mensaje de que pasó la validación.
    if(!$errores){
        header('Location: validado.php');
        exit;
    }
}
?>
<!DOCTYPE>
<html>
    <head>
        <title> Formulario </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php if ($errores): ?>
            <ul style="color: #f00;">
                <?php foreach ($errores as $error): ?>
                    <li> <?php echo $error ?> </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form method="post" action="index.php">
            <label> Nombre </label>
            <br />
            <input type="text" name="nombre" value="<?php echo $nombre ?>" />
            <br />
            <label> Edad </label>
            <br />
            <input type="text" name="edad" size="3" value="<?php echo $edad ?>" />
            <br />
            <label> E-mail </label>
            <br />
            <input type="text" name="email" value="<?php echo $email ?>" />
            <br />
            <input type="submit" value="Enviar" />
        </form>
    </body>
</html>