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
        <title>ASIGNAR MATERIAL</title>
        <link rel="stylesheet" href="estilo2.css">
        <link rel="stylesheet" href="hoja.css">
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="bootstrap/intro/css/bootstrap.min.css">
    </head>
<?php

    require("conexion.php");    
        
?> 
<body>
    
    <?php 
    
 
    $PEDIDOid = $_POST['PEDIDOid'];//guardamos el valor del campo descripcion en una variable recibida a través del metodo post.
    $PROYECTOid = $_POST['PROYECTOid'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
    
    $conex = new conexion();
    //variable id material.
  
  $sqlMAT = "select material_pedidos_temp.ID,PROYECTOS.NOMBRE_PROYECTO,PEDIDOS.NOMBRE_PEDIDO,ISOMETRICO_NOMBRE,bbdd_total.FAMILIA,bbdd_total.subfamilia,bbdd_total.CODIGO_L_CONCATENADO,sum(MTO_REV_0) AS REV_0,sum(MTO_REV_0A) AS REV_0A,SUM(MTO_REV_0B) AS REV_0B,SUM(MTO_REV_0C) AS REV_0C,(sum(MTO_REV_0)+sum(MTO_REV_0A)+SUM(MTO_REV_0B)+SUM(MTO_REV_0C)) AS REV0_TOTAL,sum(MTO_REV_1) AS REV_1,sum(MTO_REV_1A) AS REV_1A,SUM(MTO_REV_1B) AS REV_1B,SUM(MTO_REV_1C) AS REV_1C,(sum(MTO_REV_1)+sum(MTO_REV_1A)+SUM(MTO_REV_1B)+SUM(MTO_REV_1C)) AS REV1_TOTAL,sum(MTO_REV_2) AS REV_2,sum(MTO_REV_2A) AS REV_2A,SUM(MTO_REV_2B) AS REV_2B,SUM(MTO_REV_2C) AS REV_2C,(sum(MTO_REV_2)+sum(MTO_REV_2A)+SUM(MTO_REV_2B)+SUM(MTO_REV_2C)) AS REV2_TOTAL from material_pedidos_temp,bbdd_total,PEDIDOS,PROYECTOS where bbdd_total.id = material_pedidos_temp.MATERIAL_ID AND material_pedidos_temp.PEDIDO_ID = PEDIDOS.PEDIDO_ID AND PEDIDOS.PROYECTO_ID = PROYECTOS.PROYECTO_ID AND material_pedidos_temp.PEDIDO_ID = $PEDIDOid AND  PEDIDOS.PROYECTO_ID = $PROYECTOid group by material_id ORDER BY material_pedidos_temp.ID";
  $fooMAT=$conex->get_consulta($sqlMAT);//ejecutamos el metodo get_consulta , utilizando la sentencia $SQL y el resultset lo guardamos en la variable.  */     
           
     ?> 
     <html>
    <head>
        <meta charset="UTF-8"><!--Agregamos el tipo de codificacion de caracteres de la web.-->
        <title>11_Motrar_Material_por_pedido.php</title><!--Agregamos un título a la web-->
        
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
            <div  class="eldiv" style = "float: left; height: 30px; width: 80px;">R_0_TOTAL</div>
            
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_1</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_1A</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_1B</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_1C</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 80px;">R_1_TOTAL</div>
            
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_2</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_2A</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_2B</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 40px;">R_2C</div>
            <div  class="eldiv" style = "float: left; height: 30px; width: 80px;">R_2_TOTAL</div>
  
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
     
     
     <div  id ="<?php echo "MTO_REV_0_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  >
            <?php echo $elemento['REV_0'];?>
     </div> 
    <div  id ="<?php echo "MTO_REV_0A_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  >
            <?php echo $elemento['REV_0A'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_0B_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  >
            <?php echo $elemento['REV_0B'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_0C_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;" >
            <?php echo $elemento['REV_0C'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_0_TOTAL_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 80px;" >
            <?php echo $elemento['REV0_TOTAL'];?>
     </div> 
     
     <div  id ="<?php echo "MTO_REV_1_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;" >
            <?php echo $elemento['REV_1'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_1A_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;" >
            <?php echo $elemento['REV_1A'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_1B_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;" >
            <?php echo $elemento['REV_1B'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_1C_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  >
            <?php echo $elemento['REV_1C'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_1_TOTAL_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 80px;" >
            <?php echo $elemento['REV1_TOTAL'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_2_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  >
            <?php echo $elemento['REV_2'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_2A_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  >
            <?php echo $elemento['REV_2A'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_2B_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;"  >
            <?php echo $elemento['REV_2B'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_2C_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 40px;">
            <?php echo $elemento['REV_2C'];?>
     </div> 
     <div  id ="<?php echo "MTO_REV_2_TOTAL_ID".$elemento['ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 80px;" >
            <?php echo $elemento['REV2_TOTAL'];?>
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


