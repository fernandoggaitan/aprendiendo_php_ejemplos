<?php
//Soporta caracteres especiales como tildes, eñes, etcétera.
header('Content-Type: text/html; charset=utf-8');
//Carga el array con la lista de los empleados.
require 'empleados.php';
//Esta variable verifica si se está realizando una búsqueda.
$legajo = (isset($_GET['legajo'])) ? $_GET['legajo'] : null;
//Esta variable guardará el resultado de la búsqueda.
$empleado = null;
//Si existe un legajo, es porque se está realizando una búsqueda.
if ($legajo) {
   //Limpiamos los espacios en blanco que pudo haber dejado el usuario.
   $legajo = trim($legajo);
   //Busca que exista un empleado con ese legajo.
   if (isset($empleados[$legajo])) {
      //Guarda la posición con los datos del empleado.
      $empleado = $empleados[$legajo];
   }
}
?>
<!DOCTYPE>
<html>
 <head>
    <title> Buscar empleados </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>
 <body>
    <form method="get" action="index.php">
       <label> Legajo: </label>
       <input type="text" name="legajo" required="required" value="<?php echo $legajo ?>" />
       <input type="submit" value="Buscar" />
    </form>
    <div>
       <?php
          if ($legajo) {
             if ($empleado) {
                echo "Nombre: {$empleado['nombre']} {$empleado['apellido']} - Sector: {$empleado['sector']}";
             } else {
                echo 'No existe un empleado con ese legajo.';
             }
          }
       ?>
    </div>
 </body>
</html>