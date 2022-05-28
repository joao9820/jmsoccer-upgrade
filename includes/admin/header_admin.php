<?php require_once('logica-usuario.php') ?>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="cssprojeto.css">
    <!--<link rel="stylesheet" type="text/css" href="cssjmsoccer.css">-->
    <link rel="stylesheet" type="text/css" href="whatsapp.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

</head>


<body>
<?php if(isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado']['is_admin']) require_once("navbar_admin.php") ?>