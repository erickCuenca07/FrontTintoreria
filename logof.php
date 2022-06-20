<?php
session_start();//recuperamos la session que haya abierta 
//y la eliminamos 
session_unset();
header("Location: index.php");
?>