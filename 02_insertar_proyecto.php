<?php
    session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
/*if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{ */   
        require("conexion.php");//requerimos la clase conexion.
        
  
        $valor_NOM = $_POST['NOMBRE_PROYECTO'];//guardamos el valor del campo nombre en una variable recibida a través del metodo post.
        $valor_DESC = $_POST['PROYECTO_DESC'];//guardamos el valor del campo descripcion en una variable recibida a través del metodo post.
        $valor_AREA = $_POST['PROYECTO_AREA'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        $valor_UNIDAD = $_POST['PROYECTO_UNIDAD'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        $valor_HORAS = $_POST['PROYECTO_HORAS'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        
        $tabla="PROYECTOS";//guardamos el nombre de la tabla en una variable.
        
       
 
        $conex = new conexion();//creamos una instancia de la clase conexion.
        $conex->insertar_registro_proyectos($valor_NOM,$valor_DESC,$valor_AREA,$valor_UNIDAD,$valor_HORAS,$tabla);//llamamos al método insertar_registros3, que utiliza 4 parametros para guardar un nuevo registro.
        
  
        $sqlPROY = "SELECT * FROM $tabla";//sentencia sql que lee todo los registros de la tabla.
        $fooPROY=$conex->get_consulta($sqlPROY);//ejecutamos el metodo get_consulta , utilizando la sentencia $SQL y el resultset lo guardamos en la variable.

        
     ?> 
     <html>
    <head>
        <meta charset="UTF-8"><!--Agregamos el tipo de codificacion de caracteres de la web.-->
        <title>01_insertar_TIPO_I_O.php</title><!--Agregamos un título a la web-->
        <link rel="stylesheet" type="text/css" href="hoja.css"><!--Agregamos una hoja de estilos externa a la página.-->
    </head>
    <body> 
   <?php
if ($fooPROY != 0){//comprobamos que exista mas de 1 registro en la consulta.
foreach ($fooPROY as $elemento)://repetimos todas las filas de los registros existentes para que se vean en el formulario
  ?>
 <div  id="contenido_inicial" style = "display: table; width: 1520px;"><!-- caja div con el contenido inicial de la consulta sql de la tabla TIPO_I_O -->
   
<div  id ="<?php echo $elemento['PROYECTO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 250px;"> 
            <?php echo $elemento['PROYECTO_ID'];?>
 </div>
    <div  id ="<?php echo $elemento['PROYECTO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 250px;">       
            <?php echo $elemento['NOMBRE_PROYECTO'];?>
        </div>
        <div  id ="<?php echo $elemento['PROYECTO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 250px;">
            <?php echo $elemento['DESCRIPCION'];?>
          </div>  
     
    <div  id ="<?php echo $elemento['PROYECTO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 250px;">
            <?php echo $elemento['AREA'];?>
          </div> 
     <div  id ="<?php echo $elemento['PROYECTO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 250px;">
            <?php echo $elemento['UNIDAD'];?>
          </div> 
     <div  id ="<?php echo $elemento['PROYECTO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 250px;">
            <?php echo $elemento['HORAS_ASIGNADAS'];?>
          </div> 
     
     <div   style = "float: left; height: 20px; width: 20px;">
     <img id ="<?php echo $elemento['PROYECTO_ID'];?>" class="borrar" src="test.jpg" style="width: 100%; height: 100%;" onclick="eliminar_proyecto(this.id)"/><!-- imagen borrar que captura el id al pulsar sobre la imagen, y ejecuta la funcion eliminar localizacion -->
     
     </div>  
<?php 
        endforeach; //FIN DEL BUCLE FOREACH
}

$conex->CloseConexion();//cerramos la conexion a la BBDD, a traves del metodo closeconexion de la clase conexion.
     ?> 
       
    
        <SPAN>NOMBRE</SPAN> 
          <input type="text" name="NOMBRE_PROYECTO" id="NOMBRE_PROYECTO">
          
          <SPAN>DESCRIPCION</SPAN> 
          <input type="text" name="PROYECTO_DESC" id="PROYECTO_DESC">
          
          <SPAN>AREA</SPAN> 
          <input type="text" name="PROYECTO_AREA" id="PROYECTO_AREA">
          
          <SPAN>UNIDAD</SPAN> 
          <input type="text" name="PROYECTO_UNIDAD" id="PROYECTO_UNIDAD">
          
          <SPAN>HORAS ASIGNADAS</SPAN> 
          <input type="text" name="PROYECTO_HORAS" id="PROYECTO_HORAS">

          <br>
   <input type="button" value="NUEVO" onclick="alta_proyecto();"/>  
  
   </div>
  <script> 
       /* window.onunload = abrirVentanainstrumentos;//al cerrar la ventana actual, mostramos la funcion abriventanainstrumentos.
        function abrirVentanainstrumentos(){//funcion que abre en una nueva ventana la pagina propiedades_instrumento.php.
        
        
       opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=500,height=350,top=500,left=650";//aplicamos opciones a la ventana nueva.
       window.open("propiedades_instrumento.php","",opciones); //especificamos la pagina que vamos a abrir, y sus atributos a traves de la variable "opciones".
        
        }*/
        
      
          
        </script>
        <?php         
   //}
?>
    </body>
</html>


