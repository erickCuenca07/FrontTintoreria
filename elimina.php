<?php 
require_once "cabezera.php";
require_once "funciones.php";
 $cliente = $_SESSION['id'];
if(isset($_SESSION['id'])){
    $id = $_REQUEST['id'];
    if(isset($id)){
        eliminarCarrito($id);
        header("Location: carrito.php");
    }else{
        echo "<div class='alert alert-danger text-center'role='alert'>No se pudo eliminar</div>";
    }
}else{
    header("Location: index.php");
        
}
?>