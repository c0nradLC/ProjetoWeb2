<?php
include_once "fachada.php";

// Seleciona o nome temporário do arquivo, ganho durante o upload da imagem
$nome_temporario=$_FILES["Arquivo"]["tmp_name"];

$nome = isset($_POST["nome"]) ? addslashes(trim($_POST["nome"])) : FALSE;
$descricao = isset($_POST["descricao"]) ? addslashes(trim($_POST["descricao"])) : FALSE;
$idFornecedor = isset($_POST["idFornecedor"]) ? addslashes(trim($_POST["idFornecedor"])) : FALSE;

// Gera um nome para o arquivo
$nome_real=$_FILES["Arquivo"]["name"];
// Substitui os espaços em branco por "_"
$nome_real = str_replace(" ", "_", $nome . $idFornecedor . $nome_real);
// Copia o arquivo para a pasta destino
copy($nome_temporario,"../uploads/$nome_real");

// O caminho e o nome da imagem que serão inseridos no banco.
$caminho_nome_imagem = "./uploads/" . $nome_real;

if (empty($nome) || empty($descricao) || empty($idFornecedor || empty($nome_real)) /*|| empty($foto)*/){
    echo "<script type=\"text/javascript\">alert('Voce nao preencheu todos os campos, verifique novamente!')</script>"; // <-- redirecionamento nao ta funcionando, ajeitar isto.
    exit;
}

$produto = new Produto(null, $nome, $descricao, $idFornecedor, $caminho_nome_imagem);
$dao = $factory->getProdutoDao();
$dao->insere($produto);

header("Location: ../estoque.php");
exit;

?>