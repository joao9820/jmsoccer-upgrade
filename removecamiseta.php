<?php require_once("bancojmsoccer.php") ?>

<?php

$idcamiseta = $_GET["id"];

removeCamiseta($idcamiseta);

header("Location:camisetalista.php?removido=true");
?>
