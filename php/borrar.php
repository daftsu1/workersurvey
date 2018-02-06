<?php 
include("funciones.php");
$id = $_GET['id'];
delete('trabajadores','id',$id);
header("location:../index.php");
?>