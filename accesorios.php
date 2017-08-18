<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            
       table{
           width : 50% ;
           padding: 0px;
           border:1px dotted crimson;
           border-collapse: collapse;
           align-content: center;
           margin: auto;
              
              
       } 
       
       td{
          width: 20%;
          border:1px dotted crimson;
          text-align: left;
          
           
       }
            
        </style>
    </head>
    <body>
        <?php
        
        //guardamos en la variable $telefono el contenido del campo telefono con el metodo post.
       
             
        require("conexion.php");
        $RegistrosAMostrar=50;
        $conex = new conexion();
        $TABLA= "ACCESORIOS";
        //estos valores los recibo por GET
        if(isset($_POST['pag'])){
        $RegistrosAEmpezar=($_POST['pag']-1)*$RegistrosAMostrar;
        $PagAct=$_POST['pag'];
         $busqueda = $_POST['valorBuscado'];
        //caso contrario los iniciamos
        }else{
        $RegistrosAEmpezar=0;
        $PagAct=1;
        $busqueda = $_POST['valorBuscado'];
         
        }
        
        $sql = "SELECT * FROM $TABLA WHERE CODIGO_L_CONCATENADO LIKE '%$busqueda%' OR DESCRIPCION LIKE '%$busqueda%'  LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
        

        $sqlRESULTSET=$conex->get_consulta($sql);
         ?> 
                 

<div id="contenido_cabecera" style = "display: table; width: 1210px;"> 
        
            
            <div  class="eldiv" style = "float: left; height: 20px; width: 30px;">ID</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 60px;">FAMILIA</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 300px;">SUBFAMILIA</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 100px;">D_MAYOR</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 50px;">SCH_MAYOR</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 50px;">D_MENOR</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 50px;">SCH_MENOR</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 50px;">LONG</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 70px;">CODIGO_L</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 100px;">CODIGO_L_CONC</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 200px;">DESCRIPCION</div>
            
            <div class="eldiv" style = "float: left; height: 20px; width: 150px;">CODIGO_CARTAGENA</div>
            
      </div>
<?php
if ($sqlRESULTSET != 0){
foreach ($sqlRESULTSET as $elemento)://repetimos todas las filas de los registros existentes para que se vean en el formulario
  ?>   
   <div  id="contenido_inicial" style = "display: table; width: 1250px;">
   
     <div id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 30px;" oncontextmenu="return showContextMenu(event,this.id);"> 
            <?php echo $elemento['ACCESORIOS_ID'];?>
     </div>
       
    <div   id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 60px;" oncontextmenu="return showContextMenu(event,this.id);">        
            <?php echo $elemento['FAMILIA'];?>
    </div>
         
    <div id="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 300px;" oncontextmenu="return showContextMenu(event,this.id);">
            <?php echo $elemento['SUBFAMILIA'];?>
    </div>
       
       <div  id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 100px;" oncontextmenu="return showContextMenu(event,this.id);">
            <?php echo $elemento['DIAMETRO_MAYOR'];?>
    </div>
     
    <div  id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 50px;" oncontextmenu="return showContextMenu(event,this.id);">
            <?php echo $elemento['SCH_MAYOR'];?>
    </div>
       
    <div  id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 50px;" oncontextmenu="return showContextMenu(event,this.id);">
            <?php echo $elemento['DIAMETRO_MENOR'];?>
    </div> 
       
    <div  id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 50px;" oncontextmenu="return showContextMenu(event,this.id);">
            <?php echo $elemento['SCH_MENOR'];?>
    </div>   
    
    <div  id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 50px;"oncontextmenu="return showContextMenu(event,this.id);" >
            <?php echo $elemento['LONGITUD'];?>
    </div> 
     
       <div  id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 70px;"oncontextmenu="return showContextMenu(event,this.id);">
            <?php echo $elemento['CODIGO_L'];?>
    </div> 
       
       <div  id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 100px;" oncontextmenu="return showContextMenu(event,this.id);">
            <?php echo $elemento['CODIGO_L_CONCATENADO'];?>
    </div> 
       
       <div  id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 200px;" oncontextmenu="return showContextMenu(event,this.id);">
            <?php echo $elemento['DESCRIPCION'];?>
    </div> 
       
       <div  id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 150px;" oncontextmenu="return showContextMenu(event,this.id);">
            <?php echo $elemento['CODIGO_CARTAGENA'];?>
    </div> 
       
 
     <div   style = "float: left; height: 20px; width: 20px;">
     <img id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="borrar" src="test.jpg" style="width: 100%; height: 100%;" onclick="eliminar_valvula(this.id)"/>
     </div>
     <div   style = "float: left; height: 20px; width: 20px;">
         <img id ="<?php echo $elemento['ACCESORIOS_ID'];?>" class="borrar" src="icono-menu.png" style="width: 100%; height: 100%;" onclick="editar_valvula(this.id)"/>
     </div> 
   </div>  

<?php 
        endforeach;
}//******--------determinar las páginas---------******//
//echo $busqueda;

 $sqltotalregistros = "SELECT ACCESORIOS_ID  FROM ACCESORIOS WHERE CODIGO_L_CONCATENADO LIKE '%$busqueda%'";
   
 $NroRegistrosa=$conex->get_consulta($sqltotalregistros);
 
//var_dump($NroRegistros);

//echo count($NroRegistrosa);
 
$NroRegistros = count($NroRegistrosa);
 
//echo $NroRegistros;
 
 $PagAnt=$PagAct-1;
 $PagSig=$PagAct+1;
 $PagUlt=(int)$NroRegistros/$RegistrosAMostrar;

 //verificamos residuo para ver si llevará decimales
 $Res=$NroRegistros%$RegistrosAMostrar;
 // si hay residuo usamos funcion floor para que me
 // devuelva la parte entera, SIN REDONDEAR, y le sumamos
 // una unidad para obtener la ultima pagina
 if($Res>0) {
     $PagUlt=floor($PagUlt)+1;
 }
 //desplazamiento
  echo "<strong>pagina ".$PagAct."/".$PagUlt."</strong>";
 echo "<div class=\"eldiv\" style = \"float: left; height: 20px; width: 150px;\" onclick=\"busqueda_coincidencias('1','accesorios.php')\">Primero</div>";
 if($PagAct>1) echo "<div class=\"eldiv\" style = \"float: left; height: 20px; width: 150px;\" onclick=\"busqueda_coincidencias('$PagAnt','accesorios.php')\">Anterior</div> ";

 if($PagAct<$PagUlt)  echo " <div class=\"eldiv\" style = \"float: left; height: 20px; width: 150px;\" onclick=\"busqueda_coincidencias('$PagSig','accesorios.php')\">Siguiente</div> ";
 echo "<div class=\"eldiv\" style = \"float: left; height: 20px; width: 150px;\" onclick=\"busqueda_coincidencias('$PagUlt','accesorios.php')\">Ultimo</div>";

 
 
$conex->CloseConexion();//cerramos la conexion.
     ?>    
 <?php         
   //}

 
?>
    </body>
</html>
