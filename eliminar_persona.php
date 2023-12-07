<?php require_once 'Persona.php'; ?>

<?php 
$rut = $_REQUEST["rut"];
$persona = new Persona();
$eliminarPersona = $persona->remove($rut);
if ($eliminarPersona == 1) {
    echo "Persona eliminada";
?>
	<a href="mostrar_personas.php"><button>Mostrar lista</button></a>
<?php 
}
else {
    echo "<script>alert('Error de ingreso'); window.location='mostrar_personas.php'</script>"; 
}
?>