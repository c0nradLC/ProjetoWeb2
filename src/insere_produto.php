<?php
include_once "fachada.php";

$nome = isset($_POST["nome"]) ? addslashes(trim($_POST["nome"])) : FALSE;
$descricao = isset($_POST["descricao"]) ? addslashes(trim($_POST["descricao"])) : FALSE;
$idFornecedor = isset($_POST["idFornecedor"]) ? addslashes(trim($_POST["idFornecedor"])) : FALSE;
// $foto = isset($_POST["foto"]) ? addslashes(trim($_POST["foto"])) : FALSE;

if (empty($nome) || empty($descricao) || empty($idFornecedor) /*|| empty($foto)*/){
    echo "<script type=\"text/javascript\">alert('Voce nao preencheu todos os campos, verifique novamente!')</script>"; // <-- redirecionamento nao ta funcionando, ajeitar isto.
    exit;
}

$produto = new Produto(null, $nome, $descricao, $idFornecedor/*, $foto*/);
$dao = $factory->getProdutoDao();
$dao->insere($produto);

header("Location: ../estoque.php");
exit;

?>