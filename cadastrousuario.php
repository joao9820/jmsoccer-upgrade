
<?php require_once("includes/loja/header_loja.php");
?>

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
                    <label for="inputUser">Usuário</label>
                    <input required type="text" class="form-control" name="usuario" id="inputUser" placeholder="Usuário">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPass">Senha</label>
                    <input required type="password" class="form-control" name="senha" id="inputPass" placeholder="Senha">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputName">Nome</label>
                    <input required type="text" name="nome" id="inputName" class="form-control" placeholder="Nome">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCPF">CPF</label>
                    <input required type="text" maxlength="11" name="cpf" id="inputCPF" class="form-control" placeholder="CPF">
                </div>
            </div>
						<div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCEP">CEP</label>
                    <input required type="text" name="cep" id="inputCEP" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputUF">UF</label>
                    <input required type="text" name="uf" id="inputUF" class="form-control" placeholder="UF" readonly>
                </div>
							<div class="form-group col-md-6">
									<label for="inputCity">Cidade</label>
										<input required type="text" name="cidade" id="inputCity" class="form-control" placeholder="Cidade" readonly>
								</div>
						</div>
            <div class="form-row">
              <div class="form-group col-md-8">
									<label for="inputBairro">Bairro</label>
									<input required type="text" name="bairro" id="inputBairro" class="form-control" placeholder="Bairro" readonly>
							</div>
              <div class="form-group col-md-4">
									<label for="inputAddress">Endereço de cobrança</label>
									<input required type="text" name="endereco" id="inputAddress" class="form-control" placeholder="Endereço" readonly>
							</div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-2">
									<label for="inputNumber">Número</label>
									<input type="text" name="numero" id="inputNumber" class="form-control" placeholder="Número">
							</div>
								<div class="form-group col-5">
                    <label for="inputPhone">Telefone</label>
                    <input type="text" name="telefone" id="inputPhone" class="form-control" placeholder="(51) 95266-3320">
                </div>
                <div class="form-group col-5">
                    <label for="inputMsg">Recado</label>
                    <input type="text" name="recado" id="inputMsg" class="form-control" placeholder="(51) 95266-3320">
                </div>
            </div>
						<div class="form-row">
							<div class="form-group col-12">
									<label for="inputEmail">E-mail</label>
									<input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail">
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
 
 $status = inserirUsuario($usuario, isset($_SESSION['usuario_logado']['id']) ? $_SESSION['usuario_logado']['id'] : null);
	
}	
?>

<script>

  window.onload = function(){
    
    getDadosCep();

    const cpf = $("#inputCPF");

    cpf.focusout((e) => {
      
      if(!validaCPF(e.target.value)) {
          alert('CPF inválido, por favor, verifique e corrija o código informado');
      }
    });

  }

  

</script>

<?php require_once('includes/loja/footer_loja.php') ?>