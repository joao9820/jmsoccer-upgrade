
<?php
session_start();//ínicia a sessão 

//------------------------------------------------------
 function  usuarioEstaLogado(){ //usei no cabeçalho e na index.
  return isset($_SESSION["usuario_logado"]);
  }

//------------------------------------------------
 function verificaUsuario(){ //usei na index.
  if(!usuarioEstaLogado()){ 
       header("Location:index.php?falhaDeSeguranca=true");
       die();
}}
//-----------------------------------------------------
function  usuarioLogado(){ 
  return $_SESSION["usuario_logado"];
  }
//-------------------------------------------------------
function logaUsuario($login){   // chamei no login
   $_SESSION["usuario_logado"]= $login;
  }
 //-------------------------------------------------------
 function logout(){
  session_destroy(); 
}
//--------------------------------------------------------


?>
