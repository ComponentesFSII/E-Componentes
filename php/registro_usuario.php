<?php

    include 'conexion.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena_confimarcion = $_POST['contrasenaConf'];
    $telefono = $_POST['telefono'];
    $comuna = $_POST['comuna'];
    $region = $_POST['region'];

    $query = "INSERT INTO usuarios(nombre_completo,correo,contrasena,telefono,region,comuna) 
                VALUES('$nombre_completo','$correo','$contrasena','$telefono','$region','$comuna')";

    //verificar que el correo no se repita en la base de datos
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");
    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya esta registrado");
                window.location = "../inicioSesion.php";
            </script>
        ';
        exit;
    }

    //verificar contraseña confimacion
    $verificar_contrasena = ($contrasena == $contrasena_confimarcion);
    if(!$verificar_contrasena){
         echo '
            <script>
                alert("Contraseñas no coinciden");
                window.location = "../inicioSesion.php";
            </script>
        ';
        exit;
    }

    $ejecutar = $verificar_contrasena && mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script> 
                alert("Usuario Registrado");
                window.location = "../inicioSesion.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>