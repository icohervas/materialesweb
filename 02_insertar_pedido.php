<?php
    session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
/*if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{ */   
        require("conexion.php");//requerimos la clase conexion.
        

        $NOMBRE_PEDIDO = $_POST['NOMBRE_PEDIDO'];//guardamos el valor del campo nombre en una variable recibida a través del metodo post.
        $id_USUARIO = $_POST['id_USUARIO'];//guardamos el valor del campo descripcion en una variable recibida a través del metodo post.
        $id_PROYECTO = $_POST['id_PROYECTO'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
          
        $tabla="PEDIDOS";//guardamos el nombre de la tabla en una variable.
        
       
 
        $conex = new conexion();//creamos una instancia de la clase conexion.
        $conex->insertar_registro_pedidos($NOMBRE_PEDIDO,$id_USUARIO,$id_PROYECTO,$tabla);//llamamos al método insertar_registros3, que utiliza 4 parametros para guardar un nuevo registro.
        
  
        $sqlPED = "SELECT * FROM PEDIDOS";//creamos una nueva consulta sql, para obtener todos los registros de la tabla.
        $fooPED=$conex->get_consulta($sqlPED);//llamamos a la funcion get_consulta de la clase conexion para obtener un resultset con todos los registros de la tabla.

        
     ?> 
     <html>
    <head>
        <meta charset="UTF-8"><!--Agregamos el tipo de codificacion de caracteres de la web.-->
        <title>01_insertar_TIPO_I_O.php</title><!--Agregamos un título a la web-->
        <link rel="stylesheet" type="text/css" href="hoja.css"><!--Agregamos una hoja de estilos externa a la página.-->
    </head>
    <body> 
   <?php
if ($fooPED != 0){//comprobamos que exista mas de 1 registro en la consulta.
foreach ($fooPED as $elemento)://repetimos todas las filas de los registros existentes para que se vean en el formulario
  ?>
 <div  id="contenido_inicial" style = "display: table; width: 1020px;"><!-- caja div con el contenido inicial de la consulta sql de la tabla TIPO_I_O -->
   
<div  id ="<?php echo $elemento['PEDIDO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 150px;"> 
            <?php echo $elemento['PEDIDO_ID'];?>
 </div>
    <div  id ="<?php echo $elemento['PEDIDO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 150px;">       
            <?php echo $elemento['NOMBRE_PEDIDO'];?>
        </div>
        <div  id ="<?php echo $elemento['PEDIDO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 150px;">
            <?php echo $elemento['USUARIO_ID'];?>
          </div>  
     <div  id ="<?php echo $elemento['PEDIDO_ID'];?>" class="eldiv" style = "float: left; height: 20px; width: 150px;">
            <?php echo $elemento['PROYECTO_ID'];?>
          </div>  
    
     
     
     <div   style = "float: left; height: 20px; width: 20px;">
     <img id ="<?php echo $elemento['PEDIDO_ID'];?>" class="borrar" src="test.jpg" style="width: 100%; height: 100%;" onclick="eliminar_pedido(this.id)"/><!-- imagen borrar que captura el id al pulsar sobre la imagen, y ejecuta la funcion eliminar localizacion -->
     
     </div>  
<?php 
        endforeach; //FIN DEL BUCLE FOREACH
}

$conex->CloseConexion();//cerramos la conexion a la BBDD, a traves del metodo closeconexion de la clase conexion.
     ?> 
       
     <br>
        <SPAN>NOMBRE_PEDIDO</SPAN> 
        <input type="text" name="NOMBRE_PEDIDO" id="NOMBRE_PEDIDO" >
         <SPAN>PROYECTO</SPAN> 
          <input type="text" name="id_PROYECTO" id="id_PROYECTO" value="<?php echo $id_PROYECTO;?>"> 
          <SPAN>USUARIO</SPAN> 
          <input type="text" name="id_USUARIO" id="id_USUARIO" value="<?php echo $id_USUARIO;?>">
          
          <br>
   <input type="button" value="NUEVO" onclick="alta_pedido();"/>  
  
   </div>
  <script> 
       
   
        </script>
        <?php         
   //}
?>
    </body>
</html>


