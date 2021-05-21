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

                $nome_usuario = $_SESSION["nome_usuario"];
                echo "<label style='position: right; color: white'>Voce esta logado como: $nome_usuario</label>";
            ?>
        </header>
        
        <main>
            <section class="nav">
                <nav>
                    <div class="usuario">
                        <img src="https://picsum.photos/200/300?random=1">
                    </div>
                    <ul>
                        <li>
                            <a href="home.php">
                                <i class="fas fa-home"></i>
                                <span>Inicio</span></a>
                            </li>
                        <li>
                            <a href="usuarios.php">
                                <i class="fas fa-user"></i>
                                <span>Usuários</span></a>
                            </li>
                        <li>
                            <a href="fornecedor.php" class="active">
                                <i class="fas fa-user"></i>
                                <span>Fornecedores</span></a>
                            </li>
                        <li>
                            <a href="estoque.php">
                                <i class="fas fa-box-open"></i>
                                <span>Estoque</span>
                            </a>
                        </li>
                        <li>
                            <a href="controle_estoque.php">
                                <i class="fas fa-box"></i>
                                <span>Controle de estoque</span>
                            </a>
                        </li>
                        <li>
                            <a href="novoproduto.php">
                                <i class="fas fa-plus-square"></i>
                                <span>Cadastrar produto</span>
                            </a>
                        </li>
                        <li>
                            <a href="novofornecedor.php">
                                <i class='fas fa-truck'></i>
                                <span>Cadastrar fornecedor</span>
                            </a>
                        </li>
                        <li onclick="openSair()">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Sair</span> 
                        </li>
                    </ul>
                    <footer>
                        <p></p>
                    </footer>
                </nav>
            </section>
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