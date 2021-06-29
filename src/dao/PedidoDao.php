<?php
interface PedidoDao {

    public function criaPedido($carrinho);

    public function buscaTodos();

    public function buscaPorId($id);

    public function buscaPedidosJSON();

    public function buscaPedidoJSON($id);

    public function buscaPorNumero($numero, $limit, $offSet);

    public function buscaQtdPedidos();

    public function buscaQtdPedidosComWhere($numero);

    public function buscaTodosComlimit($limit, $offSet);

}
?>