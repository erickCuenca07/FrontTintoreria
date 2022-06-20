<?php
    require_once "cabezera.php";
    require_once "funciones.php";
    $prenda=$_REQUEST['prenda_id'];
    $cantidad = $_REQUEST['cantidad'];
    $tarifa = $_REQUEST['tarifa'];
?>

<?php
    if(isset($_SESSION['id'])){
        $cliente = $_SESSION['id'];
        addcarrtio($cliente,$prenda ,$cantidad, $tarifa);
        header("Location: carrito.php");
    }else{
        echo "<div class='alert alert-danger text-center'role='alert'>Por favor <a href='login.php'>inica sesion</a> para añadir al carrito</div>";
        
    }
?>