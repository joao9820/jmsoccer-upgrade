<?php
require_once('logica-usuario.php');
require_once("bancojmsoccer.php");

require_once("PhpMailerCustom.php"); 

use PhpMailerCustom\PhpMailerCustom;

if(isset($_GET['pedido_id'])){

  $codRastreamento = isset($_GET['codigo_rastreamento']) ? $_GET['codigo_rastreamento'] : null;

$resp = atualizarStatus($_GET['pedido_id'], $_GET['status_id'], $codRastreamento);

unset($_GET['pedido_id']);


if($_SESSION['usuario_logado']['is_admin'] && isset($_GET['enviar_email']) && isset($_GET['email_cliente'])){

 $enviarEmail = new PhpMailerCustom($_GET['email_cliente'], $codRastreamento);

 $enviarEmail->enviarEmail();

}

//var_dump($resp);

if($_SESSION['usuario_logado']['is_admin'])
  header('Location: pedidosAdm.php');
else
  header('Location: pedidos.php');
  
/* var_dump($_GET);
die(); */

}