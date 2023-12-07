<?php require_once 'Persona.php';?>

<?php
$persona = new Persona();
$listaPersonas = $persona->getAll();

if ($listaPersonas) {  
?>

<html>
<head></head>
<a href="agregar_persona.php"><button>Agregar</button></a>
<body>
 <table border="1">
 
  <tr>
   <th>Rut</th>
   <th>Nombre</th>
   <th>Apellido</th>
   <th>Correo</th>
   <th>Opcion 1</th>
   <th>Opcion 2</th>
  </tr>
  
<?php 
    foreach ($listaPersonas as $fila) {
        echo "<tr>";
        echo "<td>" . $fila['rut'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['apellido'] . "</td>";
        echo "<td>" . $fila['correo'] . "</td>";
        echo "<td>" . "<a href='modificar_persona.php?rut=" . $fila['rut'] . "'" . ">Modificar</a>" . "</td>";
        echo "<td>" . "<a href='eliminar_persona.php?rut=" . $fila['rut'] . "'" . ">Eliminar</a>" . "</td>";
        echo "</tr>";
    } 
?>
 
 </table>
</body>
</html>

<?php 
}
else {
    echo "Sin registros";
}
?>