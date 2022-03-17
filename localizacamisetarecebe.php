<?php require_once ("conecta.php") ?>
<?php require_once ("bancojmsoccer.php") ?>
<?php require_once ("camiseta.php") ?>

<?php

$a = $_GET['a']; //url 
$time = $_POST['time'];

if ($a == "buscar") { /* Para retornar um parâmetro indicado na mesma página do form, 
  copiar a formatação dessa com os includes e colar logo abaixo lá, enviando o form para localizar-livro.php */

    $time = trim($time); //função trim retira espaço antes e depois da palavra / metodo

    $sql = "SELECT * from camiseta WHERE time LIKE '%" . $time . "%' ORDER BY idcamiseta ";

    $resultado = mysqli_query($conexao, $sql);
    $numRegistros = mysqli_num_rows($resultado); //verifica a quantidade de linhas da tabela e armazena 

    if ($numRegistros != 0) {
        while ($exibe = mysqli_fetch_object($resultado)) { //Percorre o array
            echo $exibe->time . "<br/> - " . $exibe->modelo . "<br/> - " . $exibe->cor . "<br/> - " . $exibe->valor . "<br/> - " . $exibe->prazo; //campo da tabela	
        }
    }
} else {

    echo "Nenhuma camiseta do: " . $time;
}
?>