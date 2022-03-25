<?php require_once("camiseta.php") ?>
<?php require_once("conecta.php") ?>
<?php require_once("Conexao.php") ?>

<?php


function validaLogin ($usuario, $senha) {


    $conexao = (new Conexao())->getConexao();

    $usuario2 = mysqli_real_escape_string($conexao, $usuario);
    $sql = "select * from login where usuario='{$usuario2}' and senha = MD5('$senha')";

    $resultado = mysqli_query($conexao, $sql);

    $login = mysqli_fetch_assoc($resultado);
    
    return $login;
}

function insereCamiseta($camiseta) {

    $conexao = (new Conexao())->getConexao();

    $query = "insert into produtos (nome, modelo, cor, preco, cat_camiseta_id) values 
						('{$camiseta->nome}','{$camiseta->modelo}', '{$camiseta->cor}', '{$camiseta->preco}', '{$camiseta->cat}')";

    $resultado = mysqli_query($conexao, $query);
    return $resultado;
}

function alteracamiseta($idcamiseta, $time, $modelo, $cor, $valor, $cat) {

    $conexao = (new Conexao())->getConexao();

    $sql = "UPDATE produtos SET nome='{$time}', modelo='{$modelo}', cor='{$cor}', preco='{$valor}', cat_camiseta_id = '{$cat}' WHERE id =$idcamiseta";
    $resultado = mysqli_query($conexao, $sql);

    return $resultado;
}

// ----------------------------------------------------------------------------

function listarCarrinho(){

    $conexao = (new Conexao())->getConexao();

    $camisas = [];

    if(isset($_COOKIE['carrinho'])){
       
        $carrinho = json_decode($_COOKIE['carrinho']);

        foreach($carrinho as $key => $item){

            $sql = "SELECT nome, preco FROM produtos WHERE id = '{$item->id}'";
            $resultado = mysqli_query($conexao, $sql);

            $registro = mysqli_fetch_assoc($resultado);

            //O código é achave do array contido no cookie carrinho
            $item->cod = $key;
            $item->nome = $registro['nome'];
            $item->preco =  $registro['preco'] * $item->quantidade;

            $camisas[] = $item;

        }

    }

    return $camisas;

}

function listarProdutos($cat){

    $conexao = (new Conexao())->getConexao();

    $query = "SELECT produtos.id, produtos.nome, produtos.img, produtos.modelo, produtos.preco, cat_camisetas.nome as cat_nome 
    FROM produtos INNER JOIN cat_camisetas ON produtos.cat_camiseta_id = cat_camisetas.id";

    if($cat){
        $query .= " WHERE cat_camisetas.id = $cat";
    }

    $resultado = mysqli_query($conexao, $query);
    return $resultado;

}


function removecamiseta($idcamiseta) {

    $conexao = (new Conexao())->getConexao();

    $query = "delete from produtos where id = '$idcamiseta'";
    $resultado = mysqli_query($conexao, $query);
    return $resultado;

}

//-----------------------------------------------------------------------------------------


function listacamiseta() {

    $conexao = (new Conexao())->getConexao();

    echo "<center><h1 class='p-3'>Camisas</h1></center>";
    $sql = "select produtos.id, produtos.nome, produtos.modelo, produtos.cor, produtos.preco, cat_camisetas.nome as categoria_nome FROM produtos 
    left join cat_camisetas ON cat_camisetas.id = produtos.cat_camiseta_id";

    
    $resultado = mysqli_query($conexao, $sql);

    return $resultado;


    while ($array = mysqli_fetch_assoc($resultado)) {
        ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <center>
            <form action =alteraForm.php  method=GET>
                <table >
                    <tr>

                        <td><input type="hidden" value="<?php echo $array['id']; ?>" name="idcamiseta"> </td> 
                    </tr>
                    <tr>
                        <td>Time </td>
                        <td> <input type="text" value="<?php echo $array['nome']; ?>" name="time"> </td>
                    </tr>
                    <tr>
                        <td>Modelo</td>
                        <td> <input type="text" value="<?php echo $array['modelo']; ?>"  name="modelo"> </td>
                    </tr>
                    <tr>
                        <td>Cor </td>
                        <td> <input type="text" value="<?php echo $array['cor']; ?>" name="cor"> </td>
                    </tr>
                    <tr>
                        <td>Valor</td>
                        <td> <input type="text" value="<?php echo $array['preco']; ?>"  name="valor"> </td>
                    </tr>
                    <!-- <tr>
                        <td>Prazo </td>
                        <td> <input type="text" value="<?php echo $array['prazo']; ?>" name="prazo"> </td>
                    </tr> -->
                    <tr> 
                        <td colspan ="2"><input type="submit" value="Alterar" class="btn btn-warning"></td>
						
                    </tr>
            </form>
            <form action="removecamiseta.php" method="post">

                <table >	
                    <tr>
                        <td><input type=hidden value= <?php echo $array['id']; ?> name=idcamiseta>
                        <td>  <button type="hidden" class="btn btn-dark">Remover</button></td>
                    </tr>
                </table >

            </form> 
        </center>
    <?php
    }

//-----------------------------------------------------------------------------------------


    function localizarcamiseta($conexao) {

        echo "<center><h1> Dados</h1></center>";
    }

}
?>