<?php require_once 'Persona.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title></title>
</head>
<body>
<?php 
$rut = $_REQUEST["rut"];
$persona = new Persona();
$listaPersonas = $persona->buscar($rut);
if (isset($_REQUEST["modificar"]) != "Modificar") { //Aca se esta verificando que no se haya enviado el formulario antes.
    if ($listaPersonas) {
        foreach ($listaPersonas as $fila) { //Se recorre una lista con un solo objeto.
?>
    	<div>
            <form action="modificar_persona.php" method="GET">
            	<label for="rut">Rut</label><br/>
            	<input type="text" name="rut" value="<?php echo $fila["rut"]; ?>" readonly/><br/>
            		
            	<label for="nombre">Nombre</label><br/>
            	<input type="text" name="nombre"value="<?php echo $fila["nombre"]; ?>"/><br/>
            		
            	<label for="apellido">Apellido</label><br/>
            	<input type="text" name="apellido" value="<?php echo $fila["apellido"]; ?>"/><br/>
            		
            	<label for="correo">Correo</label><br/>
            	<input type="text" name="correo" value="<?php echo $fila["correo"]; ?>"/><br/>
            		
            	<input type="submit" name="modificar" value="Modificar"/>
            		
            </form>
            <a href="mostrar_personas.php"><button>Cancelar</button></a>
        </div>
<?php 
        }
    }
}
?>

<?php 
if (isset($_REQUEST["modificar"])){
    $rut = $_REQUEST["rut"];
    $nombre = $_REQUEST["nombre"];
    $apellido = $_REQUEST["apellido"];
    $correo = $_REQUEST["correo"];
    
    $persona = new Persona();
    $modificarPersona = $persona->update($rut, $nombre, $apellido, $correo);
    if ($modificarPersona == 1){
        echo "Persona modificada"; 
    
?>
	<a href="mostrar_personas.php"><button>Mostrar lista</button></a>
<?php
    }
    else{
        echo "<script>alert('Error de ingreso'); window.location='mostrar_personas.php'</script>";
    }    
}
?>
</body>
</html>