
  <?php require_once("conecta.php") ?>
  <?php require_once("bancojmsoccer.php") ?>

<?php 
  $idcamiseta = $_POST['idcamiseta'];
  
  listaLivros2($conexao,$id);

  header("Location:livro-lista.php?removido=true"); 

?>