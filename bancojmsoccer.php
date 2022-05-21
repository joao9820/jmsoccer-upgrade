<?php require_once("camiseta.php") ?>
<?php require_once("conecta.php") ?>
<?php require_once("Conexao.php") ?>

<?php

function validaLogin($usuario, $senha, $is_admin)
{


    $conexao = (new Conexao())->getConexao();

    $usuario2 = mysqli_real_escape_string($conexao, $usuario);
    $sql = "select login.id, login.is_admin, login.usuario, clientes.id as cliente_id from login 
    left join clientes ON clientes.login_id = login.id
    where login.usuario='{$usuario2}' and login.senha = MD5('$senha')";

    if ($is_admin) {
        $sql .= " and is_admin = 1";
    }

    $resultado = mysqli_query($conexao, $sql);

    $login = mysqli_fetch_assoc($resultado);

    return $login;
}

function listarCliente($id){

    $conexao = (new Conexao())->getConexao();

    $sql = "SELECT clientes.id, clientes.nome, clientes.cpf, contatos.telefone, contatos.recado, contatos.email,
    endereco.endereco, endereco.cidade, endereco.bairro, endereco.numero, endereco.cep, endereco.uf
    FROM clientes INNER JOIN contatos ON contatos.cliente_id = clientes.id
    INNER JOIN endereco ON endereco.cliente_id = clientes.id WHERE clientes.login_id = '{$id}'";

    $resultado = mysqli_query($conexao, $sql);

    $cliente = mysqli_fetch_assoc($resultado);

    return $cliente;

}

function inserirUsuario(Usuario $usuario, $id = null)
{

    $conexao = (new Conexao())->getConexao();

    mysqli_begin_transaction($conexao);

    try {

        if(!$id){
            
            $sqlLogin = "INSERT INTO login (usuario, senha) VALUES ('{$usuario->usuario}', '{$usuario->senha}')";

            $resultadoLogin = mysqli_query($conexao, $sqlLogin);

            $id = mysqli_insert_id($conexao);
        }

        $sqlCliente = "INSERT INTO clientes(login_id, nome, cpf) VALUES ('{$id}','{$usuario->nome}', '{$usuario->cpf}')";

        $resultadoCliente = mysqli_query($conexao, $sqlCliente);

        $clienteId = mysqli_insert_id($conexao);

        $sqlEndereco = "INSERT INTO endereco(cliente_id, endereco, cidade, bairro, numero, cep, uf) 
           VALUES ('{$clienteId}', '{$usuario->endereco}', '{$usuario->cidade}', '{$usuario->bairro}', '{$usuario->numero}', '{$usuario->cep}', '{$usuario->uf}')";

        $resultadoEndereco = mysqli_query($conexao, $sqlEndereco);

        $sqlContato = "INSERT INTO contatos(cliente_id, telefone, recado, email) VALUES ('{$clienteId}', '{$usuario->telefone}', '{$usuario->recado}',
           '{$usuario->email}')";

        $resultadoContato = mysqli_query($conexao, $sqlContato);

        if (!$resultadoLogin || !$resultadoCliente || !$resultadoEndereco || !$resultadoContato) {
            throw new Exception('Houve um erro durante o processo de cadastro. Registro de usuário cancelado');
        }

        /* var_dump($resultadoLogin, $resultadoCliente, $resultadoEndereco, $resultadoContato);
            die(); */
        mysqli_commit($conexao);

        $msg = $id ? "Usuário atualizado com sucesso, perfil cliente adicionado" : "Usuário cadastrado com sucesso, realize o login para realizar compras";

        $_SESSION['alert'] = [
            "status" => true,
            "title" => "STATUS DO CADASTRO",
            "desc" =>  "Usuário cadastrado com sucesso, realize o login para realizar compras",
            "voltar_link" => 'loja.php',
            "voltar_title" => 'Voltar a Loja'
        ];

        //return true;
    } catch (Exception $exception) {
        mysqli_rollback($conexao);

        $_SESSION['alert'] = [
            "status" => false,
            "title" => "STATUS DO CADASTRO",
            "desc" =>  "Houve um erro ao realizar o cadastro, registro não realizado",
            "voltar_link" => 'cadastroUsuario.php',
            "voltar_title" => 'Voltar a Loja'
        ];

        //return false;
    }

    header('Location:alerta.php');
    exit();


    /* if(mysqli_query($conexao, $sql)){
            header("Location:loja.php");
            }
        else {
            $erro= mysqli_error($conexao);
            echo ' Não Adicionado'; 
            echo $erro; 
            } */
}
function atualizarCliente(Usuario $usuario, $cliente_id)
{

    $conexao = (new Conexao())->getConexao();

    mysqli_begin_transaction($conexao);

    try {

        $sqlCliente = "UPDATE clientes SET nome='{$usuario->nome}', cpf='{$usuario->cpf}' WHERE id = '{$cliente_id}'";

        var_dump($sqlCliente);
        

        $resultadoCliente = mysqli_query($conexao, $sqlCliente);

        $sqlEndereco = "UPDATE endereco SET endereco='{$usuario->endereco}', cidade='{$usuario->cidade}', bairro='{$usuario->bairro}', 
        numero={$usuario->numero}, cep='{$usuario->cep}', uf='{$usuario->uf}' WHERE cliente_id = '{$cliente_id}'";

        $resultadoEndereco = mysqli_query($conexao, $sqlEndereco);

        $sqlContato = "UPDATE contatos SET telefone='{$usuario->telefone}', recado='{$usuario->recado}', email='{$usuario->email}'
        WHERE cliente_id='{$cliente_id}'";

        $resultadoContato = mysqli_query($conexao, $sqlContato);

        if (!$resultadoCliente || !$resultadoEndereco || !$resultadoContato) {
            throw new Exception('Houve um erro durante ao atualizar os dados cadastrais');
        }

        /* var_dump($resultadoLogin, $resultadoCliente, $resultadoEndereco, $resultadoContato);
            die(); */
        mysqli_commit($conexao);

        return true;
    } catch (Exception $exception) {
        mysqli_rollback($conexao);

        return false;
    }

    header('Location:alerta.php');
    exit();


    /* if(mysqli_query($conexao, $sql)){
            header("Location:loja.php");
            }
        else {
            $erro= mysqli_error($conexao);
            echo ' Não Adicionado'; 
            echo $erro; 
            } */
}

