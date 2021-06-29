<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
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
                    <i class="fas fa-user"></i>
                    <span>usuários</span>
                </h1>
                <section>
                <form action="./usuarios.php" method="POST">
                    <div>
                        <label for="txtBusca">Buscar:</label>
                        <input id="txtBusca" name="txtBusca" type="text">
                        <select id="tipoSel" name="tipoSel">
                            <option value="id">Id</option>
                            <option value="nome">Nome</option>
                            <option value="email">Email</option>
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
                                <th>E-mail</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                            
                            include_once "../fachada.php";

                            $dao = $factory->getUsuarioDao();
                            $usuarios = null;

                            if (isset($_POST["txtBusca"]) && isset($_POST["tipoSel"]) && !empty(@$_POST["txtBusca"]) && !empty(@$_POST["tipoSel"]))
                            {
                                $busca = @$_POST["txtBusca"];
                                $tipoBusca = @$_POST["tipoSel"];
                            }
                            else
                            {
                                $usuarios = $dao->buscaTodos();
                            }
                            
                            if (!empty($tipoBusca))
                            {
                                switch ($tipoBusca)
                                {
                                    case "id":
                                        if (!empty($busca))
                                        {
                                            $usuario = $dao->buscaPorId($busca);
                                            if ($usuario)
                                            {
                                                $usuarioId = $usuario->getId();
                                                
                                                echo "<tr>";
                                                echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='usuario_detalhe.php?id=$usuarioId'><i class='fas fa-pencil-alt' onclick=/></a></td>";
                                                echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='../controller/remove_usuario.php?id=$usuarioId'><i class='fas fa-trash-alt'/></a></td>";
                                                echo "<td>" . $usuario->getNome() . "</td>";
                                                echo "<td>" . $usuario->getEmail() . "</td>";
                                                echo "<td>" . $usuario->getTelefone() . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        break;
                                    
                                    case "nome":
                                        if (!empty($busca))
                                        {
                                            $usuarios = $dao->buscaPorNome($busca);
                                        }
                                        break;

                                    case "email":
                                        if (!empty($busca))
                                        {
                                            $usuario = $dao->buscaPorEmail($busca);
                                            if ($usuario)
                                            {
                                                $usuarioId = $usuario->getId();
                                                
                                                echo "<tr>";
                                                echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='usuario_detalhe.php?id=$usuarioId'><i class='fas fa-pencil-alt' onclick=/></a></td>";
                                                echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='../controller/remove_usuario.php?id=$usuarioId'><i class='fas fa-trash-alt'/></a></td>";
                                                echo "<td>" . $usuario->getNome() . "</td>";
                                                echo "<td>" . $usuario->getEmail() . "</td>";
                                                echo "<td>" . $usuario->getTelefone() . "</td>";
                                                echo "</tr>";
                                            }
                                        }
                                        break;
                                }
                            }
                            
                            if ($usuarios)
                            {
                                foreach ($usuarios as $usuario)
                                {

                                    $usuarioId = $usuario->getId();

                                    echo "<tr>";
                                    echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='usuario_detalhe.php?id=$usuarioId'><i class='fas fa-pencil-alt' onclick=/></a></td>";
                                    echo "<td style='width: 5px; cursor: pointer'><a style='color: black' href='../controller/remove_usuario.php?id=$usuarioId'><i class='fas fa-trash-alt'/></a></td>";
                                    echo "<td>" . $usuario->getNome() . "</td>";
                                    echo "<td>" . $usuario->getEmail() . "</td>";
                                    echo "<td>" . $usuario->getTelefone() . "</td>";
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
    <script src="../../js/script.js"></script>
</body>
</html>