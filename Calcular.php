<?php 
    if (isset($_POST["btncalcular"])) {
        require_once 'logica/Salario.php';
        require_once 'logica/Salud.php';
        require_once 'logica/Pension.php';
        require_once 'logica/Caja.php';

        $cantidadhoras = $_POST["txthorastrabajadas"];
        $valorhora = $_POST["txtcostohoratrabajo"];
      
        $objSalario = new Salario($cantidadhoras,$valorhora);
        $objSalud = new Salud($cantidadhoras,$valorhora);
        $objPension = new Pension($cantidadhoras,$valorhora);
        $objCaja = new Caja($cantidadhoras,$valorhora);

        echo "<b>El salario bruto es: </b>" . $objSalario->calcularSalarioBruto() . "<br>";

        if($objSalario->calcularSalarioBruto() <= 1000000){
          
            echo "<b> El descuento de salud es: </b>" . $objSalud->calcularSalud(0.02) . "<br>";

          
            echo "<b> El descuento de pension es: </b>" . $objPension->calcularPension(0.04) . "<br>";

            $incremento = $objSalario->calcularSalarioBruto() * 0.03;
            echo "<b> Incremento: </b>" . $incremento . "<br>";


            $salarioFinal = ($objSalario->calcularSalarioBruto() + $incremento) - $objSalud->calcularSalud(0.02) - $objPension->calcularPension(0.04);
            echo "<b>Salario a pagar: </b>" . $salarioFinal . "<br>";
        }
        elseif ($objSalario->calcularSalarioBruto() > 1000000 && $objSalario->calcularSalarioBruto() <=2000000) {
         
            print "<b> El descuento de salud es: </b>" . $objSalud->calcularSalud(0.04) . "<br>";

            print "<b> El descuento de pension es: </b>" . $objPension->calcularPension(0.06) . "<br>";

         
            echo "<b> El descuento de cada caja de compensaciones es: </b>" . $objCaja->calcularCaja(0.02) . "</br>";

            $salarioFinal = $objSalario->calcularSalarioBruto() - $objSalud->calcularSalud(0.04) - $objPension->calcularPension(0.06) - $objCaja->calcularCaja(0.02);
            echo "<b>Salario a pagar : </b>" . $salarioFinal . "</br>";
        }
        elseif ($objSalario->calcularSalarioBruto() <= 2000000) {
          
            print "<b> El descuento de salud es: </b>" . $objSalud->calcularSalud(0.05) . "<br>";

        
            print "<b> El descuento de pension es: </b>" . $objPension->calcularPension(0.07) . "<br>";

         
            echo "<b> El descuento de cada caja de compensaciones es: </b>" . $objCaja->calcularCaja(0.03) . "</br>";

            $salarioFinal = $objSalario->calcularSalarioBruto() - $objSalud->calcularSalud(0.05) - $objPension->calcularPension(0.07) - $objCaja->calcularCaja(0.03);
            echo "<b>Salario a pagar : </b>" . $salarioFinal . "</br>";
        }
        
    }
    else {
        echo "A HACKEAR A SU MADRE PERRA!!!!";
    }
?>