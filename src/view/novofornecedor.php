<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar fornecedor</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <input type="checkbox" name="" id="full-screen">
    <div class="container">
        <header>
            <label for="full-screen">
                <i class="fas fa-bars"></i>
            </label>
            <?php
			include "../controller/verifica.php";
            include_once "usuario_logado.php";
            ?>
        </header>
        
        <main>
            <?php
                include_once "nav.php";
            ?>
            <section class="main">
                <h1>
                    <i class="fas fa-user-plus"></i>
                    <span>Novo fornecedor</span>
                </h1>
                <form action="../controller/insere_fornecedor.php" method="POST" role="form">
                    <div class="user">
                        <div class="cad_user">
                            <div class="info_user">
                                <div class="bxUser">
                                    <input type="text" name="nome" id="nome" placeholder="Nome">
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="descricao" id="descricao" placeholder="Descrição">
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="telefone" id="telefone" placeholder="Telefone">
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="bxUsers" style="padding-top: 10px">
                                    <button type="submit">Cadastrar fornecedor</button>
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
    <script src="../../js/script.js"></script>
</body>
</html>