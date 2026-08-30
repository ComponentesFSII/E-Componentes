<?php
    session_start();
    include 'conexion.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $comentario = $_POST['comentario'];

    $query = "INSERT INTO contactos(nombre_completo,correo,comentario) 
                VALUES('$nombre_completo','$correo','$comentario')";

    if(mysqli_query($conexion,$query)){
        header("location: ../contacto.php?mensaje=exito");
        exit();
    }
    else {
    header("Location: ../contacto.php?mensaje=error");
    exit();
    }
    
    mysqli_close($conexion);
?>