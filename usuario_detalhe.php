<?php
    include "./src/fachada.php";

    $usuarioId = $_GET['id'];
    $dao = $factory->getUsuarioDao();
    try
    {
        $usuario = $dao->buscaPorId($usuarioId);
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
    <title>Usuário</title>
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
                    <i class="fas fa-user-plus"></i>
                    <span>Usuário</span>
                </h1>
                <form action="./src/altera_usuario.php?id=<?php echo $usuarioId; ?>" method="POST" role="form">
                    <div class="user">
                        <div class="cad_user">
                            <div class="info_user">
                            <div class="bxUser">
                                    <input type="text" name="nome" id="nome" placeholder="Nome" value='<?php echo $usuario->getNome() ?>'>
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="telefone" id="telefone" placeholder="Telefone" value='<?php echo $usuario->getTelefone() ?>'>
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="email" id="email" placeholder="Email" value='<?php echo $usuario->getEmail() ?>'>
                                </div>
                                <div class="bxUser">
                                    <input type="text" name="cartaoCredito" id="cartaoCredito" placeholder="Cartão de crédito" value='<?php echo $usuario->getCartaoCredito() ?>'>
                                </div>
                                <div class="bxUser">
                                    <input type="password" name="senha" id="senha" placeholder="Senha" value='<?php echo $usuario->getSenha() ?>'>
                                </div>
                                <div class="bxUser">
                                    <input type="password" name="senhaConf" id="senhaConf" placeholder="Confirmar Senha">
                                </div>
                                <div class="bxUsers" style="padding-top: 10px">
                                    <button style="background-color: red" type="button" onclick="document.location.href='./src/remove_usuario.php?id=<?php echo $usuarioId; ?>'">Excluir</button>
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