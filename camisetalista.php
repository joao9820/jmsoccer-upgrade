<?php require_once("includes/admin/header_admin.php") ?>
  <?php if(!isset($_SESSION['usuario_logado']) || !$_SESSION['usuario_logado']['is_admin']) header("Location:adm.php") ?>
    
    <?php require_once("bancojmsoccer.php") ?>
  

	 <?php
	    $camisas = listacamiseta(); 
    
	 ?>

  <div class="container">
        <div class="row">
          <div class="d-flex w-100 align-items-center justify-content-between py-3">
            <div class="d-flex align-items-center">
              <a href="cadastraCamisa.php" class="btn btn-outline-secondary rounded-circle p-2">
                <i class="fas fa-arrow-left" style="width: 1em;"></i>
              </a>
              <h1 class='ml-4 mb-0'>Camisas</h1>
            </div>
            <a href="cadastraCamisa.php" class="btn btn-success"><i class="fas fa-plus"></i> Cadastrar</a>
          </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Preço</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($camisas && $camisas->num_rows) : 
            
                  while($camisa = mysqli_fetch_assoc($camisas)) : ?>

                      <tr>
                          <th scope="row"><?= $camisa['id'] ?></th>
                          <td><?= $camisa['nome'] ?></td>
                          <td><?= $camisa['modelo'] ?></td>
                          <td><?= $camisa['categoria_nome'] ?></td>
                          <td><?= $camisa['cor'] ?: '-' ?></td>
                          <td><?= 'R$ ' . $camisa['preco'] ?></td>
                          <td>
                            <div class="d-flex justify-content-center">
                              <button type="button" id="alterarCamisa" class="btn btn-outline-warning" data-toggle="modal" data-target="#alterarCamisaModal"
                              onclick="setCamisaModal('<?= $camisa['id'] ?>', '<?= $camisa['nome'] ?>', '<?= $camisa['modelo'] ?>', '<?=  $camisa['cor'] ?>', '<?=  $camisa['preco'] ?>')">
                                <i class="fas fa-edit"></i>
                              </button>
                              <a href="removecamiseta.php?id=<?= $camisa['id'] ?>" role="button" id="alterarCamisa" class="btn btn-outline-danger ml-2">
                                <i class="fas fa-trash"></i>
                              </a>
                            </div>
                          </td>
                      </tr>

                    <?php endwhile; 
                      endif;
                    ?>

                </tbody>
            </table>
        </div>
    </div>
  </div>


  <div class="modal fade" tabindex="-1" id="alterarCamisaModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alterar Camisa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="alteraForm.php" method="POST">
      <div class="modal-body">
        
            <div class="box-login">
                <input type="hidden" name="id" id="idCamisa">

                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input id="nome" type="text" name="nome" class="form-control" required/>
                </div>

                <div class="form-group">
                  <label for="modelo">Modelo</label>
                  <input type="text" name="modelo" class="form-control" id="modelo" required />
                </div>
                <div class="form-group">
                  <label for="modelo">Categoria</label>
                  <select name="cat" class="form-control">
                      <option value="1" >Nacionais</option>
                      <option value="2" >Internacionais</option>
                      <option value="3" >Seleções</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="cor">Cor</label>
                  <input type="text" name="cor" class="form-control" id="cor" />
                </div>
                <div class="form-group">
                  <label for="preco">Preço</label>
                  <input type="text" name="preco" class="form-control" id="preco" required/>
                </div>
            </div>
  
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>

function setCamisaModal(id, nome, modelo, cor, preco){

    $("#idCamisa").val(id);
    $("#nome").val(nome);
    $("#modelo").val(modelo);
    $("#cor").val(cor);
    $("#preco").val(preco);

}



</script>

 <!-- <div class="topo"> 
				<nav class="navbar navbar-expand-lg navbar-light bg-light padding-top "> 
 <a class="btn btn-dark" href="cadastracamisa.php">Cadastrar camisa</a><span class="sr-only">(current)</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </div>
<div class="topo"> 
				<nav class="navbar navbar-expand-lg navbar-light bg-light padding-top "> 
 <a class="btn btn-dark" href="index.php">Inicio</a><span class="sr-only">(current)</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </div> -->
  <?php require_once("includes/admin/footer_admin.php") ?>