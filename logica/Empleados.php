<?php 

    class Empleados{
        private $cantidadhoras;
        private $valorhora;

        public function __construct(){
           $parametros = func_get_args();
           $numero_deparametros = func_num_args();

           $funcion_constructor = '__construct' . $numero_deparametros;

           if (method_exists($this,$funcion_constructor)) {
               call_user_func_array(array($this,$funcion_constructor),$parametros);
           }
        }

        public function __construct0(){
            $this->cantidadhoras = 0;
            $this->valorhora = 0;
        }

         public function __construct1($valor){
            $this->cantidadhoras = 0;
            $this->valorhora = 0;
        }

        public function __construct2($ch,$vh){
            $this->cantidadhoras = $ch;
            $this->valorhora = $vh;
        }

        protected function getCantidadhoras(){
            return $this->cantidadhoras;
        }

        public function setCantidadhoras($valor){
            $this->cantidadhoras = $valor;
        }

        protected function getValorhora(){
            return $this->valorhora;
        }    

        public function setValorhora($valor){
            $this->valorhora = $valor;
        }


    }

?>