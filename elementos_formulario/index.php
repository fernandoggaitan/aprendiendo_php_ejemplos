<?php
header('Content-Type: text/html; charset=utf-8');
$por_post = ($_SERVER['REQUEST_METHOD'] == 'POST');
if ($por_post) {
    $nombre_apellido = $_POST['nombre_apellido'];
    $sexo = $_POST['sexo'];
    $nacionalidad = $_POST['nacionalidad'];
    $intereses = (isset($_POST['intereses'])) ? $_POST['intereses'] : null;
    $acerca_de_vos = $_POST['acerca_de_vos'];
}
?>
<!DOCTYPE>
<html>
    <head>
        <title> Formulario </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <?php if ($por_post): ?>
        <ul>
            <li> <strong> Nombre y apellido: </strong> <?php echo $nombre_apellido ?> </li>
            <li> <strong> Sexo: </strong> <?php echo $sexo ?> </li>
            <li> <strong> Nacionalidad: </strong> <?php echo $nacionalidad ?> </li>
            <?php if($intereses): ?> <li> <strong> Intereses: </strong> <?php echo implode(' - ', $intereses) ?> </li> <?php endif; ?>
        </ul>
        <div>
            <?php echo nl2br($acerca_de_vos) ?>
        </div>
        <?php else: ?>
            <form id="formulario" method="post" action="index.php">
                <table>
                    <tr>
                        <td> <label> Nombre y apellido: </label> </td>
                        <td> <input type="text" name="nombre_apellido" required="required" /> </td>
                    </tr>
                    <tr>
                        <td> <label> Sexo: </label> </td>
                        <td>
                            <input type="radio" name="sexo" value="Femenino" required="required" /> Femenino
                            <input type="radio" name="sexo" value="Masculino" required="required" /> Masculino
                        </td>
                    </tr>
                    <tr>
                        <td> <label> Nacionalidad: </label> </td>
                        <td>
                            <select name="nacionalidad" required="required">
                                <option value=""> --- </option>
                                <option value="Argentina"> Argentina </option>
                                <option value="Bolivia"> Bolivia </option>
                                <option value="Brasil"> Brasil </option>
                                <option value="Chile"> Chile </option>
                                <option value="Paraguay"> Paraguay </option>
                                <option value="Uruguay"> Uruguay </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td> <label> Intereses: </label> </td>
                        <td>
                            <input type="checkbox" name="intereses[]" value="Cine" /> Cine
                            <input type="checkbox" name="intereses[]" value="Deportes" /> Deportes  
                            <input type="checkbox" name="intereses[]" value="Deportes" /> Internet
                            <input type="checkbox" name="intereses[]" value="Libros" /> Libros                                                
                            <input type="checkbox" name="intereses[]" value="Música" /> Música   
                        </td>
                    </tr>
                    <tr>
                        <td> <label> Acerca de vos: </label> </td>
                        <td>
                            <textarea name="acerca_de_vos" rows="5" cols="50" required="required"></textarea>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Enviar" />
            </form>        
        <?php endif; ?>
    </body>
</html>