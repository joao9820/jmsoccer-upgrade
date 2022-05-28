<?php require_once("includes/admin/header_admin.php"); 
if(!isset($_SESSION['usuario_logado']) || !$_SESSION['usuario_logado']['is_admin']) header("Location:adm.php");
require_once("bancojmsoccer.php") ?>
  
  <style>

    table tbody tr td {
      vertical-align: middle !important;
    }

  </style>

	 <?php

      $isAdmin = $_SESSION['usuario_logado']['is_admin'];

	    $pedidos = listarPedidos(true); 

      ?>

  <div class="container">
        <div class="row">
          <div class="d-flex w-100 align-items-center py-3">
              <a href="loja.php" class="btn btn-outline-secondary rounded-circle p-2">
                <i class="fas fa-arrow-left" style="width: 1em;"></i>
              </a>
              <h1 class='ml-4 mb-0'>Gerenciar Pedidos</h1>
          </div>
          <?php if($pedidos && $pedidos->num_rows) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th>Cód. Rastreamento</th>
                        <th>Cliente</th>
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
                          <th scope="row"><?= $pedido['codigo_rastreamento'] ?></th>
                          <th scope="row"><?= $pedido['cliente_nome'] ?></th>
                          <td><span class="badge badge-pill badge-<?= $pedido['status_cor'] ?>"><?= $pedido['status_nome'] ?></span></td>
                          <td><?= $pedido['qtd_produtos'] ?></td>
                          <td><?= 'R$ ' . $pedido['total_pedido'] ?></td>
                          <td><?= date('d/m/Y à\s H:i:s', strtotime($pedido['created_at'])) ?></td>
                          <td><?= date('d/m/Y à\s H:i:s', strtotime($pedido['updated_at'])) ?></td>
                          <td>
                          <div class="d-flex align-items-center">                              
                              <button onclick='mostrarItensPedidos(`<?= json_encode($item) ?>`)' type="button" id="verItens" class="btn btn-outline-info"
                                data-toggle="modal" data-target="#listaItens">
                                  <i class="fas fa-eye"></i>
                              </button>
                            <?php if($pedido['status_id'] != 4 && $pedido['status_id'] != 5) : ?>            
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
                  Nenhum pedido foi encontrado
                </p>
            </div>
          <?php endif; ?>
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

          <form method="GET" action="pedidoAtualizar.php" id="formPedido">
            <input id="pedido_id" name="pedido_id" type="hidden">
            <div class="form-group mt-5">
              <label class="form-label">Status do Pedido</label>
              <select name="status_id" id="status_id" class="form-control" onchange="updateStatus()">
                <option value="1">Aguardando Pagamento</option>
                <option value="2">Pagamento Aprovado</option>
                <option value="3">Preparando Entrega</option>
                <option value="4">Pedido Entregue</option>
                <option value="5">Pedido Cancelado</option>
              </select>
            </div>
          </form>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

  <script>

    function updateStatus(){
      document.getElementById('formPedido').submit();
    }

    function mostrarItensPedidos(dados){

      //console.log(dados);

     const itens = JSON.parse(dados);

     const body = document.getElementById('bodyItens');
     const select = document.getElementById('status_id');
     const pedidoId = document.getElementById('pedido_id');
     const infoPedidoId = document.getElementById('infoPedidoId');

     body.innerHTML = "";
     //select.value = "";

     //console.log(itens);

      itens.map((it) => {

        const tr = document.createElement('tr');
        
        /* const tdId = tr.insertCell();
        tdId.textContent = it.id;
 */
        const tdProduto = tr.insertCell();
        tdProduto.textContent = it.nome;

        const tdTam = tr.insertCell();
        tdTam.textContent = it.tamanho;

        const tdQtd = tr.insertCell();
        tdQtd.textContent = it.qtd_total;

        const tdTotal = tr.insertCell();
        tdTotal.textContent = `R$ ${it.preco_total}`;

        body.appendChild(tr);

        //console.log(it);
       
        select.value = it.status_id;
        pedidoId.value = it.pedido_id;
        infoPedidoId.textContent = it.pedido_id

      });

    }

  </script>

<?php require_once("includes/admin/footer_admin.php") ?>