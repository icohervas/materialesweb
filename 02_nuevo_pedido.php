<?php
session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
/*if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{*/
    require("conexion.php");   //requerimos la clase conexion. 
        
?>    
<html>
    <head>
        <meta charset="UTF-8"><!--Agregamos el tipo de codificacion de caracteres de la web.-->
        <title>02_nuevo_pedido.php</title><!--Agregamos un título a la web-->
        <link rel="stylesheet" type="text/css" href="hoja.css"><!--Agregamos una hoja de estilos externa a la página.-->
    </head>
    <body>
       
        <?php 

        
       $proyecto_id = $_POST['proyecto_id'];//guardamos el valor del campo descripcion en una variable recibida a través del metodo post.
       $usuario_id = $_POST['usuario_id'];//guardamos el valor del campo valor cs en una variable recibida a través del metodo post.
        
     

        $conex = new conexion();//creamos una nueva instancia de la clase conexion.
        $sqlPED = "SELECT * FROM PEDIDOS";//creamos una nueva consulta sql, para obtener todos los registros de la tabla.
        $fooPED=$conex->get_consulta($sqlPED);//llamamos a la funcion get_consulta de la clase conexion para obtener un resultset con todos los registros de la tabla.

        
     ?> 
        
        
      <div id="contenido_cabecera "style = "display: table; width: 1000px;">  <!-- caja div con el contenido de la cabecera de la tabla TIPO_I_O -->
         
            <div  class="eldiv" style = "float: left; height: 30px; width: 150px;">PEDIDO_ID</div>
            <div class="eldiv" style = "float: left; height: 30px; width: 150px;">NOMBRE PEDIDO</div>
            <div class="eldiv" style = "float: left; height: 30px; width: 150px;">USUARIO </div>
            <div class="eldiv" style = "float: left; height: 30px; width: 150px;">PROYECTO</div>
           
         
      </div>
<div  id="contenido_pedidos" style = "display: table; width: 1500px;"><!-- caja div con el contenido de la consulta ajax nativo de la tabla TIPO_I_O -->
            
            
            
</div>
        

   
     
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
          <input type="text" name="id_PROYECTO" id="id_PROYECTO" value="<?php echo $proyecto_id ?>"> 
          <SPAN>USUARIO</SPAN> 
          <input type="text" name="id_USUARIO" id="id_USUARIO" value="<?php echo $usuario_id ?>">
          
         
         

          <br>
   <input type="button" value="NUEVO" onclick="alta_pedido();"/>  
  
   </div>
           
   <script>
       
       
            
            var RESULTADO_pedidos = document.getElementById("contenido_pedidos");//guardamos en resultado el nodo div con id info
            var RESULTADO_INICIAL = document.getElementById("contenido_inicial");//guardamos en resultado el nodo div con id info
           
            function INSERTAR_PEDIDO(NOMBRE_PEDIDO,id_USUARIO,id_PROYECTO,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");//objeto xmlhttp para navegadores modernos.
                }
   
               var nuevoValor1=NOMBRE_PEDIDO;//guardamos el nombre en una variable.
               var nuevoValor2=id_USUARIO;//guardamos la descripcion en una variable.
               var nuevoValor3=id_PROYECTO//guardamos el tag cs en una variable.
               
               
               
              
               var informacionDelUsuario = "NOMBRE_PEDIDO=" + nuevoValor1 + "&id_USUARIO=" + nuevoValor2 + "&id_PROYECTO=" + nuevoValor3;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                     
                      
                         document.getElementById('contenido_inicial').style.display='none';
                        RESULTADO_pedidos.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
         
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
            //-----------------------------------------------------------------------------------------------
            
            function enviar_eliminar_pedido(idfila,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");//objeto xmlhttp para navegadores modernos.
                }
                
       
               var nuevoValor=idfila;//guardamos el valor del id en la variable nuevo valor.
               
               var informacionDelUsuario = "idfila=" + nuevoValor;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                        //resultadoCabecera.innerHTML="";
                        
                        document.getElementById('contenido_inicial').style.display='none';
                       
                        RESULTADO_pedidos.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                        //alert(mensaje);    
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
        
            //----------------------------------------------------------------------------------------------*
            
   
        function alta_pedido()//funcion que inserta un nuevo registro en la tabla TIPO_I_O
        {
 
            var NOMBRE_PEDIDO =document.getElementById("NOMBRE_PEDIDO").value;//capturamos el valor de la caja de texto TIPO_I_O_NOMBRE y lo guardamos en una variable.
            var id_PROYECTO =document.getElementById("id_PROYECTO").value;//capturamos el valor de la caja de texto TIPO_I_O_NOMBRE y lo guardamos en una variable.
            var id_USUARIO =document.getElementById("id_USUARIO").value;//capturamos el valor de la caja de texto TIPO_I_O_NOMBRE y lo guardamos en una variable.
            
            
            var paginaPhp = "02_insertar_pedido.php";//guardamos la pagina 01_insertar_TIPO_I_O.php en una variable.
          

          INSERTAR_PEDIDO(NOMBRE_PEDIDO,id_USUARIO,id_PROYECTO,paginaPhp);//insertamos un nuevo registro utilianzo ajax nativo y el metodo post.

        }
        
        function eliminar_pedido(idfila){//funcion que elimina un registro de la tabla TIPO_I_O, utilizando su id recibido por parámetro.
            
            //CAPTURAR EL VALOR DE LA CELDA PINCHADA
 
            
            var paginaPhp="01_eliminar_pedido.php";//guardamos la pagina que vamos a enviar por ajax en una variable.
            enviar_eliminar_pedido(idfila,paginaPhp);//funcion que elimina un registro utilizando ajax nativo y el metodo post.
   
          
      }
        
     
        </script> 
      <?php         
   //}
?>
    </body>
    
    
</html>