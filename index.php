<?php
/*session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
/*if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{*/

//$_SESSION['cesta'];*/
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>pagina principal</title>
        <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0">
        <link rel="stylesheet" href="estilo2.css">
        <link rel="stylesheet" href="hoja.css">
        <link rel="stylesheet" href="fonts/style.css">
        <link rel="stylesheet" href="bootstrap/intro/css/bootstrap.min.css">
        
    </head>
    <script src="bootstrap/intro/js/jquery-3.2.1.min.js"></script>
    <body ><!--onload="MostrarTablaTemporal();"-->
        
        <div class="container">
            <div id="contextMenu" class="context-menu">
                <ul id="list">
                    <li id="etiquetali"></li>
                    <li id="etiquetali"></li>
                    <li id="etiquetali"></li>
                </ul>
            </div>
        </div>
        
<?php
// put your code here
        
require("conexion.php");
$conex = new conexion();//creamos una nueva instancia de la clase conexion.
        
        
//CONSULTA DE PROYECTOS
$sqlPROY = "SELECT * FROM PROYECTOS";//guardamos la consulta en una variable.
$fooPROY=$conex->get_consulta($sqlPROY);//ejecutamos la consulta a traves de poo, llamamos al metodo get_consulta de la clase conexion y guardamos en una variable el resultado de la consulta.
        
//CONSULTA DE ISOMETRICOS
//$sqlISO = "SELECT * FROM ISOMETRICOS";//guardamos la consulta en una variable.
//$fooISO=$conex->get_consulta($sqlISO);//ejecutamos la consulta a traves de poo, llamamos al metodo get_consulta de la clase conexion y guardamos en una variable el resultado de la consulta.
        
//CONSULTA DE MATERIALES TEMPORAL
$sqlMATTEMP = "SELECT * FROM MATERIAL_PEDIDOS_TEMP";//guardamos la consulta en una variable.
$fooMATTEMP=$conex->get_consulta($sqlMATTEMP);//ejecutamos la consulta a traves de poo, llamamos al metodo get_consulta de la clase conexion y guardamos en una variable el resultado de la consulta.
        
          
?>
        
        <div id="radioeinput" class="radioeinput">
         
            <div id="cajaradio" class="cajaradio">
         
                <!--<input type="radio" name="radio_buttonb" id="radio_button" value="1">
                <label  class="menu_juntas">Accesorios</label> 

                <input type="radio" name="radio_buttonb" id="radio_button" value="2">
                <label  class="menu_juntas">Juntas</label>  
          
                <input type="radio" name="radio_buttonb" id="radio_button" value="3">
                <label  class="menu_juntas">Pernos</label>  
        
          
                <input type="radio" name="radio_buttonb" id="radio_button" value="4">
                <label  class="menu_juntas">Valvulas</label> 
              
                <input type="radio" name="radio_buttonb" id="radio_button" value="5">
                <label  class="menu_juntas">tuberias</label> 
              
                <input type="radio" name="radio_buttonb" id="radio_button" value="6">
                <label  class="menu_juntas">bridas</label> -->
               
                <!--<input type="radio" name="radio_buttonb" id="radio_button" value="7">
                <label  class="menu_juntas">Todo</label> -->
              
          
            </div>
            <div class="cajainput" id="cajainput">
                <input class="icon-magnifying-glass"  type="text" id="valorBuscado" placeholder="&#xe9dc;     Buscar"  onkeyup="filtrarTablas();" >          
            </div>
             
        </div> 
        
        <div id="caja_principal" class="caja_principal">
            <div id ="caja_materiales" class="caja_materiales"></div>
        </div>
          
        <div id="caja_pedidos_navbar" class="caja_pedidos_navbar">             
            <ul class="nav">
                <li><input type="button" class ="btn btn-info" value="Inicio" onclick=""/>
                    <ul>
                        <li><input type="button" class ="btn btn-info" value="Abrir" onclick=""/>  </li>
                        <li><input type="button" class ="btn btn-info" value="Inicio" onclick=""/>
                        <input type="button" class ="btn btn-info" value="Importar Material" onclick="abrirVentanaImportarMaterial()"/>  
                    </ul>
                </li>
                <li><input type="button" class ="btn btn-info" value="Resumen de materiales" onclick="ResumenMateriales();"/>  </li>
                <li><a href="">Informes </a>
                    <ul>
                        <li><a href="">Recuento Tuberías </a>
                        <li><a href="">Recuento Accesorios </a>
                        <li><a href="">Recuento Bridas </a>
                        <li><a href="">Recuento Valvulas </a>
                        <li><a href="">Recuento Pernos </a>
                        <li><a href="">Recuento Juntas </a>                  
                    </ul>             
                </li>              
                <li><input type="button" class ="btn btn-info" value="Copy" onclick="copiarelementos();"/></li>
            </ul>

            <!--<input type="submit" value="Importar Material" class ="btn btn-primary" onclick="abrirVentanaImportarMaterial();"/>
            <input type="submit" value="Importar Material" class ="btn btn-primary" onclick="abrirVentanaImportarMaterial();"/>
            <input type="submit" value="Importar Material" class ="btn btn-primary" onclick="abrirVentanaImportarMaterial();"/>
            <input type="submit" value="Importar Material" class ="btn btn-primary" onclick="abrirVentanaImportarMaterial();"/>-->
            <div id="caja_pedidos_navbar_PROYECTO" class="caja_pedidos_navbar_PROYECTO">
                PROYECTOS <select  style = "overflow: hidden;" class="SELECT_ISOMETRICO" name='SELECT_PROYECTOS' id='SELECT_PROYECTOS' onchange="mostrarPedidosDeProyectos();">
                    <?php 
                    foreach ($fooPROY as $elemento)//creamos un bucle for each para mostrar todos los elementos de la tabla localizacion.
                    {
                        $item2 = $elemento['NOMBRE_PROYECTO'];// utilizando el identificador del array asociativo, guardamos los valores del campo en variables.
                        $item3 = $elemento['PROYECTO_ID'];// utilizando el identificador del array asociativo, guardamos los valores del campo en variables.
                        $item4= $elemento['DESCRIPCION'];// utilizando el identificador del array asociativo, guardamos los valores del campo en variables.
                        echo "<option value  =\"$item3\"'data-email = \"$item4\">$item2</option>";//mostramos en el select el contenido de las variables.
                    }
                    ?>     
                </select>   
                <input type="submit" class ="btn btn-info" value="Nuevo" onclick="abrirVentanaProyectos()"/> 
            </div>
            <div id="caja_pedidos_navbar_PEDIDOS" class="caja_pedidos_navbar_PEDIDOS">
                PEDIDOS <select  style = "overflow: hidden;" class="" name='SELECT_PEDIDOS' id='SELECT_PEDIDOS'>
                    <option value="1">Selecciona Proyecto</option>
                    </select> 
                    <input type="submit" value="Nuevo" class ="btn btn-info" onclick="abrirVentanaPedidosClick();"/>
                    <input type="submit" value="Mostrar" class ="btn btn-info" onclick="VerMaterialPedidoProyecto();"/>
            </div>
        </div> 
           
        <div id ="caja_secundaria" class="caja_secundaria">                   
            <div id ="caja_bom" class="caja_bom"></div>                        
        </div>  
         
