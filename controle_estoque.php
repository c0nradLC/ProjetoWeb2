<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de estoque</title>
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
                            <a href="home.php" >
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
                            <a href="estoque.php">
                                <i class="fas fa-box-open"></i>
                                <span>Estoque</span>
                            </a>
                        </li>
                        <li>
                            <a href="controle_estoque.php" class="active">
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
                    <i class="fas fa-box-open"></i>
                    <span>Controle de estoque</span>
                </h1>
                <section>
                <form action="./src/controla_estoque.php" method="POST">
                    <div>
                        <label for="txtIdProduto">Id do produto:</label>
                        <input id="txtIdProduto" name="txtIdProduto" type="text">
                    </div>
                    <div>
                        <label for="txtQtdProduto">Quantidade:</label>
                        <input id="txtQtdProduto" name="txtQtdProduto" type="number">
                    </div>
                    <div>
                        <label for="txtPrecoProduto">Preço:</label>
                        <input id="txtPrecoProduto" name="txtPrecoProduto" type="number">
                    </div>
                    <div>
                        <button type="submit">Salvar</button>
                    </div>
                </form>
                </section>
            </section>
        </main>
    </div>
</body>