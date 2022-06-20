<?php
    require_once "cabezera.php";
    require_once "funciones.php";
?>

<div class="fondo">
    <div class="container">
        <div class="row justify-content-start">
            <div class="col">
            <img src="img/fondo1.jpg">
            TINTORERIA A DOMICILIO,ESTÉS DONDE ESTÉS, CUIDAMOS DE TU ROPA.
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <h1 class="text-center">¿Que ofrecemos?</h1>
    <div class="row">
        <?php
            mostrar_servicios()
        ?>
    </div>
</div>

<div class="fondo2">
    <div class="container">
        <div class="row justify-content-start">
            <div class="col">
            <img src="img/alfombra.png">
            </div>
        </div>
    </div>
</div>

<div class="container ">
    <h1 class="text-center">¿Qué artículo desea ver?</h1>
    <div class="row">
        <?php
            mostrar_categorias()
        ?>
    </div>
</div>
<!-- <button class="btn-scrolltop btn-scrolltop-on" id="btn_scrolltop">
    <i class="fas fa-chevron-up"></i>
</button> -->

<br><br>
<?php
include "footer.php";
?>

<script>
    const btn_scrolltop = document.getElementById("btn_scrolltop")
      btn_scrolltop.addEventListener('click', () => {
        window.scrollTo(0, 0)
      })

    window.onscroll = () => {
      add_btn_scrolltop()
    }

    const add_btn_scrolltop = () => {
      if (window.scrollY < 300) {
        btn_scrolltop.classList.remove("btn-scrolltop-on")
      } else {
        btn_scrolltop.classList.add("btn-scrolltop-on")
      }
    }

</script>