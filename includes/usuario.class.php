<?php

include_once "DB.class.php";

class Usuario {

    //PROPIEDADES
    private $login;
    private $password;
    private $nombre;
    private $fechaNac;

    //CONSTRUCTOR
    function __construct($login, $password, $nombre, $fechaNac) {

        $this->login = $login;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->fechaNac = $fechaNac;
    }

    //GETTERS
    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFechaNac() {
        return $this->fechaNac;
    }

    //SETTERS

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    /**
     * Función que establece el color de fondo de todas las páginas en función
     * del valor de la cookie que guarda el color establecido que se le pasa por
     * parámetro
     * @param type $colorfondo
     */
    public static function colorfondo($colorfondo) {
        switch ($colorfondo) {
            case "Blanco":
                echo "<body bgcolor=\"#FFFFFF\">";
                break;
            case "Azul":
                echo "<body bgcolor=\"#0099FF\">";
                break;
            case "Verde":
                echo "<body bgcolor=\"#008000\">";
                break;
            case "Rojo":
                echo "<body bgcolor=\"#FF6666\">";
                break;
            default:
                echo "<body bgcolor=\"#FFFFFF\">";
        }
    }
    
    
       /**
     * Función que realiza un ingreso de dinero en la base de datos
     * @param type $conexion
     * @param type $movimiento
     * @return type Devuelve true si se pudo hacer el ingreso o false en caso contrario
     */
    public static function hacerIngreso($conexion, $movimiento) {
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO movimientos (codigoMov, loginUsu, fecha, concepto,cantidad) VALUES (:codigoMov, :loginUsu, :fecha, :concepto,:cantidad)";
                $sentencia = $conexion->prepare($sql);
                $ingresoInsertado = $sentencia->execute(array(':codigoMov' => $movimiento->getCodigoMov(), ':loginUsu' => $movimiento->getLoginUsu(), ':fecha' => $movimiento->getFecha(), ':concepto' => $movimiento->getConcepto(), ':cantidad' => $movimiento->getCantidad()));
            } catch (Exception $ex) {
                print "<p class='rojo'>Error: " . $ex->getMessage() . "</p>";
            }

            DB::cerrarConexion();
        }

        return $ingresoInsertado;
    }

    /**
     * Función que permite realizar un pago de dinero
     * @param type $conexion
     * @param type $cantidad
     * @param type $codigoMov
     * @param type $concepto
     * @param type $fecha
     * @param type $login
     * 
     * @return type Devuelve true si se pudo hacer el pago o false en caso contrario
     */
    public static function hacerPago($conexion, $movimiento) {
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO movimientos (codigoMov, loginUsu, fecha, concepto,cantidad) VALUES (:codigoMov, :loginUsu, :fecha, :concepto,:cantidad)";
                $sentencia = $conexion->prepare($sql);
                $pagoInsertado = $sentencia->execute(array(':codigoMov' => $movimiento->getCodigoMov(), ':loginUsu' => $movimiento->getLoginUsu(), ':fecha' => $movimiento->getFecha(), ':concepto' => $movimiento->getConcepto(), ':cantidad' => -$movimiento->getCantidad()));
            } catch (Exception $ex) {
                print "<p class='rojo'>Error: " . $ex->getMessage() . "</p>";
            }

            DB::cerrarConexion();
        }
        return $pagoInsertado;
    }

    /**
     * Función que permite devolver los recibos(pagos) de un usuario, seleccionando
     * los que se quieren borrar mediante un checkbox
     * @param type $conexion
     * @param type $login
     * @param type $datos
     * @return type Devuelve true si se ha podido devolver los recibos o false en caso contrario
     */
    public static function devolverRecibos($conexion, $datos) {
        try {
            //Si existen recibos seleccionados
            if (isset($_POST['selec'])) {
                //Recorremos los recibos seleccionados
                foreach ($_POST['selec'] as $selec) {
                    //Recorremos los movimientos
                    foreach ($datos as $clave => $valor) {
                        //Eliminamos los recibos seleccionados
                        $sql = "DELETE FROM movimientos WHERE codigoMov=:codigoMov";
                        $sentencia = $conexion->prepare($sql);
                        $sentencia->execute(array(":codigoMov" => $selec));
                    }
                }
                return true;
            } else {
                return false;
            }
        } catch (PDOException $ex) {
            echo "<p class='rojo'>Error: " . $ex->getMessage() . "</p>";
        }

        DB::cerrarConexion();
    }

}
