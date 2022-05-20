<style>

    .fa-shopping-basket {
        font-size: 20px;
    }

    .btn-cesta {
        position: relative;
    }

    .btn-cesta .cesta-itens {
        position: absolute;
        border: 1px solid #fff;
        border-radius: 50%;
        /* transform: translate(-50%,-50%)!important; */
        top: -1px;
        right: 0;
        font-size: .60rem;
        line-height: 1;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 700;
        color: #fff;
    }

    header {
        position: sticky;
        top: 0;
        z-index: 1000;
    }

</style>

<header>
        <!-- A parte do cabeçalho começa aqui-->
    <div class="topo">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><i class="fas fa-futbol"></i> JMSOCCER</a>
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
                        <?php if(isset($_SESSION['usuario_logado']) && !$_SESSION['usuario_logado']['is_admin']) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="pedidos.php">Pedidos</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                    <a href="carrinho.php" role="button" class="btn btn-cesta mr-3"><i class="fas fa-shopping-basket"></i>
                        <span class="bg-danger p-2 cesta-itens" id="notifyCarrinho" style="opacity: <?= isset($_COOKIE['carrinho']) && json_decode($_COOKIE['carrinho']) ? 1 : 0 ?>;">
                            <?= isset($_COOKIE['carrinho']) && json_decode($_COOKIE['carrinho']) ? count(json_decode($_COOKIE['carrinho'])) : 0 ?>
                        </span>
                    </a>
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
