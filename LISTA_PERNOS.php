<?php
/*session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{*/
    require("conexion.php"); //solicitamos el archivo conexion.php   
        
?>     
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
       
        <?php 
        //$valor = $_POST['unidad_id'];
        //$valor = $_POST['nombre_valor'];
 
        $conex = new conexion();
        $sqlPERNOS = "SELECT * FROM PERNOS";
        

        $sqlPERNOSRESULTSET=$conex->get_consulta($sqlPERNOS);
        

        ?> 

    <div id="contenido_cabecera "style = "display: table; width: 1360px;"> 
        
            
            <div  class="eldiv" style = "float: left; height: 30px; width: 50px;">PERNOS_ID</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 60px;">FAMILIA</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 100px;">SUBFAMILIA</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 130px;">DIAMETRO_MAYOR</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 90px;">SCH_MAYOR</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 130px;">DIAMETRO_MENOR</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 100px;">SCH_MENOR</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 100px;">LONGITUD</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 100px;">CODIGO_L</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 150px;">CODIGO_L_CONCATENADO</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 200px;">DESCRIPCION</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 150px;">CODIGO_CARTAGENA</div>
            
      </div>
<?php
if ($sqlPERNOSRESULTSET != 0){
foreach ($sqlPERNOSRESULTSET as $elemento)://repetimos todas las filas de los registros existentes para que se vean en el formulario
  ?>   
   <div  id="contenido_inicial" style = "display: table; width: 1400px;">
   
     <div id ="<?php echo $elemento['PERNO_ID'];?>"  class="eldiv" style = "float: left; height: 20px; width: 50px;" oncontextmenu="return showContextMenuInst(event,this.id);"> 
            <?php echo $elemento['PERNO_ID'];?>
     </div>
       
    <div   id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 60px;" oncontextmenu="return showContextMenuInst(event,this.id);">        
            <?php echo $elemento['FAMILIA'];?>
    </div>
         
    <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 100px;" oncontextmenu="return showContextMenuInst(event,this.id);">
            <?php echo $elemento['SUBFAMILIA'];?>
    </div>
       
       <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 130px;" oncontextmenu="return showContextMenuInst(event,this.id);">
            <?php echo $elemento['DIAMETRO_MAYOR'];?>
    </div>
     
    <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 90px;" oncontextmenu="return showContextMenuInst(event,this.id);">
            <?php echo $elemento['SCH_MAYOR'];?>
    </div>
       
    <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 130px;" oncontextmenu="return showContextMenuInst(event,this.id);">
            <?php echo $elemento['DIAMETRO_MENOR'];?>
    </div> 
       
    <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 100px;" oncontextmenu="return showContextMenuInst(event,this.id);">
            <?php echo $elemento['SCH_MENOR'];?>
    </div>   
    
    <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 100px;"oncontextmenu="return showContextMenuInst(event,this.id);" >
            <?php echo $elemento['LONGITUD'];?>
    </div> 
     
       <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 100px;"oncontextmenu="return showContextMenuInst(event,this.id);">
            <?php echo $elemento['CODIGO_L'];?>
    </div> 
       
       <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 150px;" oncontextmenu="return showContextMenuInst(event,this.id);">
            <?php echo $elemento['CODIGO_L_CONCATENADO'];?>
    </div> 
       
       <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 200px;" oncontextmenu="return showContextMenuInst(event,this.id);">
            <?php echo $elemento['DESCRIPCION'];?>
    </div> 
       
       <div  id ="<?php echo $elemento['PERNO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 150px;" oncontextmenu="return showContextMenuInst(event,this.id);">
            <?php echo $elemento['CODIGO_CARTAGENA'];?>
    </div> 
       
 
     <div   style = "float: left; height: 20px; width: 20px;">
     <img id ="<?php echo $elemento['PERNO_ID'];?>" class="borrar" src="test.jpg" style="width: 100%; height: 100%;" onclick="eliminar_instrumento(this.id)"/>
     </div>
     <div   style = "float: left; height: 20px; width: 20px;">
         <img id ="<?php echo $elemento['PERNO_ID'];?>" class="borrar" src="icono-menu.png" style="width: 100%; height: 100%;" onclick="editar_instrumento(this.id)"/>
     </div> 
   </div>  

<?php 
        endforeach;
}

$conex->CloseConexion();//cerramos la conexion.
     ?>    
 <?php         
   //}
?>
    </body>
</html>