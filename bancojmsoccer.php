<?php require_once("camiseta.php") ?>
<?php require_once("conecta.php") ?>
<?php require_once("Conexao.php") ?>

<?php


function validaLogin($usuario, $senha, $is_admin)
{


    $conexao = (new Conexao())->getConexao();

    $usuario2 = mysqli_real_escape_string($conexao, $usuario);
    $sql = "select id, is_admin, usuario from login where usuario='{$usuario2}' and senha = MD5('$senha')";

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


    while ($array = mysqli_fetch_assoc($resultado)) {
?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <center>
            <form action=alteraForm.php method=GET>
                <table>
                    <tr>

                        <td><input type="hidden" value="<?php echo $array['id']; ?>" name="idcamiseta"> </td>
                    </tr>
                    <tr>
                        <td>Time </td>
                        <td> <input type="text" value="<?php echo $array['nome']; ?>" name="time"> </td>
                    </tr>
                    <tr>
                        <td>Modelo</td>
                        <td> <input type="text" value="<?php echo $array['modelo']; ?>" name="modelo"> </td>
                    </tr>
                    <tr>
                        <td>Cor </td>
                        <td> <input type="text" value="<?php echo $array['cor']; ?>" name="cor"> </td>
                    </tr>
                    <tr>
                        <td>Valor</td>
                        <td> <input type="text" value="<?php echo $array['preco']; ?>" name="valor"> </td>
                    </tr>
                    <!-- <tr>
                        <td>Prazo </td>
                        <td> <input type="text" value="<?php echo $array['prazo']; ?>" name="prazo"> </td>
                    </tr> -->
                    <tr>
                        <td colspan="2"><input type="submit" value="Alterar" class="btn btn-warning"></td>

                    </tr>
            </form>
            <form action="removecamiseta.php" method="post">

                <table>
                    <tr>
                        <td><input type=hidden value=<?php echo $array['id']; ?> name=idcamiseta>
                        <td> <button type="hidden" class="btn btn-dark">Remover</button></td>
                    </tr>
                </table>

            </form>
        </center>
<?php
    }

    //-----------------------------------------------------------------------------------------


    function localizarcamiseta($conexao)
    {

        echo "<center><h1> Dados</h1></center>";
    }
}
?>