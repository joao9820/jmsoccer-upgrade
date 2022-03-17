<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Visual Loja</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">JMSOCCER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="loja.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrinho.php">Carrinho</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Histórico</a>
                    </li>
                    <li class="nav-item ml-2 text-end">
                        <a class="nav-link" href="index.php" style="color: red;">Sair</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br>
    <h4 class="text-center">Finalizar Compra</h4>
    <br>
    <div class="container">
        <div class="row">
            <form class="col">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Nome do Titular</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Nome do titular">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Bandeira</label>
                        <select id="inputEstado" class="form-control">
                            <option selected>Escolher...</option>
                            <option>Visa</option>
                            <option>MasterCard</option>
                            <option>Elo</option>
                            <option>Alelo</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Endereço de cobrança</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Endereço">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCEP">CEP</label>
                        <input type="text" class="form-control" id="inputCEP">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCEP">UF</label>
                        <input type="text" class="form-control" id="inputCEP">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputCity">Número do Cartão</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCEP">Validade (XX/XX)</label>
                        <input type="text" class="form-control" id="inputCEP">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCEP">CVV</label>
                        <input type="text" class="form-control" id="inputCEP">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <label for="inputAddress">CPF</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="CPF">
                    </div>
                    <div class="form-group col-4">
                        <label for="inputAddress">Telefone</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="(51) 95266-3320">
                    </div>
                    <div class="form-group col-4">
                        <label for="inputAddress">Recado</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="(51) 5261-0021">
                    </div>
                </div>
                <br>
            </form>
            
            

            <table class="table table-striped">
                <br>
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

                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td style="margin-left: 40px;"></td>
                        <td>VALOR TOTAL:</td>
                        <th scope="row">R$908,96</th>
                    </tr>
                </tbody>


            </table>
        </div>
        <a href="compraRealizada.php" class="btn btn-success" style="margin-left:470px">Processar Pagamento</a>
    </div>

    


</body>

</html>