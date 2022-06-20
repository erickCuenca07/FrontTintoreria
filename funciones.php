<?php
    function conectar(){
        try{
            $bd = new PDO("mysql:host=localhost;dbname=tintoreria", "root", "");
            return $bd;
        }catch(Exception $e){
            echo $e->getMessage();
            exit;
        }
    }

    function login($nombre,$pass){
      try{
          $resultado=conectar()->query("SELECT id FROM users WHERE name='$nombre'and password='".md5($pass)."'",PDO::FETCH_OBJ);
        if($resultado->rowCount() == 1){
          $fila  = $resultado->fetchColumn();          
          return $fila;
        }
      }catch(Exception $e){
          echo "Error en el login";
      }     
    }

    function añadir_usuario($id,$nombre, $contra,$email){
      $registros=0;
      try{
          $registros=conectar()->exec("INSERT INTO users (id,name,password,email) 
          VALUES('$id','$nombre','$contra','$email')");
          echo "<div class='alert alert-success text-center'role='alert'>Usuario introducido correctamente</div>";
      }catch(Exception $e){//controlamos la exepcion 
          echo $e->getMessage();
      }
      $bd = null;
      return $registros;
    }
    function añadir_cliente($nif,$nombre,$telefono,$email,$domicilio,$provincia,$municipio){
      $resultado=conectar()->query("INSERT INTO cliente 
    VALUES (null,'$nif','$nombre','$telefono','$email','$domicilio','$provincia','$municipio')",PDO::FETCH_OBJ);
    }

    function insertPedido($cliente_id,$fecha_recibo,$domicilio,$municipio,$provincia,$fecha_prevista){
      $consulta =conectar()->query("INSERT INTO pedido
      values (null,'$cliente_id','$fecha_recibo','$domicilio','$municipio','$provincia','$fecha_prevista',null)",PDO::FETCH_OBJ);
    }
    function insertLinea($numero_pedido,$prenda_id,$precio,$cantidad,$servicio){
      $consulta =conectar()->query("INSERT INTO linea_pedido
      values (null,'$numero_pedido','$prenda_id','$precio','$cantidad','$servicio')",PDO::FETCH_OBJ);
    }

    function mostrar_tarifa($prenda_id){
      $resultado=conectar()->query("SELECT servicio.servicio_id as servicio_id, servicio.nombre as nombre, tarifa.precio as precio from tarifa, servicio, prenda
      where prenda.prenda_id=$prenda_id AND tarifa.prenda_id=prenda.prenda_id AND tarifa.servicio_id=servicio.servicio_id",PDO::FETCH_OBJ)->fetchAll();
      return($resultado);
      
    }

    function mostrar_servicios(){
        $resultado=conectar()->query("SELECT * FROM servicio",PDO::FETCH_OBJ);
        while($row=$resultado->fetch()){
            $foto='../BackTintoreria/public/'.$row->foto;
            echo "<div class='col-5'>
            <div class='text-center'>
              <div class='card h-100'>
                <img src='$foto' class='card-img-top' alt='Skyscrapers'/>
                <div class='card-body'>
                  <h5 class='card-title'>$row->nombre</h5>
                  <p class='card-text'>
                    $row->descripcion
                  </p>
                </div>
              </div>
            </div>
          </div>";
        }
    }
    function mostrar_categorias(){
        $resultado=conectar()->query("SELECT * FROM categoria",PDO::FETCH_OBJ);
        while($row=$resultado->fetch()){
            $foto='../BackTintoreria/public/'.$row->foto;
            echo " <div class='col-sm-3'>
                <div class='card text-center border border-light'>
                <img src='$foto' class='card-img-top' width='252px' height='252px'>
                    <div class='card-body'>
                    <p >".$row->nombre."</p>
                    <a href='ver.php?categoria_id=$row->categoria_id' class='btn btn-outline-info'>Ver Articulos</a>
                    </div>
                </div>
            </div>";
        }
    }

    function mostrar_articulo($categoria_id){
        $resultado=conectar()->query("SELECT * FROM prenda where categoria_id=$categoria_id",PDO::FETCH_OBJ);
        while($row=$resultado->fetch()){
            $foto='../BackTintoreria/public/'.$row->foto;
            echo " <div class='col-sm-3'>
                <div class='card text-center border border-light'>
                <img src='$foto' class='card-img-top' alt='' >
                    <div class='card-body'>
                    <p >".$row->nombre."</p>
                    <a href='ver2.php?prenda_id=$row->prenda_id' class='btn btn-outline-info'>Ver Articulo</a>
                    </div>
                </div>
            </div>";
        }
    }

    function mostrar_articuloporID($prenda_id) {
        $resultado=conectar()->query("SELECT * FROM prenda where prenda_id=$prenda_id",PDO::FETCH_OBJ);
        while($row=$resultado->fetch()){
            $foto='../BackTintoreria/public/'.$row->foto;
            echo "<div class='row justify-content-start'>
            <div class='col-4'>
                <img src='$foto' class='card-img-top' width='372px' height='372px'>
            </div>
            
            <div class='col-4'>
            <form action='procesa.php' method='get'>
            <input type='hidden' name='prenda_id' value='$prenda_id'>
                <h3>$row->nombre</h3>
                <p>Entrega: 2 - 4 dias.</p>

                ";
                ?>
                <input type='text' id='muestra' name='cantidad' class='btn btn-light btn-rounded' size='1' value='1'>
                <input type="range" id='rango'  min="1" max="10" step="1">
                <select class='custom-select' name='tarifa' required>
                <option selected value=''>Seleccione el tipo de servicio</option>
                <?php
                $mostrar=mostrar_tarifa($prenda_id);
                foreach($mostrar as $key){
                  echo "<option value='".$key->{'servicio_id'}."'>".$key->{'nombre'} ." - ".$key->{'precio'}."&euro;</option>";  
                }
                echo "
                           </select>
                
                <input type ='submit' class='btn btn-outline-success' value='Añadir al carrito'>
                </form>
            </div>
          </div>";
          echo "<div class='card text-center bg-white border border-white'>
          <div class='card-header bg-white border border-white'>
            <ul class='nav nav-tabs card-header-tabs bg-white border border-white'>
              <li class='nav-item bg-white border border-white'>
                <h5 class='nav-link active bg-white border border-white'>Descripcion</h5>
              </li>
            </ul>
          </div>
          <div class='card-body'>
            <p class='card-text'>$row->descripcion</p>
          </div>
        </div>";
        }
    }

  function addcarrtio($cliente, $prenda,$cantidad, $tarifa) {
    $resultado=conectar()->query("INSERT INTO carrito
    VALUES (null, '$cliente','$prenda', $cantidad,$tarifa)",PDO::FETCH_OBJ);
    
  }
  function listaCarrito($id){
    $resultado=conectar()->query("SELECT * FROM carrito where cliente =$id",PDO::FETCH_OBJ)->fetchAll();
    return($resultado);
  }

  function mostrarPrendas($id){
    $nombre = conectar()->query("SELECT prenda.nombre 
    from prenda WHERE prenda.prenda_id = $id ")->fetchColumn();
    return($nombre);
  }

  function mostrarTarifa($id){
    $tarifa = conectar()->query("SELECT servicio.nombre,tarifa.tarifa_id from tarifa, servicio
     WHERE tarifa.tarifa_id=$id and tarifa.servicio_id=servicio.servicio_id ")->fetchColumn();
     return($tarifa);
  }
  function mostrarTarifa3($id){
    $tarifa = conectar()->query("SELECT servicio.servicio_id,tarifa.tarifa_id from tarifa, servicio
     WHERE tarifa.tarifa_id=$id and tarifa.servicio_id=servicio.servicio_id ")->fetchColumn();
     return($tarifa);
  }
  function mostrarTarifa2($id){
    $tarifa = conectar()->query("SELECT tarifa.precio,tarifa.tarifa_id from tarifa
     WHERE tarifa.tarifa_id=$id")->fetchColumn();
     return($tarifa);
  }
  function eliminarCarrito($id){
    $elimina = conectar()->query("DELETE from carrito where carrito_id=$id");
    return($elimina);
  }
  function buscar($id){
    $consulta =conectar()->query("SELECT * FROM cliente WHERE cliente.nombre LIKE '$id'",PDO::FETCH_OBJ)->fetchAll();
    return($consulta);
  }
  function numero_pedido(){
    $consulta =conectar()->query("SELECT * FROM pedido ORDER BY numero_pedido DESC LIMIT 1",PDO::FETCH_OBJ)->fetchAll();
    return($consulta);
  }
?>
<script type="text/javascript">
	$(document).ready(function()
		{
		$('#rango').change(function() {
		$('#muestra').val($(this).val());
		});
	});
</script>
