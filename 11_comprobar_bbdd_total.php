<?php
        session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
    
        require("conexion.php");
     
        $conex = new conexion();
        $TABLA= "bbdd_total";
        //estos valores los recibo por GET
         $busqueda = $_POST['codigol'];
        $check=$_POST['check2'];
        //caso contrario los iniciamos
try{
    
    $sql = "SELECT * FROM $TABLA WHERE CODIGO_L_CONCATENADO = '$busqueda'";

        $sqlRESULTSET=$conex->get_consulta($sql); 
        
   
$cont=0;
if ($sqlRESULTSET != 0){
foreach ($sqlRESULTSET as $elemento){//repetimos todas las filas de los registros existentes para que se vean en el formulario
  $cont++;  
   
  echo $cont . "/";
 echo $elemento['ID'];
}
}//******--------determinar las páginas---------******//
 
 
} catch (Exception $ex) {
echo "error";
}        
$conex->CloseConexion();//cerramos la conexion.  
     ?>    
   