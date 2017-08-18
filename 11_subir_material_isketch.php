<?php
 session_start();
 ?>
<html>
<head>
<meta charset="UTF-8">
<title>SELECCIONAR DIBUJO </title>
<link rel="stylesheet" href="bootstrap/intro/css/bootstrap.min.css">
</head>
<body>
        
</body>
   
</html>
<?php
require("conexion.php");
//echo $_SESSION['ID'];
$conex = new conexion();//creamos una nueva instancia de la clase conexion.
$PROYECTOid=(INT)$_POST['PROYECTOid'];
$PEDIDOSid=(INT)$_POST['PEDIDOid'];
        
//CONSULTA DE PROYECTOS
$sqlPROY = "SELECT * FROM PROYECTOS";//guardamos la consulta en una variable.
$fooPROY=$conex->get_consulta($sqlPROY);//ejecutamos la consulta a traves de poo, llamamos al metodo get_consulta de la clase conexion y guardamos en una variable el resultado de la consulta.
        
//CONSULTA DE PEDIDOS
$sqlPED = "SELECT * FROM PEDIDOS";//guardamos la consulta en una variable.
$fooPED=$conex->get_consulta($sqlPED);//ejecutamos la consulta a traves de poo, llamamos al metodo get_consulta de la clase conexion y guardamos en una variable el resultado de la consulta.
        
