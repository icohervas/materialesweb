<?php
require("conexion.php"); 
$conex = new conexion();
        $id_proyecto = $_POST['valorSelectPedidos'];

                    //CONSULTA DE PEDIDOS
        $sqlPED = "SELECT * FROM PEDIDOS WHERE PROYECTO_ID = $id_proyecto";//guardamos la consulta en una variable.
        $fooPED=$conex->get_consulta($sqlPED);//ejecutamos la consulta a traves de poo, llamamos al metodo get_consulta de la clase conexion y guardamos en una variable el resultado de la consulta.
              
          foreach ($fooPED as $elemento)//creamos un bucle for each para mostrar todos los elementos de la tabla localizacion.
            {
         
                $item2 = $elemento['NOMBRE_PEDIDO'];// utilizando el identificador del array asociativo, guardamos los valores del campo en variables.
                $item3 = $elemento['PEDIDO_ID'];// utilizando el identificador del array asociativo, guardamos los valores del campo en variables.
                $item4= "";// utilizando el identificador del array asociativo, guardamos los valores del campo en variables.
                
                echo "<option value  =\"$item3\"'data-email = \"$item4\">$item2</option>";//mostramos en el select el contenido de las variables.
            }
?>
