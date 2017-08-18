<?php
       
   
        class conexion{//establece una conexion con la base de datos y ejecuta metodos para ejecutar consultar , insertar ,borrar y actualizar registros.
            
            
            protected $conexion_db;
            
            public function __construct(){//creamos el constructor de la clase conexion.
                
                try{//utilizamos un try catch para capturar las posibles excepciones que puedan producir.
                    
                    $this->conexion_db=new PDO('mysql:host=localhost; dbname=bom_web', 'root','');//creamos una conexion con la clase pdo a nuestra base de datos.
                    
                    $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//incluimos la sentencia para poder captura excepciones.
            
                    $this->conexion_db->exec("SET CHARACTER SET utf8");//establecemos los caracteres utf8 que permiten acentos.
                    //echo "conexion exitosa";
            
                    return $this->conexion_db;//Devolvemos la conexion creada con el constructor.
                    
                    } catch (Exception $ex) {//capturamos las excepciones en la variable $ex

                    echo "la línea de error es: " . $ex->getLine();//mostramos la linea del error.
                    }
                
                
            }
            
           
                public function get_consulta($sql){//creamos un metodo para realizar consulta , recibiendo como parametro la sentencia sql.
                
 
                $sentencia=$this->conexion_db->prepare($sql);//creamos una sentencia preparada.
                
                $sentencia->execute(array());//ejecutamos la sentencia preparada.
                
                $resultado =$sentencia->fetchAll(PDO::FETCH_ASSOC);//guardamos el resultado de la consulta en un array asociativo.
                
                $sentencia->closeCursor();//cerramos el cursor.
                
                return $resultado;//devolvemos el resultado de la consulta.
                
                $this->conexion_db=null;//cerramos la conexion.
      
            }
            
        
            public function get_consulta_Cod_L($id_celda,$valor_ID2){//creamos un metodo para realizar consulta , recibiendo como parametro la sentencia sql.
                
                
                 $sql="SELECT * FROM material_pedidos_temp where MATERIAL_ID =:SECC and PEDIDO_ID =:SECC2";
                
                $sentencia=$this->conexion_db->prepare($sql);//creamos una sentencia preparada.
                
                $sentencia->execute(array(":SECC"=>$id_celda,":SECC2"=>$valor_ID2));//ejecutamos la sentencia preparada.
                
                $resultado =$sentencia->fetchAll(PDO::FETCH_ASSOC);//guardamos el resultado de la consulta en un array asociativo.
                
                $sentencia->closeCursor();//cerramos el cursor.
                
                return $resultado;//devolvemos el resultado de la consulta.
                
                $this->conexion_db=null;//cerramos la conexion.
      
            }
            
            
            
            
            public function get_consultaJUNTAS($id_celda){//creamos un metodo para realizar consulta , recibiendo como parametro la sentencia sql.
                
                
                 $sql="SELECT * FROM material_isometricos_temp where JUNTAS_ID =:SECC";
                
                $sentencia=$this->conexion_db->prepare($sql);//creamos una sentencia preparada.
                
                $sentencia->execute(array(":SECC"=>$id_celda));//ejecutamos la sentencia preparada.
                
                $resultado =$sentencia->fetchAll(PDO::FETCH_ASSOC);//guardamos el resultado de la consulta en un array asociativo.
                
                $sentencia->closeCursor();//cerramos el cursor.
                
                return $resultado;//devolvemos el resultado de la consulta.
                
                $this->conexion_db=null;//cerramos la conexion.
      
            }
            
            public function get_consulta_PERNOS($id_celda){//creamos un metodo para realizar consulta , recibiendo como parametro la sentencia sql.
                
                
                 $sql="SELECT * FROM material_isometricos_temp where PERNO_ID =:SECC";
                
                $sentencia=$this->conexion_db->prepare($sql);//creamos una sentencia preparada.
                
                $sentencia->execute(array(":SECC"=>$id_celda));//ejecutamos la sentencia preparada.
                
                $resultado =$sentencia->fetchAll(PDO::FETCH_ASSOC);//guardamos el resultado de la consulta en un array asociativo.
                
                $sentencia->closeCursor();//cerramos el cursor.
                
                return $resultado;//devolvemos el resultado de la consulta.
                
                $this->conexion_db=null;//cerramos la conexion.
      
            }
            
            public function get_consulta_VALVULAS($id_celda){//creamos un metodo para realizar consulta , recibiendo como parametro la sentencia sql.
                
                
                 $sql="SELECT * FROM material_isometricos_temp where VALVULAS_ID =:SECC";
                
                $sentencia=$this->conexion_db->prepare($sql);//creamos una sentencia preparada.
                
                $sentencia->execute(array(":SECC"=>$id_celda));//ejecutamos la sentencia preparada.
                
                $resultado =$sentencia->fetchAll(PDO::FETCH_ASSOC);//guardamos el resultado de la consulta en un array asociativo.
                
                $sentencia->closeCursor();//cerramos el cursor.
                
                return $resultado;//devolvemos el resultado de la consulta.
                
                $this->conexion_db=null;//cerramos la conexion.
      
            }
            
            public function get_consulta_TUBERIAS($id_celda){//creamos un metodo para realizar consulta , recibiendo como parametro la sentencia sql.
                
                
                 $sql="SELECT * FROM material_isometricos_temp where TUBERIA_ID =:SECC";
                
                $sentencia=$this->conexion_db->prepare($sql);//creamos una sentencia preparada.
                
                $sentencia->execute(array(":SECC"=>$id_celda));//ejecutamos la sentencia preparada.
                
                $resultado =$sentencia->fetchAll(PDO::FETCH_ASSOC);//guardamos el resultado de la consulta en un array asociativo.
                
                $sentencia->closeCursor();//cerramos el cursor.
                
                return $resultado;//devolvemos el resultado de la consulta.
                
                $this->conexion_db=null;//cerramos la conexion.
      
            }
            
          public function get_consulta_BRIDAS($id_celda){//creamos un metodo para realizar consulta , recibiendo como parametro la sentencia sql.
                
                
                 $sql="SELECT * FROM material_isometricos_temp where BRIDAS_ID =:SECC";
                
                $sentencia=$this->conexion_db->prepare($sql);//creamos una sentencia preparada.
                
                $sentencia->execute(array(":SECC"=>$id_celda));//ejecutamos la sentencia preparada.
                
                $resultado =$sentencia->fetchAll(PDO::FETCH_ASSOC);//guardamos el resultado de la consulta en un array asociativo.
                
                $sentencia->closeCursor();//cerramos el cursor.
                
                return $resultado;//devolvemos el resultado de la consulta.
                
                $this->conexion_db=null;//cerramos la conexion.
      
            }

            
            public function eliminar_registro($id,$tabla,$ELEMENTO_ID)//metodo que elimina registros, recibiendo una serie de parámetros.
            {
                
               
            
            $sql="DELETE FROM $tabla WHERE $ELEMENTO_ID = :SECC ";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$id));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
    
            public function insertar_registro($valor_NOM,$valor_DESC,$valor_SERV,$valor_R_MAX,$valor_R_MIN,$valor_OLD,$ESPEC_id,$LOCALIZACIONid,$TIPO_I_Oid,$DIAGRAMAid,$EQUIPOid,$LINEAid,$SISTEMAid,$TIPO_INSTid,$SENALid,$PANELid)
            {//funcion que inserta un nuevo registro recibiendo 18 variables como parametros.
                

            $sql="INSERT INTO  instrumento VALUES (NULL,:SECC,:SECC2, :SECC3 , :SECC4 , :SECC5, :SECC6 , :SECC7 , NULL , :SECC9 , :SECC10 , :SECC11, :SECC12 , :SECC13  , :SECC14 , :SECC15 , :SECC16 , :SECC17 )";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$valor_NOM,":SECC2"=>$valor_DESC,":SECC3"=>$valor_SERV,":SECC4"=>$valor_R_MAX,":SECC5"=>$valor_R_MIN,":SECC6"=>$valor_OLD,":SECC7"=>$ESPEC_id,
             ":SECC9"=>$LOCALIZACIONid,":SECC10"=>$TIPO_I_Oid,":SECC11"=>$DIAGRAMAid,":SECC12"=>$EQUIPOid,":SECC13"=>$LINEAid,":SECC14"=>$SISTEMAid,":SECC15"=>$TIPO_INSTid,":SECC16"=>$SENALid,":SECC17"=>$PANELid));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            
            
            public function insertar_registro2($valor_NOM,$valor_DESC,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 3 variables como parametros.
                

            $sql="INSERT INTO  $tabla VALUES (NULL,:SECC,:SECC2 )";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$valor_NOM,":SECC2"=>$valor_DESC ));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            public function insertar_registro_proyectos($valor_NOM,$valor_DESC,$valor_AREA,$valor_UNIDAD,$valor_HORAS,$tabla)//metodo que inserta un nuevo registro utilizando 4 parametros.
            {//funcion que inserta un nuevo registro recibiendo 4 variables como parametros.
                

            $sql="INSERT INTO  $tabla VALUES (NULL,:SECC,:SECC2,:SECC3,:SECC4,:SECC5 )";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$valor_NOM,":SECC2"=>$valor_DESC,":SECC3"=>$valor_AREA,":SECC4"=>$valor_UNIDAD,":SECC5"=>$valor_HORAS ));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            public function insertar_registro_pedidos($NOMBRE_PEDIDO,$id_USUARIO,$id_PROYECTO,$tabla)//metodo que inserta un nuevo registro utilizando 4 parametros.
            {//funcion que inserta un nuevo registro recibiendo 4 variables como parametros.
                

            $sql="INSERT INTO  $tabla VALUES (NULL,:SECC,:SECC2,:SECC3)";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$NOMBRE_PEDIDO,":SECC2"=>$id_USUARIO,":SECC3"=>$id_PROYECTO));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            public function insertar_registro4($valor_tag_id, $tabla_hook_up_inst)
            {//funcion que inserta un nuevo registro recibiendo 2 variables como parametros.
                

            $sql="INSERT INTO  $tabla_hook_up_inst VALUES (NULL,:SECC,:SECC2,NULL )";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$valor_tag_id,":SECC2"=>$valor_DESC,":SECC3"=>$valor_cs ));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            public function insertar_registro5($valor_mat_id,$tabla_material_temp)
            {//funcion que inserta un nuevo registro recibiendo 2 variables como parametros.
                

            $sql="INSERT INTO  $tabla_material_temp VALUES (NULL,:SECC )";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$valor_mat_id));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            
            public function insertar_registro6($valor_NOM,$valor_desc,$valor_dib,$valor_id,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 5 variables como parametros.
                

            $sql="INSERT INTO  $tabla VALUES (NULL,:SECC,:SECC2,:SECC3,:SECC4 )";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$valor_NOM,":SECC2"=>$valor_desc,":SECC3"=>$valor_dib,":SECC4"=>$valor_id ));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            public function insertar_registro7($valor_ID1,$valor_ID2,$valor_ID3,$valor_ID4,$valor_ID5,$valor_ID6,$valor_ID7,$valor_ID8,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 6 variables como parametros.
                

            $sql="INSERT INTO  $tabla VALUES (NULL,:SECC,:SECC2,:SECC3,:SECC4,:SECC5,:SECC6,:SECC7,:SECC8 )";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$valor_ID1,":SECC2"=>$valor_ID2,":SECC3"=>$valor_ID3,":SECC4"=>$valor_ID4,":SECC5"=>$valor_ID5,":SECC6"=>$valor_ID6,":SECC7"=>$valor_ID7,":SECC8"=>$valor_ID8));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
           
            public function insertar_registro8($valor_ID1,$valor_ID2,$familia,$valor_ID3,$valor_ID4,$valor_ID5,$valor_ID6,$valor_ID7,$valor_ID8,$valor_ID9,$valor_ID10,$valor_ID11,$valor_ID12,$valor_ID13,$valor_ID14,$valor_ID15,$valor_ID16,$valor_ID17,$valor_ID18,$valor_ID19,$valor_ID20,$valorCodL,$SUBFAMILIA,$DIAMETRO_MAYOR,$SCH_MAYOR,$DIAMETRO_MENOR,$SCH_MENOR,$LONGITUD,$RATING,$CODIGO_L,$DESCRIPCION,$CODIGO_CARTAGENA,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.
                

            $sql="INSERT INTO  $tabla (ISOMETRICO_ID,FECHA,FAMILIA,ACCESORIOS_ID,BRIDAS_ID,JUNTAS_ID,VALVULAS_ID,PERNO_ID,TUBERIA_ID,MTO_REV0, MTO_REV0A, MTO_REV0B, MTO_REV0C,MTO_REV1, MTO_REV1A, MTO_REV1B, MTO_REV1C,MTO_REV2, MTO_REV2A, MTO_REV2B, MTO_REV2C,CODIGO_L_CONCATENADO,SUBFAMILIA,DIAMETRO_MAYOR,SCH_MAYOR,DIAMETRO_MENOR,SCH_MENOR,LONGITUD,RATING,CODIGO_L,DESCRIPCION,CODIGO_CARTAGENA) VALUES (:SECC1,:SECC2,:SECC21,:SECC3,:SECC4,:SECC5,:SECC6,:SECC7,:SECC8,:SECC9,:SECC10,:SECC11,:SECC12,:SECC13,:SECC14,:SECC15,:SECC16,:SECC17,:SECC18,:SECC19,:SECC20,:SECC22,:SECC23,:SECC24,:SECC25,:SECC26,:SECC27,:SECC28,:SECC29,:SECC30,:SECC31,:SECC32)";
            
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$valor_ID1,":SECC2"=>$valor_ID2,":SECC3"=>$valor_ID3,":SECC4"=>$valor_ID4,":SECC5"=>$valor_ID5,":SECC6"=>$valor_ID6,":SECC7"=>$valor_ID7,":SECC8"=>$valor_ID8 ,":SECC9"=>$valor_ID9,":SECC10"=>$valor_ID10,":SECC11"=>$valor_ID11,":SECC12"=>$valor_ID12,":SECC13"=>$valor_ID13,":SECC14"=>$valor_ID14,":SECC15"=>$valor_ID15,":SECC16"=>$valor_ID16,":SECC17"=>$valor_ID17,":SECC18"=>$valor_ID18,":SECC19"=>$valor_ID19,":SECC20"=>$valor_ID20,":SECC21"=>$familia,":SECC22"=>$valorCodL,":SECC23"=>$SUBFAMILIA,":SECC24"=>$DIAMETRO_MAYOR,":SECC25"=>$SCH_MAYOR,":SECC26"=>$DIAMETRO_MENOR,":SECC27"=>$SCH_MENOR,":SECC28"=>$LONGITUD,":SECC29"=>$RATING,":SECC30"=>$CODIGO_L,":SECC31"=>$DESCRIPCION,":SECC32"=>$CODIGO_CARTAGENA));//ejecutamos el metodo execute del objeto pdo statement.
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
            }
            
            public function insertar_registro_importacion($valor_ID1, $valor_ID2, $valor_ID3, $valor_ID4, $valor_ID5, $valor_ID6, $valor_ID7,$valor_ID8,$valor_ID9,$valor_ID10,$valor_ID11,$valor_ID12,$valor_ID13,$valor_ID14,$valor_ID15,$valor_ID16,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 6 variables como parametros.
                

            $sql="INSERT INTO  $tabla VALUES (NULL,:SECC,:SECC2,:SECC3,:SECC4,:SECC5,:SECC6,:SECC7,:SECC8,:SECC9,:SECC10,:SECC11,:SECC12,:SECC13,:SECC14,:SECC15,:SECC16 )";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$valor_ID1,":SECC2"=>$valor_ID2,":SECC3"=>$valor_ID3,":SECC4"=>$valor_ID4,":SECC5"=>$valor_ID5,":SECC6"=>$valor_ID6,":SECC7"=>$valor_ID7,":SECC8"=>$valor_ID8,":SECC9"=>$valor_ID9,":SECC10"=>$valor_ID10,":SECC11"=>$valor_ID11,":SECC12"=>$valor_ID12,":SECC13"=>$valor_ID13,":SECC14"=>$valor_ID14,":SECC15"=>$valor_ID15,":SECC16"=>$valor_ID16));//ejecutamos el metodo execute del objeto pdo statement.
            
            }
            
            
            public function editar_registro($valor_NOM,$valor_DESC,$valor_SERV,$valor_R_MAX,$valor_R_MIN,$valor_OLD,$ESPEC_id,$LOCALIZACIONid,$TIPO_I_Oid,$DIAGRAMAid,$EQUIPOid,$LINEAid,$SISTEMAid,$TIPO_INSTid,$SENALid,$PANELid,$valor)
            {
                
            $sql="UPDATE  INSTRUMENTO SET  INST_NOMBRE = :SECC,INST_DESC =:SECC2, INST_SERV =:SECC3 , INST_RANGO_MAX =:SECC4 , INST_RANGO_MIN =:SECC5, INST_OLD_INST_NAME =:SECC6 , ESPEC_ID =:SECC7 , ESTADO_ID = NULL , LOCALIZACION_ID =:SECC9 , TIPO_I_O_ID =:SECC10 , DIAGRAMA_ID =:SECC11, EQUIPO_ID =:SECC12 , LINEA_ID =:SECC13  , SISTEMA_ID =:SECC14 , TIPO_INST_ID =:SECC15 , SENAL_ID =:SECC16 , PANEL_ID =:SECC17 WHERE INSTRUMENTO.INST_ID = :SECC18 ";//preparamos una consulta con marcadores.
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$valor_NOM,":SECC2"=>$valor_DESC,":SECC3"=>$valor_SERV,":SECC4"=>$valor_R_MAX,":SECC5"=>$valor_R_MIN,":SECC6"=>$valor_OLD,":SECC7"=>$ESPEC_id,
            ":SECC9"=>$LOCALIZACIONid,":SECC10"=>$TIPO_I_Oid,":SECC11"=>$DIAGRAMAid,":SECC12"=>$EQUIPOid,":SECC13"=>$LINEAid,":SECC14"=>$SISTEMAid,":SECC15"=>$TIPO_INSTid,":SECC16"=>$SENALid,":SECC17"=>$PANELid,":SECC18"=>$valor));//ejecutamos el metodo execute del objeto pdo statement.
            
            }
            
            

            public function vaciar_tabla($sql)//metodo para dejar vacía una tabla.
            {
                
      
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC"=>$id));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
         
            public function CloseConexion()//funcion que cierra la conexión con la base de datos.
{
            // Se pone el objeto PDO a null para cerrar la conexión
            $this->conexion_db = null;
}    
          ///*CANTIDAD= CANTIDAD+:SECC2 */

            public function update_registroJUNTAS($valor_ID1,$valor_ID2,$valor_ID3,$valor_ID4,$valor_ID5,$valor_ID6,$valor_ID7,$valor_ID8,$valor_ID9,$valor_ID10,$valor_ID11,$valor_ID12,$valor_ID13,$valor_ID14,$valor_ID15,$valor_ID16,$valor_ID17,$valor_ID18,$valor_ID19,$valor_ID20,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE material_pedidos_temp SET PEDIDO_ID=:SECC1,FECHA=:SECC2, ACCESORIOS_ID=:SECC3, BRIDAS_ID=:SECC4, JUNTAS_ID=:SECC5, VALVULAS_ID=:SECC6, PERNO_ID=:SECC7, TUBERIA_ID=:SECC8, MTO_REV0=MTO_REV0 + :SECC9, MTO_REV0A=MTO_REV0A+:SECC10, MTO_REV0B=MTO_REV0B+:SECC11, MTO_REV0C=MTO_REV0C+:SECC12, MTO_REV1=MTO_REV1+:SECC13, MTO_REV1A=MTO_REV1A+:SECC14, MTO_REV1B=MTO_REV1B+:SECC15, MTO_REV1C=MTO_REV1C+:SECC16, MTO_REV2=MTO_REV2+:SECC17, MTO_REV2A=MTO_REV2A+:SECC18, MTO_REV2B=MTO_REV2B+:SECC19, MTO_REV2C=MTO_REV2C+:SECC20 WHERE JUNTAS_ID=:SECC5"; 
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$valor_ID1,":SECC2"=>$valor_ID2,":SECC3"=>$valor_ID3,":SECC4"=>$valor_ID4,":SECC5"=>$valor_ID5,":SECC6"=>$valor_ID6,":SECC7"=>$valor_ID7,":SECC8"=>$valor_ID8 ,":SECC9"=>$valor_ID9,":SECC10"=>$valor_ID10,":SECC11"=>$valor_ID11,":SECC12"=>$valor_ID12,":SECC13"=>$valor_ID13,":SECC14"=>$valor_ID14,":SECC15"=>$valor_ID15,":SECC16"=>$valor_ID16,":SECC17"=>$valor_ID17,":SECC18"=>$valor_ID18,":SECC19"=>$valor_ID19,":SECC20"=>$valor_ID20));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            public function update_registroPERNOS($valor_ID1,$valor_ID2,$valor_ID3,$valor_ID4,$valor_ID5,$valor_ID6,$valor_ID7,$valor_ID8,$valor_ID9,$valor_ID10,$valor_ID11,$valor_ID12,$valor_ID13,$valor_ID14,$valor_ID15,$valor_ID16,$valor_ID17,$valor_ID18,$valor_ID19,$valor_ID20,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE material_pedidos_temp SET PEDIDO_ID=:SECC1,FECHA=:SECC2, ACCESORIOS_ID=:SECC3, BRIDAS_ID=:SECC4, JUNTAS_ID=:SECC5, VALVULAS_ID=:SECC6, PERNO_ID=:SECC7, TUBERIA_ID=:SECC8, MTO_REV0=MTO_REV0 + :SECC9, MTO_REV0A=MTO_REV0A+:SECC10, MTO_REV0B=MTO_REV0B+:SECC11, MTO_REV0C=MTO_REV0C+:SECC12, MTO_REV1=MTO_REV1+:SECC13, MTO_REV1A=MTO_REV1A+:SECC14, MTO_REV1B=MTO_REV1B+:SECC15, MTO_REV1C=MTO_REV1C+:SECC16, MTO_REV2=MTO_REV2+:SECC17, MTO_REV2A=MTO_REV2A+:SECC18, MTO_REV2B=MTO_REV2B+:SECC19, MTO_REV2C=MTO_REV2C+:SECC20 WHERE PERNO_ID=:SECC7";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$valor_ID1,":SECC2"=>$valor_ID2,":SECC3"=>$valor_ID3,":SECC4"=>$valor_ID4,":SECC5"=>$valor_ID5,":SECC6"=>$valor_ID6,":SECC7"=>$valor_ID7,":SECC8"=>$valor_ID8 ,":SECC9"=>$valor_ID9,":SECC10"=>$valor_ID10,":SECC11"=>$valor_ID11,":SECC12"=>$valor_ID12,":SECC13"=>$valor_ID13,":SECC14"=>$valor_ID14,":SECC15"=>$valor_ID15,":SECC16"=>$valor_ID16,":SECC17"=>$valor_ID17,":SECC18"=>$valor_ID18,":SECC19"=>$valor_ID19,":SECC20"=>$valor_ID20));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            public function update_registroVALVULAS($valor_ID1,$valor_ID2,$valor_ID3,$valor_ID4,$valor_ID5,$valor_ID6,$valor_ID7,$valor_ID8,$valor_ID9,$valor_ID10,$valor_ID11,$valor_ID12,$valor_ID13,$valor_ID14,$valor_ID15,$valor_ID16,$valor_ID17,$valor_ID18,$valor_ID19,$valor_ID20,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE material_pedidos_temp SET PEDIDO_ID=:SECC1,FECHA=:SECC2, ACCESORIOS_ID=:SECC3, BRIDAS_ID=:SECC4, JUNTAS_ID=:SECC5, VALVULAS_ID=:SECC6, PERNO_ID=:SECC7, TUBERIA_ID=:SECC8, MTO_REV0=MTO_REV0 + :SECC9, MTO_REV0A=MTO_REV0A+:SECC10, MTO_REV0B=MTO_REV0B+:SECC11, MTO_REV0C=MTO_REV0C+:SECC12, MTO_REV1=MTO_REV1+:SECC13, MTO_REV1A=MTO_REV1A+:SECC14, MTO_REV1B=MTO_REV1B+:SECC15, MTO_REV1C=MTO_REV1C+:SECC16, MTO_REV2=MTO_REV2+:SECC17, MTO_REV2A=MTO_REV2A+:SECC18, MTO_REV2B=MTO_REV2B+:SECC19, MTO_REV2C=MTO_REV2C+:SECC20 WHERE VALVULAS_ID=:SECC6";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$valor_ID1,":SECC2"=>$valor_ID2,":SECC3"=>$valor_ID3,":SECC4"=>$valor_ID4,":SECC5"=>$valor_ID5,":SECC6"=>$valor_ID6,":SECC7"=>$valor_ID7,":SECC8"=>$valor_ID8 ,":SECC9"=>$valor_ID9,":SECC10"=>$valor_ID10,":SECC11"=>$valor_ID11,":SECC12"=>$valor_ID12,":SECC13"=>$valor_ID13,":SECC14"=>$valor_ID14,":SECC15"=>$valor_ID15,":SECC16"=>$valor_ID16,":SECC17"=>$valor_ID17,":SECC18"=>$valor_ID18,":SECC19"=>$valor_ID19,":SECC20"=>$valor_ID20));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            public function update_registroTUBERIAS($valor_ID1,$valor_ID2,$valor_ID3,$valor_ID4,$valor_ID5,$valor_ID6,$valor_ID7,$valor_ID8,$valor_ID9,$valor_ID10,$valor_ID11,$valor_ID12,$valor_ID13,$valor_ID14,$valor_ID15,$valor_ID16,$valor_ID17,$valor_ID18,$valor_ID19,$valor_ID20,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE material_isometricos_temp SET PEDIDO_ID=:SECC1,FECHA=:SECC2, ACCESORIOS_ID=:SECC3, BRIDAS_ID=:SECC4, VALVULAS_ID=:SECC5, VALVULAS_ID=:SECC6, PERNO_ID=:SECC7, TUBERIA_ID=:SECC8, MTO_REV0=MTO_REV0 + :SECC9, MTO_REV0A=MTO_REV0A+:SECC10, MTO_REV0B=MTO_REV0B+:SECC11, MTO_REV0C=MTO_REV0C+:SECC12, MTO_REV1=MTO_REV1+:SECC13, MTO_REV1A=MTO_REV1A+:SECC14, MTO_REV1B=MTO_REV1B+:SECC15, MTO_REV1C=MTO_REV1C+:SECC16, MTO_REV2=MTO_REV2+:SECC17, MTO_REV2A=MTO_REV2A+:SECC18, MTO_REV2B=MTO_REV2B+:SECC19, MTO_REV2C=MTO_REV2C+:SECC20 WHERE TUBERIA_ID=:SECC8";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$valor_ID1,":SECC2"=>$valor_ID2,":SECC3"=>$valor_ID3,":SECC4"=>$valor_ID4,":SECC5"=>$valor_ID5,":SECC6"=>$valor_ID6,":SECC7"=>$valor_ID7,":SECC8"=>$valor_ID8 ,":SECC9"=>$valor_ID9,":SECC10"=>$valor_ID10,":SECC11"=>$valor_ID11,":SECC12"=>$valor_ID12,":SECC13"=>$valor_ID13,":SECC14"=>$valor_ID14,":SECC15"=>$valor_ID15,":SECC16"=>$valor_ID16,":SECC17"=>$valor_ID17,":SECC18"=>$valor_ID18,":SECC19"=>$valor_ID19,":SECC20"=>$valor_ID20));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
            
            public function update_registro_importacion($valor_ID1,$PEDIDOSid,$FECHA,$valor_ID4,$valor_ID5,$valor_ID6,$valor_ID7,$valor_ID8,$valor_ID9,$valor_ID10,$valor_ID11,$valor_ID12,$valor_ID13,$valor_ID14,$valor_ID15,$valor_ID16,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE material_pedidos_temp SET FECHA=:SECC3, MATERIAL_ID=:SECC4, MTO_REV_0=:SECC5, MTO_REV_0A=:SECC6, MTO_REV_0B=:SECC7, MTO_REV_0C=:SECC8, MTO_REV_1=:SECC9, MTO_REV_1A=:SECC10, MTO_REV_1B=:SECC11, MTO_REV_1C=:SECC12,MTO_REV_2=:SECC13, MTO_REV_2A=:SECC14, MTO_REV_2B=:SECC15, MTO_REV_2C=:SECC16 WHERE MATERIAL_ID=:SECC4 AND ISOMETRICO_NOMBRE =:SECC1 AND PEDIDO_ID =:SECC2";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$valor_ID1,":SECC2"=>$PEDIDOSid,":SECC3"=>$FECHA,":SECC4"=>$valor_ID4,":SECC5"=>$valor_ID5,":SECC6"=>$valor_ID6,":SECC7"=>$valor_ID7,":SECC8"=>$valor_ID8,":SECC9"=>$valor_ID9,":SECC10"=>$valor_ID10,":SECC11"=>$valor_ID11,":SECC12"=>$valor_ID12,":SECC13"=>$valor_ID13,":SECC14"=>$valor_ID14,":SECC15"=>$valor_ID15,":SECC16"=>$valor_ID16));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            public function update_registroBRIDAS($valor_ID1,$valor_ID2,$valor_ID3,$valor_ID4,$valor_ID5,$valor_ID6,$valor_ID7,$valor_ID8,$valor_ID9,$valor_ID10,$valor_ID11,$valor_ID12,$valor_ID13,$valor_ID14,$valor_ID15,$valor_ID16,$valor_ID17,$valor_ID18,$valor_ID19,$valor_ID20,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE material_isometricos_temp SET PEDIDO_ID=:SECC1,FECHA=:SECC2, ACCESORIOS_ID=:SECC3, BRIDAS_ID=:SECC4, VALVULAS_ID=:SECC5, VALVULAS_ID=:SECC6, PERNO_ID=:SECC7, TUBERIA_ID=:SECC8, MTO_REV0=MTO_REV0 + :SECC9, MTO_REV0A=MTO_REV0A+:SECC10, MTO_REV0B=MTO_REV0B+:SECC11, MTO_REV0C=MTO_REV0C+:SECC12, MTO_REV1=MTO_REV1+:SECC13, MTO_REV1A=MTO_REV1A+:SECC14, MTO_REV1B=MTO_REV1B+:SECC15, MTO_REV1C=MTO_REV1C+:SECC16, MTO_REV2=MTO_REV2+:SECC17, MTO_REV2A=MTO_REV2A+:SECC18, MTO_REV2B=MTO_REV2B+:SECC19, MTO_REV2C=MTO_REV2C+:SECC20 WHERE BRIDAS_ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$valor_ID1,":SECC2"=>$valor_ID2,":SECC3"=>$valor_ID3,":SECC4"=>$valor_ID4,":SECC5"=>$valor_ID5,":SECC6"=>$valor_ID6,":SECC7"=>$valor_ID7,":SECC8"=>$valor_ID8 ,":SECC9"=>$valor_ID9,":SECC10"=>$valor_ID10,":SECC11"=>$valor_ID11,":SECC12"=>$valor_ID12,":SECC13"=>$valor_ID13,":SECC14"=>$valor_ID14,":SECC15"=>$valor_ID15,":SECC16"=>$valor_ID16,":SECC17"=>$valor_ID17,":SECC18"=>$valor_ID18,":SECC19"=>$valor_ID19,":SECC20"=>$valor_ID20));//ejecutamos el metodo execute del objeto pdo statement.
        
        
            }
           
            
            public function update_registro_isometrico($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET ISOMETRICO_NOMBRE=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            public function update_registro_mto_rev_0($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_0=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            public function update_registro_mto_rev_0A($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_0A=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            public function update_registro_mto_rev_0B($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_0B=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            public function update_registro_mto_rev_0C($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_0C=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            
            public function update_registro_mto_rev_1($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_1=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            
            
            public function update_registro_mto_rev_1A($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_1A=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            public function update_registro_mto_rev_1B($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_1B=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            public function update_registro_mto_rev_1C($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_1C=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            public function update_registro_mto_rev_2($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_2=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            
            public function update_registro_mto_rev_2A($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_2A=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            public function update_registro_mto_rev_2B($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_2B=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            public function update_registro_mto_rev_2C($caja5Isometrico,$valor_ID,$tabla)
            {//funcion que inserta un nuevo registro recibiendo 8 variables como parametros.

            $sql="UPDATE $tabla SET MTO_REV_2C=:SECC1 WHERE ID=:SECC4";  
                   
            
            $resultado= $this->conexion_db->prepare($sql);//almacenamos en una variable el objeto pdo statement lanzando el metodo prepare del objeto conexion.
            
            $resultado->execute(array(":SECC1"=>$caja5Isometrico, ":SECC4"=>$valor_ID));//ejecutamos el metodo execute del objeto pdo statement.
        
            }
            
            
            
            
            
            
        }
        
        
        
        ?>
   