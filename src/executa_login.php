<?php
// Métodos de acesso ao banco de dados
require "fachada.php";

// Inicia sessão
// session_start();

$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE;
$senha = isset($_POST["senha"]) ? (trim($_POST["senha"])) : FALSE;


if(!$email || !$senha)
{
    echo "Você deve digitar sua senha e email!<br>"; //Tentar mostrar algo mais bonito.
    echo "<a href='../index.php'>Efetuar Login</a>";
    exit;
}

$dao = $factory->getUsuarioDao();
$usuario = $dao->buscaPorEmail($email);

$problemas = FALSE;
if($usuario) {
    // Agora verifica a senha
    if(!strcmp($senha, $usuario->getSenha()))
    {
        header("Location: ../home.php");
        exit;
    } else {
        $problemas = TRUE;
    }
} else {
    $problemas = TRUE;
}

if($problemas==TRUE) {  
    header("Location: ../index.php");
    exit;
}
?>