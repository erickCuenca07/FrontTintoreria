<?php
  include "cabezera.php";
  include "funciones.php";
?>
<br><br>
    <?php
      if(isset($_SESSION['id'])){
       echo" <div class='container'>
        <div class='card'>
            <div class='card-body'>
            <table id='tabla' class='display ' cellspacing='0' width='100%'>
                <thead>
                    <tr>
                        <th scope='col' class='center'>Prenda</th>
                        <th scope='col' class='center'>Tarifa</th>
                        <th scope='col' class='center'>Precio</th>
                        <th scope='col' class='center'>Cantidad</th>
                        <th scope='col' class='center'>Operaciones</th>
                    </tr>
                </thead>
                <tbody>";
                        $mostra = listaCarrito($_SESSION['id']);
                        foreach ($mostra as $key){
                            $id=$key->{'carrito_id'};
                            $nombre=mostrarPrendas($key->{'prenda'});
                            $servicio = mostrarTarifa($key->{'tarifa'});
                            $precio = mostrarTarifa2($key->{'tarifa'});
                            echo '<tr>';
                            echo '<td>'.$nombre.'</td>';
                            echo '<td>'.$servicio.'</td>';
                            echo '<td>'.$precio.'</td>';
                            echo '<td>'.$key->{'cantidad'}.'</td>';
                            echo '<td>'."<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal$id'> 
                            <i class='fa-solid fa-trash-can'></i></button>".'</td>';
                            echo '</tr>';
                            echo "<div class='modal fade' id='exampleModal$id' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                          <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                              <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Eliminar Prenda</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>
                              <div class='modal-body'>
                                <form action='elimina.php' method='post'>
                                    ¿Estas seguro que quieres eliminar la prenda $nombre?
                              </div>
                              <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                <button type='submit' class='btn btn-primary' name='id' value='$id'>Eliminar</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>";
                        }
                   
               echo" </tbody>
            </table>
            </div>
        </div>
    </div>";
    ?>

    <div class="container">
        <a type="button" class="btn btn-outline-success btn-rounded" data-mdb-ripple-color="dark" href="formulario.php">Finalizar compra</a>
    </div>
    <?php
      }else{
        echo "<div class='container'>
            <h3>Su carrito esta vacio <i class='fa-solid fa-cart-arrow-down'></i></h3>
            <p>Por favor <a href='login.php'>Inicie Sesion</a> para empezar a comprar </p>
        </div>";  
      }
      
    ?>


<script>
    $(document).ready( function () {
    $('#tabla').DataTable({
        "language":{
            "search":     "Buscar",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "info":       "Mostrando página _PAGE_ de _PAGE_",
            "paginate":   {
                          "previous": "Anterior",
                          "next": "Siguiente",
                          "first": "Primero",
                          "last": "Ultimo"
            }
          }
    });
} );
</script>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>