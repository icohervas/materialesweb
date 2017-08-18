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
        $RegistrosAMostrar=16;
        $conex = new conexion();
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

        $sql = "SELECT * FROM BBDD_TOTAL WHERE CODIGO_L_CONCATENADO LIKE '%$busqueda%' OR DESCRIPCION LIKE '%$busqueda%'  LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
        $sqlRESULTSET=$conex->get_consulta($sql);
        ?>
        <div id="contenido_cabecera" class="contenido_cabecera" style="display: table; width: 1210px;">
            <div class="eldiv" style="float: left; height: 20px; width: 30px; background-color: yellow; ">ID</div>
            <div class="eldiv" style="float: left; height: 20px; width: 60px; background-color: yellow;">FAMILIA</div>
            <div class="eldiv" style="float: left; height: 20px; width: 300px; background-color: yellow;">SUBFAMILIA</div>
            <div class="eldiv" style="float: left; height: 20px; width: 100px; background-color: yellow;">D_MAYOR</div>
            <div class="eldiv" style="float: left; height: 20px; width: 50px; background-color: yellow;">SCH_MAYOR</div>
            <div class="eldiv" style="float: left; height: 20px; width: 50px; background-color: yellow;">D_MENOR</div>
            <div class="eldiv" style="float: left; height: 20px; width: 50px; background-color: yellow;">SCH_MENOR</div>
            <div class="eldiv" style="float: left; height: 20px; width: 50px; background-color: yellow;">LONG</div>
            <div class="eldiv" style="float: left; height: 20px; width: 70px; background-color: yellow;">CODIGO_L</div>
            <div class="eldiv" style="float: left; height: 20px; width: 100px; background-color: yellow;">CODIGO_L_CONC</div>
            <div class="eldiv" style="float: left; height: 20px; width: 200px; background-color: yellow;">DESCRIPCION</div>
            <div class="eldiv" style="float: left; height: 20px; width: 150px; background-color: yellow;">CODIGO_CARTAGENA</div>
        </div>
        <?php
        if ($sqlRESULTSET != 0){
            foreach ($sqlRESULTSET as $elemento)://repetimos todas las filas de los registros existentes para que se vean en el formulario
        ?>
        <div id="contenido_inicial" class="contenido_inicial" style="display: table; width: 1250px;">

            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 30px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['ID'];?>
            </div>

            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 60px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['FAMILIA'];?>
            </div>

            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 300px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['SUBFAMILIA'];?>
            </div>

            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 100px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['DIAMETRO_MAYOR'];?>
            </div>

            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 50px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['SCH_MAYOR'];?>
            </div>

            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 50px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['DIAMETRO_MENOR'];?>
            </div>

            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 50px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['SCH_MENOR'];?>
            </div>
            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 50px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['LONGITUD'];?>
            </div>
            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 70px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['CODIGO_L'];?>
            </div>
            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 100px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['CODIGO_L_CONCATENADO'];?>
            </div>
            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 200px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['DESCRIPCION'];?>
            </div>
            <div id="<?php echo $elemento['ID'];?>" class="eldiv" style="float: left; height: 20px; width: 150px;" oncontextmenu="return showContextMenu(event,this.id);">
                <?php echo $elemento['CODIGO_CARTAGENA'];?>
            </div>
            <div style="float: left; height: 20px; width: 20px;">
                <img id="<?php echo $elemento['ID'];?>" class="borrar" src="test.jpg" style="width: 100%; height: 100%;" onclick="eliminar_valvula(this.id)" />
            </div>
            <div style="float: left; height: 20px; width: 20px;">
                <img id="<?php echo $elemento['ID'];?>" class="borrar" src="icono-menu.png" style="width: 100%; height: 100%;" onclick="editar_valvula(this.id)" />
            </div>
        </div>

    <?php 
            endforeach;
        }//******--------determinar las páginas---------******//
        //echo $busqueda;

        $sqltotalregistros = "SELECT ID  FROM BBDD_TOTAL WHERE CODIGO_L_CONCATENADO LIKE '%$busqueda%'";

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
        echo "<div class=\"eldiv\" style = \"float: left; height: 20px; width: 150px;\" onclick=\"busqueda_coincidencias('1','todo_material.php')\">Primero</div>";
        if($PagAct>1) echo "<div class=\"eldiv\" style = \"float: left; height: 20px; width: 150px;\" onclick=\"busqueda_coincidencias('$PagAnt','todo_material.php')\">Anterior</div> ";

        if($PagAct<$PagUlt)  echo " <div class=\"eldiv\" style = \"float: left; height: 20px; width: 150px;\" onclick=\"busqueda_coincidencias('$PagSig','todo_material.php')\">Siguiente</div> ";
        echo "<div class=\"eldiv\" style = \"float: left; height: 20px; width: 150px;\" onclick=\"busqueda_coincidencias('$PagUlt','todo_material.php')\">Ultimo</div>";

        $conex->CloseConexion();//cerramos la conexion.
    ?>
    <?php         
    //}
    ?>
    </body>

</html>
