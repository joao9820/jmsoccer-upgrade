<?php require_once("includes/loja/header_loja.php"); ?>
<?php require_once("bancojmsoccer.php"); ?>
<?php $camisas = listarCarrinho(); ?>

    <h4 class="text-center">Resumo do Pedido</h4>
    <br>
    <div class="container">
        <div class="row">
            <?php if(count($camisas)) : ?>
            <table class="table table-striped" id="tableItens">
                <thead>
                    <tr>
                        <th scope="col">Cód Item</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody id="itensCarrinho">
                    <?php 
                    $total = 0;
                    foreach($camisas as $item) : ?>
                        <tr>
                            <th scope="row">
                                <input type="hidden" value="<?= $item->cod ?>" />
                                <?= $item->cod + 1 ?>
                            </th>
                            <td><?= $item->nome ?></td>
                            <td style="margin-left: 40px;"><?= $item->tamanho ?></td>
                            <td><?= $item->quantidade ?></td>
                            <td>R$ <span><?= $item->preco ?></span></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-danger" onclick="removerItem('<?= $item->cod ?>', this)"><i class="fas fa-trash"></i>
                                </button>
                                </div>
                            </td>
                        </tr>
                    <?php 
                    $total += $item->preco ;
                    endforeach; ?>
                </tbody>
                <tbody id="somaItensCarrinho">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>TOTAL</b></td>
                        <td><b>R$ <span id="totalProdutos"><?= $total ?></span></b></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <?php endif; ?>
            <a href="finalizarCompra.php" class="btn btn-success">Finalizar Pedido</a>
        </div>
    </div>

    <script>

        function removerItem(cod){

            const apagarItem = confirm(`Deseja remover o item ${Number(cod) + 1} do carrinho?`);

            if(apagarItem){

            const carrinho = getCookie('carrinho');

                if(carrinho){

                    const carrinhoItens = JSON.parse(carrinho); 

                    const novoCarrinho = carrinhoItens.filter(function (item, key){

                        return key !== Number(cod);
                    });

                    
                    setCookie("carrinho", JSON.stringify(novoCarrinho), 30);

                    //Retirar linha da tabela contendo o registro

                    const linhasTabela = $("#tableItens>tbody#itensCarrinho>tr");

                    /* console.log(linhasTabela); */

                    const linhaDelete = linhasTabela.filter((key, itens) => {

                        const input = itens.cells[0].querySelector('input');

                        if(input.value != cod)
                            return false;

                        var total = $("#totalProdutos").text();

                        console.log(total, itens.cells[4].querySelector('span').textContent, Number(total) - Number(itens.cells[4].querySelector('span').textContent));

                        $("#totalProdutos").text(Number(total) - Number(itens.cells[4].querySelector('span').textContent));

                        return true;

                    });

                    linhaDelete.remove();

                    //Atualizar número de itens no ícone do carrinho

                    const notifyCarrinho = document.getElementById("notifyCarrinho");

                    //console.log(getCookie("carrinho"));

                    const numItensCarrinho = notifyCarrinho.textContent ? Number(notifyCarrinho.textContent) : 0;

                    //console.log(numItensCarrinho);

                    if((numItensCarrinho - 1) > 0){
                        notifyCarrinho.style.opacity = 1;
                        notifyCarrinho.textContent = numItensCarrinho - 1;
                    }else{
                        notifyCarrinho.style.opacity = 0;
                        notifyCarrinho.textContent = "";
                    }

                }
                
            }

        }

    </script>

 <?php require_once("includes/loja/footer_loja.php"); ?>