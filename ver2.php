<?php
    include "cabezera.php";
    include "funciones.php";
    $prenda_id=$_GET["prenda_id"];
?>
<br><br>
<div class="container">
    <div class="row">
    <?php
        mostrar_articuloporID($prenda_id);
        mostrar_tarifa($prenda_id);
    ?>
    </div>
</div>



<br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>