<?php
    $nome_usuario = $_SESSION["nome_usuario"];
    echo "<label style='position: right; color: white'>Logado como: $nome_usuario</label>";
    echo "<a href=\"carrinho.php\" style='color: white'><span>Carrinho</span><i class=\"fas fa-shopping-cart\" style='padding-left: 5px'></i></a>";
?>