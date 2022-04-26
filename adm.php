<?php require_once("includes/admin/header_admin.php"); 
?>
<style>

  .box-login {
    width: 350px;
    background: #f6f8fa;
    padding: 16px;
    border: 1px solid #d8dee4;
  }

</style>

<div class="h-100 container">
  <div class="h-100 d-flex justify-content-center align-items-center">

    <div>
      <h2 class="mb-3 text-center"><i class="fas fa-futbol"></i> JMSOCCER </h2>

      <form action="validaLoginAdmin.php" method="POST">
        <div class="box-login">
          <div class="form-group">
            <label for="usuario">Usuário</label>
            <input id="usuario" type="text" name="usuario" class="form-control" />
          </div>

          <div class="form-group">
            <label for="senha" >Senha</label>
            <input type="password" name="senha" class="form-control" id="senha" />
          </div>

          <button type="submit" class="btn btn-success mt-2 w-100">Entrar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
        window.onload = function(){

          const loginFail = '<?= isset($_GET['login']) && $_GET['login'] == 0 ?>';

          if(loginFail){
            alert("Usuário ou senha incorretos, tente novamente");

            const loginInput = document.getElementById('usuario');

            loginInput.focus();
          }


        }
    </script>
<?php require_once("includes/admin/footer_admin.php"); ?>

