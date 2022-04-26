<?php require_once("includes/admin/header_admin.php"); 	require_once "logica-usuario.php";?>

<?php require_once("bancojmsoccer.php") ?>
<?php require_once("camiseta.php") ?>
<?php require_once("helper/UploadImg.php") ?>

            <?php
                $camiseta = new camiseta();
                $camiseta->nome = $_POST["nome"];
                $camiseta->modelo = $_POST["modelo"];
                $camiseta->cor = $_POST["cor"];
                $camiseta->preco = $_POST["preco"];
                $camiseta->cat = $_POST["cat"];
                $img = $_FILES['img'] && $_FILES['img']['name'] ? $_FILES['img'] : null;

                if($img){
                    
                   $uploadImg = new UploadImg($img, 'Imagens/');

                   $upSuccess = $uploadImg->getResultado();

                   $camiseta->img = $upSuccess ? $img['name'] : null;

                }

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
                }
                //--------------------------------------------------------------
                ?>
        </div>

        <?php require_once("includes/admin/footer_admin.php"); ?>
