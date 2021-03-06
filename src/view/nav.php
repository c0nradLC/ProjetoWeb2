<?php

    include_once "../controller/comum.php";

    echo "    <section class=\"nav\">";
    echo "    <nav>";
    echo "        <div class=\"usuario\">";
    echo "            <img src=\"https://picsum.photos/200/300?random=1\">";
    echo "        </div>";
    echo "        <ul>";
    echo "            <li>";
    echo "                <a href=\"home.php\">";
    echo "                    <i class=\"fas fa-home\"></i>";
    echo "                    <span>Inicio/Produtos</span></a>";
    echo "                </li>";
    echo "            <li>";
    echo "                <a href=\"usuarios.php\">";
    echo "                    <i class=\"fas fa-user\"></i>";
    echo "                    <span>Usuários</span></a>";
    echo "                </li>";
    echo "            <li>";
    echo "                <a href=\"fornecedor.php\">";
    echo "                    <i class=\"fas fa-user\"></i>";
    echo "                    <span>Fornecedores</span></a>";
    echo "                </li>";
    echo "            <li>";
    echo "                <a href=\"controle_estoque.php\">";
    echo "                    <i class=\"fas fa-box\"></i>";
    echo "                    <span>Controle de estoque</span>";
    echo "                </a>";
    echo "            </li>";
    echo "            <li>";
    echo "                <a href=\"novoproduto.php\">";
    echo "                    <i class=\"fas fa-plus-square\"></i>";
    echo "                    <span>Cadastrar produto</span>";
    echo "                </a>";
    echo "            </li>";
    echo "            <li>";
    echo "                <a href=\"novofornecedor.php\">";
    echo "                    <i class='fas fa-truck'></i>";
    echo "                    <span>Cadastrar fornecedor</span>";
    echo "                </a>";
    echo "            </li>";
    echo "            <li>";
    echo "                <a href=\"consultaprodutos.php\">";
    echo "                    <i class='fas fa-box-open'></i>";
    echo "                    <span>Listagem de produtos</span>";
    echo "                </a>";
    echo "            </li>";
    if (is_session_started() == false)
    {
        session_start();
    }
    if ($_SESSION['permissao_usuario'] == 2)
    {
        echo "            <li>";
        echo "                <a href=\"consultapedidos.php\">";
        echo "                    <i class='fas fa-book-open'></i>";
        echo "                    <span>Consulta de pedidos</span>";
        echo "                </a>";
        echo "            </li>";
    }
    echo "              <a href=\"../controller/executa_logout.php\">";
    echo "                      <i class=\"fas fa-sign-out-alt\"></i>";
    echo "                      <span>Sair</span> ";
    echo "              </a>";
    echo "        </ul>";
    echo "        <footer>";
    echo "            <p></p>";
    echo "        </footer>";
    echo "    </nav>";
    echo "</section>";
?>