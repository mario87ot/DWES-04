<?php

define('HOST', 'localhost');          //Dirección del servidor
define('DBNAME', 'banca_electronica');//Base de datos
define('USER', 'dwes');               //Usuario
define('PASS', 'dwes');               //Contraseña


class DB {

    private static $instancia;
    private $conexion;

    /**
     * Constructor con los datos de conexión a la base de datos
     */
    private function __construct() {

        try {
            $this->conexion = new PDO('mysql:host=' . HOST . '; dbname=' . DBNAME, USER, PASS);
            $this->conexion->exec("set names utf8");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            exit("<p class='rojo'>Error: " . $e->getMessage() . "</p>");
            die();
        }
    }

    /**
     * Método que devuelve la conexión a la base de datos. En caso de
     * no haberse realizado la conexión, se instancia el constructor a sí mismo.
     * 
     * En el caso de haber sido ya instanciada devuelve el valor de la instancia
     * 
     * @return Objeto conexion
     */
    public static function conexion() {
        if (!isset(self::$instancia)) {
            self::$instancia = new DB;
        }
        return self::$instancia;
    }

    /**
     * Método que devuelve una consulta preparada
     * 
     * @param  string $sql Consulta
     * @return consulta preparada
     */
    public static function prepare($sql) {
        return self::$instancia->conexion->prepare($sql);
    }

    /**
     * Método que cierra la conexión con la base de datos
     */
    public static function cerrarConexion() {

        try {
            $conexion = self::conexion();
            $conexion = null;
        } catch (Exception $ex) {
            print "<p class='rojo'>Error: " . $ex->getMessage() . "</p>";
        }
    }

    /**
     * Metodo que devuelve un array con el usuario o falso si no existe
     * 
     * @param  string $user
     * @return array
     */
    public static function getLogin($user) {
       
        self::conexion();
        $sql = 'SELECT * FROM usuarios WHERE login=:login';
        $resultado = self::prepare($sql);
        $resultado->execute(array(':login'=>$user));
        $usuario = false;

        //Si existe algún resultado
        if ($resultado->rowCount() > 0) {
            //Guardamos los datos de la consulta
            $usuario = $resultado->fetch();
        }
        self::cerrarConexion();
        return $usuario;
    }

}
