<?php

include_once('ProdutoDao.php');
include_once('MySqlDao.php');

class MySqlProdutoDao extends MySqlDao implements ProdutoDao {

    private $table_name = 'produto';

    public function insere($produto) {

        $query = "INSERT INTO " . $this->table_name .
        " (nome, descricao, idFornecedor, foto) VALUES" . //Adicionar a parte do foto = :foto quando for o momento.
        " (:nome, :descricao, :idFornecedor, :foto)";

        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":descricao", $produto->getDescricao());
        $stmt->bindValue(":idFornecedor", $produto->getIdFornecedor());
        $stmt->bindValue(":foto", $produto->getFoto());

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

    public function remove($produto) {
        return removePorId($produto->getId());
    }

    public function altera(&$produto) {

        $query = "UPDATE " . $this->table_name .
        " SET nome = :nome, descricao = :descricao, idFornecedor = :idFornecedor" . //Adicionar a parte do foto = :foto quando for o momento.
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":descricao", $produto->getDescricao());
        $stmt->bindValue(":idFornecedor", $produto->getIdFornecedor());
        // $stmt->bindValue(":foto", $produto->getFoto());
        $stmt->bindValue(':id', $produto->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function buscaPorId($id) {

        $produto = null;

        $query = "SELECT
                    id, nome, descricao, idFornecedor/*, foto*/
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $produto = new Produto($row['id'],$row['nome'], $row['descricao'], $row['idFornecedor'], null/*, $row['foto']*/);
        }

        return $produto;
    }

    public function buscaPorNome($nome, $limit=10, $offSet=0) {

        $produtos = array();

        $query = "SELECT id, nome, descricao, idFornecedor " ./*, foto */
                "FROM ". $this->table_name . 
                " WHERE UPPER(nome) LIKE '%".str_replace(' ', '%', strtoupper($nome))."%'" .
                " ORDER BY id ASC " .
                "LIMIT " .$offSet. ", " .$limit ;   
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $produtos[] = new Produto($row['id'],$row['nome'], $row['descricao'], $row['idFornecedor'], null/*, $row['foto']*/);
        }

        return $produtos;
    }

    public function buscaPorDescricao($descricao) {
        
        $produtos = array();

        $query = "SELECT
                    id, nome, descricao, idFornecedor/*, foto*/
                FROM
                    " . $this->table_name . "
                WHERE
                    descricao LIKE '%{$descricao}%'";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $produtos[] = new Produto($row['id'],$row['nome'], $row['descricao'], $row['idFornecedor'], null/*, $row['foto']*/);
        }

        return $produtos;
    }

    public function buscaTodos($limit=10, $offSet=0) {

        $produto = array();

        $query = " SELECT id, nome, descricao, idFornecedor " ./*, foto*/
                "FROM " . $this->table_name .
                " ORDER BY id ASC " .
                " LIMIT " .$offSet. ", " .$limit;


        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $produto[] = new Produto($row['id'],$row['nome'], $row['descricao'], $row['idFornecedor'], null/*, $row['foto']*/);
        }

        return $produto;
    }

    public function buscaQtdProdutos()
    {
        $query = " SELECT id, nome, descricao, idFornecedor " ./*, foto*/
        "FROM " . $this->table_name;

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $qtd_produtos = $stmt->rowCount();
        return $qtd_produtos;
    }

    public function buscaQtdProdutosComWhere($nome)
    {
        $query = "SELECT id, nome, descricao, idFornecedor " ./*, foto */
                "FROM ". $this->table_name . 
                " WHERE UPPER(nome) LIKE '%".str_replace(' ', '%', strtoupper($nome))."%'";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $qtd_produtos = $stmt->rowCount();
        return $qtd_produtos;
    }
}
?>
