<?php
    session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
/*if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{ */   
        require("conexion.php");//requerimos la clase conexion.
        
          $conex = new conexion();
          
        //$caja1 = $_POST['caja1'];//guardamos el valor del campo nombre en una variable recibida a través del metodo post.
        //$caja2 = $_POST['caja2'];//guardamos el valor del campo descripcion en una variable recibida a través del metodo post.
        //$caja3 = $_POST['caja3'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
         
          
        $caja4Cantidad = $_POST['caja4Cantidad'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        $ISOMETRICONOMBRE = $_POST['caja5Isometrico'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        //$caja6CodigoLconcatenado = $_POST['caja6CodigoLconcatenado'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        $id_celda = $_POST['caja7_id_registro_bbdd'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        $cajaRevisionValor = $_POST['cajaRevisionValor'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        $PEDIDOid = $_POST['PEDIDOSid'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        $PROYECTOid = $_POST['PROYECTOid'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        //echo "cantidad " . $caja4Cantidad;
        
        $FECHA = "28/07/2017 00:00:00";
        
        //$conex->insertar_registro_importacion($caja5Isometrico,$PEDIDOSid,$FECHA,$caja7_id_registro_bbdd,$caja4Cantidad,$cajaRevisionValor,$tabla);//llamamos al método insertar_registros3, que utiliza 4 parametros para guardar un nuevo registro.

           
     
    $valor_ID1= $ISOMETRICONOMBRE;
    $valor_ID2=(INT)$PEDIDOid;
    $valor_ID3=$FECHA;
    $valor_ID4=(INT)$id_celda;
    
    
    //valores ficticios
            $valor_ID5=0;
            $valor_ID5N=0;
            $valor_ID6=0;
            $valor_ID6N=0;
            $valor_ID7=0;
            $valor_ID7N=0;
            $valor_ID8=0;
            $valor_ID8N=0;
            $valor_ID9=0;
            $valor_ID9N=0;
            $valor_ID10=0;
            $valor_ID10N=0;
            $valor_ID11=0;
            $valor_ID11N=0;
            $valor_ID12=0;
            $valor_ID12N=0;
            $valor_ID13=0;
            $valor_ID13N=0;
            $valor_ID14=0;
            $valor_ID14N=0;
            $valor_ID15=0;
            $valor_ID15N=0;
            $valor_ID16=0;
            $valor_ID16N=0;
    
    if ($cajaRevisionValor == "0"){
        $valor_ID5=$caja4Cantidad; 
        $valor_ID5N=$caja4Cantidad;
    }else if ($cajaRevisionValor == "0A"){
        $valor_ID6=$caja4Cantidad;
        $valor_ID6N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "0B"){
        $valor_ID7=$caja4Cantidad;
        $valor_ID7N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "0C"){
        $valor_ID8=$caja4Cantidad;
        $valor_ID8N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "1"){
        $valor_ID9=$caja4Cantidad;
        $valor_ID9N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "1A"){
        $valor_ID10=$caja4Cantidad;
        $valor_ID10N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "1B"){
        $valor_ID11=$caja4Cantidad;
        $valor_ID11N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "1C"){
        $valor_ID12=$caja4Cantidad;
        $valor_ID12N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "2"){
        $valor_ID13=$caja4Cantidad;
        $valor_ID13N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "2A"){
        $valor_ID14=$caja4Cantidad;
        $valor_ID14N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "2B"){
        $valor_ID15=$caja4Cantidad;
        $valor_ID15N=$caja4Cantidad;
    } else if ($cajaRevisionValor == "2C"){
        $valor_ID16=$caja4Cantidad;
        $valor_ID16N=$caja4Cantidad;
    } 
    
     
    $valor=0;
    $CONT=0;
    $valorMTO_REV_0=0;
    $valorMTO_REV_0A=0;
    $valorMTO_REV_0B=0;
    $valorMTO_REV_0C=0;
    
    
    $valorMTO_REV_1=0;
    $valorMTO_REV_1A=0;
    $valorMTO_REV_1B=0;
    $valorMTO_REV_1C=0;
    
    $valorMTO_REV_2=0;
    $valorMTO_REV_2A=0;
    $valorMTO_REV_2B=0;
    $valorMTO_REV_2C=0;
    $valorIsoRegistro="";
    $valorIsoRegistronNOMBRE="";
    $tabla="material_pedidos_temp";//guardamos el nombre de la tabla en una variable.
    
  
   //echo $id_celda; 
   $TABLAL="material_pedidos_temp";
   $CAMPO= "MATERIAL_ID";
   
$sql="SELECT * FROM material_pedidos_temp where MATERIAL_ID =$valor_ID4 AND PEDIDO_ID = $valor_ID2 ";

   $FooAveriguaCodigoID=$conex->get_consulta($sql);
   //$FooAveriguaCodigoID=$conex->get_consulta_Cod_L($id_celda,$valor_ID2,$TABLAL,$CAMPO);
    
    //var_dump($FooAveriguaCodigoID);
   
  
foreach ($FooAveriguaCodigoID as $elemento){
    
    $valor=(INT)$elemento['MATERIAL_ID'];
    
    $valorMTO_REV_0=(INT)$elemento['MTO_REV_0'];
    $valorMTO_REV_0A=(INT)$elemento['MTO_REV_0A'];
    $valorMTO_REV_0B=(INT)$elemento['MTO_REV_0B'];
    $valorMTO_REV_0C=(INT)$elemento['MTO_REV_0C'];
    
    
    $valorMTO_REV_1=(INT)$elemento['MTO_REV_1'];
    $valorMTO_REV_1A=(INT)$elemento['MTO_REV_1A'];
    $valorMTO_REV_1B=(INT)$elemento['MTO_REV_1B'];
    $valorMTO_REV_1C=(INT)$elemento['MTO_REV_1C'];
    
    $valorMTO_REV_2=(INT)$elemento['MTO_REV_2'];
    $valorMTO_REV_2A=(INT)$elemento['MTO_REV_2A'];
    $valorMTO_REV_2B=(INT)$elemento['MTO_REV_2B'];
    $valorMTO_REV_2C=(INT)$elemento['MTO_REV_2C'];
    
    $valorIsoRegistronNOMBRE=$elemento['ISOMETRICO_NOMBRE'];
    $valorIsoRegistronPEDIDO=$elemento['PEDIDO_ID'];
    



     
   if ($valor == $id_celda  && $valorIsoRegistronNOMBRE == $ISOMETRICONOMBRE && $valorIsoRegistronPEDIDO==$valor_ID2 ){
       
       
       $valor_ID1=$ISOMETRICONOMBRE;
       $valor_ID2=$PEDIDOid;
       $valor_ID3=$FECHA;
       $valor_ID4=(INT)$id_celda;
       
       
      $valor_ID5=$valor_ID5 + $valorMTO_REV_0;
      
      $valor_ID6=$valor_ID6 + $valorMTO_REV_0A;
      $valor_ID7=$valor_ID7 + $valorMTO_REV_0B;
      $valor_ID8=$valor_ID8 + $valorMTO_REV_0C;

      $valor_ID9=$valor_ID9 + $valorMTO_REV_1;
      $valor_ID10=$valor_ID10 + $valorMTO_REV_1A;
      $valor_ID11=$valor_ID11 + $valorMTO_REV_1B;
      $valor_ID12=$valor_ID12 + $valorMTO_REV_1C;

      $valor_ID13=$valor_ID13 + $valorMTO_REV_2;
      $valor_ID14=$valor_ID14 + $valorMTO_REV_2A;
      $valor_ID15=$valor_ID15 + $valorMTO_REV_2B;
      $valor_ID16=$valor_ID16 + $valorMTO_REV_2C;
    //echo "el registro NO existe";
   $conex->update_registro_importacion($valor_ID1,$valor_ID2,$valor_ID3,$valor_ID4,$valor_ID5,$valor_ID6,$valor_ID7,$valor_ID8,$valor_ID9,$valor_ID10,$valor_ID11,$valor_ID12,$valor_ID13,$valor_ID14,$valor_ID15,$valor_ID16,$tabla);
   $CONT=1;
   /*echo "VALOR ".$valor;
echo "VALOR ".$id_celda;
echo "</br>";
echo "REGISTRONOMBRE ".$valorIsoRegistronNOMBRE;
  
echo "ISO ".$ISOMETRICONOMBRE; 
echo "</br>";
echo "REGISTROPEdIDO ".$valorIsoRegistronPEDIDO;
echo "pedido ".$PEDIDOid;*/



}
}
//-----------------------------------------------------------------------------------------------------------------------------------------------------
if ($valor != $id_celda  || $valorIsoRegistronNOMBRE != $ISOMETRICONOMBRE  && $CONT!= 1){
    
 $conex->insertar_registro_importacion($valor_ID1, $valor_ID2, $valor_ID3, $valor_ID4, $valor_ID5N, $valor_ID6N, $valor_ID7N,$valor_ID8N,$valor_ID9N,$valor_ID10N,$valor_ID11N,$valor_ID12N,$valor_ID13N,$valor_ID14N,$valor_ID15N,$valor_ID16N,$tabla);
     
}
//----------------------------------
    
        
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

$conex->CloseConexion();//cerramos la conexion a la BBDD, a traves del metodo closeconexion de la clase conexion.

               
   //}
?>
    </body>
</html>


