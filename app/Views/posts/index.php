<div class="container py-5">
<?=Sessao::mensagem('post')?>
<?=Sessao::mensagem('usuario')?>
    <div class="card">
        <div class="card-header bg-info text-white">
            POSTAGENS
            <div class="float-right">
            <a href="<?=URL?>/posts/cadastrar" class="btn btn-light">Escrever</a>
        </div>
        </div>
        <div class="card-body">
            <?php foreach($dados['posts'] as $post): ?> 

                <div class="card my-5">
  <div class="card-header bg-secondary text-white">
  <?= $post->titulo ?>
  </div>
  <div class="card-body">
 
    <p class="card-text"><?= $post->texto ?></p>
    <a href="<?=URL.'/posts/ver/'.$post->postId ?>" class="btn btn-sm btn-outline-info float-right">Ler mais</a>
  </div>
  <div class="card-footer text-muted">
   <small><i> Escrito por: <?= $post->nome ?> em <?= Checa::dataBr($post->postDataCadastro)  ?></i></small>
  </div>
</div>
            
            <?php endforeach ?>
        </div>
    </div>

</div>