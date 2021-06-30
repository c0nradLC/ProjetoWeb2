<?php
include_once "../fachada.php";

$id = @$_GET['id'];
$nome = @$_POST["nome"];
$descricao = @$_POST["descricao"];
$idFornecedor = @$_POST["idFornecedor"];
$foto = @$_POST["foto"];

if (empty($nome) || empty($idFornecedor) || empty($descricao)){
    echo "<script type=\"text/javascript\">alert('Voce nao preencheu todos os campos, verifique novamente!')</script>";
    exit;
}

$produto = new Produto($id, $nome, $descricao, $idFornecedor, $foto);
$dao = $factory->getProdutoDao();
$dao->altera($produto);

header("Location: ../view/consultaprodutos.php");
exit;

?>