<?php 
// Inicia sessão
include_once "comum.php";

if (is_session_started() === FALSE)
{
    session_start();
}

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"]))
{
    error_log("SEM USUÀRIO LOGADO - Voltando para Login");
    session_destroy();
    // Usuário não logado
    header("Location: ../view/index.php");
    exit;
}
?>