<?php
    include "./src/fachada.php";

    $produtoId = $_GET['id'];
    $dao = $factory->getProdutoDao();
    try
    {
        $produto = $dao->buscaPorId($produtoId);
        $idFornecedorSel = $produto->getIdFornecedor();
    }
    catch (Exception $e)
    {
        echo "<script>alert('Houve um problema ao buscar as informações deste usuário!\n Erro: $e')</script>";
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
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
                            <a href="fornecedor.php">
                                <i class="fas fa-user"></i>
                                <span>Fornecedores</span></a>
                            </li>
                        <li>
                            <a href="estoque.php" class="active">
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
                    <i class="fas fa-user-plus"></i>
                    <span>Produto</span>
                </h1>
                <form action="./src/altera_produto.php?id=<?php echo $produtoId; ?>" method="POST" role="form">
                    <div class="user">
                        <div class="cad_user">
                            <div class="info_user">
                            <div class="bxUser">
                                    <input type="text" name="nome" id="nome" placeholder="Nome" value='<?php echo $produto->getNome(); ?>'>
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="descricao" id="descricao" placeholder="Descrição" value='<?php echo $produto->getDescricao(); ?>'>
                                </div>
                                <div>
                                    <label for="idFornecedor">Fornecedor:</label>
                                        <select name="idFornecedor" id="idFornecedor">
                                            <?php

                                                $daoF = $factory->getFornecedorDao();
                                                $fornecedores = $daoF->buscaTodos();

                                                if ($fornecedores)
                                                {
                                                    foreach ($fornecedores as $fornecedor)
                                                    {
                                                        if (strcmp($idFornecedorSel, $fornecedor->getId()) == 0)
                                                        {
                                                            echo "<option value=\"" . $fornecedor->getId() . "\" selected>" . $fornecedor->getNome() . "</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value=\"" . $fornecedor->getId() . "\">" . $fornecedor->getNome() . "</option>";
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                </div>
                                <div class="bxUsers" style="padding-top: 10px">
                                    <button style="background-color: red" type="button" onclick="document.location.href='./src/remove_produto.php?id=<?php echo $produtoId; ?>'">Excluir</button>
                                    <button type="submit">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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