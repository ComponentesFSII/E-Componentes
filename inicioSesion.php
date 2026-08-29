<?php
    session_start();
    if(isset($_SESSION['usuario'])){
        header("location: index.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/login.css">
    <title>Inicio Sesion</title>
</head>
<body>

    <div style="text-align: center">
        <img src="img/cambiarLogo.png" alt="logo" height="150px">
        <h1 style="color: white">Nombre de la empresa</h1>
    </div>

    <main>
        <div class="contenedor">

            <div class="caja_trasera">
                <div class="caja_trasera-login">
                    <h3>¿Ya tienes cuenta?</h3>
                    <p>Inicia sesion para ingresar a la pagina</p>
                    <button id="btn_iniciar-sesion">Iniciar Sesion</button>
                </div>
                <div class="caja_trasera-registro">
                    <h3>¿Aun no tienes cuenta?</h3>
                    <p>Registrate para iniciar sesion</p>
                    <button id="btn_registrarse">Registrarse</button>
                </div>
            </div>

            <div class="contenedor_login-registro">
                <!--formulario login-->
                <form action="php/login_usuario.php" method="POST" class="formulario_login">
                    <h2>Iniciar Sesion</h2>
                    <input type="text" maxlength="100" pattern=".+@(duoc\.cl|profesor\.duoc\.cl|gmail\.com)" placeholder="Correo Electronico" name="correo">
                    <input type="password" minlength="4" maxlength="10" placeholder="Contraseña" name="contrasena">
                    <button>Iniciar Sesion</button>
                </form>
                <!--formulario de registro-->
                <form action="php/registro_usuario.php" method="POST" class="formulario_registro">
                    <h2>Registrarse</h2>
                    <input type="text" maxlength="100" placeholder="Nombre Completo" name="nombre_completo">
                    <input type="text" maxlength="100" pattern=".+@(duoc\.cl|profesor\.duoc\.cl|gmail\.com)" placeholder="Correo Electronico" name="correo">
                    <input type="password" minlength="4" maxlength="10" placeholder="Contraseña" name="contrasena">
                    <input type="password" minlength="4" maxlength="10" placeholder="Confirmar Contraseña" name="contrasenaConf">
                    <input type="text" placeholder="Telefono" name="telefono">
                    <!--selector de region y comuna-->
                    <div class="region-comuna">
                        <select name="region" id="region">
                            <option value="selecciona">Seleccione la Región</option>
                            <option value="metropolitana">Región Metropolitana</option>
                            <option value="aisen">Aisén</option>
                            <option value="antofagasta">Antofagasta</option>
                            <option value="araucanía">Araucanía</option>
                            <option value="arica y parinacota">Arica y Parinacota</option>
                            <option value="atacama">Atacama</option>
                            <option value="biobio">Biobío</option>
                            <option value="coquimbo">Coquimbo</option>
                            <option value="libertador bernardo">Libertador General Bernardo O'Higgins</option>
                            <option value="los lagos">Los Lagos</option>
                            <option value="los rios">Los Ríos</option>
                            <option value="magallanes">Magallanes</option>
                            <option value="maule">Maule</option>
                            <option value="ñuble">Ñuble</option>
                            <option value="tarapaca">Tarapacá</option>
                            <option value="valparaiso">Valparaíso</option>
                        </select>
                        <input type="text" placeholder="Comuna" name="comuna">
                    </div>
                    
                    <button>Registrarse</button>
                </form>
            </div>

        </div>
    </main>
    <script src="js/login.js"></script>
</body>
</html>