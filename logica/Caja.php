<?php 

require_once 'Empleados.php';

class Caja extends Empleados{

    public function __construct(){
        $parametros = func_get_args();
        $numero_deparametros = func_num_args();

        $funcion_constructor = '__construct' . $numero_deparametros;

        if (method_exists($this,$funcion_constructor)) {
            call_user_func_array(array($this,$funcion_constructor),$parametros);
        }
    }

    public function __construct2($ch,$vh){
        $this->cantidadhoras = $ch;
        $this->valorhora = $vh;
    }
   
   
    public function calcularCaja($porcentaje){
        return( ($this->getCantidadhoras() * $this->getValorhora()) * $porcentaje);
    
    }

    
}

?>