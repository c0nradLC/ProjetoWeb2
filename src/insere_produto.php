<?php
include_once "fachada.php";

// Seleciona o nome temporário do arquivo, ganho durante o upload
$nome_temporario=$_FILES["Arquivo"]["tmp_name"];
// Gera um nome para o arquivo
$nome_real=$_FILES["Arquivo"]["name"];
// Substitui os espaços em branco por "_"
$nome_real = str_replace(" ", "_", $nome_real);
// Copia o arquivo para a pasta destino
copy($nome_temporario,"../uploads/$nome_real");

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