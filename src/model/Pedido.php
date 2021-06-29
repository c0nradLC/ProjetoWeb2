<?php

class Fornecedor {
    
    private $id;
    private $numero;
    private $datapedido;
    private $dataentrega;
    private $situacao;

    public function __construct($id, $numero, $datapedido, $dataentrega, $situacao)
    {
        $this->id=$id;
        $this->numero=$numero;
        $this->datapedido=$datapedido;
        $this->dataentrega=$dataentrega;
        $this->situacao=$situacao;
    }

    public function getId() { return $this->id; }
    public function setId($id) {$this->id = $id;}

    public function getNumero() { return $this->numero; }
    public function setNumero($numero) {$this->numero = $numero;}

    public function getDataPedido() { return $this->datapedido; }
    public function setDataPedido($datapedido) {$this->datapedido = $datapedido;}

    public function getDataEntrega() { return $this->dataentrega; }
    public function setDataEntrega($dataentrega) {$this->dataentrega = $dataentrega;}

    public function getSituacao() { return $this->situacao; }
    public function setSituacao($situacao) {$this->situacao = $situacao;}
}

public function getDadosParaJSON() {
    $dados_pedido = ['id' => $this->id, 'numero' => $this->numero, 'datapedido' => $this->datapedido, 'dataentrega' => $this->dataentrega, 'situacao' => $this->situacao];
    return $dados_pedido;
}
?>