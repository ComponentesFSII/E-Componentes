<?php 
    include 'conexion.php'; 

    $consulta = "SELECT * FROM usuarios"; 
    $resultado = mysqli_query($conexion, $consulta); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
    <title>Usuarios</title>
</head>
<body>

    <div class="container-fluid">
        <div class="row" style="height: 150vh;">
            <div class="col-2 col-sm-3 col-xl-2 bg-dark">
                <!--menu lateral-->
                <nav class="navbar bg-dark border-bottom border-body mb-3" data-bs-theme="dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                    </div>
                </nav>

                <nav class="nav flex-column">
                    <a class="nav-link active" href="#">Active</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link" href="#">Link</a>
                </nav>

            </div>
            <div class="col-10 col-sm-9 col-xl-10 p-0 m-0">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <h3>Fronentes</h3>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!--contenido de la pagina-->
                <div class="container text-center">
                    <h1>Tabla de Usuarios</h1>
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                            <th scope="col">Run</th>
                            <th scope="col">Nombre Completo</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Region</th>
                            <th scope="col">Comuna</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <!--tabla de usuarios-->
                        <tbody>
                        <?php
                        if ($resultado) { 
                            while ($row = mysqli_fetch_assoc($resultado)) { 
                                
                                $id = $row['id'];
                                $nombre_completo = $row['nombre_completo'];
                                $rut = $row['rut'];
                                $correo = $row['correo'];
                                $telefono = $row['telefono'];
                                $comuna = $row['comuna'];
                                $region = $row['region'];

                                ?>

                                <tr>
                                    <td><?php echo htmlspecialchars($rut); ?></td>

                                    <td><?php echo htmlspecialchars($nombre_completo); ?></td>

                                    <td><?php echo htmlspecialchars($correo); ?></td>

                                    <td><?php echo htmlspecialchars($telefono); ?></td>

                                    <td><?php echo htmlspecialchars($region); ?></td>

                                    <td><?php echo htmlspecialchars($comuna); ?></td>

                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a href="editarDatos.php?id=<?php echo $id;?>" class="btn btn-primary">Editar</a>
                                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#modalEliminar<?php echo $id;?>">Eliminar</button>
                                        </div>
                                        <!--modal eliminar usuario-->
                                        <div class="modal fade" id="modalEliminar<?php echo $id;?>" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Eliminar Usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>El usuario será eliminado permanentemente.</p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <a href="eliminar.php?id=<?php echo $id;?>" class="btn btn-primary">Guardar Cambios</a>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            <?php
                            } 
                        }
                        ?>
                        </tbody>
                    </table>

                    <!--boton de crear usuario-->
                    <a class="btn btn-primary" href="registrarUserAdmi.php" role="button">Registrar Usuario</a>
                 </div>
            </div>
        </div>

        
        
    </div>

    <footer>
        <div>
            <p>Fronentes es una empresa ficticia enfocada en venta de hardware para PC</p>
        </div>
    </footer>


</body>
</html>