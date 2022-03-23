<?php require_once("includes/loja/header_loja.php"); ?>
<?php require_once("bancojmsoccer.php"); ?>
<?php $camisas = listarCarrinho(); ?>

    <h4 class="text-center">Resumo do Pedido</h4>
    <br>
    <div class="container">
        <div class="row">
            <?php if(count($camisas)) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($camisas as $item) : ?>
                        <tr>
                            <th scope="row"><?= $item->id ?></th>
                            <td><?= $item->nome ?></td>
                            <td style="margin-left: 40px;"><?= $item->tamanho ?></td>
                            <td><?= $item->quantidade ?></td>
                            <td><?= $item->preco ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
            <a href="finalizarCompra.php" class="btn btn-success">Finalizar Pedido</a>
        </div>
    </div>

 <?php require_once("includes/loja/footer_loja.php"); ?>