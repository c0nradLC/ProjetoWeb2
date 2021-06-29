<?php
interface PedidoDao {

    public function criaPedido($carrinho);

    public function buscaTodos();

    public function buscaPorId($id);

    public function buscaPedidosJSON();

    public function buscaPedidoJSON($id);

}
?>