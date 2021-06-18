<?php
include_once "../fachada.php";

$id = @$_GET['id'];
$nome = @$_POST["nome"];
$telefone = @$_POST["telefone"];
$email = @$_POST["email"];
$cartaoCredito = @$_POST["cartaoCredito"];
$senha = @$_POST["senha"];
$senhaConf = @$_POST["senhaConf"];
$tipo = 1;

if (empty($nome) || empty($senha) || empty($senhaConf) || empty($email) || empty($telefone) || empty($cartaoCredito)){
    echo "<script type=\"text/javascript\">alert('Voce nao preencheu todos os campos, verifique novamente!')</script>";
    exit;
}

if (strcmp($senha, $senhaConf)) {
    echo "<script type=\"text/javascript\">alert('As senhas nao estao iguais, verifique novamente!')</script>";
    exit;
}

$usuario = new Usuario($id, $senha, $nome, $telefone, $email, $cartaoCredito, $tipo);
$dao = $factory->getUsuarioDao();
$dao->altera($usuario);

header("Location: ../view/usuarios.php");
exit;

?>