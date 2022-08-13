<div class="col-xl-4 col-md-6 mx-auto p-5">
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <h2>
        Cadastre-se
      </h2>
    </div>
     <div class="card-body">
      <p class="card-text"><small class="text-muted">Preencha o formulário abaixo para fazer seu cadastro</small></p>

      <form name="cadastrar" action="<?=URL?>/usuarios/cadastrar" method="post">
        <div class="form-group">
          <label for="nome">Nome: <sup class="text-danger">*</sup></label>
          <input type="text" name="nome" id="nome" class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>"  placeholder="" value="<?=$dados['nome']?>" >
          <div class="invalid-feedback">
          <?= $dados['nome_erro']?>

          </div>
        </div>
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
        <div class="form-group">
          <label for="confirmar_senha">Confirmar_senha: <sup class="text-danger">*</sup></label>
          <input type="password" name="confirmar_senha" id="confirmar_senha" class="form-control <?= $dados['confirmar_senha_erro'] ? 'is-invalid' : '' ?>"  placeholder="" value="<?=$dados['confirmar_senha']?>" >
          <div class="invalid-feedback">
          <?= $dados['confirmar_senha_erro']?>
          </div>
        </div>
        <div class="form-group">
          <label for="texto">Biográfia: <sup class="text-danger">*</sup></label>
          <textarea name="biografia" id="biografia" class="form-control <?= $dados['biografia_erro'] ? 'is-invalid' : '' ?>"  placeholder=""  rows="5"><?=$dados['biografia']?></textarea>
          <div class="invalid-feedback">
          <?= $dados['biografia_erro']?>
          </div>
        </div>   

          <div class="row">
            <div class="col-md-6">
              <input type="submit" value="Cadastrar" class="btn btn-info btn-block">
            </div>
            <div class="col-md-6">
              <a href="<?=URL?>/usuarios/login">Você tem uma conta? Faça login</a>
            </div>
          </div>


      </form>
    </div>
  </div>
</div>