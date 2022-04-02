<?php require_once("includes/loja/header_loja.php"); ?>

  <?php if(isset($_SESSION['alert'])) : ?>

    <div class="container my-3">
        <h4 class="text-center"><?= $_SESSION['alert']['title'] ?></h4>
        <div class="row justify-content-center">
            <div class="">
                <img height="300" src="<?= $_SESSION['alert']['status'] ? 'Imagens/Verificado.jpg' : 'Imagens/erro.png' ?>" alt="<?= $_SESSION['alert']['status'] ? 'Verificado' : 'Erro' ?>">
            </div>
        </div>

        <h4 class="text-center" style="font-style: italic;"><?= $_SESSION['alert']['desc'] ?></h4>
    
        <br><br>
        <div class="d-flex justify-content-center">
            <a href="<?= $_SESSION['alert']['voltar_link'] ?>" class="btn btn-primary mx-auto"><?= $_SESSION['alert']['voltar_title'] ?></a>
        </div>
    </div>

    <?php else: ?>

        <div class="d-flex justify-content-center my-3">
            <a href="loja.php" class="btn btn-primary mx-auto">Voltar a Loja</a>
        </div>

    <?php endif; ?>

  <?php unset($_SESSION['alert']) ?>

<?php require_once("includes/loja/footer_loja.php"); ?>
