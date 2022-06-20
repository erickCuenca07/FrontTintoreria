<?php
require_once 'cabezera.php';
require_once 'funciones.php';
if(isset($_REQUEST['name'])&& isset($_REQUEST['password'])){
    if(!empty($_REQUEST['name'])&&!empty($_REQUEST['password'])){
        $name = $_REQUEST['name'];
        $pass = $_REQUEST['password'];
      
        if($id=login($name,$pass)){
            $_SESSION['name'] =$name;
            $_SESSION['id'] =$id;
            header("Location: index.php");
        }else{
            echo "<div class='alert alert-danger text-center'role='alert'>Datos introducidos incorrectos</div>";
        }
    }
}else

?>
<div class="container">
    <h3 class="text-center">Inicio de Sesion Front tintoreria </h3>
    <form action ="" method ="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Usuario</label>
            <input type="text" class="form-control" id="" name="name" placeholder="Usuario..." required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="password" class="form-control" id="" name="password" placeholder="Contraseña..." required>
        </div>
        
    </div>
    <button class="btn btn-outline-success">Entrar</button>
    </form>
    <div class="text-center">
    <p>¿No estas registrado? <a href="registrate.php">Registrate</a></p></div>
    <hr>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>