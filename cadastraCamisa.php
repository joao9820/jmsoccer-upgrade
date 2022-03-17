<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="cssprojeto.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <section class="corpo">

        <div class="banner">

            <h1 class="titulos" style="color: #212121">
                Cadastro
            </h1>
            <h2 class="subtitulos" style="color: silver">
                Camisa
            </h2>
            <h3 class="subtitulos2">
                Formulario para cadastro de camisas
            </h3>


            <div class="formulario">
                <form action="adicionacamiseta.php" method="POST">
                    <input type="text" name="time" placeholder="time"></br></br>
                    <input type="text" name="modelo" placeholder="modelo"></br></br>
                    <input type="text" name="cor" placeholder="cor"></br></br>
                    <input type="text" name="valor" placeholder="valor"></br></br>
                    <input type="text" name="prazo" placeholder="prazo"></br></br>

                    <input type="reset" value="Apagar" class="btn btn-danger">
                    <input type="submit" value="Cadastrar" class="btn btn-success">

                    <a class="btn btn-dark" href="camisetalista.php">listar camisas</a><span
                        class="sr-only">(current)</span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">



                </form>
            </div>
        </div>



    </section>

</body>

</html>