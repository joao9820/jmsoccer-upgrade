<?php require_once("includes/loja/header_loja.php"); 
if(!isset($_SESSION['usuario_logado'])) header("Location:loja.php");
require_once("bancojmsoccer.php") ?>
  
  <style>

    table tbody tr td {
      vertical-align: middle !important;
    }

  </style>

	 <?php
	    $pedidos = listarPedidos(false, $_SESSION['usuario_logado']['cliente_id']);
	 ?>

  <div class="container">
        <div class="row">
          <div class="d-flex w-100 align-items-center py-3">
              <a href="loja.php" class="btn btn-outline-secondary rounded-circle p-2">
                <i class="fas fa-arrow-left" style="width: 1em;"></i>
              </a>
              <h1 class='ml-4 mb-0'>Meus Pedidos</h1>
          </div>
          <?php if($pedidos && $pedidos->num_rows) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cód. Rastreamento</th>
                        <th scope="col">Status</th>
                        <th scope="col">Qtd. Produtos</th>
                        <th scope="col">Valor Total</th>
                        <th scope="col">Criado em</th>
                        <th scope="col">Atualizado em</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  while($pedido = mysqli_fetch_assoc($pedidos)) : 
                  
                    $itens = verItensPedidos($pedido['id']);

                    $item = [];

                    if($itens->num_rows){

                      while($it = mysqli_fetch_assoc($itens)){

                        $item[] = $it;

                      }

                    }
                  
                  ?>
                      <tr>
                          <th scope="row"><?= $pedido['id'] ?></th>
                          <th scope="row"><?= $pedido['codigo_rastreamento'] ? $pedido['codigo_rastreamento'] : '--' ?></th>
                          <td><span class="badge badge-pill badge-<?= $pedido['status_cor'] ?>"><?= $pedido['status_nome'] ?></span></td>
                          <td><?= $pedido['qtd_produtos'] ?></td>
                          <td><?= 'R$ ' . $pedido['total_pedido'] ?></td>
                          <td><?= date('d/m/Y à\s H:i:s', strtotime($pedido['created_at'])) ?></td>
                          <td><?= date('d/m/Y à\s H:i:s', strtotime($pedido['updated_at'])) ?></td>
                          <td>
                            <div class="d-flex align-items-center">

                            <?php if($pedido['status_id'] == 1) : ?>
                              
                              <button type="button" class="btn btn-success mr-2"
                                    data-toggle="modal" data-target="#pagarPedido">
                                      <i class="fas fa-dollar-sign"></i>
                              </button>
                            <?php endif; ?>
                              <button onclick='mostrarItensPedidos(`<?= json_encode($item) ?>`)' type="button" id="verItens" class="btn btn-outline-info"
                                data-toggle="modal" data-target="#listaItens">
                                  <i class="fas fa-eye"></i>
                              </button>
                                <?php if($pedido['status_id'] == 1) : ?>
                                  
                                  <a href="pedidoAtualizar.php?pedido_id=<?= $pedido['id'] ?>&status_id=5" role="button" id="alterarpedido" class="btn btn-outline-danger ml-2">
                                    <i class="fas fa-times"></i>
                                  </a>
                                  
                                <?php endif; ?>
                            </div>
                          </td>
                      </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
          <?php else: ?>
            <div class="alert alert-info w-100">
                <p class="mb-0">
                  Nenhum pedido foi encontrado, adicione itens no carrinho para realizar um pedido
                </p>
            </div>
          <?php endif; ?>
        </div>
    </div>
  </div>

  <div class="modal fade" tabindex="-1" id="pagarPedido" aria-labelledby="PagarPedidoModal" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title">Itens Pedido Nº <span id="infoPedidoId"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
          <div class="d-flex justify-content-center">
            <img src="Imagens/qr_code_picpay.jpeg" style="width: 100%">
          </div>
          <div class="mt-3">
            <p>Para outras opções de pagamento acesse o link: <a href="https://nubank.com.br/pagar/vl46/Z1WAiXbNuW" target="_blank">https://nubank.com.br/pagar/vl46/Z1WAiXbNuW</a></p>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="listaItens" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Itens Pedido Nº <span id="infoPedidoId"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <!-- <th>ID</th> -->
                <th>Produto</th>
                <th>Tamanho</th>
                <th>Quantidade</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody id="bodyItens">
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script>

  function mostrarItensPedidos(dados){

    const itens = JSON.parse(dados);

    const body = document.getElementById('bodyItens');
    const infoPedidoId = document.getElementById('infoPedidoId');

    body.innerHTML = "";

    itens.map((it) => {

      const tr = document.createElement('tr');
 
      const tdProduto = tr.insertCell();
      tdProduto.textContent = it.nome;

      const tdTam = tr.insertCell();
      tdTam.textContent = it.tamanho;

      const tdQtd = tr.insertCell();
      tdQtd.textContent = it.qtd_total;

      const tdTotal = tr.insertCell();
      tdTotal.textContent = `R$ ${it.preco_total}`;

      body.appendChild(tr);
    
      infoPedidoId.textContent = it.pedido_id

    });

  }

</script>

<?php require_once("includes/loja/footer_loja.php") ?>