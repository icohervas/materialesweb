<?php
session_start();//iniciamos la sesion ya que vamos a utilizar variables de sesion.
/*if (!isset($_SESSION['usuario'])) { //si no existe la sesion de usuario , 
   header("Location: login.php");  //redirigimos a la pagina login.php
  }else{*/
require("conexion.php");
$conex = new conexion();
$vaciar="truncate table material_isometricos_temp";

$conex->vaciar_tabla($vaciar);

$conex->CloseConexion();
         
  // }
?>