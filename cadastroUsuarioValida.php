
<?php if(isset($_POST['usuario']) && isset($_POST['senha'])){
 
	require_once "logica-usuario.php";
	require_once "Usuario.php";
	require_once "bancojmsoccer.php";
 
	$usuario = new Usuario();

	foreach($_POST as $key => $info){


		$usuario->{$key} = $info;

		if($key == "senha"){
			$usuario->senha = md5($info);
		}

	}

	//var_dump($usuario);
	//die();
 
 $status = inserirUsuario($usuario);
	
}	
?>

<?php require_once('includes/loja/footer_loja.php') ?>