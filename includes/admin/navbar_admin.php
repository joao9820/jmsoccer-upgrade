<style>

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
                <a class="navbar-brand" href="index.php"><i class="fas fa-futbol"></i> JMSOCCER - ADM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="camisetalista.php">Camisas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pedidosAdm.php">Pedidos</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                      <div>
                          <p class="mb-0 mr-2">Usuario: <?= $_SESSION['usuario_logado']['usuario'] ?></p>
                      </div>

                      <a class="btn btn-outline-danger" href="logout.php">Sair</a>
                </div>
            </div>
        </nav>
    </div>
</header>
