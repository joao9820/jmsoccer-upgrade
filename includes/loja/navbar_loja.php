
<header>
        <!-- A parte do cabeçalho começa aqui-->
    <div class="topo">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">JMSOCCER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="loja.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="carrinho.php">Carrinho</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Histórico</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                    <?php if(isset($_SESSION["usuario_logado"])) : ?>

                        <div>
                            <p class="mb-0 mr-2">Usuario: <?= $_SESSION['usuario_logado']['usuario'] ?></p>
                        </div>

                        <a class="btn btn-outline-danger" href="logout.php">Sair</a>

                    <?php else:  ?>

                      
                         <form action="validaLogin.php" method="POST" class="form-inline my-2 my-lg-0">
                             <input type="text" id="login" name="login" class="form-control mr-sm-2" type="search" placeholder="USUARIO"
                                        aria-label="Search" required>
                                    <input type="password" name="senha" placeholder="SENHA" class="form-control mr-sm-2"
                                        type="search" placeholder="SENHA" aria-label="Search">
                                    <button value="Entrar" class="btn btn-success" type="submit" required>Entrar</button>
                        </form>

                        <a button class="btn btn-outline-info ml-2" type="button" href="cadastrousuario.php">Cadastre-se</a>

                <?php endif; ?>
                </div>
            </div>
        </nav>

        <div class="logo">
        </div>

    </div>
</header>
