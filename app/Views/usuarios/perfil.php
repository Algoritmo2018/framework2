<div class="container py-5">
      <?=Sessao::mensagem('post')?>
      <div class="card">
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <div class="col-xl-10 col-md-5 mx-auto p-8">
                  <div class="card">
                    <div class="card-header bg-secondary text-white">
                      <h2>
                        <?=$dados['nome']?>
                      </h2>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <?=$dados['biografia']?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-sm-6">
            <div class="card-body">
            <div class="col-xl-40  mx-auto p-8">
        <div class="card">
          <div class="card-header bg-secondary text-black">
            <h2>
              Dados Pessoais
            </h2>
          </div>
          <div class="card-body">
            <form name="atualizar" action="<?=URL?>/usuarios/perfil/<?= $_SESSION['usuario_id']; ?>" method="post">
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
                <label for="texto">Biográfia: <sup class="text-danger">*</sup></label>
                <textarea name="biografia" id="biografia" class="form-control <?= $dados['biografia_erro'] ? 'is-invalid' : '' ?>"  placeholder=""  rows="5"><?=$dados['biografia']?></textarea>
                <div class="invalid-feedback">
                <?= $dados['biografia_erro']?>
                </div>
              </div>   

                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" value="Atualizar" class="btn btn-info btn-block">
                  </div>
                </div>
            </form>
          </div>
        </div>
      </div>
            </div>
          </div>

      </div>
              </div>
</div>
   