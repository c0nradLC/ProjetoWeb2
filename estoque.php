<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <label for="full-screen">
                <i class="fas fa-bars"></i>
            </label>
            <?php
                include "./src/verifica.php";
                include_once "usuario_logado.php";
            ?>
        </header>
        <main>
            <?php
                include_once "nav.php";
            ?>
            <section class="main">
                <h1>
                    <i class="fas fa-box-open"></i>
                    <span>estoque</span>
                </h1>
                <section>
                <form action="./estoque.php" method="POST">
                    <div>
                        <label for="txtBusca">Buscar:</label>
                        <input id="txtBusca" name="txtBusca" type="text">
                        <select id="tipoSel" name="tipoSel">
                            <option value="id">Id</option>
                            <option value="nome">Nome</option>
                            <option value="descricao">Descrição</option>
                        </select>
                        <button type="submit">Buscar</button>
                    </div>
                </form>
                </section>
                <div class="users">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Nome do fornecedor</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                            
                        include_once "./src/fachada.php";

                        $dao = $factory->getProdutoDao();
                        $produtos = null;

                        if (isset($_POST["txtBusca"]) && isset($_POST["tipoSel"]) && !empty(@$_POST["txtBusca"]) && !empty(@$_POST["tipoSel"]))
                        {
                            $busca = @$_POST["txtBusca"];
                            $tipoBusca = @$_POST["tipoSel"];
                        }
                        else
                        {
                            $produtos = $dao->buscaTodos();
                        }
                        
                        if (!empty($tipoBusca))
                        {
                            switch ($tipoBusca)
                            {
                                case "id":
                                    if (!empty($busca))
                                    {
                                        $produto = $dao->buscaPorId($busca);

                                        if ($produto)
                                        {
                                            $dao = $factory->getFornecedorDao();
                                            $fornecedor = $dao->buscaPorId($produto->getIdFornecedor());
                                            $fornecedorNome = $fornecedor->getNome();
                                            $produtoId = $produto->getId();
                                            
                                            echo "<tr>";
                                            echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='usuario_detalhe.php?id=$produtoId'><i class='fas fa-pencil-alt' onclick=/></a></td>";
                                            echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='./src/remove_usuario.php?id=$produtoId'><i class='fas fa-trash-alt'/></a></td>";
                                            echo "<td>" . $produto->getNome() . "</td>";
                                            echo "<td>" . $produto->getDescricao() . "</td>";
                                            echo "<td>" . $fornecedorNome . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    break;
                                
                                case "nome":
                                    if (!empty($busca))
                                    {
                                        $produtos = $dao->buscaPorNome($busca);
                                    }
                                    break;

                                case "descricao":
                                    if (!empty($busca))
                                    {
                                        $produtos = $dao->buscaPorDescricao($busca);
                                    }
                                    break;
                            }
                        }

                        if ($produtos)
                        {
                            foreach ($produtos as $produto)
                            {
                                $produtoId = $produto->getId();

                                $dao = $factory->getFornecedorDao();
                                $fornecedor = $dao->buscaPorId($produto->getIdFornecedor());

                                echo "<tr>";
                                echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='produto_detalhe.php?id=$produtoId'><i class='fas fa-pencil-alt' onclick=/></a></td>";
                                echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='./src/remove_produto.php?id=$produtoId'><i class='fas fa-trash-alt'/></a></td>";
                                echo "<td>" . $produto->getNome() . "</td>";
                                echo "<td>" . $produto->getDescricao() . "</td>";
                                echo "<td>" . $fornecedor->getNome() . "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                    </tbody>
                </table>
                </div>
            </section>
        </main>
        
    </div>
    <div class="sairMain">
        <div class="sair">
            <p>deseja sair ?</p>
            <button>Sair</button>
            <button>Cancelar</button>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>