function insereCamiseta($camiseta)
{

    $conexao = (new Conexao())->getConexao();

    $query = "insert into produtos (nome, modelo, cor, preco, cat_camiseta_id, img) values 
						('{$camiseta->nome}','{$camiseta->modelo}', '{$camiseta->cor}', '{$camiseta->preco}', '{$camiseta->cat}', '{$camiseta->img}')";

    $resultado = mysqli_query($conexao, $query);

    if($resultado){
        $_SESSION['alert'] = [
            "status" => true,
            "title" => "STATUS DO CADASTRO",
            "desc" =>  "Camisa cadastrada com sucesso",
            "voltar_link" => 'camisetalista.php',
            "voltar_title" => 'Listar Camisas'
        ];
    }else{
        $_SESSION['alert'] = [
            "status" => false,
            "title" => "STATUS DO CADASTRO",
            "desc" =>  "Erro ao cadastrar camisa",
            "voltar_link" => 'cadastraCamisa.php',
            "voltar_title" => 'Cadastrar Camisas'
        ];
    }

    header('Location:alerta.php');
    exit();

    //return $resultado;
}

function alteracamiseta($idcamiseta, $time, $modelo, $cor, $valor, $cat)
{

    $conexao = (new Conexao())->getConexao();

    $sql = "UPDATE produtos SET nome='{$time}', modelo='{$modelo}', cor='{$cor}', preco='{$valor}', cat_camiseta_id = '{$cat}' WHERE id =$idcamiseta";
    $resultado = mysqli_query($conexao, $sql);

    return $resultado;
}

// ----------------------------------------------------------------------------

function listarCarrinho()
{

    $conexao = (new Conexao())->getConexao();

    $camisas = [];

    if (isset($_COOKIE['carrinho'])) {

        $carrinho = json_decode($_COOKIE['carrinho']);

        foreach ($carrinho as $key => $item) {

            $sql = "SELECT nome, preco FROM produtos WHERE id = '{$item->id}'";
            $resultado = mysqli_query($conexao, $sql);

            $registro = mysqli_fetch_assoc($resultado);

            //O código é achave do array contido no cookie carrinho
            $item->cod = $key;
            $item->nome = $registro['nome'];
            $item->valorUnit = $registro['preco'];
            $item->preco =  $registro['preco'] * $item->quantidade;

            $camisas[] = $item;
        }
    }

    return $camisas;

}

