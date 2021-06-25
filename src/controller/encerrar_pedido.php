<?php
    include "../fachada.php";
    require_once("funcoes_carrinho.php");

    $carrinho = getCarrinho();
    if ( is_null($carrinho) or count($carrinho) == 0)
    {
        echo "<script>alert('Nenhum item no carrinho!')</script>";
        echo "<a href='../view/carrinho.php'>Clique aqui para voltar ao carrinho!</a>";
    } else {
        $daoEstoque = $factory->getEstoqueDao();

        foreach($carrinho as $item)
        {
            if ($daoEstoque->verificaSeEstaEmEstoque($item["id"], $item["quantidade"]) == false)
            {
                $nomeProduto = $item["nome"];
                $qtdEstoque = $daoEstoque->getQuantidade($item["id"]);

                echo "<script>alert('Item \"$nomeProduto\" não está mais disponível em estoque! Quantidade em estoque: $qtdEstoque')</script>";
                echo "<a href='../view/carrinho.php'>Clique aqui para voltar ao carrinho!</a>";
                exit;
            } else {
                continue;
            }
            
            

        }
    }
?>