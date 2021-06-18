<?php

include_once('UsuarioDao.php');
include_once('MySqlDao.php');

class MySqlUsuarioDao extends MySqlDao implements UsuarioDao {

    private $table_name = 'usuario';

    public function insere($usuario) {

        $query = "INSERT INTO " . $this->table_name .
        " (nome, senha, email, telefone, cartaocredito, tipo) VALUES" .
        " (:nome, :senha, :email, :telefone, :cartaocredito, :tipo)";

        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindValue(":nome", $usuario->getNome());
        $stmt->bindValue(":senha", $usuario->getSenha());
        $stmt->bindValue(":email", $usuario->getEmail());
        $stmt->bindValue(":telefone", $usuario->getTelefone());
        $stmt->bindValue(":cartaocredito", $usuario->getCartaoCredito());
        $stmt->bindValue(":tipo", $usuario->getTipo());

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

    public function remove($usuario) {
        return removePorId($usuario->getId());
    }

    public function altera(&$usuario) {

        $query = "UPDATE " . $this->table_name .
        " SET nome = :nome, senha = :senha, telefone = :telefone, email = :email, cartaocredito = :cartaocredito" .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindValue(":senha", $usuario->getSenha());
        $stmt->bindValue(":nome", $usuario->getNome());
        $stmt->bindValue(':id', $usuario->getId());
        $stmt->bindValue(':telefone', $usuario->getTelefone());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':cartaocredito', $usuario->getCartaoCredito());

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function buscaPorId($id) {

        $usuario = null;

        $query = "SELECT
                    id, nome, telefone, senha, email, cartaoCredito, tipo
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
            $usuario = new Usuario($row['id'],$row['senha'], $row['nome'], $row['telefone'], $row['email'], $row['cartaoCredito'], $row['tipo']);
        }

        return $usuario;
    }

    public function buscaPorNome($nome) {

        $usuarios = array();
        $query = "SELECT
                    id, nome, telefone, senha, email, cartaoCredito, tipo
                    FROM
                        " . $this->table_name . "
                    WHERE nome LIKE '%{$nome}%'";
        

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $usuarios[] = new Usuario($row['id'],$row['senha'], $row['nome'], $row['telefone'], $row['email'], $row['cartaoCredito'], $row['tipo']);
        }

        return $usuarios;
    }

    public function buscaPorEmail($email){

        $usuario = null;

        $query = "SELECT
                    id, nome, telefone, senha, email, cartaoCredito, tipo
                    FROM " . $this->table_name . "
                    WHERE email = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $usuario = new Usuario($row['id'],$row['senha'], $row['nome'], $row['telefone'], $row['email'], $row['cartaoCredito'], $row['tipo']);
        }

        return $usuario;
    }

    public function buscaTodos() {

        $usuarios = array();

        $query = "SELECT
                    id, nome, telefone, senha, email, cartaoCredito, tipo
                FROM
                    " . $this->table_name .
                    " ORDER BY id ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $usuarios[] = new Usuario($row['id'],$row['senha'], $row['nome'], $row['telefone'], $row['email'], $row['cartaoCredito'], $row['tipo']);
        }

        return $usuarios;
    }
}
?>
