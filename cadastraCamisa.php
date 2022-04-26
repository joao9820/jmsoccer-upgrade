<?php require_once("includes/admin/header_admin.php"); ?>

<style>

    #previaCamisa {
        object-fit: contain;
        height: 190px;
        width: 100%;
    }

    .formulario form {
        display: flex;
        flex-direction: column;
        width: 400px;
    }

</style>

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

            <div class="my-4">
                <a href="index.php" class="btn btn-outline-secondary">PÁGINA INICIAL</a>
                <a href="camisetalista.php" class="btn btn-outline-info mx-3">LISTAR CAMISAS</a>
                <a class="btn btn-outline-danger" href="logout.php">DESLOGAR</a>
            </div>


            <div class="formulario">
                <form action="adicionacamiseta.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="nome" placeholder="Nome"></br></br>
                    <input type="text" name="modelo" placeholder="Modelo"></br></br>
                    <input type="text" name="cor" placeholder="Cor"></br></br>
                    <input type="file" name="img" id="imgCamisa" placeholder="Imagem"></br>
                    <img src="Imagens/avatar/camisa.png" class="img-thumbnail" alt="Imagem da Camisa" id="previaCamisa">
                    </br>
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

                   <div class="d-flex justify-content-between">
                    <!-- <a class="btn btn-dark" href="camisetalista.php">listar camisas</a><span
                            class="sr-only">(current)</span></a> -->
                        <input type="reset" value="LIMPAR" class="btn btn-danger mr-2">
                        <input type="submit" value="CADASTRAR" class="btn bg-success text-light">
                   </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">



                </form>
            </div>
        </div>



    </section>

    <script>

        const inputImg = document.getElementById("imgCamisa");
        const previaImg = document.getElementById("previaCamisa");

        inputImg.addEventListener('change', function previaCamisa(){

            const imgDados = this.files[0];

            const reader = new FileReader();

            reader.onloadend = function () {
                previaImg.src = reader.result;
            };

            if(imgDados){
                reader.readAsDataURL(imgDados);
            }else{
                previaImg.src = "Imagens/avatar/camisa.png";
            }

        });

       


    </script>

    <?php require_once("includes/admin/footer_admin.php"); ?>