function listarProdutos($cat)
{

    $conexao = (new Conexao())->getConexao();

    $query = "SELECT produtos.id, produtos.nome, produtos.img, produtos.modelo, produtos.preco, cat_camisetas.nome as cat_nome 
    FROM produtos INNER JOIN cat_camisetas ON produtos.cat_camiseta_id = cat_camisetas.id";

    if ($cat) {
        $query .= " WHERE cat_camisetas.id = $cat";
    }

    $resultado = mysqli_query($conexao, $query);
    return $resultado;
}


function removecamiseta($idcamiseta)
{

    $conexao = (new Conexao())->getConexao();

    $query = "delete from produtos where id = '$idcamiseta'";
    $resultado = mysqli_query($conexao, $query);
    return $resultado;
}

//-----------------------------------------------------------------------------------------


function listacamiseta()
{

    $conexao = (new Conexao())->getConexao();

    $sql = "select produtos.id, produtos.nome, produtos.modelo, produtos.cor, produtos.preco, cat_camisetas.nome as categoria_nome FROM produtos 
    left join cat_camisetas ON cat_camisetas.id = produtos.cat_camiseta_id ORDER BY produtos.id DESC";


    $resultado = mysqli_query($conexao, $sql);

    return $resultado;
    
}

function localizarcamiseta($conexao)
{

    echo "<center><h1> Dados</h1></center>";
}


function realizarPedido($clienteId, Usuario $usuario = null){

    $conexao = (new Conexao())->getConexao();

    mysqli_begin_transaction($conexao);

    try {

        if($usuario && !atualizarCliente($usuario, $clienteId));

        $sqlPedido = "INSERT INTO pedidos (cliente_id) VALUES ('$clienteId')";

        $resultadoPedido = mysqli_query($conexao, $sqlPedido);

        $pedidoId = mysqli_insert_id($conexao);

        $carrinho = listarCarrinho();

        if(!$carrinho){
            throw new Exception('Não foi possível realizar o pedido, os produtos não foram encontrados');
        }

        $sqlPedidoProdutos = "INSERT INTO pedido_produtos(pedido_id, produto_id, tamanho, quantidade) VALUES ";

        foreach($carrinho as $key => $prod){

            if($key > 0)
                $sqlPedidoProdutos .= ", ";

            $sqlPedidoProdutos .= "('{$pedidoId}', '{$prod->id}', '{$prod->tamanho}' ,'{$prod->quantidade}')";

        }
        
        $resultadoPedidoProdutos = mysqli_query($conexao, $sqlPedidoProdutos);

        if(!$resultadoPedido || !$resultadoPedidoProdutos){
            throw new Exception('Não foi possível realizar o pedido');
        }
        
        mysqli_commit($conexao);

        unset($_COOKIE['carrinho']);
        setcookie('carrinho', null, -1, '/');

        $_SESSION['alert'] = [
            "status" => true,
            "title" => "STATUS DO PEDIDO",
            "desc" =>  "Pedido realizado com sucesso, acompanhe a situação na página de pedidos",
            "voltar_link" => 'pedidos.php', //colocar a pág. de pedidos
            "voltar_title" => 'Meus Pedidos'
        ];

    } catch (\Exception $e) {

        mysqli_rollback($conexao);

        $_SESSION['alert'] = [
            "status" => false,
            "title" => "STATUS DO PEDIDO",
            "desc" =>  "Houve um erro ao realizar o pedido, tente novamente",
            "voltar_link" => 'loja.php', //colocar a pág. de pedidos
            "voltar_title" => 'Voltar a Loja'
        ];
        
    }

    header('Location:alerta.php');
    exit();

}

 function listarPedidos($clienteId){

    $conexao = (new Conexao())->getConexao();

    $sql = "SELECT pedidos.id, pedidos.status_id, pedidos.created_at, pedidos.updated_at, status.nome as status_nome, 
    status.cor_bs as status_cor, COUNT(*) AS qtd_produtos, SUM(produtos.preco * pedido_produtos.quantidade) as total_pedido
    FROM pedidos LEFT JOIN clientes ON clientes.id = pedidos.cliente_id 
    LEFT JOIN status ON status.id = pedidos.status_id 
    LEFT JOIN pedido_produtos ON pedido_produtos.pedido_id = pedidos.id 
    LEFT JOIN produtos ON produtos.id = pedido_produtos.produto_id
    WHERE clientes.id = '{$clienteId}' 
    GROUP BY pedidos.id ORDER BY pedidos.created_at DESC";

    $resultado = mysqli_query($conexao, $sql);

    return $resultado;

    /* $dados = [];

    if($resultado)
        $dados =  mysqli_fetch_assoc($resultado);

    return $dados; */

}

?>