<script type = "text/javascript">
var ResultadoListaS = document.getElementById("caja_materiales");//guardamos en resultado el nodo div con id info 
function ver_lista(valor1,paginaPhp)//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
    {
        var xmlhttp;//creamos la variable xmlhttp
            if (window.XMLHttpRequest)//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                {
                    xmlhttp = new XMLHttpRequest();
                }else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");//para navegadores modernos.
                }
        var nuevoValor=valor1;
        var informacionDelUsuario = "unidad_id=" + nuevoValor;//guardamos el valor de la variable numero, en la variable informacion del usuario.
        xmlhttp.onreadystatechange = function()//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
            {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)//si la operacion ha sido finalizada y exitosa.
                    {
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                         ResultadoListaS.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                    }
            };               
        xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
        xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
    }
            //------------------------------------////
            
function agregar_material_caja(id_celda,paginaPhp)
    {//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.                
        var ResultadoListaSTEMP = document.getElementById("caja_bom");//guardamos en resultado el nodo div con id info 
        var xmlhttp;//creamos la variable xmlhttp              
            if (window.XMLHttpRequest)
                {//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                }else
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }               
        //alert(id_celda);                
        var nuevoValor=id_celda;
        var informacionDelUsuario = "material_id=" + nuevoValor;//guardamos el valor de la variable numero, en la variable informacion del usuario.
        xmlhttp.onreadystatechange = function()
        {//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {//si la operacion ha sido finalizada y exitosa.
                    var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                    ResultadoListaSTEMP.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                    //alert(mensaje);
                }
        } 
        xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
        xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
    }

            //-------------------------------------
