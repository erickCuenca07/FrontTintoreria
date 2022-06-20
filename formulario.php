<?php
    require_once "cabezera.php";
    require_once "funciones.php";
    $nombre =$_SESSION['name'];
    $muestra =buscar($nombre);
    foreach($muestra as $key){
      $telefono=$key->{'telefono'};
      $domicilio=$key->{'domicilio'};
      $provincia=$key->{'provincia'};
      $municipio=$key->{'municipio'};
      $cliente_id = $key->{'cliente_id'};
   
?>
<br>
<div class="container">
  <h1 class="text-center">Ya casi terminamos...confirma el siguiente formulario<i class="fa-solid fa-address-card"></i></h1>
  <div class="card">
<div class="card-body">    
    <form class="form-group" action="procesa2.php" method="get" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Numero de Teléfono</label>
                <input type="text" class="form-control" value='<?php echo $telefono?>' disabled>
                <input type="hidden" name='telefono' id='telefono'  value='<?php echo $telefono?>'>
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault01">Cliente</label>
                <input type="text" id='nombre' value="<?php echo $nombre;?>" class="form-control" disabled>
                <input type="hidden" name='cliente_id' id='cliente_id' value="<?php echo $cliente_id;?>">
              </div>
            <div class="col-md-2 mb-2">
                <label for="validationDefault01">Fecha Recogida</label>
                <?php $d = new DateTime(); 
                $d->format('d-m-Y');
                ?>
                <input  type="text"  class="form-control" value="<?php echo $d->format('d-m-y');?>"disabled >
                <input  type="hidden" name='fecha_actual' id='fecha_actual' value="<?php echo $d->format('d-m-y');?>" > 
            </div>
            <div class="col-md-2 mb-2">
                <label for="validationDefault01">Fecha prevista</label>
                <?php $d->add(new DateInterval('P2D'));?>
                <input type="text"  class="form-control" value="<?php echo $d->format('d-m-Y');?>" disabled>
                <input type="hidden" name="fecha_prevista" id='fechaPrevista' value="<?php echo $d->format('d-m-Y');?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Domicilio</label>
                <input type="text" class="form-control"  value="<?php echo $domicilio; ?>" disabled>
                <input type="hidden"  name="domicilio" id="domicilio" value="<?php echo $domicilio; ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault03">Provincia</label>
                <input type="text" class="form-control"  value="<?php echo $provincia; ?>" disabled>
                <input type="hidden"  name="provincia" id="provincia" value="<?php echo $provincia; ?>">
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationDefault04">Municipio</label>
                <input type="text" class="form-control"  value="<?php echo $municipio; ?>"disabled>
                <input type="hidden" name="municipio" id="municipio" value="<?php echo $municipio; ?>">
            </div>
        </div>     
        <input type="submit" class="btn btn-primary" name="Actulizar"  value="Siguiente paso">
    </form>
</div>
</div>
</div>
<?php 
    }
?>

<br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>