extract($_POST);
if ($action == "upload") //si action tiene como valor UPLOAD haga algo (el value de este hidden es es UPLOAD iniciado desde el value
{
//cargamos el archivo al servidor con el mismo nombre(solo le agregue el sufijo bak_)
$archivo = $_FILES['excel']['name']; //captura el nombre del archivo
$tipo = $_FILES['excel']['type']; //captura el tipo de archivo (2003 o 2007)
 
$destino = "bak_".$archivo; //lugar donde se copiara el archivo
 
if (copy($_FILES['excel']['tmp_name'],$destino)) //si dese copiar la variable excel (archivo).nombreTemporal a destino (bak_.archivo) (si se ha dejado copiar)
{
//echo "Archivo Cargado Con Exito";
}
else
{
echo "Error Al Cargar el Archivo";
echo "<br>";
}
 
////////////////////////////////////////////////////////
if (file_exists ("bak_".$archivo)) //validacion para saber si el archivo ya existe previamente
{
/*INVOCACION DE CLASES Y CONEXION A BASE DE DATOS*/
/** Invocacion de Clases necesarias */
require_once('lib/Classes/PHPExcel.php');
require_once('lib/Classes/PHPExcel/Reader/Excel2007.php');
//DATOS DE CONEXION A LA BASE DE DATOS
//$cn = mysql_connect ("","","") or die ("ERROR EN LA CONEXION");
//$db = mysql_select_db ("",$cn) or die ("ERROR AL CONECTAR A LA BD");

$conex = new conexion();
 
// Cargando la hoja de calculo
$objReader = new PHPExcel_Reader_Excel2007(); //instancio un objeto como PHPExcelReader(objeto de captura de datos de excel)
$objPHPExcel = $objReader->load("bak_".$archivo); //carga en objphpExcel por medio de objReader,el nombre del archivo
$objFecha = new PHPExcel_Shared_Date();
 
// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0); //objPHPExcel tomara la posicion de hoja (en esta caso 0 o 1) con el setActiveSheetIndex(numeroHoja)
 
$sheet = $objPHPExcel->getSheet(0); 

$highestRow = $sheet->getHighestRow();

$highestColumn = $sheet->getHighestColumn();
$ValoresExcel = array();
?>



<input type="text" value="<?php echo $PROYECTOid?>" name="PROYECTOid" id="PROYECTOid"/>
<input type="text" value="<?php echo $PEDIDOSid?>" name="PEDIDOid" id="PEDIDOid"/>

<input type="button" value="Nuevo" onclick="abrirVentanaPedidosClick();"/>
<h4 id="h1_REVISION" class="h1_REVISION">REVISION</h4>
<input type="text" id ="REVISION" name="REVISION" style = "width: 50px;"/>
              
<div id="contenido_cabecera "style = "display: table; width: 1150px;">            
<div  class="eldiv" style = "float: left; height: 30px; width: 200px;">CODIGO_L</div>
<div class="eldiv" style = "float: left; height: 30px; width: 200px;">TAMAÑO</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 200px;">SCH_ESP_LIB</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 100px;">CANTIDAD</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 200px;">ISOMETRICO</div>
            
            <div class="eldiv" style = "float: left; height: 30px; width: 200px;">CODIGO_L_CONCATENADO</div>
</div>

<div id="grupo"> 
<?php

for ($row = 2; $row <= $highestRow; $row++){ 
		$ValoresExcel["CODIGO_L"]= $sheet->getCell("A".$row)->getValue();
		$ValoresExcel["TAMANIO"]= $sheet->getCell("B".$row)->getValue();
		$ValoresExcel["SCH_ESP_LIB"]= $sheet->getCell("C".$row)->getValue();
        $ValoresExcel["CANTIDAD"]=$sheet->getCell("D".$row)->getValue();
        $ValoresExcel["ISOMETRICO"]= $sheet->getCell("J".$row)->getValue();
        $ValoresExcel["CONCATENADO"]=$sheet->getCell("B".$row)->getValue().$sheet->getCell("A".$row)->getValue();
		echo "<br>";
               ?>

<input type="text" id="<?php echo $row."txt1";?>" name="identificador"  value="<?php echo $ValoresExcel['CODIGO_L']?>" onkeyup="concatenacampos(this.id);" />
<input type="text" id="<?php echo $row."txt2";?>" name="identificador" value="<?php echo $ValoresExcel['TAMANIO']?>" onkeyup="concatenacampos(this.id);"/>
<input type="text" id="<?php echo $row."txt3";?>" name="identificador" value="<?php echo $ValoresExcel['SCH_ESP_LIB']?>" onkeyup=""/>
<input type="text" id ="<?php echo $row."txt4";?>" name="identificador"  value="<?php echo $ValoresExcel['CANTIDAD']?>" onkeyup=""/>
<input type="text" id ="<?php echo $row."txt5";?>" name="identificador"   value="<?php echo $ValoresExcel['ISOMETRICO']?>" onkeyup=""/>
<input type="text" id ="<?php echo $row."txt6";?>" name="concatenado"  value="<?php echo $ValoresExcel['CONCATENADO']?>" onkeyup="concatenacampos(this.id);"/>
<input type="text" id ="<?php echo $row."txt7";?>" name="TXT_MATERIAL_ID"  value="" onkeyup=""/>

<button type="button" id ="<?php echo $row."img";?>" class="btn btn-danger btn-danger-xs">X

</button>
<?php

                
}
?>
</div>
<div>
    <?php
$totalIngresados=$row-1; //(porque se se para con un NULL y le esta registrando como que tambien un dato)
echo "<br>";
echo "- Total elementos subidos: $totalIngresados";
}
else//si no se ha cargado el bak
{
echo "Necesitas primero importar el archivo";}
unlink($destino); //desenlazar a destino el lugar donde salen los datos(archivo)
}
 
?>
 <input type="button" value="Check" onclick="recogecampos();"/>
 <input type="button" value="Importar" onclick="recolectarValorCajastexto();"/>
</div>
<div id="cuerpo"> </div>
<div id="imprimir"> </div> 
<script type="text/javascript">

function recogecampos(){
    
var inputs = document.getElementById("grupo").getElementsByTagName("input");

var filas = inputs.length / 7;
//alert(filas);
var num = 2;
for (i=1; i <= filas; i++){
    
var idcaja6 = num + "txt6";
//var idcaja7 = num + "txt7";

var caja6Valor = document.getElementById(idcaja6).value;
//alert(caja6Valor);
var check2 = num + "img";
comprobarCodigoLconcatenado(caja6Valor,check2);
 num++;
//check=2;
//check2 = check + "img";
//alert(check2);
//for (i=5; i <= inputs.length; i += 6){

 //document.write(inputs[i].value) + "     ";
 //comprobarCodigoLconcatenado(inputs[i].value,check2);
 //check++;
 //check2 = check + "img";
}
   
}

