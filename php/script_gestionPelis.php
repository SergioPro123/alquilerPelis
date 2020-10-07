<?php 
 
class misPelis(){
    
    private $newConn;
    public function __construct(){ 
        require_once "classConnectionMySQL.php";
        // Creamos una nueva instancia
        $this->newConn = new ConnectionMySQL();
        // Creamos una nueva conexion
        $this->newConn->CreateConnection();

    }
    
    //////////////////////////////
    // INSERTAR
    //////////////////////////////
    pubilc function insertarPelis(){
        $query="INSERT INTO users(id, first_name, last_name, email, password) VALUES (DEFAULT,'Rafael','Rojas','alguncorreo@gmail.com','21232f297a57a5a743894a0e4a801fc3')";
        $result=$this->newConn->ExecuteQuery($query);
            if($result){
                $RowCount =  $this->newConn->GetCountAffectedRows();
                if($RowCount > 0){
                    echo "Query ejecutado exitosamente<BR>";
                }
            }else{
                echo "<h3>Error ejecutando la consulta</h3>";
        }   
    }
    //////////////////////////////
    // CONSULTAR
    //////////////////////////////
    pubilc function consultarPelis(){
        $query="SELECT * FROM users WHERE first_name LIKE 'Rafael'";
        $result = $this->newConn->ExecuteQuery($query);
        if($result){
        
            while($row=$this->newConn->GetRows($result)){
        
                echo "El usuario es:".$row[1]." ".$row[2]." ".$row[3];
        
            }
            
            $this->newConn->SetFreeResult($result);
        
        }else{
            echo "<h3>Error generando la consulta</h3>";
        }
    }

    
    ////////////////////////////////
    // UPDATE
    ////////////////////////////////
    pubilc function actualizarPelis(){
        $query="UPDATE users SET first_name='Pepe' WHERE first_name='Rafael'";
        $result=$this->newConn->ExecuteQuery("$query");
        if($result){
            if($result>0){
                echo "Registro actualizado correctamente";
            }
        
        }
        else{
                echo "<h3>Error ejecutando la consulta</h3>";
        }
    }
    ///////////////////////////////
    // ELIMINAR
    ///////////////////////////////
    pubilc function eliminarPelis(){
        $query="DELETE FROM users WHERE first_name='Pepe'";
        $result=$this->newConn->ExecuteQuery($query);
        if($result){
            $RowCount=$this->newConn->GetCountAffectedRows();
            if($RowCount>0){
                echo "Eliminado exitosamente";
            }
        }
        else{
                echo "<h3>Error ejecutando la consulta</h3>";
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