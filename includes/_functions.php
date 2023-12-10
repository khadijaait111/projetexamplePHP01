<?php

require_once ("_db.php");


if(isset($_POST['accion'])){ 
    switch($_POST['accion']){
        case 'eliminar_producto':
            eliminar_producto();

        break;        
        case 'editar_producto':
        editar_producto();

        break;

        case 'insertar_productos':
        insertar_productos();

        break;    
    }

}

function insertar_productos(){

    global $conexion;
    extract($_POST);


        //variables où les valeurs de notre image sont stockées
                $tamanoArchvio=$_FILES['foto']['size'];
    
        //la lecture de l’image est effectuée
                $imagenSubida=fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen=fread($imagenSubida,$tamanoArchvio);   
        //la requête correspondante est effectuée pour enregistrer les données
        
        $imagenFin =mysqli_escape_string($conexion,$binariosImagen);
                


    $consulta="INSERT INTO productos (nombre, descripcion, color, precio, cantidad, cantidad_min, categorias, imagen)
    VALUES ('$nombre', '$descripcion', '$color', $precio, $cantidad ,$cantidad_min, '$categorias', '$imagenFin');" ;

    mysqli_query($conexion, $consulta);
    
    header("Location: ../views/usuarios/");

}
function editar_producto(){

    global $conexion;
    extract($_POST);


        //variables où les valeurs de notre image sont stockées
                $tamanoArchvio=$_FILES['foto']['size'];
        //la lecture de l’image est effectuée
                $imagenSubida=fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen=fread($imagenSubida,$tamanoArchvio);   
        //la requête correspondante est effectuée pour enregistrer les données
        
        $imagenFin =mysqli_escape_string($conexion,$binariosImagen);
                
    $consulta="UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', color = '$color', precio = '$precio', cantidad = '$cantidad', categorias = '$categorias', imagen = '$imagenFin' WHERE id = $id";

    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/");
}
function eliminar_producto(){

    global $conexion;
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM productos WHERE id = $id";
    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/");
}
?>