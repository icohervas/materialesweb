<?php
/*session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{*/

    require("conexion.php");    
        
?>    
<html>
    <head>
        <meta charset="UTF-8"><!--Agregamos el tipo de codificacion de caracteres de la web.-->
        <title>08_propiedades_agregar_material.php</title><!--Agregamos un título a la web-->
        
    </head>
    <body>
       
        <?php
        $id_celda = $_POST['id_celda'];
        $pedidos_id = $_POST['PEDIDOSid'];
        $PROYECTO_id = $_POST['PROYECTOid'];
     ?> 
      
   
  <div class='campo'>
   <SPAN>ISOMETRICOS</SPAN>
            <input type="text" name="TXT_ISOMETRICOS" id="TXT_ISOMETRICOS" value="">
      
 
        </div>
         <SPAN>id_material</SPAN>
         <input type="text" name="TXT_celda" id="TXT_celda" value="<?php echo $id_celda;?>">
        <SPAN>id_pedido</SPAN>
         <input type="text" name="TXT_pedido" id="TXT_pedido" value="<?php echo $pedidos_id;?>">
         <SPAN>id_PROYECTO</SPAN>
         <input type="text" name="TXT_PROYECTO" id="TXT_PROYECTO" value="<?php echo $PROYECTO_id;?>">
 
        <div>
           
          <SPAN >CANTIDAD</SPAN>
          <input type="text" name="TXT_CANTIDAD" id="TXT_CANTIDAD" value="">
          <br>
          <SPAN>FECHA</SPAN> 
          <input type="text" name="TXT_FECHA" id="TXT_FECHA" value="">
           <br>
          <SPAN>MTO_REV</SPAN>
          <input type="text" name="TXT_MTO_REV" id="TXT_MTO_REV" value="">
     
          <input type="button" value="Agregar" onclick="alta_mat()"/> 
        </div>
      
     
<?php 
        
//}


     ?> 
        
        <script>
         
          function anadir()
                        {
                        resultado_BOM = window.opener.document.getElementById("caja_bom");//
                
                        }
           
            function ASIGNAR_MAT(id_celda,id_pedido,id_PROYECTO,isometrico_nombre,cantidad_mat,fecha,cajaRevisionValor,paginaPhp)
            {//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                
                var nuevoValor=id_celda;
                var nuevoValor2=isometrico_nombre;
                var nuevoValor3=cantidad_mat;
                var nuevoValor4=fecha;
                var nuevoValor5=cajaRevisionValor;
                var nuevoValor6=id_pedido;
                var nuevoValor7=id_PROYECTO;
 
               //alert(cajaRevisionValor);
                
      
               var informacionDelUsuario =  "&id_celda=" + nuevoValor + "&isometrico_nombre=" + nuevoValor2 + "&cantidad_mat=" + nuevoValor3
               + "&fecha=" + nuevoValor4 + "&cajaRevisionValor=" + nuevoValor5 + "&id_pedido=" + nuevoValor6 + "&id_PROYECTO=" + nuevoValor7;//g
 
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                        //resultadoCabecera.innerHTML="";
                        anadir();
                    
                        resultado_BOM.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                        //alert(mensaje);
                        
                        
                     window.close();      
                    }
                 
                };
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
                 
            }
            

        function alta_mat(){
     
    
             var id_celda =document.getElementById("TXT_celda").value;
              var id_pedido =document.getElementById("TXT_pedido").value;
              var id_PROYECTO =document.getElementById("TXT_PROYECTO").value;
              
             
             var isometrico_nombre =document.getElementById("TXT_ISOMETRICOS").value;
            var cantidad_mat =document.getElementById("TXT_CANTIDAD").value;
            var fecha =document.getElementById("TXT_FECHA").value;
            var cajaRevisionValor =document.getElementById("TXT_MTO_REV").value;
  
          var paginaPhp = "01_Asignar_material.php";

         ASIGNAR_MAT(id_celda,id_pedido,id_PROYECTO,isometrico_nombre,cantidad_mat,fecha,cajaRevisionValor,paginaPhp);
                
      }
      
        
        </script> 
      
<?php         
   //}
?> 
    </body>
</html>

