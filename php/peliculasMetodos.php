<?php

 require_once ("script_gestionPelis.php");
$peliculas = new misPelis();
//Comprobamos si hay una pelicula por eliminar, mediante el metodo POST
if(isset($_POST["eliminar"])){
    if(isset($_POST["idPelicula"])){
        $peliculas->eliminarPelis($_POST["idPelicula"]);
    }
    unset($_POST["eliminar"]);
}else if(isset($_POST["agregar"])){
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $calificacion = $_POST["calificacion"];
    $categoria = $_POST["categoria"];
    $precioDia = $_POST["precioDia"];
    $multaDia = $_POST["multaDia"];
    $anio = $_POST["anio"];

    //Agregamos las imagenes
    $pathImage = "uploads/images/".rand()."-".$_FILES['pathImage']['name'];     
    move_uploaded_file($_FILES['pathImage']['tmp_name'], "../".$pathImage);
    //Añadimos los datos en la BD
    $peliculas->insertarPelis($nombre,$descripcion,$calificacion,$pathImage,$categoria,$precioDia,$multaDia,$anio);

}else if(isset($_POST["editar"])){

    $idPelicula = $_POST["idPeliculaEditar"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $calificacion = $_POST["calificacion"];
    $categoria = $_POST["categoria"];
    $precioDia = $_POST["precioDia"];
    $multaDia = $_POST["multaDia"];
    $anio = $_POST["anio"];

    //Añadimos los datos en la BD
    $peliculas->updatePelicula($idPelicula, $nombre, $descripcion, $calificacion, $categoria, $precioDia, $multaDia, $anio);

}
header('Location: ../peliculas.php');
?>