function busqueda_coincidencias(nropagina,paginabuscar)
    {//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                //donde se mostrará los registros
        var ResultadoListaS = document.getElementById("caja_materiales");
        var xmlhttp;//creamos la variable xmlhttp
                
        if (window.XMLHttpRequest)
            {//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
        var valorBuscado = document.getElementById("valorBuscado").value;//guardamos el valor de la caja de texto en la variable a.
        var paginabusqueda = paginabuscar;
        //ResultadoListaS.innerHTML= '<img src="anim.gif">';
        var informacionDelUsuario = "valorBuscado="+ valorBuscado + "&pag=" + nropagina;//guardamos el valor de la variable numero, en la variable informacion del usuario.
        xmlhttp.onreadystatechange = function()
            {//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                        ResultadoListaS.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                    }
            }
        xmlhttp.open("POST",paginabusqueda,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
        xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
    }
      //----------------------------------------------------------------------------------------
      //
      function vaciarTabla(valor1,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
    var xmlhttp;//creamos la variable xmlhttp

    if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
        xmlhttp = new XMLHttpRequest();

    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    //var numero = document.getElementById("telefono").value;//guardamos el valor de la caja de texto en la variable a.

   //alert(valor1);
   //alert(unidad);
   var nuevoValor=valor1;

   var informacionDelUsuario = "unidad_id=" + nuevoValor;//guardamos el valor de la variable numero, en la variable informacion del usuario.

    xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
            var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje

        }

    }

    xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
    xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
}
       //------------------------------------------------------------------ 
       
       //---------------------------------------------\\\\\\\
            
            function abrirVentanaAgregar(id_celda,PROYECTOid,PEDIDOSid,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                
               //alert(id_celda);//alert para mostrar el contenido(para pruebas y depuracion)
               //alert(radioseleccionado);//alert para mostrar el contenido(para pruebas y depuracion)
               //alert(PEDIDOSid);//alert para mostrar el contenido(para pruebas y depuracion)
               
               
               var nuevoValor1=id_celda;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
               var nuevoValor2=PEDIDOSid;
               var nuevoValor3=PROYECTOid;
               
               var informacionDelUsuario = "id_celda=" + nuevoValor1 + "&PEDIDOSid=" + nuevoValor2 + "&PROYECTOid=" + nuevoValor3;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                        
                        
                        var w = window.open("nueva.php", "nueva", " width=1200,height=290");//mostramos el contenido de la edicion del panel en una nueva ventana.
                        w.document.write(mensaje);//escribimos el objeto mensaje en la nueva ventana.
                        
                    }
                 
                };
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
 
            //---------------------------------------------\\\\\\\
       function abrirVentanaPedidos(proyecto_id,usuario_id,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                
               
               //alert(proyecto_id);//alert para mostrar el contenido(para pruebas y depuracion)
               //alert(usuario_id);//alert para mostrar el contenido(para pruebas y depuracion)
               
           
               var nuevoValor2=proyecto_id;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
               var nuevoValor3=usuario_id;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
              
                var informacionDelUsuario =  "&proyecto_id=" + nuevoValor2 + "&usuario_id=" + nuevoValor3;//guardamos el valor de la var
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                        
                        
                        var w = window.open("nueva.php", "nueva", " width=800,height=290");//mostramos el contenido de la edicion del panel en una nueva ventana.
                        w.document.write(mensaje);//escribimos el objeto mensaje en la nueva ventana.
                        
                    }
                 
                };
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
 
            //---------------------------------------------\\\\\\\
       
       
       
       function mostrar_material_por_proyecto_y_pedido(PROYECTOid,PEDIDOid,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                var ResultadoListaSTEMP = document.getElementById("caja_bom");//guardamos en resultado el nodo div con id info 
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
                        
                        
                 ResultadoListaSTEMP.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                        
                    }
                 
                };
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
       
        //---------------------------------------------\\\\\\\
       
       //---------------------------------------------\\\\\\\
            
            function enviar_eliminar_material(idfila,PROYECTOid,PEDIDOid,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                
                var ResultadoListaSTEMP = document.getElementById("caja_bom");//guardamos en resultado el nodo div con id info
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");//para navegadores modernos.
                }
 
               var nuevoValor=idfila;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
               var nuevoValor2=PROYECTOid;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
               var nuevoValor3=PEDIDOid;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
               
              // alert(idfila);
              
               
                var informacionDelUsuario = "idfila=" + nuevoValor + "&PROYECTOid=" + nuevoValor2 + "&PEDIDOid=" + nuevoValor3;//
                
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                       
                     
                    
                        ResultadoListaSTEMP.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                        
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
            //---------------------------------------------//
            
            //---------------------------------------------\\\\\\\
            
            function enviar_editar_material(idcelda,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                
                var ResultadoListaSTEMP = document.getElementById("caja_bom");//guardamos en resultado el nodo div con id info
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");//para navegadores modernos.
                }
 
               var nuevoValor=idcelda;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
              
               var informacionDelUsuario = "idcelda=" + nuevoValor;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                       
                     
                    
                        ResultadoListaSTEMP.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                        
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
            //---------------------------------------------//
            
            //---------------------------------------------\\\\\\\
            
            function enviar_Actualizar_material(idcelda,numid,patron,valorcampotexto,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                
                var ResultadoListaSTEMP = document.getElementById("caja_bom");//guardamos en resultado el nodo div con id info
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");//para navegadores modernos.
                }
 
               var nuevoValor=idcelda;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
               var nuevoValor2=numid;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
               var nuevoValor3=patron;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
               var nuevoValor4=valorcampotexto;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor

               var informacionDelUsuario = "idcelda=" + nuevoValor + "&numid=" + nuevoValor2 + "&patron=" + nuevoValor3 + "&valorcampotexto=" + nuevoValor4;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
  
                        ResultadoListaSTEMP.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                        
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
            //---------------------------------------------//
            
            //---------------------------------------------\\\\\\\
            
            function enviar_Select_pedidos(valorSelectPedidos,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                
                var ResultadoListaSTEMP = document.getElementById("SELECT_PEDIDOS");//guardamos en resultado el nodo div con id info
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");//para navegadores modernos.
                }
 
               var nuevoValor=valorSelectPedidos;//guardamos la variable recibida por el parametro valor1 en la variable nuevoValor
            

               var informacionDelUsuario = "valorSelectPedidos=" + nuevoValor;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
  
                        ResultadoListaSTEMP.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                        
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
            //---------------------------------------------//
            //---------------------------------------------\\\\\\\
            
            function abrirVentanaImportarMaterialAjax(PROYECTOid,PEDIDOSid,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
        
               var nuevoValor2=PEDIDOSid;
               var nuevoValor3=PROYECTOid;
          
               var informacionDelUsuario = "PEDIDOSid=" + nuevoValor2 + "&PROYECTOid=" + nuevoValor3;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                        
                        
                        var w = window.open("nueva.php", "nueva", " width=1200,height=400");//mostramos el contenido de la edicion del panel en una nueva ventana.
                        w.document.write(mensaje);//escribimos el objeto mensaje en la nueva ventana.
                        
                    }
                 
                };
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
   
            }
            
                function mostrar_Resumen_Materiales(PROYECTOid,PEDIDOid,paginaPhp){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                var ResultadoListaSTEMP = document.getElementById("caja_bom");//guardamos en resultado el nodo div con id info 
              
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                
                //alert(id_celda);
                
               var nuevoValor1=PEDIDOid;
               var nuevoValor2=PROYECTOid;
  
              
               var informacionDelUsuario = "PEDIDOid=" + nuevoValor1 + "&PROYECTOid=" + nuevoValor2;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                        
                        ResultadoListaSTEMP.innerHTML = mensaje;//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.
                        //alert(mensaje);
    
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
            //---------------------------------------------\\\\\\\
       
       /* function ver_lista_juntas()//funcion que muestra la lista de instrumentos de la refineria de la bbdd a traves de una consulta ajax.
      {
          
         valor1=""; 
        var paginaPhp="LISTA_JUNTAS.php";//guarsamos la pagina "lista_instrumentos.php" en la variable paginaPhp.
        
       ver_lista(valor1,paginaPhp);//ejecutamos la funcion ajax, "enviar_datos_ajax" con los parametros preestablecidos.
     
      }
      function ver_lista_pernos()//funcion que muestra la lista de instrumentos de la refineria de la bbdd a traves de una consulta ajax.
      {
         
          valor1=""; 
        var paginaPhp="LISTA_PERNOS.php";//guarsamos la pagina "lista_instrumentos.php" en la variable paginaPhp.
        
       ver_lista(valor1,paginaPhp);//ejecutamos la funcion ajax, "enviar_datos_ajax" con los parametros preestablecidos.
          
      }
      function ver_lista_valvulas()//funcion que muestra la lista de instrumentos de la refineria de la bbdd a traves de una consulta ajax.
      {
          valor1=""; 
        var paginaPhp="LISTA_VALVULAS.php";//guarsamos la pagina "lista_instrumentos.php" en la variable paginaPhp.
        
       ver_lista(valor1,paginaPhp);//ejecutamos la funcion ajax, "enviar_datos_ajax" con los parametros preestablecidos.
      }
      
      function ver_lista_tuberias()//funcion que muestra la lista de instrumentos de la refineria de la bbdd a traves de una consulta ajax.
      {
          valor1=""; 
        var paginaPhp="LISTA_TUBERIAS.php";//guarsamos la pagina "lista_instrumentos.php" en la variable paginaPhp.
        
       ver_lista(valor1,paginaPhp);//ejecutamos la funcion ajax, "enviar_datos_ajax" con los parametros preestablecidos.
      }
      function ver_lista_bridas()//funcion que muestra la lista de instrumentos de la refineria de la bbdd a traves de una consulta ajax.
      {
          valor1=""; 
        var paginaPhp="LISTA_BRIDAS.php";//guarsamos la pagina "lista_instrumentos.php" en la variable paginaPhp.
        
       ver_lista(valor1,paginaPhp);//ejecutamos la funcion ajax, "enviar_datos_ajax" con los parametros preestablecidos.
      }*/


      
            
            function filtrarTablas(){
               
       
        //var resultado="";
 
        var porNombre=document.getElementsByName("radio_buttonb");
        // Recorremos todos los valores del radio button para encontrar el
        // seleccionado
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                resultado=porNombre[i].value;
        }
 
        //alert(resultado);
    
   /*if (resultado == 1){
       
       //alert("accesorios");
      
       var paginabuscar = "ACCESORIOS.php";
      
       busqueda_coincidencias(1,paginabuscar);
     ;
   }
   
   if (resultado == 2){
       

        paginabuscar = "juntas.php";
        busqueda_coincidencias(1,paginabuscar);
   }
   
   if (resultado == 3){
       

       paginabuscar = "pernos.php";
        busqueda_coincidencias(1,paginabuscar);
   }
   
   if (resultado == 4){
       
       //alert("accesorios");
     
       paginabuscar = "valvulas.php";
    
       //busqueda_coincidencias(1,resultado);
       busqueda_coincidencias(1,paginabuscar);
   }
   
   if (resultado == 5){
       
       //alert("accesorios");
     
       var paginabuscar = "tuberias.php";
    
       //busqueda_coincidencias(1,resultado);
       busqueda_coincidencias(1,paginabuscar);
   }
   if (resultado == 6){
       
       //alert("accesorios");
     
       var paginabuscar = "bridas.php";
    
       //busqueda_coincidencias(1,resultado);
       busqueda_coincidencias(1,paginabuscar);
   }*/
   
   //if (resultado == 7){
       
       //alert("accesorios");
     
       var paginabuscar = "todo_material.php";
    
       //busqueda_coincidencias(1,resultado);
       busqueda_coincidencias(1,paginabuscar);
   //}
   
   


                } 
                
                
  //MENU CONTEXTUAL ------------
  
                        window.onclick = hideContextMenu;//si pulsamo en cualquier parte de la pantalla, ejecutamos la funcion para esconder el menu contextual.
			window.onkeydown = listenKeys;//al pulsar cualquier tecla  , ejecutamos la funcion para detectar tecla pulsada.
			var contextMenu = document.getElementById('contextMenu');//guardamos el objeto del dom, donde vamos a personalizar el menu contextual.
                        var ul = document.getElementById("list");//guardamos los elementos de lista desordenada en una variable.
                        var li = document.getElementById('list').getElementsByTagName('li')[0];//guardamos el primer elemento de la lista en una variable.
                        var li2 = document.getElementById('list').getElementsByTagName('li')[1];//guardamos el segundo elemento de la lista en una variable.
                        var li3 = document.getElementById('list').getElementsByTagName('li')[2];//guardamos el tercer elemento de la lista en una variable.
			function showContextMenu (event,id_celda) {//funcion que muestra el menu contextual para eliminar un cable.
                            
                           contextMenu.style.display = 'block';//establecemos estilo de bloque.
				contextMenu.style.left = event.clientX + 'px';//guardamos la coordenada x.
				contextMenu.style.top = event.clientY + 'px';//guardamos la coordenada y.
                                //alert(id_celda);
                               
                                li.setAttribute("id",id_celda);//establecemos como atributo id el valor recibido como parametro a traves de la variable id_celda.
                                li2.setAttribute("id",id_celda);//establecemos como atributo id el valor recibido como parametro a traves de la variable id_celda.
                                li3.setAttribute("id",id_celda);//establecemos como atributo id el valor recibido como parametro a traves de la variable id_celda.
                                
                                li.setAttribute("onclick","eliminar_cable(this.id)");//al pulsar sobre el li, ejecutamos la funcion "eliminar_cable".
                                li2.setAttribute("onclick","editar_cable(this.id)");//al pulsar sobre el li, ejecutamos la funcion "editar_cable(this.id)".
                                li3.setAttribute("onclick","agregar(this.id)");//al pulsar sobre el li, ejecutamos la funcion "editar_cable(this.id)".
                                
                                li.textContent = "Eliminar";//contenido de texto del elemento li
                                li2.textContent = "Editar";//contenido de texto del elemento li
                                li3.textContent = "Agregar Material";//contenido de texto del elemento li
				return false; 
     
                        }
                        
                        function showContextMenuEdit (event,id_celda) {
                            
                                contextMenu.style.display = 'block';//establecemos estilo de bloque.
				contextMenu.style.left = event.clientX + 'px';//guardamos la coordenada x.
				contextMenu.style.top = event.clientY + 'px';//guardamos la coordenada y.
                                //alert(id_celda);
                               
                                li.setAttribute("id",id_celda);//establecemos como atributo id el valor recibido como parametro a traves de la variable id_celda.
                                li2.setAttribute("id",id_celda);//establecemos como atributo id el valor recibido como parametro a traves de la variable id_celda.
                                li3.setAttribute("id",id_celda);//establecemos como atributo id el valor recibido como parametro a traves de la variable id_celda.
                                
                                li.setAttribute("onclick","eliminar_material(this.id)");//al pulsar sobre el li, ejecutamos la funcion "eliminar_panel".
                                li2.setAttribute("onclick","editar_material(this.id)");
                                li3.setAttribute("onclick","");
                                
                                
                                li.textContent = "Eliminar";//contenido de texto del elemento li
                                li2.textContent = "Editar";//contenido de texto del elemento li
                                li3.textContent = "";//contenido de texto del elemento li
				return false; //no retornamos ningun valor en la funcion.
     
                        }
                        
                        
                        function hideContextMenu () {//funcion que esconde el menu contextual.
				contextMenu.style.display = 'none';//ocultamos el menu contextual.
			}

			function listenKeys (event) {//funcion que detecta la tecla pulsada.Para esconder el menu contextual se utiliza la tecla escape (27).
				var keyCode = event.which || event.keyCode;
				if(keyCode == 27){//si pulsamos la tecla escape ocultamos el menu contextual.
					hideContextMenu();//funcion que oculta el menu contextual
				}
			}
                        
                        function agregar(id_celda){
                            
                            //SELECT PEDIDOS
                            var v1_PEDIDOS = document.getElementById("SELECT_PEDIDOS");//capturamos el select donde vamos a mostrar la tabla.
                             var PEDIDOSid = v1_PEDIDOS.options[v1_PEDIDOS.selectedIndex].value;//capturamos el indice seleccionado de la lista select.
                             var PEDIDOSnombre = v1_PEDIDOS.options[v1_PEDIDOS.selectedIndex].text; //capturamos el texto del indice seleccionado en el select. 
                             //
                            var v1_PROYECTO = document.getElementById("SELECT_PROYECTOS");//capturamos el select donde vamos a mostrar la tabla.
                             var PROYECTOid = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].value;//capturamos el indice seleccionado de la lista select.
                             var PROYECTOSnombre = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].text; //capturamos el texto del indice seleccionado en el select.
                 
                             /* alert(REVISIONid);
                              
                              
                             var radioseleccionado="";
 
                            var porNombre=document.getElementsByName("radio_buttonb");
                            // Recorremos todos los valores del radio button para encontrar el
                            // seleccionado
                            for(var i=0;i<porNombre.length;i++)
                            {
                                if(porNombre[i].checked)
                                    radioseleccionado=porNombre[i].value;
                            }

                            //alert(radioseleccionado);
                             
                            
                            //alert(PEDIDOSnombre);*/
    //alert(id_celda);
                            var paginaPhp="01_propiedades_agregar_material.php";
      
                            abrirVentanaAgregar(id_celda,PROYECTOid,PEDIDOSid,paginaPhp);
   
                            
                        }
                        
                        function abrirVentanaPedidosClick(){

                             
                         
                         //SELECT PROYECTO
                             var v1_PROYECTO = document.getElementById("SELECT_PROYECTOS");//capturamos el select donde vamos a mostrar la tabla.
                             var PROYECTOid = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].value;//capturamos el indice seleccionado de la lista select.
                             var PROYECTOSnombre = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].text; //capturamos el texto del indice seleccionado en el select.
                         
                         
                            var usuario_id=1;
                    
                            //alert(PROYECTOSnombre);
                            var paginaPhp="02_nuevo_pedido.php";
      
                            abrirVentanaPedidos(PROYECTOid,usuario_id,paginaPhp);
                             
               
                        }
                        
                        function quitar(id_celda){
                            
                            var vacio1="";
                            
                            //alert(valor1);
                            var paginaPhp="11_quitar_elemento_hook_up.php";

                            var cabecera="";
                            
                           // enviar_datos_hhdd(id_celda,nombre_dibujo_hook_up,DESC_dibujo_hook_up,ID_dibujo_hook_up,urldibujohookup,paginaPhp);
                        }
  
 //-----------
                function VerMaterialPedidoProyecto(){
                    
                     //SELECT PROYECTO
                        var paginaPhp="11_Mostrar_Material_Por_Pedido.php";
                     
                             var v1_PROYECTO = document.getElementById("SELECT_PROYECTOS");//capturamos el select donde vamos a mostrar la tabla.
                             var PROYECTOid = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].value;//capturamos el indice seleccionado de la lista select.
                             var PROYECTOSnombre = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].text; //capturamos el texto del indice seleccionado en el select.
                             
                              //SELECT PROYECTO
                             var v1_PEDIDO = document.getElementById("SELECT_PEDIDOS");//capturamos el select donde vamos a mostrar la tabla.
                             var PEDIDOid = v1_PEDIDO.options[v1_PEDIDO.selectedIndex].value;//capturamos el indice seleccionado de la lista select.
                             var PEDIDOSnombre = v1_PEDIDO.options[v1_PEDIDO.selectedIndex].text; //capturamos el texto del indice seleccionado en el select.
                             
                             
                           mostrar_material_por_proyecto_y_pedido(PROYECTOid,PEDIDOid,paginaPhp);  
                             
                    
                         }
            function ResumenMateriales(){
                    
                     //SELECT PROYECTO
                          var paginaPhp ="11_Mostrar_Resumen_Materiales.php";
                     
                             var v1_PROYECTO = document.getElementById("SELECT_PROYECTOS");//capturamos el select donde vamos a mostrar la tabla.
                             var PROYECTOid = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].value;//capturamos el indice seleccionado de la lista select.
                             var PROYECTOSnombre = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].text; //capturamos el texto del indice seleccionado en el select.
                             
                              //SELECT PROYECTO
                             var v1_PEDIDO = document.getElementById("SELECT_PEDIDOS");//capturamos el select donde vamos a mostrar la tabla.
                             var PEDIDOid = v1_PEDIDO.options[v1_PEDIDO.selectedIndex].value;//capturamos el indice seleccionado de la lista select.
                             var PEDIDOSnombre = v1_PEDIDO.options[v1_PEDIDO.selectedIndex].text; //capturamos el texto del indice seleccionado en el select.
                             
                             
                           mostrar_Resumen_Materiales(PROYECTOid,PEDIDOid,paginaPhp);  
                             
                    
                         }
            
    
    function eliminar_material(idfila){
          
      
           //alert(idfila);//alert para comprobar que recibimos el parametro id de la fila del panel.
                             var v1_PROYECTO = document.getElementById("SELECT_PROYECTOS");//capturamos el select donde vamos a mostrar la tabla.
                             var PROYECTOid = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].value;//capturamos el indice seleccionado de la lista select.
                             var PROYECTOSnombre = v1_PROYECTO.options[v1_PROYECTO.selectedIndex].text; //capturamos el texto del indice seleccionado en el select.
                             
                              //SELECT PROYECTO
                             var v1_PEDIDO = document.getElementById("SELECT_PEDIDOS");//capturamos el select donde vamos a mostrar la tabla.
                             var PEDIDOid = v1_PEDIDO.options[v1_PEDIDO.selectedIndex].value;//capturamos el indice seleccionado de la lista select.
                             var PEDIDOSnombre = v1_PEDIDO.options[v1_PEDIDO.selectedIndex].text; //capturamos el texto del indice seleccionado en el select.
           
            var paginaPhp="11_eliminar_material.php";//guardamos en una variable la pagina que vamos a utilizar.
            enviar_eliminar_material(idfila,PROYECTOid,PEDIDOid,paginaPhp);//llamamos a la funcion ajax nativa, que elimina un registro por su id.
      
      }
      
      function editar_material(idcelda){//Función que permite editar un panel a traves de su id.
          
        //alert(idfila);//alert para comprobar que recibimos el parametro id de la fila del instrumento.
           
            
           var celda = document.getElementById(idcelda).innerHTML; 
           
           //alert(celda);
           //alert(idcelda);
           var editarvalor = idcelda + "-editar";
           
           document.getElementById(idcelda).innerHTML = '<input onBlur="actualizar_material(this.id)" style = "text-align:left; width:60px; height:20px;" type = "text" id = "'+editarvalor+'" value ="'+celda+'" >';
          
           document.getElementById(editarvalor).focus()
          
      }
      
      function actualizar_material(idcelda){//Función que permite editar un panel a traves de su id.
          
        //alert(idfila);//alert para comprobar que recibimos el parametro id de la fila del instrumento.
        
           //alert("sin foco");
        
        var cadena = idcelda;
        var valorcampotexto = document.getElementById(idcelda).value; 

    if (cadena.indexOf("ISOMETRICO_NOMBRE_ID") > -1){
    patron = "ISOMETRICO_NOMBRE_ID";
    nuevoValor    = "";
    nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 2;
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
       if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }           
        } 


