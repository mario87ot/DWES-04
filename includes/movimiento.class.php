<?php

class Movimiento {

    //PROPIEDADES
    private $codigoMov;
    private $loginUsu;
    private $fecha;
    private $concepto;
    private $cantidad;

    //CONSTRUCTOR
    function __construct($row) {

        $this->codigoMov = $row['codigoMov'];
        $this->loginUsu = $row['loginUsu'];
        $this->fecha = $row['fecha'];
        $this->concepto = $row['concepto'];
        $this->cantidad = $row['cantidad'];
    }

    //GETTERS
    public function getCodigoMov() {
        return $this->codigoMov;
    }

    public function getLoginUsu() {
        return $this->loginUsu;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getConcepto() {
        return $this->concepto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    //SETTERS
    public function setCodigoMov($codigoMov) {
        $this->codigoMov = $codigoMov;
    }

    public function setLoginUsu($loginUsu) {
        $this->loginUsu = $loginUsu;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setConcepto($concepto) {
        $this->concepto = $concepto;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    /**
     * Función que permite autoincrementar el código de cada movimiento de uno en uno
     * partiendo desde un valor inicial de 0000
     * @param type $conexion
     * @return type Devuelve el código del siguiente movimiento
     */
    public static function numeroMovimiento() {

        try {
            //Obtememos el código más alto que haya guardado en la base de datos
            $sql = "SELECT MAX(codigoMov) AS codigo FROM movimientos";
            $conexion = DB::conexion();
            $resultado = $conexion->prepare($sql);
            $resultado->execute();
            $datos = $resultado->fetch(PDO::FETCH_ASSOC);
            //Si no existe ningún código porque no hay movimientos
            if (empty($datos['codigo'])) {
                //Asignamos el número 0000 como primer código
                $codigoMovimiento = "0000";
                //Si ya existe algún movimiento
            } else {
                //Guardamos el código del movimiento con código más alto
                $codigoMovimiento = $datos['codigo'];
                //Incrementamos en uno el código
                $codigoMovimiento++;
                //Añadimos ceros a la izquierda del código para que siempre tenga 4 cifras
                $codigoMovimiento = str_pad($codigoMovimiento, 4, '0', STR_PAD_LEFT);
            }
        } catch (PDOException $ex) {
            echo "<p class='rojo'>Error " . $ex->getMessage() . "</p>";
        }

        DB::cerrarConexion();

        return $codigoMovimiento;
    }

    /**
     * Función que valida los campos cantidad, concepto y fecha del formulario de
     * ingreso
     * @param type $cantidad
     * @param type $concepto
     * @param type $fecha
     * @return array Devuelve un array con los errores encontrados
     */
    public static function validarCamposIngreso($cantidad, $concepto, $fecha) {
        //Array donde se almacenarán todos los errores al validar
        $errores = array();
        //Si el campo cantidad está vacío
        if (empty($cantidad)) {
            array_push($errores, "*El campo cantidad no puede estar vacío");
        } elseif (!is_numeric($cantidad)) {
            array_push($errores, "*Debe introducir una cantidad numérica. Si usa decimales, utilice formato punto. Ej: 55.6");
        } elseif ($cantidad <= 0) {
            array_push($errores, "*Debe introducir una cantidad mayor que cero");
        }
        //Si el campo concepto está vacío
        if (empty($concepto)) {
            array_push($errores, "*El campo concepto no puede estar vacío");
        }
        //Guardamos la expresión regular para validar el formato de la fecha
        $regexFecha = "#(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))#";
        //Si la fecha no sigue  el formato yyyy-mm-dd
        if (!preg_match($regexFecha, $fecha)) {
            array_push($errores, "*Fecha no válida");
        }

        return $errores;
    }

    /**
     * Función que valida los campos cantidad, concepto y fecha del formulario de
     * pago
     * @param type $cantidad
     * @param type $concepto
     * @param type $fecha
     * @return array Devuelve un array con los errores encontrados
     */
    public static function validarCamposPago($cantidad, $concepto, $fecha) {

        //Array donde se almacenarán todos los errores al validar
        $errores = array();
        //Si el campo cantidad está vacío
        if (empty($cantidad)) {
            array_push($errores, "*El campo cantidad no puede estar vacío");
        } elseif (!is_numeric($cantidad)) {
            array_push($errores, "*Debe introducir una cantidad numérica. Si usa decimales, utilice formato punto. Ej: 55.6");
        } elseif ($cantidad <= 0) {
            array_push($errores, "*Debe introducir una cantidad mayor que cero");
        }
        //Si el campo concepto está vacío
        if (empty($concepto)) {
            array_push($errores, "*El campo concepto no puede estar vacío");
        }
        //Guardamos la expresión regular para validar el formato de la fecha
        $regexFecha = "#(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))#";
        //Si la fecha no sigue  el formato yyyy-mm-dd
        if (!preg_match($regexFecha, $fecha)) {
            array_push($errores, "*Fecha no válida");
        }

        return $errores;
    }

    /**
     * Función que permite mostrar los movimientos de un usuario en una tabla
     * @param type $conexion
     * @param type $login
     * @return type Devuelve todos los movimientos de un usuario
     */
    public static function movimientos($conexion, $login) {

        try {
            $sql = "SELECT * FROM movimientos WHERE loginUsu=:loginUsu";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array(":loginUsu" => $login));
            //Creamos una array para almacenar los movimientos
            $movimientos = array();
            //Mientras encuentre registros, se creará un nuevo objeto movimiento que se almacenará en el array
            while ($registro = $resultado->fetch()) {
                $movimientos[] = new Movimiento($registro);
            }
        } catch (PDOException $ex) {
            echo "<p class='rojo'>Error: " . $ex->getMessage() . "</p>";
        }
        DB::cerrarConexion();
        return $movimientos;
    }

    /**
     * Función que permite mostrar los recibos (pagos) de un usuario en una tabla,
     * con posibilidad de seleccionarlos mediante un checkbox
     *
     * @param type $conexion
     * @param type $login
     * @return type Devuelve los pagos realizados por un usuario
     */
    public static function recibos($conexion, $login) {

        try {
            $sql = "SELECT * FROM movimientos WHERE loginUsu=:loginUsu";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array(":loginUsu" => $login));
            $recibos = array();
            while ($registro = $resultado->fetch()) {
                if ($registro['cantidad'] < 0) {
                    $recibos[] = new Movimiento($registro);
                }
            }
        } catch (PDOException $ex) {
            echo "<p class='rojo'>Error: " . $ex->getMessage() . "</p>";
        }

        DB::cerrarConexion();
        return $recibos;
    }

}
