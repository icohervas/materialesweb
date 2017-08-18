<?php         
   session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
/*if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SELECCIONAR DIBUJO </title>
        <link rel="stylesheet" href="bootstrap/intro/css/bootstrap.min.css">
    </head>
    <body>
       <?php 
       require("conexion.php");    

        $conex = new conexion();
        $PROYECTOid=$_POST['PROYECTOid'];
        $PEDIDOSid=$_POST['PEDIDOSid'];
        ?> 
     
        
<form name="importa" method="post" action="11_subir_material_isketch.php" enctype="multipart/form-data" >
<input type="file" name="excel" onclick=""/>
<input type="text" value="<?php echo $PROYECTOid?>" name="PROYECTOid" id="PROYECTOid"/>
<input type="text" value="<?php echo $PEDIDOSid?>" name="PEDIDOid" id="PEDIDOid"/>
<input type='submit'  name='enviar' value="Importar" />
<input type="hidden" value="upload" name="action" />

</form>
    </body>
   
    
    <?php
    
    
  // }
    
?>
    <script>
        
        
        
    
                window.onload = mostrar_material_por_proyecto_y_pedido();
                
                        
                        function mostrar_material_por_proyecto_y_pedido(){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                            function anadir()
                        {
                        resultado_CONSULTA = window.opener.document.getElementById("caja_bom");//
                
                        }  
        var PROYECTOid = parseInt(document.getElementById('PROYECTOid').value);
        var PEDIDOid =parseInt(document.getElementById('PEDIDOid').value);
        
        
       
        var paginaPhp="11_Mostrar_Material_Por_Pedido.php";
       
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                
               var nuevoValor1=PROYECTOid;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
               var nuevoValor2=PEDIDOid;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
            
                var informacionDelUsuario = "PROYECTOid=" + nuevoValor1 + "&PEDIDOid=" + nuevoValor2;//guardamos el valor de la var
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                      anadir();  
                        
                 resultado_CONSULTA.innerHTML = mensaje;
                        
                    }
                 
                };
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
    </script>
</html>
