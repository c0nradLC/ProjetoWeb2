<?php
class Fornecedor {
    
    private $id;
    private $nome;
    private $descricao;
    private $telefone;
    private $email;

    public function __construct( $id, $nome, $descricao, $telefone, $email)
    {
        $this->id=$id;
        $this->descricao=$descricao;
        $this->nome=$nome;
        $this->telefone=$telefone;
        $this->email=$email;
    }

    public function getId() { return $this->id; }
    public function setId($id) {$this->id = $id;}

    public function getTelefone() { return $this->telefone; }
    public function setTelefone($telefone) {$this->telefone = $telefone;}

    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}

    public function getDescricao() { return $this->descricao; }
    public function setDescricao($descricao) {$this->descricao = $descricao;}

    public function getEmail() { return $this->email; }
    public function setEmail($email) {$this->email = $email;}
}
?>