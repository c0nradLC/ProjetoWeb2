<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <input type="checkbox" name="" id="full-screen">
    <div class="container">
        <header>
            <label for="full-screen">
                <i class="fas fa-bars"></i>
            </label>
        </header>
        
        <main>
        <section class="nav">
                <nav>
                    <div class="usuario">
                        <img src="https://picsum.photos/200/300?random=1">
                    </div>
                    <ul>
                        <li>
                            <a href="index.php"  class="active">
                                <i class="fas fa-home"></i>
                                <span>Inicio</span></a>
                            </li>
                        <li>
                    </ul>
                    <footer>
                        <p></p>
                    </footer>
                </nav>
            </section>
            <section class="main">
                <h1>
                    <i class="fas fa-user-plus"></i>
                    <span>Novo usuário</span>
                </h1>
                <form action="../controller/insere_usuario.php" method="POST" role="form">
                    <div class="user">
                        <div class="cad_user">
                            <div class="info_user">
                                <div class="bxUser">
                                    <input type="text" name="nome" id="nome" placeholder="Nome">
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="telefone" id="telefone" placeholder="Telefone">
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="cartaoCredito" id="cartaoCredito" placeholder="Cartão de crédito">
                                </div>
                                <div class="bxUser">
                                    <input type="password" name="senha" id="senha" placeholder="Senha">
                                </div>
                                <div class="bxUser">
                                    <input type="password" name="senhaConf" id="senhaConf" placeholder="Confirmar Senha">
                                </div>
                                <div class="bxUsers" style="padding-top: 10px">
                                    <button type="submit">Cadastrar</button>
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