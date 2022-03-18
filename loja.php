<?php require_once("includes/loja/header_loja.php"); 
require_once("bancojmsoccer.php"); 

   $usuarioLogado = isset($_SESSION['usuario_logado']);

    $cat = isset($_GET['cat']) ? $_GET['cat']  : '';

    //var_dump($cat);

   $camisas = listarProdutos($cat);

?>

    <style>
        .card-img-top {
            object-fit: cover;
            height: 320px;
            padding: 10px;
        }

        .cat-camisas {
            height: 100px;
        }

        .btn-group .btn ~ .btn {
            margin-left: 2px !important;
        }

    </style>

    <!-- <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="loja.php">Gerais</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="timeNacional.php">Time Nacional</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="timeInternacional.php">Time Internacional</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="selecao.php">Seleções</a>
        </li>
    </ul> -->
    <div class="container">
        <div class="d-flex justify-content-center align-items-center cat-camisas">
            <div class="btn-group me-2 w-100" role="group" aria-label="Second group">
                <a href="loja.php?cat=0" class="btn <?= !$cat ? 'btn-dark' : 'btn-secondary' ?>">Gerais</a>
                <a href="loja.php?cat=1" class="btn <?= $cat && $cat == 1 ? 'btn-dark' : 'btn-secondary' ?>">Time Nacional</a>
                <a href="loja.php?cat=2" class="btn <?= $cat && $cat == 2 ? 'btn-dark' : 'btn-secondary' ?>">Time Internacional</a>
                <a href="loja.php?cat=3" class="btn <?= $cat && $cat == 3 ? 'btn-dark' : 'btn-secondary' ?>">Seleções</a>
            </div>
        </div>
        <div class="row">

            <?php if($camisas && $camisas->num_rows) : 
            
            while($camisa = mysqli_fetch_assoc($camisas)) : ?>
    
            <div class="col-3 mb-3">
                <div class="card h-100">
                    <img class=" card-img-top" src="Imagens/<?= $camisa['img'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $camisa['nome'] ?></h5>
                        <p class="card-text text-center">Camisa Modelo <?= $camisa['modelo'] ?>.</p>
                        <h5 class="card-text text-center">Por Apenas: <?= $camisa['preco'] ?></h5>
                        
                            <div class="d-flex justify-content-center w-100 mb-3">
                                <div>
                                    <p class="mr-1 mb-0">TAM:</p> 
                                    <select name="tamanho">
                                        <option value="P" >P</option>
                                        <option value="M" >M</option>
                                        <option value="G" >G</option>
                                        <option value="GG" >GG</option>
                                    </select>
                                </div>
                                <div class="ml-3">
                                    <p class="mr-1 mb-0">QTD:</p>
                                    <select name="quantidade">
                                        <?php for($i = 1; $i <= 10; $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor ?>
                                    </select>
                                </div>
                            </div>
                        
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary w-100" onclick="addCarrinho()">
                                <i class="fas fa-shopping-cart mr-2"></i>Comprar
                            </button>
                        </div>
                    </div>
                </div>
            </div>        
        <?php 
        endwhile;
        endif; ?>

            


        </div>
    </div>


    <script>
        window.onload = function(){

          const loginFail = '<?= isset($_GET['login']) && $_GET['login'] == 0 ?>';

          if(loginFail){
            alert("Usuário ou senha incorretos, tente novamente");

            const loginInput = document.getElementById('login');

            loginInput.focus();
          }

        }

        function addCarrinho(){
            
            if(!verificarSessao()){

                alert("Para adicionar o produto no carrinho é necessário realizar o login");

            }

        }

    </script>

    <?php require_once('includes/loja/footer_loja.php') ?>