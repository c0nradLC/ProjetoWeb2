<?php
include_once "../fachada.php";

$id = @$_GET["id"];

$dao = $factory->getUsuarioDao();
$dao->removePorId($id);

header("Location: ../view/usuarios.php");
exit;

?>