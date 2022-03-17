<?php
	print_r($_POST['acao']);
	include_once "contato.php";
	
	if(isset($_GET['jmcsoccer@gmail.com']) == 1){
		
		echo "Enviar email para jmcsoccer@gmail.com. <br>";
	}
?>