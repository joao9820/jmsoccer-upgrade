<?php require_once("includes/admin/header_admin.php"); ?>

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
                    <input type="text" name="nome" placeholder="Nome"></br></br>
                    <input type="text" name="modelo" placeholder="Modelo"></br></br>
                    <input type="text" name="cor" placeholder="Cor"></br></br>
                    <div class="form-group">
                        <select name="cat" class="form-control">
                            <option value="" >Categoria</option>
                            <option value="1" >Nacionais</option>
                            <option value="2" >Internacionais</option>
                            <option value="3" >Seleções</option>
                        </select>
                    </div>
                    <input type="text" name="preco" placeholder="Preço"></br></br>
                   <!--  <input type="text" name="prazo" placeholder="prazo"></br></br> -->

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

    <?php require_once("includes/admin/footer_admin.php"); ?>