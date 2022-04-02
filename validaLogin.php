<?php require_once "bancojmsoccer.php" ?> 
<?php require_once "logica-usuario.php";?>
<?php require_once("conecta.php") ?>

<?php 

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  //Como não usa classes, a conexão encontra-se disponível apenas fora das funções, dentro do bancojmsoccer, portanto é necessário passar essa conexão
  $usuario = validaLogin($login, $senha, false);

	if(!$usuario){

		header('Location:loja.php?login=0');

	}else{

		logaUsuario($usuario);
		header('Location:loja.php');

	}

 
?>