<?php include("conecta.php") ?>
<?php

$idcamiseta = $_GET["idcamiseta"];
$time = $_GET["time"];
$modelo = $_GET["modelo"];
$cor = $_GET["cor"];
$valor = $_GET["valor"];
$prazo = $_GET["prazo"];

function alteracamiseta($conexao, $idcamiseta, $time, $modelo, $cor, $valor, $prazo) {

    $sql = "UPDATE camiseta SET time='{$time}', modelo='{$modelo}', cor='{$cor}', valor='{$valor}', prazo='{$prazo}'  WHERE idcamiseta =$idcamiseta";
    $resultado = mysqli_query($conexao, $sql);

    return $resultado;
}

//-------------------------------------------------
if (alteracamiseta($conexao, $idcamiseta, $time, $modelo, $cor, $valor, $prazo)) {
    echo "Alterado";
} else {
    $error = mysqli_error($conexao);
    echo $error;
};
?>
<a href="camisetalista.php">Voltar</a>

