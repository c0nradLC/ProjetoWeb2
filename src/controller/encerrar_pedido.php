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
            if ($daoEstoque->verificaSeEstaEmEstoque($item["id"]) == false)
            {
                $nomeProduto = $item["nome"];

                echo "<script>alert('Item \"$nomeProduto\" não está mais disponível em estoque!')</script>";
                echo "<a href='../view/carrinho.php'>Clique aqui para voltar ao carrinho!</a>";
                exit;
            }
        }
    }


?>