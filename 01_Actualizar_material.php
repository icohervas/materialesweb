<?php
ob_start();//ejecutamos el buffer de salida, para evitar el error de envio de informacion de cabecera, la cabecera se envia una vez que se ha procesado todo el codigo, ya que usamos sesiones
session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
/*if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{*/
?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar MATERIAL</title>
        
    </head>
<?php

    require("conexion.php");    
        
?> 
<body>
    
    <?php 
    $conex = new conexion();
    //variable id material.
    
    
    $id_celda = $_POST['idcelda'];
    $idnum = $_POST['numid'];
    $valorcampotexto= $_POST['valorcampotexto'];
    $patron= $_POST['patron'];
    
    $tabla="material_pedidos_temp";//guardamos el nombre de la tabla en una variable.
    
    

if ($patron == "ISOMETRICO_NOMBRE_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_isometrico($valorcampotexto, $idnum, $tabla); 
}


 } 
 
 if ($patron == "MTO_REV_0_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_0($valorcampotexto, $idnum, $tabla); 
}


 } 
 
 if ($patron == "MTO_REV_0A_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_0A($valorcampotexto, $idnum, $tabla); 
}


 } 
 
 if ($patron == "MTO_REV_0B_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_0B($valorcampotexto, $idnum, $tabla); 
}


 } 
 
if ($patron == "MTO_REV_0C_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_0C($valorcampotexto, $idnum, $tabla); 
}


 }
 
 if ($patron == "MTO_REV_1_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_1($valorcampotexto, $idnum, $tabla); 
}


 } 
 
if ($patron == "MTO_REV_1A_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_1A($valorcampotexto, $idnum, $tabla); 
}


 } 
  if ($patron == "MTO_REV_1B_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_1B($valorcampotexto, $idnum, $tabla); 
}


 }   
 
 if ($patron == "MTO_REV_1C_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_1C($valorcampotexto, $idnum, $tabla); 
}


 } 
 if ($patron == "MTO_REV_2_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_2($valorcampotexto, $idnum, $tabla); 
}


 } 
 
 if ($patron == "MTO_REV_2A_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_2A($valorcampotexto, $idnum, $tabla); 
}


 } 
 
 if ($patron == "MTO_REV_2B_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_2B($valorcampotexto, $idnum, $tabla); 
}


 } 
 
 if ($patron == "MTO_REV_2C_ID"){
    
$resultado = strpos($id_celda, $patron);
 
if($resultado !== FALSE){
    //echo "La subcadena '$patron' fue encontrada dentro de la cadena '$id_celda' en la posición: '$resultado'";
    $conex->update_registro_mto_rev_2C($valorcampotexto, $idnum, $tabla); 
}


 } 
 
//-----------------------------------------------------------------------------------------------------------------------------------------------------

   //echo "el registro ya existe";
 
 $sql="SELECT material_pedidos_temp.ID,pedidos.PEDIDO_ID,pedidos.PROYECTO_ID FROM material_pedidos_temp,pedidos,proyectos "
         . "WHERE material_pedidos_temp.ID = $idnum and material_pedidos_temp.PEDIDO_ID = pedidos.PEDIDO_ID and pedidos.PROYECTO_ID = proyectos.PROYECTO_ID";

   $FooAveriguaCodigoID=$conex->get_consulta($sql);
    
    //var_dump($FooAveriguaCodigoID);
   
  foreach ($FooAveriguaCodigoID as $elemento){
       $PROYECTO=$elemento['PROYECTO_ID'];
       $PEDIDO=$elemento['PEDIDO_ID'];
  }
 
   
    
//----------------------------------
    
        
  $tabla = "MATERIAL_PEDIDOS_TEMP";
    
        
  $sqlMAT = "SELECT DISTINCT MATERIAL_PEDIDOS_TEMP.ISOMETRICO_NOMBRE,MATERIAL_PEDIDOS_TEMP.MTO_REV_0,MATERIAL_PEDIDOS_TEMP.MTO_REV_0A,MATERIAL_PEDIDOS_TEMP.MTO_REV_0B,MATERIAL_PEDIDOS_TEMP.MTO_REV_0C,MATERIAL_PEDIDOS_TEMP.MTO_REV_1,MATERIAL_PEDIDOS_TEMP.MTO_REV_1A,MATERIAL_PEDIDOS_TEMP.MTO_REV_1B,MATERIAL_PEDIDOS_TEMP.MTO_REV_1C,MATERIAL_PEDIDOS_TEMP.MTO_REV_2,MATERIAL_PEDIDOS_TEMP.MTO_REV_2A,MATERIAL_PEDIDOS_TEMP.MTO_REV_2B,MATERIAL_PEDIDOS_TEMP.MTO_REV_2C,MATERIAL_PEDIDOS_TEMP.ID,BBDD_TOTAL.CODIGO_L_CONCATENADO,BBDD_TOTAL.FAMILIA,MATERIAL_PEDIDOS_TEMP.MATERIAL_ID,PEDIDOS.NOMBRE_PEDIDO,MATERIAL_PEDIDOS_TEMP.MATERIAL_ID,PROYECTOS.NOMBRE_PROYECTO FROM MATERIAL_PEDIDOS_TEMP,PEDIDOS,PROYECTOS,BBDD_TOTAL
WHERE MATERIAL_PEDIDOS_TEMP.PEDIDO_ID = $PEDIDO AND PEDIDOS.PEDIDO_ID = $PEDIDO AND PEDIDOS.PROYECTO_ID = $PROYECTO AND PROYECTOS.PROYECTO_ID = PEDIDOS.PROYECTO_ID AND BBDD_TOTAL.ID = MATERIAL_PEDIDOS_TEMP.MATERIAL_ID";//sentencia sql que lee todo los registros de la tabla.
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

$conex->CloseConexion();//cerramos la conexion a la BBDD, a traves del metodo closeconexion de la clase conexion.
  
             
   //}
        ob_end_flush();//cerramos el buffer de salida.
?>
    </body>
</html>


