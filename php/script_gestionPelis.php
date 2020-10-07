<?php 
 
class misPelis{
    
    private $newConn;
    public function __construct(){ 
        require_once ("classConnectionMySQL.php");
        // Creamos una nueva instancia
        $this->newConn = new ConnectionMySQL();
        // Creamos una nueva conexion
        $this->newConn->CreateConnection();
    }
    
    //////////////////////////////
    // INSERTAR Pelicula
    //////////////////////////////
    public function insertarPelis($nombre,$descripcion,$calificacion,$pathImage,$categoria,$precioDia,$multaDia,$anio){
        $query="CALL insertPelicula('$nombre', '$descripcion',$calificacion,'$pathImage','$categoria',$precioDia,$multaDia,$anio);";
        $result=$this->newConn->ExecuteQuery($query);
            if($result){
                $RowCount =  $this->newConn->GetCountAffectedRows();
                if($RowCount > 0){
                    //echo "Query ejecutado exitosamente<BR>";
                }
            }else{
               // echo "<h3>Error ejecutando la consulta</h3>";
        }   
    }
    //////////////////////////////
    // CONSULTAR Peliculas
    //////////////////////////////
    public function consultarPelis(){
        $query="CALL selectPeliculas()";
        $result = $this->newConn->ExecuteQuery($query);
        $result_array = array();
        if($result){
            $i = 0;
            while($row=$this->newConn->GetRows($result)){
                
                for($j = 0; $j<=8; $j++){
                    $result_array[$i][$j] = $row[$j];
                }
                $i++;
            }
            
            return $result_array;
        
        }else{
            echo "<h3>Error generando la consulta</h3>";
        }
    }
    //////////////////////////////
    // CONSULTAR Categorias de Peliculas
    //////////////////////////////
    public function getTiposCategorias(){
        $query="CALL getTiposCategorias();";
        $result = $this->newConn->ExecuteQuery($query);
        $result_array = array();
        if($result){
            $i = 0;
            while($row=$this->newConn->GetRows($result)){
                
                $result_array[$i] = $row[0];
                $i++;
            }
            
            return $result_array;
        
        }else{
            echo "<h3>Error generando la consulta</h3>";
        }
    }

    
    ////////////////////////////////
    // UPDATE
    ////////////////////////////////
    public function updatePelicula($idPelicula, $nombre, $descripcion, $calificacion, $categoria, $precioDia, $multaDia, $anio){
        $query="CALL updatePelicula('$idPelicula','$nombre', '$descripcion',$calificacion,'$categoria',$precioDia,$multaDia,$anio);";
        $result=$this->newConn->ExecuteQuery($query);
            if($result){
                $RowCount =  $this->newConn->GetCountAffectedRows();
                if($RowCount > 0){
                    //echo "Query ejecutado exitosamente<BR>";
                }
            }else{
               // echo "<h3>Error ejecutando la consulta</h3>";
        }
    }
    ///////////////////////////////
    // ELIMINAR Pelicula
    ///////////////////////////////
    public function eliminarPelis($idPelicula){
        $query="CALL deletePelicula($idPelicula);";
        $result=$this->newConn->ExecuteQuery($query);
        if($result){
            $RowCount=$this->newConn->GetCountAffectedRows();
            if($RowCount>0){
               // echo "Eliminado exitosamente";    
            }
        }
        else{
               // echo "<h3>Error ejecutando la consulta</h3>";
        }   
    }    
    
    ///////////////////////////////
    // Cerramos conexion a base de datos
    ///////////////////////////////
    public function cerrarConexion(){
        // Cerramos la Conexion a la BD
        $this->newConn->CloseConnection();
    }
    
}
?>