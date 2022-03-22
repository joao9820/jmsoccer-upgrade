<?php require_once("bancojmsoccer.php") ?>
<?php

$idcamiseta = $_POST["id"];
$time = $_POST["nome"];
$modelo = $_POST["modelo"];
$cor = $_POST["cor"];
$preco = $_POST["preco"];
$cat = $_POST["cat"];

/* 
var_dump($idcamiseta, $time, $modelo, $cor, $preco);
die();
 */

$camisaAlterada = alteracamiseta($idcamiseta, $time, $modelo, $cor, $preco, $cat);

//-------------------------------------------------
if ($camisaAlterada) {
    echo "Alterado";
} 
?>

<a href="camisetalista.php">Voltar</a>