
 
    <?php require_once("conecta.php") ?>
    <?php require_once("bancojmsoccer.php") ?>
    <?php require_once("camiseta.php") ?>



	 <?php
	    $camiseta= listacamiseta2($conexao);  	   
	 ?>

 <div class="topo"> 
				<nav class="navbar navbar-expand-lg navbar-light bg-light padding-top "> 
 <a class="btn btn-dark" href="cadastracamisa.php">Cadastrar camisa</a><span class="sr-only">(current)</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

<div class="topo"> 
				<nav class="navbar navbar-expand-lg navbar-light bg-light padding-top "> 
 <a class="btn btn-dark" href="index.php">Inicio</a><span class="sr-only">(current)</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
