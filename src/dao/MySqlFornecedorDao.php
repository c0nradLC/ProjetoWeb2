<?php

include_once('FornecedorDao.php');
include_once('MySqlDao.php');

class MySqlFornecedorDao extends MySqlDao implements FornecedorDao {

    private $table_name = 'fornecedor';

    public function insere($fornecedor) {

        $query = "INSERT INTO " . $this->table_name .
        " (nome, descricao, email, telefone) VALUES" .
        " (:nome, :descricao, :email, :telefone)";

        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindValue(":nome", $fornecedor->getNome());
        $stmt->bindValue(":descricao", $fornecedor->getDescricao());
        $stmt->bindValue(":email", $fornecedor->getEmail());
        $stmt->bindValue(":telefone", $fornecedor->getTelefone());

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function removePorId($id) {
        $query = "DELETE FROM " . $this->table_name .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindValue(':id', $id);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function remove($fornecedor) {
        return removePorId($fornecedor->getId());
    }

    public function altera(&$fornecedor) {

        $query = "UPDATE " . $this->table_name .
        " SET telefone = :telefone, email = :email, nome = :nome, descricao = :descricao" .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindValue(":telefone", $fornecedor->getTelefone());
        $stmt->bindValue(":email", ($fornecedor->getEmail()));
        $stmt->bindValue(":nome", $fornecedor->getNome());
        $stmt->bindValue(":descricao", $fornecedor->getDescricao());
        $stmt->bindValue(':id', $fornecedor->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function buscaPorId($id) {

        $fornecedor = null;

        $query = "SELECT
                    id, nome, descricao, telefone, email
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    1 OFFSET 0";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $fornecedor = new Fornecedor($row['id'],$row['nome'], $row['descricao'], $row['telefone'], $row['email']);
        }

        return $fornecedor;
    }

    public function buscaPorNome($nome) {

        $fornecedores = array();

        $query = "SELECT
                    id, nome, descricao, telefone, email
                FROM
                    " . $this->table_name . "
                WHERE
                    nome LIKE '%{$nome}%'";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $fornecedores[] = new Fornecedor($row['id'],$row['nome'], $row['descricao'], $row['telefone'], $row['email']);
        }

        return $fornecedores;
    }

    public function buscaPorDescricao($descricao) {
        
        $fornecedores = array();

        $query = "SELECT
                    id, nome, descricao, telefone, email
                FROM
                    " . $this->table_name . "
                WHERE
                    descricao LIKE '%{$descricao}%'";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $fornecedores[] = new Fornecedor($row['id'],$row['nome'], $row['descricao'], $row['telefone'], $row['email']);
        }

        return $fornecedores;
    }

    public function buscaTodos() {

        $fornecedor = array();

        $query = "SELECT
                    id, nome, descricao, telefone, email
                FROM
                    " . $this->table_name .
                    " ORDER BY id ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $fornecedor[] = new Fornecedor($row['id'],$row['nome'], $row['descricao'], $row['telefone'], $row['email']);
        }

        return $fornecedor;
    }
}
?>
