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