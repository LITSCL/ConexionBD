<?php
define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("CLAVE", "root");
define("BASEDEDATOS", "dbpersona");

class Database {
    public $_db;
    
    public function __construct() {
        $this->_db = new mysqli(SERVIDOR, USUARIO, CLAVE, BASEDEDATOS);
        if ($this->_db->connect_errno) {
            echo "Fallo la conexión" . $this->_db->connect_errno;
            return;
        }
    }
}
?>