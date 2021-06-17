<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                <h1><i class="fas fa-home"></i><span>Inicio</span></h1>
                <div class="fornecedor">
                    <div class="boxbx">
                        <img src="../../img/profile/nike2.png" alt="">
                        <button>Camisa Nike Barcelona</button> 
                    </div>
                    <div class="boxbx">
                        <img src="../../img/profile/adidas2.png" alt="">
                        <button>Camisa Adidas Camuflada</button>
                    </div>
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
    <script src="../../js/script.js"></script>
</body>
</html>