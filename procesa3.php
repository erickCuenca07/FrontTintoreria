<?php
require_once "cabezera.php";
require_once "funciones.php";
$id= $_REQUEST['id'];
$numero_pedido = $_REQUEST['numero_pedido'];
$prenda_id = $_REQUEST['prenda_id'];
$precio = $_REQUEST['precio'];
$cantidad = $_REQUEST['cantidad'];
$servicio_id = $_REQUEST['servicio_id'];
?>

<?php
    if(isset($_SESSION['id'])){
        insertLinea($numero_pedido,$prenda_id,$precio,$cantidad,$servicio_id);
        eliminarCarrito($id);
        echo "<div class='alert alert-success text-center'role='alert'>Pedido realizado satisfactoriamente</div>";
        header("Location: carrito.php");
    }else{
        header("Location: index.php");
    }
?>