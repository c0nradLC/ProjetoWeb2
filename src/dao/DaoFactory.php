<?php
abstract class DaoFactory {

    protected abstract function getConnection();

    public abstract function getUsuarioDao();

    public abstract function getFornecedorDao();

    public abstract function getProdutoDao();
}
?>