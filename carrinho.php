<?php require_once("includes/loja/header_loja.php"); 
 require_once("bancojmsoccer.php"); ?>
<?php $camisas = listarCarrinho();
ob_start(); 

$isClient = false;

if(isset($_SESSION['usuario_logado']['id'])){
    $clienteDados = listarCliente($_SESSION['usuario_logado']['id']);

    if($clienteDados){
        $isClient = true;
    }
}
?>
<style>
    .valor-total-item {
        /* background-color: #17a2b863; */
        font-weight: bold;
        border-left: 1px solid #DEE2E6;
        border-right: 1px solid #dee2e6;
        font-weight: bold;
        ;
    }

    #somaItensCarrinho {
        border-top: unset;
    }

    #somaItensCarrinho tr td {
        font-weight: bolder !important;
    }

    #somaItensCarrinho tr {
        background: #99dd994f;
    }

    #finalizarCompra {
        display: none;
    }

    #finalizarCompra form {
        border: 1px solid #ced4da;
        padding: 2rem;
        border-radius: 7px;
    }
    

</style>

<div class="container pb-3">
    <div class="row" id="finalizarCompra">
        <?php if(isset($clienteDados) && $clienteDados) : ?>
            <h4 class="w-100 text-center my-3">Finalizar Compra</h4>
            <form class="col" action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome do Titular</label>
                        <input type="text" name="nome" value="<?= $clienteDados['nome'] ?>" class="form-control" id="inputEmail4" placeholder="Nome do titular">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCPF">CPF</label>
                        <input type="text" name="cpf" id="inputCPF" value="<?= $clienteDados['cpf'] ?>" class="form-control" id="inputCPF" placeholder="CPF">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCEP">CEP</label>
                        <input type="text" name="cep" value="<?= $clienteDados['cep'] ?>" class="form-control" id="inputCEP">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCEP">UF</label>
                        <input type="text" name="uf" value="<?= $clienteDados['uf'] ?>" class="form-control" id="inputUF" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputCity">Cidade</label>
                        <input type="text" name="cidade" value="<?= $clienteDados['cidade'] ?>" class="form-control" id="inputCity" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="inputAddress">Endereço de cobrança</label>
                        <input type="text" name="endereco" value="<?= $clienteDados['endereco'] ?>" class="form-control" id="inputAddress" placeholder="Endereço" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputNumero">Número</label>
                        <input type="text" name="numero" value="<?= $clienteDados['numero'] ?>" class="form-control" id="inputNumero" placeholder="Número">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputBairro">Bairro</label>
                        <input type="text" name="bairro" value="<?= $clienteDados['bairro'] ?>" class="form-control" id="inputBairro" placeholder="Bairro">
                    </div>
                </div>
                <!-- <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Número do Cartão</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputPassword4">Bandeira</label>
                        <select id="inputEstado" class="form-control">
                            <option selected>Escolher...</option>
                            <option>Visa</option>
                            <option>MasterCard</option>
                            <option>Elo</option>
                            <option>Alelo</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCEP">Validade (XX/XX)</label>
                        <input type="text" class="form-control" id="inputCEP">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCEP">CVV</label>
                        <input type="text" class="form-control" id="inputCEP">
                    </div>
                </div> -->
                <div class="form-row mb-4">
                    <div class="form-group col-6">
                            <label for="inputEmail">E-mail</label>
                            <input type="email" name="email" id="inputEmail" value="<?= $clienteDados['email'] ?>" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group col-3">
                        <label for="inputAddress">Telefone</label>
                        <input type="text" name="telefone" value="<?= $clienteDados['telefone'] ?>" class="form-control" id="inputAddress" placeholder="(51) 95266-3320">
                    </div>
                    <div class="form-group col-3">
                        <label for="inputAddress">Recado</label>
                        <input type="text" name="recado" value="<?= $clienteDados['recado'] ?>" class="form-control" id="inputAddress" placeholder="(51) 5261-0021">
                    </div>
                </div>
                <div class="form-group form-check col-4">
                    <input class="form-check-input" type="checkbox" name="atualizar_dados" id="atualizar_dados">
                    <label class="form-check-label" for="atualizar_dados">Precisei atualizar os dados acima</label>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <button type="reset" class="btn btn-outline-danger mr-2">Limpar</button>
                    <button type="submit" name="processar" class="btn btn-success">Processar Pagamento</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
    
   
        <div class="d-flex w-100 align-items-center py-3">
            <a href="loja.php" class="btn btn-outline-secondary rounded-circle p-2">
            <i class="fas fa-arrow-left" style="width: 1em;"></i>
            </a>
            <h1 class='ml-4 mb-0'>Carrinho</h1>
        </div>
          <div class="row">
        <?php if (count($camisas)) : ?>
            <table class="table table-striped" id="tableItens">
                <thead>
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Valor Unit.</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col" class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody id="itensCarrinho">
                    <?php
                    $total = 0;
                    $qtdTotal = 0;
                    foreach ($camisas as $item) : 
                        /* var_dump($item); */
                    ?>
                        <tr>
                            <th scope="row">
                                <input type="hidden" value="<?= $item->cod ?>" />
                                <?= $item->cod + 1 ?>
                            </th>
                            <td><?= $item->nome ?></td>
                            <td style="margin-left: 40px;"><?= $item->tamanho ?></td>
                            <td style="margin-left: 40px;">R$ <span><?= $item->valorUnit ?></span></td>
                            <td><?= $item->quantidade ?></td>
                            <td class="valor-total-item">R$ <span><?= $item->preco ?></span></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-danger" onclick="removerItem('<?= $item->cod ?>', this)"><i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $total += $item->preco;
                        $qtdTotal += $item->quantidade;
                    endforeach; ?>
                </tbody>
                <tbody id="somaItensCarrinho">
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TOTAL</td>
                        <td id="totalQtdProdutos"><?= $qtdTotal ?></td>
                        <td class="valor-total-item"><b>R$ <span id="totalProdutos"><?= $total ?></span></b></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-success" id ="btnFinalizarCompra">Finalizar Pedido</button>
        <?php else : ?>
            <div class="alert alert-info w-100">
                <p class="mb-0">Não há nenhum item no carrinho no momento, volte para a sessão de
                    <a href="loja.php" class="btn btn-info">Produtos</a>
                    e adicione itens no carrinho para visualizá-los aqui
                </p>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php 

        if(isset($_POST['processar'])){

            unset($_POST['processar']);

            require_once "Usuario.php";

            $usuario = null;

            if(isset($_POST['atualizar_dados'])){

                unset($_POST['atualizar_dados']);
                
                $usuario = new Usuario();
            
                foreach($_POST as $key => $info){
            
            
                    $usuario->{$key} = $info;
            
                }

            }

            realizarPedido($_SESSION['usuario_logado']['cliente_id'], $usuario);

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

    const btnFinalizarCompra = document.getElementById("btnFinalizarCompra");

    btnFinalizarCompra.addEventListener("click", function() {

        const usuarioLogado = '<?= isset($_SESSION['usuario_logado']) ?>';
        const isClient = '<?= $isClient ?>';

            if(!Boolean(usuarioLogado) || !Boolean(isClient)){

                alert("Para finalizar a compra é necessário estar logado e possuir o perfil cliente, se não possuir login, cadastre-se");

                const loginInput = document.getElementById('login');

                loginInput.focus();

                return;
            }

        $("#finalizarCompra").show();
        $(this).addClass("disabled");
    });

    function removerItem(cod) {

        const apagarItem = confirm(`Deseja remover o item ${Number(cod) + 1} do carrinho?`);

        if (apagarItem) {

            const carrinho = getCookie('carrinho');

            if (carrinho) {

                const carrinhoItens = JSON.parse(carrinho);

                const novoCarrinho = carrinhoItens.filter(function(item, key) {

                    return key !== Number(cod);
                });


                setCookie("carrinho", JSON.stringify(novoCarrinho), 30);

                //Retirar linha da tabela contendo o registro

                const linhasTabela = $("#tableItens>tbody#itensCarrinho>tr");

                /* console.log(linhasTabela); */

                const linhaDelete = linhasTabela.filter((key, itens) => {

                    const input = itens.cells[0].querySelector('input');

                    if (input.value != cod)
                        return false;

                    var total = $("#totalProdutos").text();
                    var totalQtd = $("#totalQtdProdutos").text();

                    const qtdTotal = Number(totalQtd) - Number(itens.cells[4].textContent);
                    const somaTotal = Number(total) - Number(itens.cells[5].querySelector('span').textContent);

                    $("#totalProdutos").text(somaTotal.toFixed(2));
                    $("#totalQtdProdutos").text(qtdTotal);

                    return true;

                });

                linhaDelete.remove();

                //Atualizar número de itens no ícone do carrinho

                const notifyCarrinho = document.getElementById("notifyCarrinho");

                //console.log(getCookie("carrinho"));

                const numItensCarrinho = notifyCarrinho.textContent ? Number(notifyCarrinho.textContent) : 0;

                //console.log(numItensCarrinho);

                if ((numItensCarrinho - 1) > 0) {
                    notifyCarrinho.style.opacity = 1;
                    notifyCarrinho.textContent = numItensCarrinho - 1;
                } else {
                    notifyCarrinho.style.opacity = 0;
                    notifyCarrinho.textContent = "";
                }

            }

        }

    }
</script>

<?php require_once("includes/loja/footer_loja.php"); ?>