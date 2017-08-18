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
        <title>02_nuevo_proyecto.php</title><!--Agregamos un título a la web-->
        <link rel="stylesheet" type="text/css" href="hoja.css"><!--Agregamos una hoja de estilos externa a la página.-->
    </head>
    <body>
       
        <?php 

        $conex = new conexion();//creamos una nueva instancia de la clase conexion.
        $sqlPROY = "SELECT * FROM PROYECTOS";//creamos una nueva consulta sql, para obtener todos los registros de la tabla.
        $fooPROY=$conex->get_consulta($sqlPROY);//llamamos a la funcion get_consulta de la clase conexion para obtener un resultset con todos los registros de la tabla.

        
     ?> 
      <div id="contenido_cabecera "style = "display: table; width: 1500px;">  <!-- caja div con el contenido de la cabecera de la tabla TIPO_I_O -->
         
            <div  class="eldiv" style = "float: left; height: 30px; width: 250px;">PROYECTO_ID</div>
            <div class="eldiv" style = "float: left; height: 30px; width: 250px;">NOMBRE PROYECTO</div>
            <div class="eldiv" style = "float: left; height: 30px; width: 250px;">DESCRIPCION </div>
            <div class="eldiv" style = "float: left; height: 30px; width: 250px;">AREA</div>
            <div class="eldiv" style = "float: left; height: 30px; width: 250px;">UNIDAD</div>
            <div class="eldiv" style = "float: left; height: 30px; width: 250px;">HORAS ASIGNADAS</div>
         
      </div>
<div  id="contenido_proyectos" style = "display: table; width: 1500px;"><!-- caja div con el contenido de la consulta ajax nativo de la tabla TIPO_I_O -->
            
            
            
</div>
        

   
     
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
            
            var RESULTADO_proyectos = document.getElementById("contenido_proyectos");//guardamos en resultado el nodo div con id info
            var RESULTADO_INICIAL = document.getElementById("contenido_inicial");//guardamos en resultado el nodo div con id info
           
            function INSERTAR_PROYECTO(NOMBRE_PROYECTO,PROYECTO_DESC,PROYECTO_AREA,PROYECTO_UNIDAD,PROYECTO_HORAS,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");//objeto xmlhttp para navegadores modernos.
                }
   
               var nuevoValor1=NOMBRE_PROYECTO;//guardamos el nombre en una variable.
               var nuevoValor2=PROYECTO_DESC;//guardamos la descripcion en una variable.
               var nuevoValor3=PROYECTO_AREA//guardamos el tag cs en una variable.
               var nuevoValor4=PROYECTO_UNIDAD//guardamos el tag cs en una variable.
               var nuevoValor5=PROYECTO_HORAS//guardamos el tag cs en una variable.
               
              
               var informacionDelUsuario = "NOMBRE_PROYECTO=" + nuevoValor1 + "&PROYECTO_DESC=" + nuevoValor2 + "&PROYECTO_AREA=" + nuevoValor3 + "&PROYECTO_UNIDAD=" + nuevoValor4 + "&PROYECTO_HORAS=" + nuevoValor5;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                     
                      
                         document.getElementById('contenido_inicial').style.display='none';
                        RESULTADO_proyectos.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
         
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
            //-----------------------------------------------------------------------------------------------
            
            function enviar_eliminar_proyecto(idfila,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
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
                       
                        RESULTADO_proyectos.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                        //alert(mensaje);    
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
        
            //----------------------------------------------------------------------------------------------*
            
   
        function alta_proyecto()//funcion que inserta un nuevo registro en la tabla TIPO_I_O
        {
            
            

            var NOMBRE_PROYECTO =document.getElementById("NOMBRE_PROYECTO").value;//capturamos el valor de la caja de texto TIPO_I_O_NOMBRE y lo guardamos en una variable.
            var PROYECTO_DESC =document.getElementById("PROYECTO_DESC").value;//capturamos el valor de la caja de texto TIPO_I_O_DESC y lo guardamos en una variable.
            var PROYECTO_AREA=document.getElementById("PROYECTO_AREA").value;//capturamos el valor de la caja de texto TIPO_I_O_TAG_CS y lo guardamos en una variable.
            var PROYECTO_UNIDAD=document.getElementById("PROYECTO_UNIDAD").value;//capturamos el valor de la caja de texto TIPO_I_O_TAG_CS y lo guardamos en una variable.
            var PROYECTO_HORAS=document.getElementById("PROYECTO_HORAS").value;//capturamos el valor de la caja de texto TIPO_I_O_TAG_CS y lo guardamos en una variable.
            
            var paginaPhp = "02_insertar_proyecto.php";//guardamos la pagina 01_insertar_TIPO_I_O.php en una variable.
          
      
          
          INSERTAR_PROYECTO(NOMBRE_PROYECTO,PROYECTO_DESC,PROYECTO_AREA,PROYECTO_UNIDAD,PROYECTO_HORAS,paginaPhp);//insertamos un nuevo registro utilianzo ajax nativo y el metodo post.

        }
        
        
        
        function eliminar_proyecto(idfila){//funcion que elimina un registro de la tabla TIPO_I_O, utilizando su id recibido por parámetro.
            
            //CAPTURAR EL VALOR DE LA CELDA PINCHADA
 
            
            var paginaPhp="01_eliminar_proyecto.php";//guardamos la pagina que vamos a enviar por ajax en una variable.
            enviar_eliminar_proyecto(idfila,paginaPhp);//funcion que elimina un registro utilizando ajax nativo y el metodo post.
   
          
      }
        /*window.onunload = abrirVentanainstrumentos;//ejecutamos la funcion abrir ventana instrumentos al cerrar la ventana actual.
        function abrirVentanainstrumentos(){//funcion que abre la ventana principal para crear instrumentos.
        
    
       opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=700,height=630,top=200,left=600";//aplicamos opciones a la ventana nueva.
       window.open("propiedades_instrumento.php","",opciones); //especificamos la ventana que vamos a abrir, y sus atributos a traves de la variable "opciones".
        
        }*/
     
        </script> 
      <?php         
   //}
?>
    </body>
    
    
</html>