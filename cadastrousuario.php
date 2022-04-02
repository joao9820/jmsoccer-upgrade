
<?php require_once("includes/loja/header_loja.php"); ?>

<style>

  .box-login {
    width: 350px;
    background: #f6f8fa;
    padding: 16px;
    border: 1px solid #d8dee4;
  }

	#cadastroUsuario {
			border: 1px solid #ced4da;
      padding: 2rem;
      border-radius: 7px;
	}
		

</style>

<div class="h-100 container">
  <div class="h-100 d-flex justify-content-center align-items-center">

    <div id="cadastroUsuario">
      <h2 class="mb-4 text-center"><i class="fas fa-futbol"></i> JMSOCCER - Cadastro</h2>

      <form class="col" action="cadastroUsuarioValida.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Usuário</label>
                    <input type="text" class="form-control" name="usuario" placeholder="Usuário">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputAddress">Senha</label>
                    <input type="password" class="form-control" name="senha" placeholder="Senha">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputEmail4">Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputAddress">CPF</label>
                    <input type="text" name="cpf" class="form-control" placeholder="CPF">
                </div>
            </div>
						<div class="form-row">
							<div class="form-group col-md-6">
									<label for="inputAddress">Endereço de cobrança</label>
									<input type="text" name="endereco" class="form-control" placeholder="Endereço">
							</div>
							<div class="form-group col-md-6">
									<label for="inputCity">Cidade</label>
										<input type="text" name="cidade" class="form-control">
								</div>
						</div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCEP">CEP</label>
                    <input type="text" name="cep" class="form-control" >
                </div>
                <div class="form-group col-md-2">
                    <label for="inputCEP">UF</label>
                    <input type="text" name="uf" class="form-control" >
                </div>
								<div class="form-group col-6">
                    <label for="inputAddress">Telefone</label>
                    <input type="text" name="telefone" class="form-control" placeholder="(51) 95266-3320">
                </div>
            </div>
						<div class="form-row">
							<div class="form-group col-4">
                    <label for="inputAddress">Recado</label>
                    <input type="text" name="recado" class="form-control" placeholder="(51) 95266-3320">
                </div>
							<div class="form-group col-8">
									<label for="inputAddress">E-mail</label>
									<input type="email" name="email" class="form-control" placeholder="E-mail">
							</div>
						</div>
            <br>
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-outline-danger mr-2">Limpar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
  </div>
</div>


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