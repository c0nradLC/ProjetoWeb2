<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <h1><a href="">Projeto JL</a></h1>
            </div>
        </header>
        <nav></nav>
        <main>
            <form action="../controller/executa_login.php" method="POST" role="form">
                <div class="bxBox">
                    <input type="text" name="email" id="email" placeholder="E-mail">
                </div>
                <div class="bxBox">
                    <input type="password" name="senha" id="senha" placeholder="Senha">
                </div>
                <div>
                    <button type="submit" style="font-size: large">Entrar</button>
                </div>
                <div style="padding-top: 20px">
                    <label><a href="novousuario.php">Cadastrar-se</a></label>
                </div>
            </form>
        </main>
        <footer>
            <p></p>
        </footer>
    </div>
    <script src="../../js/script.js"></script>
</body>
</html>