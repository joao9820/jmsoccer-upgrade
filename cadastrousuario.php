<?php require "conecta.php" ?>
<?php require_once "logica-usuario.php";?>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <form action="" method="post">
  		<div class= "form-group">
          <label> Login:</label>
 		  <input  class="form-control" type="text" name="login" required> 
		</div>
		
      
 	 <div class= "form-group">
          <label> Senha:</label>
 		  <input  class="form-control" type="password" name="senha" required> 
     </div>
        <button type="submit"  class="btn btn-primary">Login </button> 
</form>

<?php if(isset($_POST['login']) && isset($_POST['senha'])){
 
 require_once "conecta.php";
 require_once "conecta.php";
 require_once "logica-usuario.php";
 
 $login =$_POST['login'];
 $senha2=md5($_POST['senha']);
 
 function inserir($conexao,$login,$senha2){
 
	 $sql= "insert into login (usuario,senha) values ('$login', '$senha2')";
		  
	  if(mysqli_query ( $conexao, $sql)){
		   header("Location:index.php");
		  }
	  else {
		 $erro= mysqli_error($conexao);
		  echo ' Não Adicionado'; 
		  echo $erro; 
		  }
 }
 
  inserir($conexao, $login,$senha2);
	
}	
?>