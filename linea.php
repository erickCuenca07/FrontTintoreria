<?php
require_once "cabezera.php";
require_once "funciones.php";
$nombre =$_SESSION['name'];
$numero_pedido=numero_pedido();
$mostra = listaCarrito($_SESSION['id']);
    foreach ($mostra as $key){
    $id=$key->{'carrito_id'};
    $nombre=mostrarPrendas($key->{'prenda'});
    $prenda_id =$key->{'prenda'};
    $servicio = mostrarTarifa($key->{'tarifa'});
    $servicio_id = mostrarTarifa3($key->{'tarifa'});
    $precio = mostrarTarifa2($key->{'tarifa'});
    $cantidad = $key->{'cantidad'};
    }
foreach($numero_pedido as $key){
     $numero_pedido=$key->{'numero_pedido'};
}
?>
<br>
<div class="container">
  <h1 class="text-center">Ahora si ya casi...Confirma el pedido<i class="fa-solid fa-address-card"></i></h1>
<div class="card">
<div class="card-body">    
    <form class="form-group" action="procesa3.php" method="get" enctype="multipart/form-data">
        <div class="row">
                <input type="hidden" name='id' id='id' value="<?php echo $id ?>">
                <input type="hidden" name='numero_pedido' id='numero_pedido' value="<?php echo $numero_pedido ?>">
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Prenda</label>
                    <input type="text"  class="form-control" value="<?php echo $nombre ?>" disabled>
                    <input type="hidden" name='prenda_id' id='prenda'  value="<?php echo $prenda_id ?>">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationDefault01">Precio</label>
                    <input type="number"  value="<?php echo $precio ?>"class="form-control" disabled>
                    <input type="hidden" id='precio' name='precio' value="<?php echo $precio ?>"class="form-control" >
                </div>
                <div class="col-md-2 mb-2">
                    <label for="validationDefault01">Cantidad</label>
                    <input  type="text"  class="form-control" value='<?php echo $cantidad?>'disabled>
                    <input  type="hidden" name='cantidad' id='cantidad' class="form-control" value='<?php echo $cantidad?>'>  
                </div>
                <div class="col-md-2 mb-2">
                    <label for="validationDefault01">Servicio</label>
                    <input type="text" class="form-control" value='<?php echo $servicio?>'disabled>
                    <input type="hidden" name='servicio_id' id='servicio' value="<?php echo $servicio_id ?>">
                </div>
        </div>
        <input type="submit" class="btn btn-primary" name="Actulizar"  value="Terminar Pedido">
        
    </form>
</div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
