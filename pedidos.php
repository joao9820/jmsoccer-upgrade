<?php require_once("includes/loja/header_loja.php"); 
require_once("bancojmsoccer.php") ?>
  
  <style>

    table tbody tr td {
      vertical-align: middle !important;
    }

  </style>

	 <?php
	    $pedidos = listarPedidos($_SESSION['usuario_logado']['cliente_id']);
	 ?>

  <div class="container">
        <div class="row">
          <div class="d-flex w-100 align-items-center py-3">
              <a href="loja.php" class="btn btn-outline-secondary rounded-circle p-2">
                <i class="fas fa-arrow-left" style="width: 1em;"></i>
              </a>
              <h1 class='ml-4 mb-0'>Pedidos</h1>
          </div>
          <?php if($pedidos && $pedidos->num_rows) : ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Qtd. Produtos</th>
                        <th scope="col">Criado em</th>
                        <th scope="col">Atualizado em</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  while($pedido = mysqli_fetch_assoc($pedidos)) : ?>
                      <tr>
                          <th scope="row"><?= $pedido['id'] ?></th>
                          <td><span class="badge badge-pill badge-<?= $pedido['status_cor'] ?>"><?= $pedido['status_nome'] ?></span></td>
                          <td><?= $pedido['qtd_produtos'] ?></td>
                          <td><?= date('d/m/Y à\s H:i:s', strtotime($pedido['created_at'])) ?></td>
                          <td><?= date('d/m/Y à\s H:i:s', strtotime($pedido['updated_at'])) ?></td>
                          <td>
                            <div class="d-flex justify-content-center">
                              <a href="removecamiseta.php?id=<?= $pedido['id'] ?>" role="button" id="alterarpedido" class="btn btn-outline-danger ml-2">
                                <i class="fas fa-times"></i>
                              </a>
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