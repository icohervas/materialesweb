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
    </head>
    <body>
        <?php
 require("conexion.php");
 require('PHPPaging.lib.php');
 mysql_connect("localhost","root");
 mysql_select_db("bom_web");
 $paging = new PHPPaging;
$busqueda = $_POST['valorBuscado'];

 $paging->agregarConsulta("SELECT * FROM VALVULAS WHERE CODIGO_L_CONCATENADO LIKE '%$busqueda%'");
$paging->ejecutar();

while ($f=$paging->fetchResultado()){
    echo $f['VALVULAS_ID']."   " . $f['CODIGO_L_CONCATENADO']. '<br>';
    
}
echo 'paginas' . $paging->fetchNavegacion();
?>
    </body>
</html>
