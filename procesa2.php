<?php
require_once "cabezera.php";
require_once "funciones.php";
$cliente_id=$_REQUEST['cliente_id'];
$fecha_recibo =$_REQUEST['fecha_actual'];
$domicilio=$_REQUEST['domicilio'];
$municipio=$_REQUEST['municipio'];
$provincia=$_REQUEST['provincia'];
$fecha_prevista=$_REQUEST['fecha_prevista'];
?>
<?php 
    if(isset($_SESSION['id'])){
        insertPedido($cliente_id,$fecha_recibo,$domicilio,$municipio,$provincia,$fecha_prevista);
        header("Location: linea.php");
    }else{
        Header("Location: index.php");
    }
?>