<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <input type="checkbox" name="" id="full-screen">
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
                    <i class="fas fa-user"></i>
                    <span>fornecedores</span>
                </h1>
                <section>
                <form action="./fornecedor.php" method="POST">
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
                <section class="users">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                                
                            include_once "./src/fachada.php";

                            $dao = $factory->getFornecedorDao();
                            $fornecedores = null;

                            if (isset($_POST["txtBusca"]) && isset($_POST["tipoSel"]) && !empty(@$_POST["txtBusca"]) && !empty(@$_POST["tipoSel"]))
                            {
                                $busca = @$_POST["txtBusca"];
                                $tipoBusca = @$_POST["tipoSel"];
                            }
                            else
                            {
                                $fornecedores = $dao->buscaTodos();
                            }
                            
                            if (!empty($tipoBusca))
                            {
                                switch ($tipoBusca)
                                {
                                    case "id":
                                        if (!empty($busca))
                                        {
                                            $fornecedor = $dao->buscaPorId($busca);
                                            if ($fornecedor)
                                            {
                                                $fornecedorId = $fornecedor->getId();
                                                
                                                echo "<tr>";
                                                echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='usuario_detalhe.php?id=$fornecedorId'><i class='fas fa-pencil-alt' onclick=/></a></td>";
                                                echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='./src/remove_usuario.php?id=$fornecedorId'><i class='fas fa-trash-alt'/></a></td>";
                                                echo "<td>" . $fornecedor->getNome() . "</td>";
                                                echo "<td>" . $fornecedor->getDescricao() . "</td>";
                                                echo "<td>" . $fornecedor->getEmail() . "</td>";
                                                echo "<td>" . $fornecedor->getTelefone() . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        break;
                                    
                                    case "nome":
                                        if (!empty($busca))
                                        {
                                            $fornecedores = $dao->buscaPorNome($busca);
                                        }
                                        break;

                                    case "descricao":
                                        if (!empty($busca))
                                        {
                                            $fornecedores = $dao->buscaPorDescricao($busca);
                                        }
                                        break;
                                }
                            }

                            if ($fornecedores)
                            {
                                foreach ($fornecedores as $fornecedor)
                                {
                                    $fornecedorId = $fornecedor->getId();

                                    echo "<tr>";
                                    echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='fornecedor_detalhe.php?id=$fornecedorId'><i class='fas fa-pencil-alt' onclick=/></a></td>";
                                    echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='./src/remove_fornecedor.php?id=$fornecedorId'><i class='fas fa-trash-alt'/></a></td>";
                                    echo "<td>" . $fornecedor->getNome() . "</td>";
                                    echo "<td>" . $fornecedor->getDescricao() . "</td>";
                                    echo "<td>" . $fornecedor->getEmail() . "</td>";
                                    echo "<td>" . $fornecedor->getTelefone() . "</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </section>
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