function concatenacampos(id){
//var inputs = document.getElementById("grupo").getElementsByTagName("input");
//capturar numero fila
var largo = id.length;
//alert(largo);
if (largo == 5 ){
  fila = id.substring(0,1);  
   //alert(fila); 
}
if (largo == 6 ){
  fila = id.substring(0,2);  
   //alert(fila); 
}

//Capturamos el id de las cajas de texto
var idcaja1 = fila + "txt1";
var idcaja2 = fila + "txt2";
var idcaja6 = fila + "txt6";
//idcaja6 = fila."txt6";
//alert(idcaja1);

var cajaconcatenar = document.getElementById(idcaja6);
var cajaconcatenartamanio = document.getElementById(idcaja2);
var cajaconcatenarcodigol = document.getElementById(idcaja1);

cajaconcatenar.value =   cajaconcatenartamanio.value + cajaconcatenarcodigol.value ;

//alert(cajaconcatenar.value);
fila = fila + "img";
comprobarCodigoLconcatenado(cajaconcatenar.value,fila);

}

 //------------------------------------////
            
            function comprobarCodigoLconcatenado(codigol,check2){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
                
                var largo = check2.length;
//alert(largo);
            if (largo == 4 ){
             var fila = check2.substring(0,1);  
   //alert(fila); 
}
            if (largo == 5 ){
             var fila = check2.substring(0,2);  
   //alert(fila); 
}
            var idcaja7 = fila + "txt7";
            var cajaid = document.getElementById(idcaja7);

                paginaPhp="11_comprobar_bbdd_total.php";
                var ResultadoCheck = document.getElementById(check2);//guardamos en resultado el nodo div con id info
                
                var Resultadocuerpo = document.getElementById("cuerpo");
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                //alert(check);
 
               var nuevoValor=codigol;
               var nuevoValor2=check2;
  
               var informacionDelUsuario = "codigol=" + nuevoValor + "&check2=" + nuevoValor2;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
    
                        Resultadocuerpo.innerHTML = mensaje;
                       var valor =xmlhttp.responseText;
                       var valorcortado = valor.split("/");
                       //alert(valorcortado[1]);
                       
                         cajaid.value = valorcortado[1];  
                      
                       
                        if (valorcortado[0]==1){
                            
                          ResultadoCheck.setAttribute("class", "btn btn-success btn-success-xs");//mostramos a traves de la propiedad innerhtml del div info la informacion devuelta por el servidor.  
                          ResultadoCheck.innerHTML = "ok";
                        }else{
                             ResultadoCheck.setAttribute("class", "btn btn-danger btn-danger-xs");
                             ResultadoCheck.innerHTML = "X";
                        }
                       
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
            }
            
            
            
         
            //-------------------------------------
function recolectarValorCajastexto(){//creamos la funcion enviar enviar_datos_ajax para enviar la peticion de ajax al servidor.
     
   var cajasTexto = document.getElementById("grupo").getElementsByTagName("input");
   var cajaRevisionValor = document.getElementById("REVISION").value;

//SELECT ISOMETRICOS
        var PEDIDOSid = document.getElementById("PEDIDOid").value;//capturamos el select donde vamos a mostrar la tabla.
        var PROYECTOid = document.getElementById("PROYECTOid").value;//capturamos el select donde vamos a mostrar la tabla.
var filas = cajasTexto.length / 7;

var num = 2;
for (i=1; i <= filas; i++){
    
//var idcaja1 = num + "txt1";
//var idcaja2 = num + "txt2";
//var idcaja3 = num + "txt3";
var idcaja4 = num + "txt4";
var idcaja5 = num + "txt5";
var idcaja6 = num + "txt6";
var idcaja7 = num + "txt7";


//NO SE UTILIZAN DE MOMENTO, PERO SE DEJAN GUARDADOS LOS VALORES.
//var caja1 = document.getElementById(idcaja1).value;
//var caja2 = document.getElementById(idcaja2).value;
//var caja3 = document.getElementById(idcaja3).value;

var caja4Cantidad = document.getElementById(idcaja4).value;
var caja5Isometrico = document.getElementById(idcaja5).value;
var caja6CodigoLconcatenado = document.getElementById(idcaja6).value;
var caja7_id_registro_bbdd = document.getElementById(idcaja7).value;


/*if (caja7_id_registro_bbdd== "undefined"){
    caja7_id_registro_bbdd=0;
}*/

 num++;
 //alert(caja7_id_registro_bbdd);
importarMaterial(caja4Cantidad,caja5Isometrico,caja6CodigoLconcatenado,caja7_id_registro_bbdd,cajaRevisionValor,PEDIDOSid,PROYECTOid);
}

}     
  function anadir()
                        {
                        resultado_CONSULTA = window.opener.document.getElementById("caja_bom");//
                
                        }   
