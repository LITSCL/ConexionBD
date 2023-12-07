<?php require_once 'config/database.php'; ?>

<?php
class Persona extends database {
    private $rut;
    private $nombre;
    private $apellido;
    private $correo;
    
    public function __construct() {
        parent::__construct(); //Aca se esta ejecutando el constructor de la clase BDUtils (Aca se conecta a la BD).
    }
    
    //Metodo que genera la consulta sql que se trae todos los registros.
    public function getAll() {
        $sql = "SELECT * FROM persona"; //Se establece la sentencia SQL.
        $ejecutar = $this->_db->query($sql);
        $listaPersonas = $ejecutar->fetch_all(MYSQLI_ASSOC); //Aca se ejecuta la consulta y se almacenan los datos en la lista.
        
        if ($listaPersonas == true) { //Se consulta si la lista tiene datos.
            return $listaPersonas;
            $listaPersonas->close; //Se cierra la conexión a la BD.
        }
        else {
            echo "Falló la conexión a la tabla"; //Si la lista esta vacía es porque no se pudo traer los datos de la tabla.
        }
    }
    
    //Metodo que añade un registro a la tabla.
    public function create($rut, $nombre, $apellido, $correo) {
        $sql = "INSERT INTO persona VALUES " . "('$rut','$nombre','$apellido','$correo')"; //Se establece la sentencia SQL.
        $preparacion = $this->_db->prepare($sql); //Se prepara la sentencia SQL.
        $resultado = $preparacion->execute(); //Se ejecuta la sentencia SQL.
        return $resultado; //Retorna un boolean si funcionó o no la sentencia SQL.
    }
    
    public function remove($rut) {
        $sql = "DELETE FROM persona WHERE rut='$rut'";
        $preparacion = $this->_db->prepare($sql);
        $resultado = $preparacion->execute();
        return $resultado;
    }
    
    public function buscar($rut) {
        $sql = "SELECT * FROM persona WHERE rut='$rut'"; //Se establece la sentencia SQL.
        $ejecutar = $this->_db->query($sql);
        $listaPersonas = $ejecutar->fetch_all(MYSQLI_ASSOC); //Aca se ejecuta la consulta y se almacenan los datos en la lista.
        
        if ($listaPersonas == true){ //Se consulta si la lista tiene datos.
            return $listaPersonas;
            $listaPersonas->close; //Se cierra la conexión a la BD.
        
        }
        else {
            echo "Falló la conexión a la tabla"; //Si la lista esta vacía es porque no se pudo traer los datos de la tabla.
        }
    }
    
    public function update($rut, $nombre, $apellido, $correo) {
        $sql = "UPDATE persona SET nombre='$nombre',apellido='$apellido',correo='$correo'" . " WHERE rut='$rut'";
        $ejecutar = $this->_db->query($sql);
        return $ejecutar;
    }
}
?>
