<div class="container my-5">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=URL?>/posts">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $dados['post']->titulo ?></li>
        </ol>
    </nav>

<div class="card text-center">
  <div class="card-header">
  <?= $dados['post']->titulo ?>
  </div>
  <div class="card-body">
    <p class="card-text"><?= $dados['post']->texto ?></p>
  </div>
  <div class="card-footer text-muted">
  <small><i> Escrito por: <?= $dados['usuario']->nome ?> em <?= Checa::dataBr($dados['post']->criado_em) ?> </i></small>
  </div>

  <?php if(($dados['post']->usuario_id == $_SESSION['usuario_id']) || ($_SESSION['usuario_id'] == 28) ): ?>
    <ul class="list-inline">
      <li class="list-inline-item">
        <a href="<?= URL.'/posts/editar/'.$dados['post']->id ?>" class="btn btn-sm btn-primary">Editar</a>
      </li>
      <li class="list-inline-item">
        <form action="<?= URL.'/posts/deletar/'.$dados['post']->id ?>" method="post">
          <input type="submit" class="btn btn-sm btn-danger" value="Deletar">
        </form>
      </li>
    </ul>


  <?php endif; ?>
</div>
</div>