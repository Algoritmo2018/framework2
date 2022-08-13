<div class="col-xl-4 col-md-6 mx-auto p-5">
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <h2>
         Login
      </h2>
    </div>
    <div class="card-body">
      <?=Sessao::mensagem('usuario')?>
      <p class="card-text"><small class="text-muted">Informe os seus dados para fazer  login!</small></p>

      <form name="login" action="<?=URL?>/usuarios/login" method="post">
        <div class="form-group">
          <label for="email">Email: <sup class="text-danger">*</sup></label>
          <input type="text" name="email" id="email" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>"  placeholder="" value="<?=$dados['email']?>" >
          <div class="invalid-feedback">
          <?= $dados['email_erro']?>

          </div>
        </div>
        <div class="form-group">
          <label for="senha">Senha: <sup class="text-danger">*</sup></label>
          <input type="password" name="senha" id="senha" class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>"  placeholder="" value="<?=$dados['senha']?>" >
          <div class="invalid-feedback">
          <?= $dados['senha_erro']?>

          </div>
        </div>   
          <div class="row">
            <div class="col-md-6">
              <input type="submit" value="Login" class="btn btn-info btn-block">
            </div>
            <div class="col-md-6">
              <a href="<?=URL?>/usuarios/cadastrar">Você não tem uma conta? Crie uma, clicando aqui</a>
            </div>
          </div>


      </form>
    </div>
  </div>
</div>