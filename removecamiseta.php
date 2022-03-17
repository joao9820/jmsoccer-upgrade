
<?php require_once("conecta.php") ?>
<?php require_once("bancojmsoccer.php") ?>

<?php

$idcamiseta = $_POST["idcamiseta"];
$time = $_POST["time"];
$modelo = $_POST["modelo"];
$cor = $_POST["cor"];
$valor = $_POST["valor"];
$prazo = $_POST["prazo"];

removeCamiseta($conexao, $idcamiseta, $time, $modelo, $cor, $valor, $prazo);

header("Location:camisetalista.php?removido=true");
?>
