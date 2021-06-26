<?php
interface EstoqueDao {
    public function salva(&$estoque);
    public function verificaSeEstaEmEstoque($idProduto, $quantidade);
    public function getQuantidade($idProduto);
}
?>