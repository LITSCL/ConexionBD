<?php require_once 'Persona.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title></title>
</head>
<body>
	<?php
	if (isset($_REQUEST["agregar"])) { //Aca se esta consultando si se dio click al botón Agregar.
	    $persona = new Persona();
	    $crearPersona = $persona->create($_REQUEST["rut"], $_REQUEST["nombre"], $_REQUEST["apellido"], $_REQUEST["correo"]);
	    if ($crearPersona == 1){ //Si create es igual a 1 singnifica True (Si ingreso el registro).
	        echo "Persona ingresada";
	?>
			<a href="mostrar_personas.php"><button>Mostrar lista</button></a>
	<?php 
	    }
	    else {
	        echo "<script>alert('Error de ingreso'); window.location='AgregarPersona.php'</script>";
	    }
	}
	else { //Si no se le dio click al botón Agregar se muestra el formulario.
	?>
    	<div>
        	<form action="agregar_persona.php" method="GET">
        		<label for="rut">Rut</label><br/>
        		<input type="text" name="rut"/><br/>
        		
        		<label for="nombre">Nombre</label><br/>
        		<input type="text" name="nombre"/><br/>
        		
        		<label for="apellido">Apellido</label><br/>
        		<input type="text" name="apellido"/><br/>
        		
        		<label for="correo">Correo</label><br/>
        		<input type="text" name="correo"/><br/>
        		
        		<input type="submit" name="agregar" value="Agregar"/>
        		
        	</form>
        	<a href="mostrar_personas.php"><button>Cancelar</button></a>
    	</div>
	<?php 
	}
	?>
</body>
</html>