//ACTUALIZAR CAMPO REV0
      if (cadena.indexOf("MTO_REV_0_ID") > -1){
    var patron = "MTO_REV_0_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);

    }  
    
    if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    }  
    
    
        }   
        
        //ACTUALIZAR CAMPO REV0A
      if (cadena.indexOf("MTO_REV_0A_ID") > -1){
    var patron = "MTO_REV_0A_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    } 
      if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    }
    
    
        
        }   
        
        //ACTUALIZAR CAMPO REV0B
      if (cadena.indexOf("MTO_REV_0B_ID") > -1){
    var patron = "MTO_REV_0B_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
        if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    }  
        }   
        
        //ACTUALIZAR CAMPO REV0C
      if (cadena.indexOf("MTO_REV_0C_ID") > -1){
    var patron = "MTO_REV_0C_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
         if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    } 
        }
        
        
        //ACTUALIZAR CAMPO REV2
      if (cadena.indexOf("MTO_REV_1_ID") > -1){
    var patron = "MTO_REV_1_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
         if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    } 
        }    
        
        //ACTUALIZAR CAMPO REV1A
      if (cadena.indexOf("MTO_REV_1A_ID") > -1){
    var patron = "MTO_REV_1A_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
         if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    } 
        } 
        
        //ACTUALIZAR CAMPO REV0A
      if (cadena.indexOf("MTO_REV_1B_ID") > -1){
    var patron = "MTO_REV_1B_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
         if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    } 
        }   
        
        //ACTUALIZAR CAMPO REV1C
      if (cadena.indexOf("MTO_REV_1C_ID") > -1){
    var patron = "MTO_REV_1C_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
         if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    } 
        }  
        
       //ACTUALIZAR CAMPO REV2
      if (cadena.indexOf("MTO_REV_2_ID") > -1){
    var patron = "MTO_REV_2_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
         if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    } 
        }    
        
        
        
        //ACTUALIZAR CAMPO REV2A
      if (cadena.indexOf("MTO_REV_2A_ID") > -1){
    var patron = "MTO_REV_2A_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
          if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    }
        }   
        
        //ACTUALIZAR CAMPO REV2B
      if (cadena.indexOf("MTO_REV_2B_ID") > -1){
    var patron = "MTO_REV_2B_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
         if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    } 
        }   
        
        //ACTUALIZAR CAMPO REV2C
      if (cadena.indexOf("MTO_REV_2C_ID") > -1){
    var patron = "MTO_REV_2C_ID";
    var nuevoValor    = "";
    var nuevaCadena = cadena.replace(patron, nuevoValor);
    
    //alert(nuevaCadena.length);
   
    if (nuevaCadena.length == 8){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 1;
    var numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }    
     if (nuevaCadena.length == 9){
    var cadena = nuevaCadena,
    inicio = 0,
    fin    = 2,
    numid = cadena.substring(inicio, fin);
//alert(subCadena);
    }          
          if (nuevaCadena.length == 10){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 3;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 11){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 4;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 12){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 5;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 13){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 6;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 14){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 7;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 15){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 8;
    numid = cadena.substring(inicio, fin);

    }  
    if (nuevaCadena.length == 16){
    var cadena = nuevaCadena;
    inicio = 0;
    fin    = 9;
    numid = cadena.substring(inicio, fin);

    }
        }   
      
      var paginaPhp = "01_Actualizar_material.php";
      
    enviar_Actualizar_material(idcelda,numid,patron,valorcampotexto,paginaPhp)  
      
          
      }
      
      
