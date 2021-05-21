<?php
include_once "fachada.php";

$id = @$_GET['id'];
$nome = @$_POST["nome"];
$descricao = @$_POST["descricao"];
$email = @$_POST["email"];
$telefone = @$_POST["telefone"];

if (empty($nome) || empty($email) || empty($telefone) || empty($descricao)){
    echo "<script type=\"text/javascript\">alert('Voce nao preencheu todos os campos, verifique novamente!')</script>";
    exit;
}

$fornecedor = new Fornecedor($id, $nome, $descricao, $telefone, $email);
$dao = $factory->getFornecedorDao();
$dao->altera($fornecedor);

header("Location: ../fornecedor.php");
exit;

?>