<?php
session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
/*if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{*/
    require("conexion.php"); //requerimos la clase conexion.           
?>    
<html>
    <head>
        <title>11_eliminar_equipo.php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        
    </head>
    <body>
              
        <?php 
        
        $valor = $_POST['idfila'];//capturamos el valor del identificador del registro de la tabla equipo.
        $PROYECTOid = (INT)$_POST['PROYECTOid'];//capturamos el valor del identificador del registro de la tabla equipo.
        $PEDIDOid = (INT)$_POST['PEDIDOid'];//capturamos el valor del identificador del registro de la tabla equipo.
        
       //echo $_POST['idfila'];
       
        $ELEMENTO_ID="ID";//guardamos el nombre de un campo de la tabla en una variable.
        $tabla="material_pedidos_temp";
        
        $conex = new conexion();//creamos una instancia de la clase conexion.
        $conex->eliminar_registro($valor,$tabla,$ELEMENTO_ID);//llamamos el metodo eliminar registro de la clase conexion.
       
  $sqlMAT = "SELECT DISTINCT MATERIAL_PEDIDOS_TEMP.ISOMETRICO_NOMBRE,MATERIAL_PEDIDOS_TEMP.MTO_REV_0,MATERIAL_PEDIDOS_TEMP.MTO_REV_0A,MATERIAL_PEDIDOS_TEMP.MTO_REV_0B,MATERIAL_PEDIDOS_TEMP.MTO_REV_0C,MATERIAL_PEDIDOS_TEMP.MTO_REV_1,MATERIAL_PEDIDOS_TEMP.MTO_REV_1A,MATERIAL_PEDIDOS_TEMP.MTO_REV_1B,MATERIAL_PEDIDOS_TEMP.MTO_REV_1C,MATERIAL_PEDIDOS_TEMP.MTO_REV_2,MATERIAL_PEDIDOS_TEMP.MTO_REV_2A,MATERIAL_PEDIDOS_TEMP.MTO_REV_2B,MATERIAL_PEDIDOS_TEMP.MTO_REV_2C,MATERIAL_PEDIDOS_TEMP.ID,BBDD_TOTAL.CODIGO_L_CONCATENADO,BBDD_TOTAL.FAMILIA,MATERIAL_PEDIDOS_TEMP.MATERIAL_ID,PEDIDOS.NOMBRE_PEDIDO,MATERIAL_PEDIDOS_TEMP.MATERIAL_ID,PROYECTOS.NOMBRE_PROYECTO FROM MATERIAL_PEDIDOS_TEMP,PEDIDOS,PROYECTOS,BBDD_TOTAL
WHERE MATERIAL_PEDIDOS_TEMP.PEDIDO_ID = $PEDIDOid AND PEDIDOS.PEDIDO_ID = $PEDIDOid AND PEDIDOS.PROYECTO_ID = $PROYECTOid AND PROYECTOS.PROYECTO_ID = PEDIDOS.PROYECTO_ID AND BBDD_TOTAL.ID = MATERIAL_PEDIDOS_TEMP.MATERIAL_ID";//sentencia sql que lee todo los registros de la tabla.
  $fooMAT=$conex->get_consulta($sqlMAT);//ejecutamos el metodo get_consulta , utilizando la sentencia $SQL y el resultset lo guardamos en la variable.  */  
           
     ?> 
     <html>
    <head>
        <meta charset="UTF-8"><!--Agregamos el tipo de codificacion de caracteres de la web.-->
        <title>11_insertar_importacion_bbdd_total.php</title><!--Agregamos un título a la web-->
        
    </head>
    <body> 
        <div id="contenido_cabecera "style = "display: table; width: 1950px;"> 
        
            
            <div  class="eldiv" style = "float: left; height: 30px; width: 30px;">ID</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 80px;">PROYECTO</div>
            
             <div class="eldiv" style = "float: left; height: 30px; width: 70px;">PEDIDO</div>
            
            <div  class="eldiv" style = "float: left; height: 30px; width: 190px;">ISOMETRICO</div>
                        
            <div class="eldiv" style = "float: left; height: 30px; width: 90px;">FAMILIA</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 100px;">MATERIAL</div>
            
            
             
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_0</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_0A</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_0B</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_0C</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_1</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_1A</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_1B</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_1C</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_2</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_2A</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_2B</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_2C</div>
  
      </div>
   <?php
if ($fooMAT != 0){//comprobamos que exista mas de 1 registro en la consulta.
foreach ($fooMAT as $elemento)://repetimos todas las filas de los registros existentes para que se vean en el formulario
  ?>
        
 <div  id="contenido_inicial" style = "display: table; width: 1970px;"><!-- caja div con el contenido inicial de la consulta sql de la tabla TIPO_I_O -->
   
<div  id ="<?php echo $elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 30px;"> 
            <?php echo $elemento['ID'];?>
 </div>
     <div  id ="<?php echo $elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 80px;">
            <?php echo $elemento['NOMBRE_PROYECTO'];?>
    </div> 
     
     <div  id ="<?php echo $elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 70px;">       
            <?php echo $elemento['NOMBRE_PEDIDO'];?>
        </div>
     
     <div  id ="<?php echo $elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 190px;">       
            <?php echo $elemento['ISOMETRICO_NOMBRE'];?>
        </div>
    
     <div  id ="<?php echo $elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 90px;">       
            <?php echo $elemento['FAMILIA'];?>
        </div>
        <div  id ="<?php echo $elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 100px;">
            <?php echo $elemento['CODIGO_L_CONCATENADO'];?>
        </div>  
     
     
     <div  id ="<?php echo "MTO_REV_0_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_0'];?>
     </div> 
    <div  id ="<?php echo "MTO_REV_0A_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_0A'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_0B_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_0B'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_0C_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;" ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_0C'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_1_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;" ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_1'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_1A_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;" ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_1A'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_1B_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;" ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_1B'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_1C_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_1C'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_2_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_2'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_2A_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_2A'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_2B_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_2B'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_2C_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;" ondblclick="editar_material(this.id)">
            <?php echo $elemento['MTO_REV_2C'];?>
     </div> 
     <div   style = "float: left; height: 20px; width: 20px;">
     <img id ="<?php echo $elemento['ID'];?>" class="borrar" src="test.jpg" style="width: 100%; height: 100%;" onclick="eliminar_material(this.id)"/><!-- imagen borrar que captura el id al pulsar sobre la imagen, y ejecuta la funcion eliminar localizacion -->
     
     </div>  
     
  </div>      
        
<?php 
        endforeach; //FIN DEL BUCLE FOREACH
}

$conex->CloseConexion();//cerramos la conexion a la BBDD, a t
     ?> 
  
        <?php         
   //}
        ob_end_flush();//cerramos el buffer de salida.
?>
    </body>
</html>



  
    </body>
</html>