function importarMaterial(caja4Cantidad,caja5Isometrico,caja6CodigoLconcatenado,caja7_id_registro_bbdd,cajaRevisionValor,PEDIDOSid,PROYECTOid){
    
                paginaPhp="11_insertar_importacion_bbdd_total.php";
                //resultado_CONSULTA=document.getElementById("imprimir");
                //var Resultadocuerpo = document.getElementById("cuerpo");
                var xmlhttp;//creamos la variable xmlhttp
                
                if (window.XMLHttpRequest){//el valor de xmlhttp va a depender del navegador que estemos utilizando,si se trata de un navegador antiguo o moderno.
                    xmlhttp = new XMLHttpRequest();
                    
                }else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                //alert(check);
 
              /* var nuevoValor=caja1;
               var nuevoValor2=caja2;
               var nuevoValor3=caja3;*/
        
               var nuevoValor4=caja4Cantidad;
               var nuevoValor5=caja5Isometrico;
               var nuevoValor6=caja6CodigoLconcatenado;
               var nuevoValor7=caja7_id_registro_bbdd;
               var nuevoValor8=cajaRevisionValor;
               var nuevoValor9=PEDIDOSid;
                var nuevoValor10=PROYECTOid;
             
                /*alert("isometrico " + caja5Isometrico);
                   alert("pedidos " + PEDIDOSid);
                   alert("ID " + caja7_id_registro_bbdd);
                   alert("CANTIDAD " + caja4Cantidad);
                   alert("REVISION " + cajaRevisionValor);
                   alert("PROYECTO " + PROYECTOid);*/
        
               var informacionDelUsuario =  "&caja4Cantidad=" + nuevoValor4 + "&caja5Isometrico=" + nuevoValor5 + "&caja6CodigoLconcatenado=" + nuevoValor6
               + "&caja7_id_registro_bbdd=" + nuevoValor7 + "&cajaRevisionValor=" + nuevoValor8 + "&PEDIDOSid=" + nuevoValor9 + "&PROYECTOid=" + nuevoValor10;//guardamos el valor de la variable numero, en la variable informacion del usuario.
                
                xmlhttp.onreadystatechange = function(){//dentro de la propiedad onreadystatechange, creamos una funcion anonima.
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){//si la operacion ha sido finalizada y exitosa.
                        var mensaje = xmlhttp.responseText;//guardamos el mensaje del servidor , en la variable mensaje
                        anadir();
                        resultado_CONSULTA.innerHTML = mensaje;
                    }
                 
                }
                
                xmlhttp.open("POST",paginaPhp,true);//llamamos al metodo open del objeto xmlhttp, con tres parametros metodo de envio,pagina del servidor donde se evia el formulario, y true para indicar que es asincrono.
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//llamamos al metodo setrequestheader, para poder enviar la informacion al servidor.
                xmlhttp.send(informacionDelUsuario);//escribimos el objeto xmlhttp, con el metodo send, incluyendo la informaicon del usuario.
        
        
            }
            

</script> 
 
</body>