function mostrarPedidosDeProyectos(){
          
    var valorSelectPedidos=document.getElementById('SELECT_PROYECTOS').options[document.getElementById('SELECT_PROYECTOS').selectedIndex].value;
    
    //alert(valorSelectPedidos);
       
      var paginaPhp="select_pedidos.php";

     enviar_Select_pedidos(valorSelectPedidos,paginaPhp);
    }

                
                window.onunload = vaciarTablaTemporal;
                //window.onload = MostrarTablaTemporal;
                
                        
                        function vaciarTablaTemporal(){
                            
                           var vacio1="";

                           
                            var paginaPhp="11_vaciarTablaTemporal.php";

                            vaciarTabla(vacio1,paginaPhp);
                            //window.close();
                            
                        }  
                        
                        //function MostrarTablaTemporal(){
                            
                          // alert("tabla temporal");
                            
                        //}
                        
                     function abrirVentanaProyectos(){//funcion que abre la ventana principal para crear instrumentos.
        
    
       opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=1540,height=630,top=100,left=250";//aplicamos opciones a la ventana nueva.
       window.open("02_nuevo_proyecto.php","",opciones); //especificamos la ventana que vamos a abrir, y sus atributos a traves de la variable "opciones".
        
        } 
        function abrirVentanaImportarMaterial(){//funcion que abre la ventana principal para crear instrumentos.
        
    
       /*opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=680,height=200,top=20,left=250";//aplicamos opciones a la ventana nueva.
       window.open("11_seleccionar_material_isketch.php","",opciones); //especificamos la ventana que vamos a abrir, y sus atributos a traves de la variable "opciones".*/
       var PROYECTOid=document.getElementById('SELECT_PROYECTOS').options[document.getElementById('SELECT_PROYECTOS').selectedIndex].value;
       var PEDIDOSid=document.getElementById('SELECT_PEDIDOS').options[document.getElementById('SELECT_PEDIDOS').selectedIndex].value;
       var paginaPhp="11_seleccionar_material_isketch.php";
       
        abrirVentanaImportarMaterialAjax(PROYECTOid,PEDIDOSid,paginaPhp);
     
        }
function copiarelementos()
    {
              
        var divCont = document.getElementById('Dinamicos'); 
        var checks  = divCont.getElementsByTagName('input');       
        matriz = new Array();
            for (i = 0; i < checks.length; i++) 
                {
                   
                    matriz[i] = new Array()
                    if(checks[i].checked == true)
                            {
                                var fila1familia = document.getElementById('FAMILIA' + checks[i].id).innerHTML;//"["+i+","+j+"]"
                                var CODIGO_L_CONCATENADO = document.getElementById('CODIGO_L_CONCATENADO' + checks[i].id).innerHTML;//"["+i+","+j+"]"

                                 matriz[i][0] = document.getElementById('FAMILIA' + checks[i].id).innerHTML;
                                 matriz[i][1] = document.getElementById('CODIGO_L_CONCATENADO' + checks[i].id).innerHTML;
                            }     
                }
        /*for (i = 0; i < matriz.length; i++) 
                {
                        for (j = 0; j < 3; j++) 
                        {
                            
                            if (matriz[i][j] != undefined)
                            {
                                alert(matriz[i][j]);  
                            }
 
		                  }
                }*/       
 //console.log(matriz);       
    }
       
                   
        </script>
    </body>
</html>


