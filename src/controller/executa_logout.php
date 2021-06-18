<?php

include_once "comum.php";

    session_start();

    if(isset($_SESSION["nome_usuario"])) {
        session_destroy();
        header("location: ../view/index.php");
        exit();
    } 

?>