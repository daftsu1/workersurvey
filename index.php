<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
            Gestión de trabajadores
        </title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
                    </script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
                    </script>
                </link>
                <link href="css/style.css" rel="stylesheet" type="text/css">
                </link>
            </meta>
        </meta>
    </head>
    <body>
        <?php
        include 'php/navbar.php'; 
         ?>
        <div class="container" id="containermain">
            <br>
            <a id="addwork" class="btn btn-default btn-sm" data-toggle="modal" href="#modal1">
                <span class="glyphicon glyphicon-plus">
                </span>
                Agregar trabajador
            </a>
            <div class="modal fade" role="dialog" id="modal1">
                <div class="model-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Header Modal -->
                        <!-- Content Modal -->
                        <button aria-hidden="true" class="close" data-dismiss="modal" tyle="button">
                            ×
                        </button>
                        <h4 class="modal-title">
                            Registro
                        </h4>
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>
                                            Nombre
                                        </label>
                                        <input class="form-control" name="txtname" required="" type="text">
                                        </input>
                                        <label>
                                            Apellidos
                                        </label>
                                        <input class="form-control" name="txtlastname" required="" type="text">
                                        </input>
                                    </div>
                                    <button class="btn btn-default" data-dismiss="modal" type="button">
                                        Cerrar
                                    </button>
                                    <button class="btn btn-primary" name="submit" type="submit" value="Insertar">
                                        Crear trabajador
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                include("php/funciones.php");
                if(isset($_POST['submit'])){
                    $field = array("nombre"=>$_POST['txtname'], "apellidos"=>$_POST['txtlastname']);
                    $tbl = "trabajadores";
                    insert($tbl,$field);
                }
            ?>
            <br>
                <br>
                    <div class="table-responsive">
                        <table cellspacing="0" class="table table-bordered" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Apellidos
                                    </th>
                                    <th>
                                        Fecha ultima evaluación
                                    </th>
                                    <th>
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <?php 
                                    $sql = "select * from trabajadores";
                                    $result = db_query($sql);
                                    while($row = mysqli_fetch_object($result)){
                                 ?>
                                <tr>
                                    <td>
                                        <?php echo $row->id;?>
                                    </td>
                                    <td>
                                        <?php echo $row->nombre;?>
                                    </td>
                                    <td>
                                        <?php echo $row->apellidos;?>
                                    </td>
                                    <td>
                                        10/07/2017
                                    </td>
                                    <td>
                                        <a id="editbutton" class="btn btn-primary" href="php/editar?id=<?php echo $row->id;?>">
                                            <!--data-toggle="modal" href="#modal1"-->
                                            <i class="glyphicon glyphicon-pencil">
                                            </i>
                                        </a>
                                        <a id="deletebutton" class="btn btn-primary" href="php/borrar.php?id=<?php echo $row->id;?>">
                                            <i class="glyphicon glyphicon-remove">
                                            </i>
                                        </a>
                                        <a class="btn btn-primary" href="php/evaluacion.php?id=<?php echo $row->id;?>">
                                            Evaluar
                                        </a>                                        
                                    </td>
                                </tr>
                                <?php
                               } 
                                ?>
                            </tfoot>
                        </table>
                    </div>
                </br>
            </br>
        </div>
    </body>
</html>