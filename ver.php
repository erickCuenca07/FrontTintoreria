<?php
    include "cabezera.php";
    include "funciones.php";
    $categoria_id=$_GET["categoria_id"];
?>
<br><br>
<div class="container">
    <div class="row">
    <?php
        mostrar_articulo($categoria_id)
    ?>
    </div>
</div>



<br><br>
<?php
include "footer.php";
?>