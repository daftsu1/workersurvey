<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
            Gestión de trabajadores - Evaluacion de trabajador
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
            <h3>Encarar</h3>
            <p>Dar la bienvenida a todos los atletas
                <input type="number" class="sumar" value="0" min="0" max="5">
            </p>
            <p>Hacer preguntas abierta e iniciar una conversación
                <input type="number" class="sumar" value="0" min="0" max="5">
            </p>
            <p>Mencionar una fortaleza y oportunidad de mejora
                <input type="number" class="sumar" value="0" min="0" max="5">
            </p>
            <p id="total"> </p>
            <h3>Empoderar</h3>
            <p>Asegurarse que la tienda esté lista
                <input type="number" name="txtvalor3" min="0" max="5">
            </p>      
            <p>Acompañar atletas a productos, especialista o vendedor
                <input type="number" name="txtvalor4" min="0" max="5">
            </p> 
            <p>Compartir características, beneficios y promociones
                <input type="number" name="txtvalor5" min="0" max="5">                
            </p>                 
            <a class="btn btn-default" href="../index.php">
                Volver
            </a>
            <button class="btn btn-primary" name="submit" type="submit">
                Evaluar
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
    <script type="text/javascript">
        const reducer = function(accumulator, currentValue){
            let i = $(currentValue).val();
            return accumulator + (parseInt(i) || 0);
        };

        let onChangeCallback = function(e){
            let total = $('.sumar').toArray().reduce(reducer, 0);
            console.log(total);
            $('#total').text(total);
        };

        $('.sumar').change(onChangeCallback);
    </script>
</html>
