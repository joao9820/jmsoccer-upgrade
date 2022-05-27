<?php
require_once('logica-usuario.php');
require_once("bancojmsoccer.php");

if(isset($_GET['pedido_id'])){

$resp = atualizarStatus($_GET['pedido_id'], $_GET['status_id']);

//var_dump($resp);

unset($_GET['pedido_id']);

if($_SESSION['usuario_logado']['is_admin'])
  header('Location: pedidosAdm.php');
else
  header('Location: pedidos.php');
  
/* var_dump($_GET);
die(); */

}