<?php require_once("includes/loja/header_loja.php"); ?>

    <h4 class="text-center">Resumo do Pedido</h4>
    <br>
    <div class="container">
        <div class="row">
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
                    <tr>
                        <th scope="row">1</th>
                        <td>Camisa Liverpool</td>
                        <td style="margin-left: 40px;">G</td>
                        <td>1</td>
                        <td>R$229,99</td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>Camisa Brasil</td>
                        <td style="margin-left: 40px;">M</td>
                        <td>1</td>
                        <td>R$329,99</td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>Camisa Liverpool</td>
                        <td style="margin-left: 40px;">GG</td>
                        <td>1</td>
                        <td>R$229,99</td>
                    </tr>

                    <tr>
                        <th scope="row">4</th>
                        <td>Camisa França</td>
                        <td style="margin-left: 40px;">P</td>
                        <td>1</td>
                        <td>R$118,99</td>
                    </tr>
                </tbody>
            </table>
            <a href="finalizarCompra.php" class="btn btn-success">Finalizar Pedido</a>
        </div>
    </div>

 <?php require_once("includes/loja/footer_loja.php"); ?>