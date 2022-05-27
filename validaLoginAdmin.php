<?php require_once "bancojmsoccer.php" ?> 
<?php require_once "logica-usuario.php";?>
<?php require_once("conecta.php") ?>

<?php 

  $login = $_POST['usuario'];
  $senha = $_POST['senha'];

  //Como não usa classes, a conexão encontra-se disponível apenas fora das funções, dentro do bancojmsoccer, portanto é necessário passar essa conexão
  $usuario = validaLogin($login, $senha, true);

	if(!$usuario){

		header('Location:adm.php?login=0');

	}else{

		logaUsuario($usuario);
		header('Location:pedidosAdm.php');

	}

 
?>