<header class="bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark">
            <a class="navbar-brand" href="<?= URL ?>">Unset</a>
                <button class="navbar-toggler" type="button" data-togglr="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=URL?>/posts" data-tooltip="tooltip" title="Pagina inicial">Home</a>
                        </li class="nav-item">
                        <li>
                            <a class="nav-link" href="<?=URL?>/paginas/sobre" data-tooltip="tooltip" title="Sobre nós">Sobre nós</a>
                        </li>
                    </ul>

                           <?php 
                                if(isset($_SESSION['usuario_id'])): ?>
                                    <span class="navbar-text">                           
                                        <p>Olá, <?= $_SESSION['usuario_nome']; ?>, seja bem vindo(a)! </p>
                                        <a class="btn btn-sm btn-danger" href="<?=URL?>/usuarios/sair">Sair</a>
                                        <a class="btn btn-sm btn-primary" href="<?=URL?>/usuarios/perfil/<?= $_SESSION['usuario_id']; ?>">Perfil</a>

                                        <?php if($_SESSION['usuario_id'] == 28): ?>
                                            <a class="btn btn-sm btn-warning" href="#">Gerir contas</a>
                                        <?php endif; ?>
                                    </span>
                            <?php 
                                else: ?>    
                                    <span class="navbar-text">
                                        <a class="btn btn-info" href="<?=URL?>/usuarios/cadastrar" data-tooltip="tooltip" title="Não tem uma conta? Cadastre-se"> Cadastre-se</a>
                                        <a class="btn btn-info" href="<?=URL?>/usuarios/login" data-tooltip="tooltip" title="Tem uma conta? Faça login">Entrar</a>
                                    </span>
                                <?php endif; ?>
                </div>
        </nav>
    </div>
</header>