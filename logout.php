<?php require_once "logica-usuario.php";

logout();
header("Location:index.php?logout=true"); 
die(); 
