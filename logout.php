<?php require_once "logica-usuario.php";

if(isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado']['is_admin']){

  $redirect = 'index.php';

}else{
  $redirect = 'loja.php';
}

logout();
header("Location:$redirect?logout=true"); 
die(); 
