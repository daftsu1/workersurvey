<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
            Gestión de trabajadores - Editar trabajador
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
                <link href="../css/style.css" rel="stylesheet" type="text/css">
                </link>
            </meta>
        </meta>
    </head>
    <body>
    <?php
        include 'navbar.php';
    ?>
        <div class="container">
        <?php
            include("funciones.php");
            $id = $_GET['id'];
            select_id('trabajadores','id',$id);
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label>
                    Nombre
                </label>
                <input class="form-control" name="txtname" value="<?php echo $row->nombre;?>" type="text">
                </input>
                <label>
                    Apellidos
                </label>
                <input class="form-control" name="txtlastname" value="<?php echo $row->apellidos;?>" type="text">
                </input>
            </div>
            <a class="btn btn-default" href="../index.php">
                Volver
            </a>
            <button class="btn btn-primary" name="submit" type="submit">
                Editar trabajador
            </button>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $field = array("nombre"=>$_POST['txtname'], "apellidos"=>$_POST['txtlastname']);
            $tbl = "trabajadores";
            edit($tbl,$field,'id',$id);
            header("location:../index.php");
        }
    ?>
    </div>
    </body>
</html>
