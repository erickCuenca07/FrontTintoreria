<?php
require_once 'cabezera.php';
require_once 'funciones.php';
if (isset($_REQUEST['name']) && isset($_REQUEST['password'])){
    if($_REQUEST['password'] == $_REQUEST['reppassword']){
        $id = $_REQUEST['id'];
        $nif=$_REQUEST['nif'];
        $nombre = $_REQUEST['name'];
        $contra =md5($_REQUEST['password']);
        $email = $_REQUEST['email']; 
        $telefono = $_REQUEST['telefono'];
        $domicilio = $_REQUEST['domicilio'];
        $provincia= $_REQUEST['provincia'];
        $municipio = $_REQUEST['municipio'];
        $cliente = añadir_cliente($nif,$nombre,$telefono,$email,$domicilio,$provincia,$municipio);
        $registro = añadir_usuario($id,$nombre,$contra,$email);
        header("Location: login.php");
     }
}
?>
<div class="container">
    <h3 class="text-center">Registro de usuario</h3>
    <form action ="" method ="POST" enctype="multipart/form-data">
        <div class="form-row">
            <input type ="hidden" name="id">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Usuario</label>
                <input type="text" class="form-control" id="" name ="name" placeholder="Usuario..." required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="" name="email" placeholder="Email..." required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Nif</label>
                <input type="text" class="form-control" id="" name="nif" placeholder="Nif..." required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Domicilio</label>
                <input type="text" class="form-control" id="" name="domicilio" placeholder="Domicilio..." required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Telefono</label>
                <input type="text" class="form-control" id="" name="telefono" placeholder="Telefono..." required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Provincia</label>
                <input type="text" class="form-control" id="" name="provincia" placeholder="Provincia..." required>
            </div>
            <div class="form-group col-md-3">
                <label for="inputEmail4">Municipio</label>
                <input type="text" class="form-control" id="" name="municipio" placeholder="Municipio..." required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="" name="password" placeholder="Contraseña..." required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Repite Password</label>
                <input type="password" class="form-control" id="" name="reppassword" placeholder="Contraseña..." required>
            </div>
        </div>
    <button class="btn btn-outline-success">registrase</button>
    </form>
    <div class="text-center">
    <p>Ya estas registrado? <a href="login.php">Entra</a></p></div><hr>
</div>



<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>