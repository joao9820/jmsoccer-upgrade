<?php 

	Class Conexao {


		function getConexao(){

			return mysqli_connect('localhost', 'root' ,"",'jmsoccer'); 

		}

	}

?>