<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="cssprojeto.css">

</head>

<body>
    <section class="corpo">

        <div class="banner">
            <?php require_once("bancojmsoccer.php") ?>
            <?php require_once("camiseta.php") ?>

            <?php
                $camiseta = new camiseta();
                $camiseta->nome = $_POST["nome"];
                $camiseta->modelo = $_POST["modelo"];
                $camiseta->cor = $_POST["cor"];
                $camiseta->preco = $_POST["preco"];
                $camiseta->cat = $_POST["cat"];

//Chama o método-------------------------------------------------
                if (insereCamiseta($camiseta)) {
                    ?>


            <h1 class="titulos" style="color: #212121">
                Cadastrado!
            </h1>
            <h2 class="subtitulos" style="color: silver">
                Camisa cadastrada
            </h2>
            <h3 class="subtitulos2">
                Camisa cadastrada com sucesso
            </h3>


            <div class="formulario">
                <form action="adicionacamiseta.php" method="POST">
                    <input type="text" name="time" placeholder="time" value="Time: <?= $camiseta->nome ?>"></br></br>
                    <input type="text" name="modelo" placeholder="modelo"
                        value="Modelo: <?= $camiseta->modelo ?>"></br></br>
                    <input type="text" name="cor" placeholder="cor" value="Cor: <?= $camiseta->cor ?>"></br></br>
                    <input type="text" name="valor" placeholder="valor"
                        value="Valor: <?= $camiseta->preco ?>"></br></br>
                    <input type="text" name="categoria" placeholder="categoria" value="Categoria: <?= $camiseta->cat ?>"></br></br>
                    <input type="reset" value="Apagar">
                    <input type="submit" value="Cadastrar">


                </form>
            </div>

            <?php
                } else {
                    ?>
            <h1 class="titulos" style="color: #212121">
                Não Cadastrado!
            </h1>
            <h2 class="subtitulos" style="color: silver">
                Camisa nao cadastrada
            </h2>
            <h3 class="subtitulos2">
                Erro ao cadastrar
            </h3>

            <?php
                    echo mysqli_error($conexao);
                }
                //--------------------------------------------------------------
                ?>

            <a class="link" href="camisetalista.php"> Mostrar Lista Completa</a>
            <form class="localiza" method="post" action="localizacamisetarecebe.php?a=buscar">
                <input type="text" name="time" />
                <input type="submit" value="Buscar" />
            </form></a>
        </div>



    </section>
</body>

</html>